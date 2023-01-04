<!-- PHP OOP Get Method -->
<img src="img/32.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   public $name="vidyut mandal";
   public function __get($property){
      echo "Non existing or private property($property)";
   }

   public function __construct()
   {
         echo "this is construct function <br>";
   }

   public function first()
   {
      echo "this is first function<br>";
   }


   //    public function __destruct()
   // {
   //    echo "this is destruct function<br>";
   // }


}

$obj=new main;
$obj->first();
?>