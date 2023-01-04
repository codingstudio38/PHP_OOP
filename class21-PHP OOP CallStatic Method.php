<!-- PHP OOP CallStatic Method -->
<img src="img/35.PNG" alt="" style="width:450px;">
<br><br>

<?php 

class main{
  
   public static function __callStatic($method,$arg){
      if(method_exists(__class__,$method)){
         call_user_func_array([__class__,$method],$arg);
      } else {
         echo "This is a private method : $method";
      }
   }
   
   private static function setName()
   {
      echo "static method <br>";
   }
 
}

main::setName();
?>