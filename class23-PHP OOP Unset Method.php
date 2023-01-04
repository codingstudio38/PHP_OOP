
<!-- PHP OOP Unset Method -->
<img src="img/37.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   public $name="Bidyut";
   private $surname;

   public function __unset($property){
      unset($this->$property);
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
$obj->setName("Vidyut","Mandal");
unset($obj->surname);
// echo $obj->name;
print_r($obj);

?>