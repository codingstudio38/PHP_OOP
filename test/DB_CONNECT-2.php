<?php 

class Dbconnection {
//only for database connection class
protected $DEFAULT_DB_HOST ="localhost";
protected $DEFAULT_DB_USER="root";
protected $DEFAULT_DB_PASSWORD="";
protected $DEFAULT_DB_NANE="laravel";
protected $DEFAULT_DB_CONNECTION=false;
protected $DEFAULT_CONNECT;

public function __construct(){
        if(!$this->DEFAULT_DB_CONNECTION){
            $this->DEFAULT_CONNECT = new mysqli($this->DEFAULT_DB_HOST,$this->DEFAULT_DB_USER,$this->DEFAULT_DB_PASSWORD,$this->DEFAULT_DB_NANE);
            if($this->DEFAULT_CONNECT->connect_error){
                // return $this->DEFAULT_CONNECT->connect_error;
                $this->DEFAULT_DB_CONNECTION=false;
                return false;
            }
            $this->DEFAULT_DB_CONNECTION=true;
        } else{
            return true;
        }
}


}




?>