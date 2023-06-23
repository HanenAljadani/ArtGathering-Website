
<?php 

include 'ArtGathering.php';

$password = $_POST['password']; 
$email = $_POST['email']; 

//select data from database
$sql_select = "SELECT email  FROM users WHERE email='$email' ";

$result = $conn->query($sql_select);

// check if user alredy exists or not
if($result->num_rows>0){

 $sql_select=mysqli_query($conn,"UPDATE users SET password='$password' WHERE email='$email'");
   header("Location: PasswordResetDone.html");
}else{
	echo "Email not found";
   header("Location: Signup.html");
}

/*
if(isset($_POST['submit_email']) && isset($_POST['email'])){	
include 'ArtGathering.php';

$password = $_POST['password'];
$email = $_POST['email'];
//$new_password = $_POST['new_password'];
$sql_select=mysqli_query($conn,"UPDATE users SET password='$password' WHERE email='$email'");

//echo "password reset done";

header("PasswordResetDone.html");
}



/*
session_start();
include 'ArtGathering.php';

$password = $_POST['password'];
$email = $_POST['email'];
$new_password = $_POST['new_password'];
$select=$conn->prepare("SELECT *  FROM users WHERE email= ?");
$select->bind_param("s", $email);
      $select->execute();
      $result = $select->get_result();

  if($result->num_rows>0)
  {
	//mysqli_query($conn, "UPDATE users SET password = '" . $password . "' WHERE email = '" . $email . "'");
    $sql_select=mysql_query($conn,"UPDATE user SET password='$new_password' WHERE email='$email'");
	 header("PasswordResetDone.html");
}else{
   echo "Somthing went wrong try again!";
}

?>

///////////////////////////////////////////////////////////////////////////////////////////////////////
<?php 

session_start();
include 'ArtGathering.php';

$password = $_POST['password'];
$email = $_POST['email'];
$new_password = $_POST['new_password'];
$select="SELECT email  FROM users WHERE email='$email'";
$result = $conn->query($select);
  if($result->num_rows>0)
  {
    $sql_select=mysql_query("update user set password='$new_password' where email='$email'");
	 header("PasswordResetDone.html");
}else{
   echo "Somthing went wrong try again!";
}
*/
?>
