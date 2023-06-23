<?php

include('db.php');

$uid = intval($_GET['uid']);

echo '<script type="text/javascript">alert("'.$uid.'");</script>';

$sql = "delete from users where id=$uid";


if ($dbh->query($sql) === TRUE) 

{

	header('Location: ManageUsers.php');

	exit;

} 

else {

	header('Location: ManageUsers.php');

	exit;
	

}

?>