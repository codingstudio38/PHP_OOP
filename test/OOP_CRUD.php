<?php 
require_once "DB_CONNECT.php";

$connect = new Dbconnection();

$data = array(
    "name"=>"bidyut",
    "email"=>"test@gmail.com"
); 
 
$response = $connect->insert("test_tbl",$data);
echo "<pre>";
print_r($response);
 
 
?>