
<!-- PHP OOP Wakeup Method -->
<img src="img/40.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
   public $name;
   private $surname;
   private $con;
   public function __construct(){
      $this->con = mysqli_connect("localhost","root","","laravel");
   }

   public function __sleep(){
      $this->con->close();//  mysql_close($this->con);
      echo "database successfully disconnected.<br>";
      return array("name");
   }

   public function __wakeup(){
      $this->con = mysqli_connect("localhost","root","","laravel");
      echo "database successfully connected.<br>";
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
$us =  unserialize($srl);
echo "<pre>";
print_r($us);
echo "</pre>";
?>