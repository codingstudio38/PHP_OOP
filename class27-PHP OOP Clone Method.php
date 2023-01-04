
<!-- PHP OOP Clone Method -->
<img src="img/41.PNG" alt="" style="width:450px;">
<br><br>

<?php 
$a=5;
$b=& $a;
$b=10;
echo $a."<br>";

class main{
   public $name;
   public $course;
   public function __construct($n){
         $this->name=$n;
   }

   public function __clone(){
       $this->course=clone $this->course;
   }

   
   public function setCourse(course $name)
   {
      $this->course=$name;
      // echo $this->course."<br>";
   }


}

class course{
   public $cname;
   public function __construct($n){
         $this->cname=$n;
   }
}

$obj1=new main("Vidyut");

$course1=new course("Web Development");

$obj1->setCourse($course1);

$obj2=clone $obj1;

$obj2->name="Bidyut";
$obj2->course->cname="Tester";
// echo $obj1->name."<br>";
// echo $obj2->name."<br>";
// $obj->setName("Vidyut","Mandal");
echo "<pre>";
print_r($obj1);
print_r($obj2);
?>