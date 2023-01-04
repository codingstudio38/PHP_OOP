<!-- PHP OOP Destruct Method -->
<img src="img/30.PNG" alt="" style="width:450px;">
<br><br>

<?php 
class main  {
 
   public function __construct()
   {
        echo "this is construct function <br>";
   }

   public function first()
   {
      echo "this is first function<br>";
   }

   
      public function __destruct()
   {
      echo "this is destruct function<br>";
   }


}

$obj=new main;
$obj->first();
?>