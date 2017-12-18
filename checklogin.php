<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "dashboard";  
 $message = "";  
 try  
 {  

      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  


           if(empty($_POST["username"]) || empty($_POST["password"]))  //check credential if blank display msg wrong username or password
           {  


                echo "<h2>Please Enter correct Username or Password</h2>";  
           }  
           else  
           {   
             
                $query = "SELECT * FROM Login WHERE username = :username AND password = :password";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'password'     =>     $_POST["password"]  
                     )  //check credential with DB 
                );  

                $count = $statement->rowCount();  
                if($count > 0)   
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:login_success.php");  

                }  
                else  
                {  
                     echo "<h2>Please Enter correct Username or Password</h2>";  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  


 ?> 