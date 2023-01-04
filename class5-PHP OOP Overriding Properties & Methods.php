<!-- PHP OOP Overriding Properties & Methods -->
<img src="img/11.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/12.PNG" alt="" style="width:450px;">
<br><br>
<?php 

class Base{
public $name = "Base Class Name";



public function calc($a,$b){
    return $a*$b;
}

}



class Drived extends Base{
public $name = "Drived Class Name";


public function calc($a,$b){
    return $a+$b;
}

}



$p1 = new Base();
$p2 = new Drived();
echo $p1->calc(10,5);







?>