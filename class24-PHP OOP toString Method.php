
<!-- PHP OOP toString Method -->
<img src="img/38.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   public $name="Bidyut";
   private $surname;

   public function __toString(){
      return "You can't print object as a string";
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
echo $obj;

?>