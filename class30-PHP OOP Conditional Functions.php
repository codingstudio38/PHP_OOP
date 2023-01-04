<?php 
namespace Mynamespace;
?>
<!-- PHP OOP Conditional Functions -->
<img src="img/44.PNG" alt="" style="width:450px;">
<br><br>

<?php 

interface Myinterface{

}

trait Test{
   public function Mytest()
   {
      echo "The trait name is : ".__TRAIT__."<br>";
   }
}

class Main{
use Test;
   public $a;
   public $b;
   public function __construct($a,$b){
         $this->a=$a;
         $this->b=$b;
   }

  
   public function classname()
   {
    echo "The class name is : ".__CLASS__."<br>";
    echo "The method name is : ".__METHOD__."<br>";
    echo "The namespace is : ".__NAMESPACE__."<br>";
   }


}

class Mainchild extends Main{

}
/////////////////////
if(class_exists('Mynamespace\Main')){
echo "main class is exists<br>";



$obj=new Main(10,5);
$Mainchild=new Mainchild(10,5);


/////////////////////
if(method_exists($obj,'classname')){
   echo "method classname is exists<br>";
   $obj->classname();
} else {
   echo "method classname is not exists<br>";
}


$obj->Mytest();



} else {
echo "main class is not exists<br>";
}
 





/////////////////////
if(interface_exists('Mynamespace\Myinterface')){
echo "interface Myinterface is exists<br>";
} else {
echo "interface Myinterface is not exists<br>";
}


/////////////////////
if(trait_exists('Mynamespace\Test')){
echo "trait Test is exists<br>";
} else {
echo "trait Test is not exists<br>";
}



/////////////////////
if(property_exists($obj,'a')){
echo "property 'a' is exists<br>";
} else {
echo "property 'a' is not exists<br>";
}



/////////////////////
if(is_a($obj,'Mynamespace\Main')){
echo "this object is of class Main<br>";
} else {
echo "this object is not of class Main<br>";
}




/////////////////////
if(is_subclass_of($Mainchild,'Mynamespace\Main')){
echo "this Mainchild is a object of subclass of 'Mynamespace\Main'<br>";
} else {
echo "this Mainchild is not a object of subclass of 'Mynamespace\Main'<br>";
}
?>