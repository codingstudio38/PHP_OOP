<?php
//Encapsulation is a protection mechanism for the data members and methods present inside the class. In the encapsulation technique, we are restricting the data members from access to outside world end-user In PHP.
// PHP program to implements encapsulation
class GFG {
  
    private $userId;
    private $pwd;
      
    // Update GFG password
    public function updatePwd($userId, $pwd) {
          
        // Write function body
        echo("Function to update password '". $pwd . "' for user " . $userId);
        echo "<br>";
    }
  
    // Check account balance
    public function courseName($userId) {
          
        // Write function body
        echo("Function to check course name of user ". $userId);
        echo "<br>";
    }
}
  
$obj = new GFG();
$obj->updatePwd('GFG12', 'geeks54321');
$obj->courseName('GFG06');
?>