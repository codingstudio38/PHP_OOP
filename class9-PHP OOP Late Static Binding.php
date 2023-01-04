<!-- PHP OOP Late Static Binding -->
<img src="img/18.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/19.PNG" alt="" style="width:450px;">
<br><br>
<?php 



class Childclass{

protected static $name = "Vidyut mandal";


public static function show(){
   echo self::$name."<br>";
   echo static::$name."<br>";
}

}

class derived extends Childclass{
protected static $name = "Bidyut mandal";


}





$obj = new derived();
$obj->show();
// echo Childclass::$name."<br>";
// echo Childclass::show();






?>