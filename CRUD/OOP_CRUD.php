<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
  
public function create(String $table, Array $value){
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

public function read(String $table, Array $column, String $where, String $orderby, int $limit){
try {
    if(!$this->tableExists($table)){
        $m="Table $table dose not exist in this database ".$this->DEFAULT_DB_NANE.".";
        return array("error"=>$m,"message"=>"Failed..!!","status"=>400);
    }

    if(empty($orderby)){
        $order = "id ASC";
    } else{
        $order = $orderby;
    }

    if(empty($limit)){
        $limit_ = "";
    } else {
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        } else{
            $page = 1;
        }
        $start = ($page - 1)*$limit;

        $limit_ = "LIMIT $start,$limit";
    }

    if(empty($where)){
        $where_ = "";
    } else {
        $where_ = "WHERE ".$where;
    }

    $tbl_columns = implode(",",$column);
    if(count($column)==0){
        $tbl_columns = "*";
    } else{
        $tbl_columns = $tbl_columns;
    }
    $query = "SELECT $tbl_columns FROM `$table` $where_ ORDER BY $order $limit_";
    $result = $this->DEFAULT_DB->query($query);
    if($result){

        return $result->fetch_all(MYSQLI_ASSOC);
        
    } else {
        return array("error"=>$this->DEFAULT_DB->error,"message"=>"failed to fetch data..!!","status"=>400);
    }
    

    } catch(Exception $e) {
        return array("error"=>$e->getMessage(),"message"=>"Failed..!!","status"=>400);
    }
}


public function pagination(String $table, String $where,int $page,int $limit)
{
try {
    $query = "SELECT COUNT(*) AS total FROM `$table`";
    if(!empty($where)){
        $where_ = "WHERE ".$where;
        $query = "SELECT COUNT(*) AS total FROM `$table` $where_ ";
    }

    $result = $this->DEFAULT_DB->query($query);

        $total = $result->fetch_assoc();
        $total_records =$total['total'];
        $total_page = ceil($total['total']/$limit);
        $url = basename($_SERVER['PHP_SELF']);
$previous = $page-1;
$next =$page+1;
$page_links = array();
$page_no = array();
$currentPage = $page;

if($total_records > $limit){
    $output = "<nav aria-label='Page navigation example'><ul class='pagination'>";
    if($previous <= 0){
        $output .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>Previous</a></li>"; 
    } else {
        $output .= "<li class='page-item'><a class='page-link' href='$url?page=$previous'>Previous</a></li>"; 
    }
    for ($i=1; $i <= $total_page; $i++) { 
    array_push($page_links,"$url?page=$i");
    array_push($page_no,$i);                   
                if($page==$i){
    $output .= "<li class='page-item active'><a class='page-link' href='$url?page=$i'>$i</a></li>";
                } else{
    $output .= "<li class='page-item'><a class='page-link' href='$url?page=$i'>$i</a></li>";
                }
            }

    if($next <= $total_page){
        $next_ = $next;
        $output .= "<li class='page-item'><a class='page-link' href='$url?page=$next'>Next</a></li>";    
    } else {
        $next_ = 0;
        $output .= "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>Next</a></li>";
    }

    $output .= "</ul></nav>";
   




    $lastPage = count($page_no);
    $fiestPage = 1;
    $output_n = "<nav aria-label='Page navigation example'>";
    $output_n .= "<ul class='pagination nav justify-content-center'>";
    if($previous <= 0){
        $output_n .="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>Previous</a></li>";
    } else {
        $output_n .="<li class='page-item'><a href='$url?page=$previous' class='page-link' rel='prev'>Previous</a></li>";
    }
        if ($currentPage > 3) {
            $output_n .="<li class='page-item'><a class='page-link' href='$url?page=1'>1</a></li>";
        }
        if ($currentPage > 4) {
            $output_n .="<li class='page-item'><a class='page-link' href='javascript:void(0)'>...</a></li>";
        }
        
        foreach (range(1, $lastPage) as $i){
            if ($i >= $currentPage - 2 && $i <= $currentPage + 2) {
                if ($i == $currentPage) {
                $output_n .="<li class='page-item active'><a class='page-link'>$i</a></li>";
             } else {
                $output_n .="<li class='page-item'><a class='page-link' href='$url?page=$i'>$i</a></li>";
            }
            }
           }
             if ($currentPage < $lastPage - 3) {
                $output_n .="<li class='page-item'><a class='page-link' href='javascript:void(0)'>...</a></li>";
                }

                 if ($currentPage < $lastPage - 2) {
                    $output_n .="<li class='page-item'><a class='page-link' href='$url?page=$lastPage'>$lastPage</a></li>";
                    }

                if($next <= $total_page){
                    $output_n .="<li class='page-item'><a class='page-link' href='$url?page=$next' rel='next'>Next</a></li>";
                } else {
                    $output_n .="<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>Next</a></li>";
                }
                $output_n .="</ul>";

                $output_n .="</nav>";








} else {
    $next_ = "";
    $page_links = array();
    $page_no = array();
    $output = "";
    $output_n = "";
    $lastPage = "";
    $fiestPage = "";
} 



return array(
    "html_view" => $output,
    "html_advanced_view" => $output_n,
    "active_page" => $page,
    "total_records" => $total_records,
    "total_page" => $total_page,
    "previous" => $previous,
    "next" => $next_,
    "page_no"=>$page_no,
    "page_links"=>$page_links,
    "first_page"=>$fiestPage,
    "last_page"=>$lastPage
);
 
   
} catch(Exception $e) {
    return array("error"=>$e->getMessage(),"message"=>"Failed..!!","status"=>400);
}

}



public function valueSanitize(Array $value){
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







public function tableExists(String $table){
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

if(isset($_GET['insert'])){
$data = array("name"=>"bidyut","email"=>"test@gmail.com");
// for ($i=0; $i < 1000; $i++) { }
$response = $crud->create("test_tbl",$data);
echo "<pre>";
print_r($response);
echo "</pre>";

}

if(isset($_GET['page'])){
    if($_GET['page']==""){
        $page = 1;
    } else{
        $page = $_GET['page'];
    }
    
} else{
    $page = 1;
}
$limit=2;
// $column = array("id","name");
// $response = $crud->read("test_tbl",$column,"","id DESC",10);
// echo "<pre>";
// print_r($response);
// echo "</pre>";

$paginate = $crud->pagination("test_tbl","",$page,$limit);
// echo "<pre>";
// print_r($paginate);
// echo "</pre>";
echo $paginate['html_advanced_view'];

?>