<!-- PHP OOP Set Method -->
<img src="img/33.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   private $name="vidyut mandal";
   public function __get($property){
      echo "Non existing or private property($property)<br>";
   }
   
   public function __set($property,$value){
      if(property_exists($this,$property)){
         $this->$property = $value;
      } else {
         echo "this is a non existing or private property : $property<br>";
      }
   }
 
   public function __construct()
   {
         echo "this is construct function <br>";
   }

   public function first()
   {
      echo $this->name."<br>";
   }


}

$obj=new main;
echo $obj->name="asd ollc";
$obj->first();
?>