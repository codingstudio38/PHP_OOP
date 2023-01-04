<?php 
namespace Mynamespace;
?>
<!-- PHP Magic Constants -->
<img src="img/43.PNG" alt="" style="width:450px;">
<br><br>

<?php 
echo "Line Number : ".__LINE__."<br>";
echo "The full path of this file is : ".__FILE__."<br>";
echo "The full path of this directory is : ".__DIR__."<br>";
function myfunction(){
   echo "The functoin name is : ".__FUNCTION__."<br>";
}
myfunction();

trait Test{
   public function Mytest()
   {
      echo "The trait name is : ".__TRAIT__."<br>";
   }
}

class main{
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

 
$obj=new main(10,5);

$obj->classname();
$obj->Mytest();

?>