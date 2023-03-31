<!-- PHP OOP Inheritance -->
<img src="img/5.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class Employee{
public $name;
public $age;
public $salary;
 function __construct($n= "no name", $a = 0, $s = 0){
    $this->name = $n;
    $this->age = $a;
    $this->salary = $s;
 }


function info(){
    echo "Name : ".$this->name ."<br>";
    echo "Age : ".$this->age."<br>";
    echo "Salary : ".$this->salary."<br>";
}

}
 
class Maneger extends Employee {
public $ta=1000;
public $phone=300;
public $total=0;
//  function __construct($n= "no name", $a = 0, $s = 0){
//     $this->name = $n;
//     $this->age = $a;
//     $this->salary = $s;
//  }

function info(){
    $this->total = $this->salary+$this->ta+$this->phone;
    echo "<h3>Maneger</h3>";
    echo "Name : ".$this->name ."<br>";
    echo "Age : ".$this->age."<br>";
    echo "Total Salary : ".$this->total."<br>";
}


}



$p1 = new Employee("vidyut",20,30000);
$p1->info();

$a1 = new Maneger("vidyut",20,30000);
$a1->info();
?>