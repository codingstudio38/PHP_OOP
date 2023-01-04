<!-- PHP OOP Type Hinting -->
<img src="img/24.PNG" alt="" style="width:450px;">
<br><br>

<?php 


class Base{

public function sum(int $val,array $arr){
 print $val+10;
}


}
// $obj = new Base;
// $obj->sum(10,array(1,2));


class School{
public function sayhello(){
 echo "say hello.";
}

public function getName(object $names){
echo "<ol>";
 foreach ($names->Names() as $key => $name) {
   echo "<li>".$name."</li>";
 }
echo "</ol>";
}

}

class Student{

public function sayhi(){
 echo "say hi.";
}

public function Names(){
 return array("vidyut","bidyut","test");
}

}

// function Wow(School $c){
//    $c->sayhello();
// }
// $test = new School();
// Wow($test);
 $school = new School();
 $student = new Student();
 $school->getName($student);



?>