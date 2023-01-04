<!-- PHP OOP Call Method -->
<img src="img/34.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   private $name="vidyut";
   private $surname="mandal";

   private function setName($name,$sname)
   {
      $this->name=$name;
      $this->surname=$sname;
      echo $this->name."<br>";
      echo $this->surname."<br>";
   }
 
   public function __call($method,$arg){
      if(method_exists($this,$method)){
         call_user_func_array([$this,$method],$arg);
      } else {
         echo "this is a non existing or private method : $method<br>";
      }
   }

}

$obj=new main;
$obj->setName("bidyut","kumar");
?>