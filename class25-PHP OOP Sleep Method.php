
<!-- PHP OOP Sleep Methods -->
<img src="img/39.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   public $name;
   private $surname;

   public function __sleep(){
      return array("name");
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
$srl = serialize($obj);
echo $srl;

?>