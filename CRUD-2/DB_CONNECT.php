<?php 
// require_once './vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'./');
// $dotenv->load();
// echo $_ENV["DEFAULT_DB_HOST"];
//only for database connection class

namespace Database\db\connect;
  
class Connection{
//only for database connection class
private $DEFAULT_DB_HOST;
private $DEFAULT_DB_USER;
private $DEFAULT_DB_PASSWORD;
private $DEFAULT_DB_NANE;
private $DEFAULT_CONNECT;
public function __construct(){
    $this->DEFAULT_DB_HOST ="localhost";
    $this->DEFAULT_DB_USER="root";
    $this->DEFAULT_DB_PASSWORD="";
    $this->DEFAULT_DB_NANE="laravel";
    $this->DEFAULT_CONNECT="";

} 
  
public function DEFAULT_CONNECT(){
    // $this->DEFAULT_CONNECT = new mysqli($this->DEFAULT_DB_HOST,$this->DEFAULT_DB_USER,$this->DEFAULT_DB_PASSWORD,$this->DEFAULT_DB_NANE);
   $this->DEFAULT_CONNECT = mysqli_connect($this->DEFAULT_DB_HOST,$this->DEFAULT_DB_USER,$this->DEFAULT_DB_PASSWORD,$this->DEFAULT_DB_NANE);
    if (mysqli_connect_error()){
        //return mysqli_connect_error();$this->DEFAULT_CONNECT->connect_error
        return false;
    }
    return $this->DEFAULT_CONNECT;
    return true;
}

public function DEFAULT_CONNECT_PROPERTIES(){
    return array(
        "DB_HOST"=>$this->DEFAULT_DB_HOST,
        "DB_USER"=>$this->DEFAULT_DB_USER,
        "DB_PASSWORD"=>$this->DEFAULT_DB_PASSWORD,
        "DB_NANE"=>$this->DEFAULT_DB_NANE
    );
}


}


?>

