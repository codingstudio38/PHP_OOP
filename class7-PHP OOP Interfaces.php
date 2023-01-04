<!-- PHP OOP Interfaces Class -->
<img src="img/14.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/15.PNG" alt="" style="width:450px;">
<br><br>
<?php 

interface Parentclass1{

function calc($a,$b);

}
interface Parentclass2{

function sub($a,$b);

}



class Childclass implements Parentclass1,Parentclass2{


public function calc($a,$b){
    return $a+$b;
}

public function sub($a,$b){
    return $a-$b;
}

}

$p1 = new Childclass();

echo $p1->calc(10,5)."<br>";

echo $p1->sub(10,5);





?>