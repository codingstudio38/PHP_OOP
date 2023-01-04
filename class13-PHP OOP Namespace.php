<!-- PHP OOP Namespace -->
<img src="img/25.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/26.PNG" alt="" style="width:450px;">
<br><br>
<?php 
require_once "first.php";
require_once "second.php";
use test\v1\first as firsttest;
use test\v1\second as secondtest;

class main  {
   public $firsttest;
   public $secondtest;
   public function __construct()
   {
   $this->firsttest = new firsttest\product;
   $this->secondtest = new secondtest\product;
   }

   public function Myfunction()
   {
   echo $this->firsttest->wow();
   echo $this->secondtest->wow();
   }


}

$obj=new main;

$obj->Myfunction();
?>