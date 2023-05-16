<?php 
/// Only for database collection
require_once __DIR__ . "/vendor/autoload.php";
trait Database {
  
public function __construct(){
  
}

public function ENVDATA(){
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'./');
    $dotenv->load();
    return $_ENV;
}
 

public function env(string $key){
  $ENV = $this->ENVDATA();
  return isset($ENV[$key])?$ENV[$key]:"";
}


private function CONNECT(){
  try{
    $Connection = new PDO("mysql:host=".$this->env('DB_HOST').";dbname=".$this->env('DB_NANE'),$this->env('DB_USER'),$this->env('DB_PASSWORD'));
    $Connection->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
    $Connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT );
    $Connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $Connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    return $Connection;
  }catch(PDOException $error){ 
    echo $error->getMessage()."<br>";
    die("Failed to connect with MySQL: " . $error->getMessage()); 
  }
}


}
  




?>