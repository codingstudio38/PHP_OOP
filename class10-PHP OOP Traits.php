<!-- PHP OOP Traits. -->
<img src="img/20.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/21.PNG" alt="" style="width:450px;">
<br><br>
<?php 

trait Newclass{

public function sayhello(){
   echo "hello... from sayhello class.";
}

} 

class Base{
use Newclass;


}


$obj = new Base;
$obj->sayhello();







?>