<?php

include 'ArtGathering.php';

$password = $_POST['password']; 
$email = $_POST['email']; 

//select data from database
$sql_select = "SELECT email  FROM users WHERE email='$email' AND password='$password' ";

$result = $conn->query($sql_select);

// check if user alredy exists or not
if($result->num_rows>0){
	
   header("Location: Shop.html");
}else{
   header("Location: Signup.html");
}

?>