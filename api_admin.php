<?php 
include 'php/config.php';
session_start();
header("Content-type: application/json; charset=utf-8");

class Admin{

	private $conn;
	private $config;
	private $dataRequest;
	public function __construct(){

		$this->config = new config();
		$this->conn = $this->config->connect();
		$this->dataRequest = json_decode(file_get_contents('php://input'));
	}
	public function index(){
		if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
			header("Location: login.php");
		}
	}
	
	//giữ liệu biểu đồ
	public function counter(){
		$time_now = time();
        $time_out = 120;

        //user online
		$select = "SELECT * FROM counter where (UNIX_TIMESTAMP(c_last_visit)+'{$time_out}') > '{$time_now}'";
	    $sql = mysqli_query($this->conn,$select);
	    $counter_online = mysqli_num_rows($sql);

	    //all counter
	    $selectall = "SELECT * FROM counter";
	    $sqlall = mysqli_query($this->conn,$selectall);
	    $counter_all = mysqli_num_rows($sqlall);

	    //counter day
	    $day = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE())  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlday = mysqli_query($this->conn,$day);
	    $counter_day = mysqli_num_rows($sqlday);

  		//counter -1
	    $yesterday_1 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 1  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_1 = mysqli_query($this->conn,$yesterday_1);
	    $counter_yesterday_1 = mysqli_num_rows($sqlyesterday_1);

	    //counter -2
	    $yesterday_2 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 2  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_2 = mysqli_query($this->conn,$yesterday_2);
	    $counter_yesterday_2 = mysqli_num_rows($sqlyesterday_2);

	    //counter -3
	    $yesterday_3 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 3  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_3 = mysqli_query($this->conn,$yesterday_3);
	    $counter_yesterday_3 = mysqli_num_rows($sqlyesterday_3);

	    //counter -4
	    $yesterday_4 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 4  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_4 = mysqli_query($this->conn,$yesterday_4);
	    $counter_yesterday_4 = mysqli_num_rows($sqlyesterday_4);

	    //counter -5
	    $yesterday_5 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 5  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_5 = mysqli_query($this->conn,$yesterday_5);
	    $counter_yesterday_5 = mysqli_num_rows($sqlyesterday_5);

	    //counter -6
	    $yesterday_6 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 6  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_6 = mysqli_query($this->conn,$yesterday_6);
	    $counter_yesterday_6 = mysqli_num_rows($sqlyesterday_6);

	    //counter -7
	    $yesterday_7 = "SELECT * FROM counter where DAYOFMONTH(c_last_visit) = DAYOFMONTH(CURDATE()) - 7  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyesterday_7 = mysqli_query($this->conn,$yesterday_7);
	    $counter_yesterday_7 = mysqli_num_rows($sqlyesterday_7);

	    //counter week
	    $week = "SELECT * FROM counter where WEEKOFYEAR(c_last_visit) = WEEKOFYEAR(CURDATE())  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlweek = mysqli_query($this->conn,$week);
	    $counter_week = mysqli_num_rows($sqlweek);

	    //counter month
	    $month = "SELECT * FROM counter where MONTH(c_last_visit) = MONTH(CURDATE())  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlmonth = mysqli_query($this->conn,$month);
	    $counter_month = mysqli_num_rows($sqlmonth);

	      //counter month
	    $month1 = "SELECT * FROM counter where MONTH(c_last_visit) = MONTH(CURDATE())-1  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlmonth1 = mysqli_query($this->conn,$month1);
	    $counter_month1 = mysqli_num_rows($sqlmonth1);

	      //counter month2
	    $month2 = "SELECT * FROM counter where MONTH(c_last_visit) = MONTH(CURDATE())-2  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlmonth2 = mysqli_query($this->conn,$month2);
	    $counter_month2 = mysqli_num_rows($sqlmonth2);

	          //counter month3
	    $month3 = "SELECT * FROM counter where MONTH(c_last_visit) = MONTH(CURDATE())-3  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlmonth3 = mysqli_query($this->conn,$month3);
	    $counter_month3 = mysqli_num_rows($sqlmonth3);

	          //counter month5
	    $month4 = "SELECT * FROM counter where MONTH(c_last_visit) = MONTH(CURDATE())-4  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlmonth4 = mysqli_query($this->conn,$month4);
	    $counter_month4 = mysqli_num_rows($sqlmonth4);

	          //counter month6
	    $month5 = "SELECT * FROM counter where MONTH(c_last_visit) = MONTH(CURDATE())-5  AND YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlmonth5 = mysqli_query($this->conn,$month5);
	    $counter_month5 = mysqli_num_rows($sqlmonth5);

	    //counter year
	    $year = "SELECT * FROM counter where YEAR(c_last_visit) = YEAR(CURDATE())";
	    $sqlyear = mysqli_query($this->conn,$year);
	    $counter_year = mysqli_num_rows($sqlyear);

	    echo json_encode([
	    	'counter_online' =>$counter_online,
	    	'counter_all'    =>$counter_all,
	    	'counter_day'    =>$counter_day,
	    	'counter_before_week'=>[
	    		'counter_yesterday_1'=>$counter_yesterday_1,
	    		'counter_yesterday_2'=>$counter_yesterday_2,
	    		'counter_yesterday_3'=>$counter_yesterday_3,
	    		'counter_yesterday_4'=>$counter_yesterday_4,
	    		'counter_yesterday_5'=>$counter_yesterday_5,
	    		'counter_yesterday_6'=>$counter_yesterday_6,
	    		'counter_yesterday_7'=>$counter_yesterday_7
	    	],
	    	'counter_7_day'=>$counter_yesterday_1+$counter_yesterday_2+$counter_yesterday_3+$counter_yesterday_4+$counter_yesterday_5+$counter_yesterday_6+$counter_yesterday_7,
	    	'counter_week' =>$counter_week,
	    	'counter_month'=>[
	    		'counter_month'=>$counter_month,
	    		'counter_month1'=>$counter_month1,
	    		'counter_month2'=>$counter_month2,
	    		'counter_month3'=>$counter_month3,
	    		'counter_month4'=>$counter_month4,
	    		'counter_month5'=>$counter_month5
	    	],
	    	'counter_year' =>$counter_year
	    ]);
	}

	//listUrl
	public function listUrl(){
		//user online
		$select = "SELECT shorten_url,full_url,clicks,status,id FROM url ORDER BY id DESC";
	    $sql = mysqli_query($this->conn,$select);
	    $data = [];
	    if($sql == false){
	    	echo json_encode(['error'=>"empty record: "]);
	    	return;
	    }
	    $listurl = mysqli_num_rows($sql);
	    if($listurl > 0){
	    	while ($row = mysqli_fetch_assoc($sql)) {
	    		if(!empty($row)){
	    			$row['domain'] = $row['full_url'] ? parse_url($row['full_url'], PHP_URL_HOST) :"error domain";
	    			array_push($data, $row);
				}
	    	}
	    }
	    if(!empty($data)){
	    	echo json_encode([
	    		"success" => $data,
	    	]);
	    	return;
	    }
	    
	}
	//delete url
	public function deleteUrl(){

		$id = $this->dataRequest->id ? $this->dataRequest->id : 'error id';
		$msg = [];
		if(isset($id) && !empty($id)){
			$sql = "DELETE FROM url WHERE id = '{$id}'";
			if ($this->conn->query($sql) === TRUE) {
			  $msg = ['successfully'=>"Record deleted successfully"];

			}else {
			  $msg = ['error'=>"Error deleting record: " . $conn->error];
			}
		}
		echo json_encode($msg);
		return;
	}
	//edit url 
	public function editUrl(){

		if(!isset($this->dataRequest)){
			echo json_encode(['error'=>"Error updateding record: "]);
			return;
		}
		$id = $this->dataRequest->id ? $this->dataRequest->id : 'error id';
		$click = $this->dataRequest->click ? $this->dataRequest->click : +1;
		$fullurl = $this->dataRequest->fullurl ? $this->dataRequest->fullurl : 'error fullurl';
		$status = $this->dataRequest->status ? $this->dataRequest->status : 1;
		$msg = [];
		if(empty($status)||empty($click)||empty($fullurl)||empty($status)){
			 $msg = ['error'=>"Error empty data"];
		}
		if($status !== '1' && $status !== '2'){
			$msg = ['error'=>"status error"];
			echo json_encode($msg);
			return;
		}
		$query_exit = "SELECT shorten_url from url WHERE full_url='{$fullurl}' limit 1";
		$sql_exit = mysqli_query($this->conn,$query_exit);
		
		//kiểm tra url thêm đã có chưa nếu có thì k cần thêm vào nữa gọi trả về luôn
		if(!empty($sql_exit) && mysqli_num_rows($sql_exit) > 0){
			$msg = ['error'=>"Full url exit"];
			echo json_encode($msg);
		    return;
		}

		$sql = "UPDATE url SET 
			full_url = '{$fullurl}',
			clicks = '{$click}',
			status = '{$status}'
		WHERE id = '{$id}'";
		if ($this->conn->query($sql) === TRUE) {
			  $msg = ['successfully'=>"Record updated successfully"];
			}else {
			  $msg = ['error'=>"Error updateding record: "];
			}
		echo json_encode($msg);
		return;
	}

	//get banner
	public function listBanner(){
		$select = "SELECT name,img,href,create_at,id FROM banner ORDER BY id DESC";
	    $sql = mysqli_query($this->conn,$select);
	    $data = [];
	    if($sql == false){
	    	echo json_encode(['error'=>"empty record: "]);
	    	return;
	    }
	    $listurl = mysqli_num_rows($sql);
	    if($listurl > 0){
	    	while ($row = mysqli_fetch_assoc($sql)) {
	    		if(!empty($row)){
	    			array_push($data, $row);
				}
	    	}
	    }
	    if(!empty($data)){
	    	echo json_encode([
	    		"success" => $data,
	    	]);
	    	return;
	    }
	}

	//login
	public function login(){
			if(!empty($this->dataRequest)){
				$username =		$this->dataRequest->username ? $this->dataRequest->username : 'sai_admin';
				$password =		$this->dataRequest->password ? md5($this->dataRequest->password) : 'sai_password';
				$select = "SELECT id,role FROM user WHERE username = '{$username}' limit 1";
			    $sql = mysqli_query($this->conn,$select);
			    $result = mysqli_fetch_assoc($sql);
			}
		    if(empty($result)){
		    	echo json_encode(['error'=>"Username or password no success!"]);
		        return;
		    }
		    $select1 = "SELECT id,username,role FROM user WHERE username = '{$username}' and  password = '{$password}'limit 1";
		    $sql1 = mysqli_query($this->conn,$select1);
		    $result1 = mysqli_fetch_assoc($sql1);
		    if(empty($result1)){
				echo json_encode(['error'=>"Username or password no success!"]);
	        	return;
		    }
		    $_SESSION['user'] = $result1;
		    echo json_encode(['success'=>"successfully!"]);
	        return;
	}

	//logout
	public function logout(){
		if(!empty($_SESSION['user'])){
			unset($_SESSION['user']);
			header("Location: login.php");
		}
	}
}
$ObjAdmin = new Admin();
$get = !empty($_GET) ? trim(str_replace('/','',array_keys($_GET)[0])) : '';
switch ($get) {
		case 'counter':
			$ObjAdmin->counter();
			// code...
			break;
		case 'login':
			$ObjAdmin->login();
			break;
		case 'logout':
			$ObjAdmin->logout();
			break;
		case 'listUrl':
			$ObjAdmin->listUrl();
			break;
		case 'deleteUrl':
			$ObjAdmin->deleteUrl();
			break;
		case 'editUrl':
			$ObjAdmin->editUrl();
			break;
		case 'listBanner':
			$ObjAdmin->listBanner();
			break;
}
