<?php  
require_once "DB_CONNECT.php";
  
class Phpoopcrud {

use Database{
   Database::DEFAULT_CONNECTION as public DEFAULT_DB;
   Database::DEFAULT_CONNECT_PROPERTIES as public DEFAULT_PROPERTIES;
}
 
public $DEFAULT_CONNECT_PROPERTIES;
public $DEFAULT_DB;
public function __construct(){
    $this->DEFAULT_CONNECT_PROPERTIES = $this->DEFAULT_PROPERTIES();
    $this->DEFAULT_DB = $this->DEFAULT_DB();
}

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
            if($this->DEFAULT_DB->query($insert)){
                $lastid=$this->DEFAULT_DB->insert_id;
                return array("message"=>"Successfully inserted.","lastid"=>$lastid,"status"=>200);
            } else {
                return array("error"=>$this->DEFAULT_DB->error,"message"=>"Failed to insert..!!","status"=>400);
            } 
        } else {
            $m="Table $table dose not exist in this database ".$this->DEFAULT_DB_NANE.".";
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
            array_push($v,"'".mysqli_real_escape_string($this->DEFAULT_DB, serialize($val))."'");
        } else {
            array_push($v,"'".mysqli_real_escape_string($this->DEFAULT_DB, $val)."'");
        }
    }
    return implode(",",$v);
}

public function tableExists($table){
   try {
        $sql = "SHOW TABLES FROM ".$this->DEFAULT_CONNECT_PROPERTIES['DB_NANE']." LIKE '$table'";
        $tableInDb = $this->DEFAULT_DB->query($sql);
        if($tableInDb){
            if($tableInDb->num_rows == 1){
                return true;
            } else {
                //$m="Table $table dose not exist in this database".$this->DEFAULT_CONNECT_PROPERTIES['DB_NANE'].".";
                return false;
            }
        } else {
            //$m="Table $table dose not exist in this database".$this->DEFAULT_CONNECT_PROPERTIES['DB_NANE'].".";
            return false;
        }
    } catch(Exception $e) {
        return false;
    }
}



public function __destruct(){
   $this->DEFAULT_DB->close();
} 


}











$crud= new Phpoopcrud();
$data = array("name"=>"bidyut","email"=>"test@gmail.com");
$response = $crud->insert("test_tbl",$data);
echo "<pre>";
print_r($response);

?>