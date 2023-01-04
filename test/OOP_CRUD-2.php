<?php 
require_once "DB_CONNECT-2.php";
 
class Phpoopcrud extends Dbconnection { 

public function insert($table,$value=array()){
    try {
        if(gettype($table)!=="string" || $table==""){
            return array("error"=>"Invalid data type..!!","message"=>"Invalid table name format..!!","status"=>400);
        }
        if($this->tableExists($table)){
            if(gettype($value)!=="array" || count($value)==0){
                return array("error"=>"Invalid format..!!","message"=>"Invalid values..!!","status"=>400);
            }
            $tbl_columns = implode(",",array_keys($value));
            $col_value = $this->valueSanitize($value);
            $insert = "INSERT INTO `$table` ($tbl_columns) VALUES ($col_value)";
            if($this->DEFAULT_CONNECT->query($insert)){
                $lastid= mysqli_insert_id($this->DEFAULT_CONNECT);
                return array("message"=>"Successfully inserted.","lastid"=>$lastid,"status"=>200);
            } else {
                return array("error"=>$this->DEFAULT_MYSQIL->error,"message"=>"Failed to insert..!!","status"=>400);
            }
        } else {
            $m="Table $table dose not exist in this database $this->DEFAULT_DB_NANE.";
            return array("error"=>$m,"message"=>"Failed..!!","status"=>400);
        }
    } catch(Exception $e) {
    return array("error"=>$e->getMessage(),"message"=>"Failed..!!","status"=>400);
    }
}



public function valueSanitize($value){
    $v=array();
    foreach ($value as $key => $val) {
        if(gettype($val)=="integer" || gettype($val)=="boolean"){
            array_push($v,$val);
        } else if(gettype($val)=="NULL"){
            array_push($v,"'".$val."'");
        }  else if(gettype($val)=="array"){
            array_push($v,"'".mysqli_real_escape_string($this->DEFAULT_CONNECT, serialize($val))."'");
        } else {
            array_push($v,"'".mysqli_real_escape_string($this->DEFAULT_CONNECT, $val)."'");
        }
    }
    return implode(",",$v);
}

public function tableExists($table){
    try {
        $sql = "SHOW TABLES FROM $this->DEFAULT_DB_NANE LIKE '$table'";
        $tableInDb = $this->DEFAULT_CONNECT->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows == 1){
                return true;
            } else {
                $m="Table $table dose not exist in this database $this->DEFAULT_DB_NANE.";
                return false;
            }
        } else {
            $m="Table $table dose not exist in this database $this->DEFAULT_DB_NANE.";
            return false;
        }
    } catch(Exception $e) {
        return false;
    }
}



public function __destruct(){
    if($this->DEFAULT_DB_CONNECTION){
        if($this->DEFAULT_CONNECT->close()){
            $this->DEFAULT_DB_CONNECTION=true;
            return true;
        }
    } else{
        return false;
    }
} 


}


$crud= new Phpoopcrud();
$data = array(
    "name"=>"bidyut",
    "email"=>"test@gmail.com"
);
$response = $crud->insert("test_tbl",$data);
echo "<pre>";
print_r($response);


?>