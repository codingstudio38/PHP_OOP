<!-- PHP OOP Invoke Method -->
<img src="img/42.PNG" alt="" style="width:450px;">
<br><br>

<?php 


class main{
   public $a;
   public $b;
   public function __construct($a,$b){
         $this->a=$a;
         $this->b=$b;
   }

   public function __invoke(){
      echo $this->a+$this->b."<br>";
   }
 
   
   public function sum()
   {
     echo $this->a+$this->b."<br>";
   }


}

 
$obj=new main(10,5);

// $obj->sum();

$obj();
?>