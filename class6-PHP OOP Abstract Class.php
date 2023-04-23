<!-- PHP OOP Abstract Class -->
<img src="img/13.PNG" alt="" style="width:450px;">
<br><br>
<?php 

abstract class Parentclass{
	public $name;
    
	public function __construct($name) {
		$this -> name = $name;
	}
    
	abstract public function greet() : string;
    
    abstract protected function calc($a,$b);
}



class Childclass extends Parentclass{
    
public function __construct() {
    // $this->name = $name;
}   

public function greet() : string {
    return "Hello World from " . $this -> name.".<br>";
}

public function calc($a,$b){
    return $a+$b;
}

}

$p1 = new Childclass('bidyut');
echo $p1->greet();
echo $p1->calc(10,5);







?>