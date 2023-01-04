<!-- PHP OOP Constructor Function -->
<img src="img/3.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/4.PNG" alt="" style="width:450px;">
<br><br>
<?php 

class Person{
public $name;
public $age;
 function __construct($n= "no name", $a = 0){
    $this->name = $n;
    $this->age = $a;
 }


function show($nf= "no name",$af= 0){
    echo "construct value ".$this->name ." - ".$this->age."<br>";
    echo  "function value ".$nf ." - ".$af;
}



}


$p1 = new Person("vidyut",20);
$p1->show("bidyut",23);
?>