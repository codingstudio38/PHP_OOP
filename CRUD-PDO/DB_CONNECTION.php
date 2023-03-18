<?php 


trait Database {

  private $DB_HOST = "localhost";
  private $DB_USER = "root";
  private $DB_PASSWORD = "";
  private $DB_NANE= "laravel";

  
private function CONNECT(){
  try{
    $Connection = new PDO("mysql:host=$this->DB_HOST;dbname=$this->DB_NANE",$this->DB_USER,$this->DB_PASSWORD);
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