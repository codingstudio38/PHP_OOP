<!-- PHP OOP Abstract Class -->
<img src="img/13.PNG" alt="" style="width:450px;">
<br><br>
<?php 

abstract class Parentclass{
public $name = "Parentclass Class Name";


abstract protected function calc($a,$b);


}



class Childclass extends Parentclass{


public function calc($a,$b){
    return $a+$b;
}

}

$p1 = new Childclass();

echo $p1->calc(10,5);







?>