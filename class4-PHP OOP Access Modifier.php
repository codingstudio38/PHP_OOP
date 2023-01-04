<!-- PHP OOP Access Modifier -->
<img src="img/6.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/7.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/8.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/9.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/10.PNG" alt="" style="width:450px;">
<br><br>
<?php 

class Base{
public $publicname;
protected $protectedname;
private $privatename;

 function __construct($n= "no name"){
    $this->publicname = $n;
    $this->protectedname = $n;
    $this->privatename = $n;
 }


public function show(){
    echo "public name : ".$this->publicname ."<br>";
}

// protected function protectedshow(){
//     echo "public name : ".$this->protectedname ."<br>";
// }

private function privateshow(){
    echo "private name : ".$this->privatename ."<br>";
}

}



class Derived extends Base {

public function getprotectedshow(){
    echo "protected name : ".$this->protectedname ."<br>";
}



}



$p1 = new Base("vidyut");
$p1->show();
// $p1->privateshow();
$a1 = new Derived("vidyut");
$a1->getprotectedshow();
?>