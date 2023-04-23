<!-- PHP OOP Destruct Method -->
<img src="img/31.PNG" alt="" style="width:450px;">
<br><br>

<?php 
 
function __autoload($class){
   require "classes/$class.php";
}

class main{
 
   public function __construct()
   {
        echo "this is construct function <br>";

   }

   public function first()
   {
      echo "this is first function<br>";
      $obj=new first;
      $obj1=new second;
   }

   
      public function __destruct()
   {
      echo "this is destruct function<br>";
   }


}

// $obj=new main;
// $obj->first();
$obj=new first;
$obj1=new second;
?>