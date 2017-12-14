 <?php  
 //login_success.php  
 session_start();  
 if(isset($_SESSION["username"]))  
 {  

header("location:home.php");  
echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';  
        
 }  
 else  
 {  
      header("location:pdo_login.php");  
 }  
 ?>  