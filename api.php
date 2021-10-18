<?php
require 'php/config.php';
session_start();
header("Content-type: application/json; charset=utf-8");

class Api{

    public $conn;
	public function __construct(){
		$db_connection = new config();
        $this->conn = $db_connection->connect();  
		$this->dataRequest = json_decode(file_get_contents('php://input'));
	}
   	
   	//thêm lượt truy cập
	public  function counterIp($c_ip_address){
		if(!empty($c_ip_address)){
			$query =  "INSERT INTO `counter` (c_ip_address) VALUES ('{$c_ip_address}')";
			$this->conn->query($query);
		}
	    return;
	}

	//thêm link rút gon
	public function verry_token(){
			
	    if(empty($this->dataRequest)){
	    	echo json_encode(['error'=>"Required - params"]);
	        return;	
	    }
	    $link =  htmlspecialchars($this->dataRequest->link, ENT_QUOTES, 'UTF-8');
		$og_url = mysqli_real_escape_string($this->conn, $link);
		$shorten_url = str_replace(' ', '', $og_url);
		$ran_url = substr(md5(microtime()), rand(0, 26), 5);
		$hidden_url = mysqli_real_escape_string($this->conn, $ran_url);
	    if ($this->dataRequest->captcha != (string) $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
	    	echo json_encode(['error'=>'Invalid verification code!']);
	        return;
	    }
	    if(empty($shorten_url)){
	    	echo json_encode(['error'=>'Error- You have to enter short url!']);
	        return;
	    }
	    if(!preg_match("/\//i", $shorten_url)){
	    	echo json_encode(['error'=>"Invalid URL - You can't edit domain name!"]);
	        return;
	    }
		$explodeURL = explode('/', $shorten_url);
	    $shortURL = end($explodeURL);
	    if(empty($explodeURL)){
	    	echo json_encode(['error'=>"Required - You have to enter short url!"]);
	        return;
	    }
	    $domain_name = parse_url($shorten_url, PHP_URL_HOST);
	    $select = "SELECT id,status FROM domain_block WHERE name_host = '{$domain_name}' limit 1";
	    $sql = mysqli_query($this->conn,$select);

	    //nếu chưa có domain trong bảng domain_block thì thêm vào mặc định 1 là: active
	    $result = mysqli_fetch_assoc($sql);
	    if(empty($result)){
			$query = "INSERT INTO domain_block (name_host,status) VALUES ('{$domain_name}',1) ON DUPLICATE KEY UPDATE name_host='{$domain_name}'";
			$this->conn->query($query);
			$this->insertTable_url($hidden_url,$shorten_url);
			return;
	    }
	    //kiểm tra nếu status khác 1 là domain đã bị block
	    if($result['status'] != '1'){
	    	echo json_encode(['error'=>"Domain - You this blocked!"]);
	        return;
	    }

	    //thêm 1 bản ghi của link rút gon
	 	$this->insertTable_url($hidden_url,$shorten_url);


	}
	private function insertTable_url($hidden_url,$full_url){
		trim($hidden_url);
		trim($full_url);

		$query_exit = "SELECT shorten_url from url WHERE full_url='{$full_url}' limit 1";

		$sql_exit = mysqli_query($this->conn,$query_exit);
	    $url_date = time();
		
		//kiểm tra url thêm đã có chưa nếu có thì k cần thêm vào nữa gọi trả về luôn
		if(!empty($sql_exit) && mysqli_num_rows($sql_exit) > 0){

			$result = mysqli_fetch_assoc($sql_exit);
			echo json_encode([
				'success'=>"successfully",
				'link_shorten'=>'https://'.$_SERVER['HTTP_HOST'].'/'.$result['shorten_url'],
				'link_full'=>$full_url
				]);
		    return;
		}

		$query = "INSERT INTO url (shorten_url,full_url,status,url_date) VALUES ('{$hidden_url}','{$full_url}',1,'{$url_date}') 
		ON DUPLICATE KEY UPDATE shorten_url = VALUES(shorten_url)";

		$this->conn->query($query);
		echo json_encode([
			'success'=>"successfully",
			'link_shorten'=>'https://'.$_SERVER['HTTP_HOST'].'/'.$hidden_url,
			'link_full'=>$full_url
		]);
	    return;
	}


	//chuyển hướng trang rút gon shorten_url
	public function renderPage($shorten_url){
		
		if(empty($shorten_url)){
			header("Location:".'http://'.$_SERVER['HTTP_HOST']);
		}
		
		$select = "SELECT full_url FROM url WHERE shorten_url = '{$shorten_url}' limit 1";
		$sql = $this->conn->query($select);
		$row = mysqli_fetch_assoc($sql);
		if(!empty($row)){
			$this->counterIp($_SERVER['REMOTE_ADDR']);
			$update = "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$shorten_url}'";
			$this->conn->query($update);	
			header("Location:".$row['full_url']);

		}
		return;
	}
	//capcha
	public function captcha(){
		$text = rand(10000,99999); 
		$_SESSION["vercode"] = $text; 
		$height = 25; 
		$width = 65;   
		$image_p = imagecreate($width, $height); 
		$black = imagecolorallocate($image_p, 0, 0, 0); 
		$white = imagecolorallocate($image_p, 255, 255, 255); 
		$font_size = 14; 
		imagestring($image_p, $font_size, 5, 5, $text, $white); 
		imagejpeg($image_p, null, 80); 
	}
}

//check case verry
	$get = !empty($_GET) ? trim(str_replace('/','',array_keys($_GET)[0])) : 'empty_value';

	switch ($get) {
		case 'verry':
			$objApi = new Api();
			$objApi->verry_token();
			break;
		case 'captcha':
			$objApi = new Api();
			$objApi->captcha();
			break;
		case 'empty_value':
			$objApi = new Api();
			$objApi->counterIp($_SERVER['REMOTE_ADDR']);

		default:
			$objApi = new Api();
			$objApi->renderPage($get);
		break;
		
	}