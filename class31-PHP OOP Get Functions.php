<?php 
namespace Mynamespace;
?>
<!-- PHP OOP Conditional Functions -->
<img src="img/45.PNG" alt="" style="width:450px;">
<br><br>

<?php 
interface testinterface{
   public function testface();
}

trait testtrait{
   public function testtrait(){

   }
}

class Abc{
 static public function staticfunction(){
   var_dump(get_called_class());
 }
}

class Main extends Abc{
   public $name = "bidyut";
   public $age= 24;
   public $active=true;

   public function __construct(){

   }
 
   public function classname()
   {
      echo "The class name is : ".get_class($this)."<br>";
      echo "The parent class name is : ".get_parent_class($this)."<br>";
      $methods = get_class_methods($this);
      echo "<pre>";
      print_r($methods);
      echo "</pre>";
   }

    public function Test()
   {

   }

}


$obj=new Main();
$obj->classname();

$pro = get_class_vars(get_class($obj));
echo "<pre>";
print_r($pro);
echo "</pre>";
$objectpro = get_object_vars($obj);
echo "<pre>";
print_r($objectpro);
echo "</pre>";

Abc::staticfunction();
Main::staticfunction();

$declared_classes = get_declared_classes();
echo "<pre>";
// print_r($declared_classes);
echo "</pre>";


$declared_interfaces = get_declared_interfaces();
echo "<pre>";
// print_r($declared_interfaces);
echo "</pre>";

$declared_traits = get_declared_traits();
echo "<pre>";
print_r($declared_traits);
echo "</pre>";

class_alias('Mynamespace\Main','Mynamespace\Checkmain');
$obj1=new Checkmain();
$obj1->classname();
// echo __NAMESPACE__;
?>