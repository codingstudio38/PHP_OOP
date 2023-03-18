<?php 
// require_once './vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'./');
// $dotenv->load();
// echo $_ENV["DEFAULT_DB_HOST"];
//only for database connection class
trait Database{
 
  
private $DEFAULT_DB_HOST="localhost";
private $DEFAULT_DB_USER="root";
private $DEFAULT_DB_PASSWORD="";
private $DEFAULT_DB_NANE="laravel";
private $DEFAULT_CONNECT;
 
public function __construct(){
}   

 
private function DEFAULT_CONNECTION(){
    try {
        $this->DEFAULT_CONNECT = new mysqli($this->DEFAULT_DB_HOST,$this->DEFAULT_DB_USER,$this->DEFAULT_DB_PASSWORD,$this->DEFAULT_DB_NANE);
        if($this->DEFAULT_CONNECT->connect_error){
            return false;//$this->DEFAULT_CONNECT->connect_error
        }
        return $this->DEFAULT_CONNECT;
    } catch(Exception $e) {
        return $e->getMessage();
    }
} 
 
private function DEFAULT_CONNECT_PROPERTIES(){
    return array(
        "DB_HOST"=>$this->DEFAULT_DB_HOST,
        "DB_USER"=>$this->DEFAULT_DB_USER,
        "DB_PASSWORD"=>$this->DEFAULT_DB_PASSWORD,
        "DB_NANE"=>$this->DEFAULT_DB_NANE
    );
}

}


?>