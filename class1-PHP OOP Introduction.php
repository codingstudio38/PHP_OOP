<!-- PHP OOP Introduction Tutorial -->
<img src="img/1.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/2.PNG" alt="" style="width:450px;">
<br><br>
<?php 

class Calculation{
public $a,$b,$c;

function sum(){
$this->c = $this->a+$this->b;
return $this->c;
}

function sub(){
$this->c = $this->a+$this->b;
return $this->c;
}


}

$cal1 = new Calculation();
$cal1->a = 20;
$cal1->b = 10;


$cal2 = new Calculation();
$cal2->a = 20;
$cal2->b = 40;

echo $cal1->sum() ."\n";

echo $cal2->sum();


?>