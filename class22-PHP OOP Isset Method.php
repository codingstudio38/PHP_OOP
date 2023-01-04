
<!-- PHP OOP Isset Method -->
<img src="img/36.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   public $name;
   private $surname;

   public function __isset($property){
      echo isset($this->$property);
   }

   public function setName($name,$sname)
   {
      $this->name=$name;
      $this->surname=$sname;
      echo $this->name."<br>";
      echo $this->surname."<br>";
   }


}

$obj=new main;
$obj->setName("bidyut","mandal");

echo isset($obj->surname);

?>