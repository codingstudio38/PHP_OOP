<?php
require_once "DB_CONNECTION.php";
class Phpoopcrud {
use Database{
   Database::CONNECT as public DBCONNECT;
}

 
  
  private $CONNECT;
  public function __construct(){
   $this->CONNECT=$this->DBCONNECT();
  }
 
   

  public function SaveData(string $table,array $values){
    try {
        if(!$this->tableExists($table)){
          throw new Exception("Table not found.");
        }
        if(count($values)==0){
          throw new Exception("Values required.");
        }
        $sql="INSERT INTO `test_tbl` (`name`,`email`) VALUES (:name,:email)";
        $query = $this->CONNECT->prepare($sql);
        $query->bindValue(':name',isset($values['name'])?$values['name']:"",PDO::PARAM_STR);
        $query->bindValue(':email',isset($values['email'])?$values['email']:"",PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $this->CONNECT->lastInsertId();
        return array("status"=>200,"message"=>"Successfully save.","lastInsertId"=>$lastInsertId);
    } catch(Exception $error) {
        return array("status"=>400,"message"=>$error->getMessage());
    }
  }


  public function GetData(string $table,array $column,array $option,int $page, int $limit,string $orderby){
    try {
        if(!$this->tableExists($table)){
          throw new Exception("Table not found.");
        }
        if($page <= 0){
          $page = 1;
        } else{
          $page = $page;
        }
        if(empty($orderby)){
        $order ="id DESC";
        } else {
        $order = $orderby;
        }
        $url = basename($_SERVER['PHP_SELF']);
        $previous = $page-1;
        $next =$page+1;
        $currentPage = $page;
        if(count($column)==0){
        $columnis = "*";
        } else {
          $columnis = implode(",",$column);
        }   
        $sql = "SELECT COUNT(id) as totalrecords FROM `$table`";
        $query = $this->CONNECT->prepare($sql);// $query->bindValue(':uid',1,PDO::PARAM_STR);
        $query->execute();
        $checktotal = $query->fetch(PDO::FETCH_ASSOC);//$checktotal = $query->rowCount();
        $total_records = $checktotal['totalrecords'];
        $total_page = ceil($total_records/$limit);
        $start = ($page - 1)*$limit;
        $limit_ = "LIMIT $start,$limit";

$sql_query = "SELECT $columnis FROM `$table` ORDER BY $order $limit_";
$query = $this->CONNECT->prepare($sql_query);
$query->execute();
$alldata = $query->fetchAll(PDO::FETCH_ASSOC);

$lastPage = $total_page;
$fiestPage = 1;
if($next <= $total_page){
    $next_ = $next;
} else {
    $next_ = 0;
}

if($total_records > $limit){

  
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
  
  $output_n ="";
  
}

 return array(
    "status"=>200,
    "message"=>"records found.",
    "data" => $alldata,
    "html_view" => $output_n,
    "active_page" => $page,
    "total_records" => $total_records,
    "total_page" => $total_page,
    "previous" => $previous,
    "next" => $next_,
    "first_page"=>$fiestPage,
    "last_page"=>$lastPage
  );
  
    } catch(Exception $error) {
        return array("status"=>400,"message"=>$error->getMessage());
    }

  }








public function tableExists(string $table){
  try {
      $sql = "SHOW TABLES FROM `laravel` LIKE '$table'";
      $query = $this->CONNECT->prepare($sql);
      // $query->bindParam(':tbl',"'$table'",PDO::PARAM_STR);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $data = $query->rowCount();
      if($data <= 0){
        return false;
      } else {
        return true;
      }
  } catch(Exception $error) {
      echo $error->getMessage();
  }
}






public function __destruct(){
  $this->CONNECT=null;
} 



}

// http://phpgurukul.com/php-crud-operation-using-pdo-extension/

$myclass = new Phpoopcrud();
if(isset($_GET['save'])){
  $data = array(
    "name"=>"bidyut",
    "email"=>"test@gmail.com"
  );
  $result = $myclass->SaveData("test_tbl",$data);
  echo "<pre>";
  print_r($result);
  echo "</pre>";
}

  $limit = 5;
  $page = isset($_GET['page'])?$_GET['page']:1;
  $column = array("id","name","email","created_at");
  $result = $myclass->GetData("test_tbl",$column,array(1),$page,$limit,"`id` DESC",2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <section>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
          foreach($result['data'] AS $key=>$row){
          ?>
                    <tr>
                        <th><?= $row['id'];?></th>
                        <td><?= $row['name'];?></td>
                        <td><?= $row['email'];?></td>
                        <td><?= $row['created_at'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><?=$result['html_view'];?></td>
                    </tr>
                </tfoot>
            </table>
        </section>
    </div>
</body>

</html>