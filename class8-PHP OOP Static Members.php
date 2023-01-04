<!-- PHP OOP Static Members -->
<img src="img/16.PNG" alt="" style="width:450px;">
<br><br>
<img src="img/17.PNG" alt="" style="width:450px;">
<br><br>
<?php 



class Childclass{

public static $name = "Vidyut mandal";

// public  function __construct($n)
// {
//   echo self::$name=$n;
// }


public static function show(){
    return self::$name;
}

}

class derived extends Childclass{
public  function __construct()
{
  echo parent::$name;
}
}





// $obj = new Childclass("Bidyut");

// echo Childclass::$name."<br>";
// echo Childclass::show();

$objnew = new derived();




?>