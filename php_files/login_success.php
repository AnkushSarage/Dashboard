 <?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  //check if credential is in session or not if yes then redrect to home.php
 {  

header("location:home.php");  
 
        
 }  
 else  
 {  
      header("location:index.php");  
 }  
 ?>  