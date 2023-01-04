<!-- PHP OOP Traits Method Overriding -->
<img src="img/22.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/23.PNG" alt="" style="width:450px;">
<br><br>
<?php 

trait Newclasshello{

public function sayhello(){
   echo "hello... from Newclass function sayhello.<br>";
}

}
 
trait Newclasshi{

private function sayhello(){
   echo "hello... from Newclasshi function sayhello. private<br>";
}

}
 
class Base{
use Newclasshello,Newclasshi{
   //Newclasshello::sayhello insteadOf Newclasshi;
   Newclasshello::sayhello as Renamesay_hello;
   //Newclasshi::sayhello as Renamesayhello;
   Newclasshi::sayhello as public Renamesayhello;
}

public function sayhello(){
   echo "hello... from Base function sayhello.<br>";
   // $this->Renamesayhello();
}

}

// class Childclass extends Base{
// use Newclasshello;

// public function sayhello(){
//    echo "hello... from Childclass.";
// }

// }


$obj = new Base;
$obj->sayhello();
$obj->Renamesay_hello();
$obj->Renamesayhello();







?>