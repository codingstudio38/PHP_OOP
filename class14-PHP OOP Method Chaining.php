<!-- PHP OOP Method Chaining -->
<img src="img/27.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main  {
 
   public function __construct()
   {
 
   }

   public function first()
   {
      echo "first function<br>";
      return $this;
   }

      public function second()
   {
      echo "second function<br>";
      return $this;
   }

      public function third()
   {
      echo "third function<br>";
      return $this;
   }


}

$obj=new main;

// $obj->first();
// $obj->second();
// $obj->third();

$obj->first()->second()->third();
?>