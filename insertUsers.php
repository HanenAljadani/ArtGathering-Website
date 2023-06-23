<?php

include 'ArtGathering.php';


 //Create table  
 $sql_create = "CREATE TABLE users (  
  id INT(6) AUTO_INCREMENT PRIMARY KEY, 
  name VARCHAR(30) NOT NULL, 
  email VARCHAR(40) NOT NULL,  
  gender VARCHAR(10) NOT NULL,  
  password VARCHAR(30) NOT NULL 
   )"; 
   
  $name = $_POST['name']; 
   $gender = $_POST['gender']; 
   $password = $_POST['password']; 
   $email = $_POST['email']; 

$name = $gender = $password = $email = $password_con =  "";  
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
if (empty($_POST["name"])) {
    $name_err = "Please enter a name";  }
else {$name = $_POST["name"];
 
}
if (empty($_POST["email"])) {
    $email_err = "Please enter an email";  }
else { $email = $_POST["email"];  }
if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];}
if (empty($_POST["password"])) {
  $password_err = "Please enter password";
}else{

  $password = $_POST["password"]; }
  if (empty($_POST["psw-repeat"])) {
    $password_con_err = "Please enter your password again";
  }else{
    if($_POST["psw-repeat"] != $_POST["password"] ){
        $password_con_err = "Password must be the same";
    }else{
       $password = $_POST["psw-repeat"]; 
    }

   }

if($name ==""|| $gender =""|| $password =""|| $email ==  "" || $password_con =""  ){

    } else {
      $sql_select = "SELECT *  FROM users WHERE name='$name' AND password='$password' AND email='$email' AND gender='$gender'
";

$result = $conn->query($sql_select);

if($result->num_rows>0){

header("Location: login.html");
}else{


      $sql_insert = "INSERT INTO  users ( name, email ,  gender ,  password ) 
VALUES ('$name','$email','$gender','$password')";

      if ($conn->query($sql_insert) === TRUE) {
        echo "Created successfully";
      } else {
        echo "Error creating table: " . $conn->error;
      }


}

    }

} 
  ?> 

