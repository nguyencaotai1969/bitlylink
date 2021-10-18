<?php 

class config{
  protected  $db_conn;
  public $db_host = "localhost";
  public $db_user = "root";
  public $db_pass = "";
  public $db_name = "bitlylink";
  public function connect(){
      try{
      $db_conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            $db_conn -> set_charset("utf8");
             if(mysqli_connect_errno()===0){
                
                return $db_conn;
            }
            return false;
      }

      catch(PDOException $e){
          return "MySQL error : " . $e->getMessage();
      }
  }
}

