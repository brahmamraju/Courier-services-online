<?php
include_once "include/dbh.php";
?>
<!Doctype html	
<html>
<?php

$username=mysqli_real_escape_string($conn,$_POST['username']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$passcode=mysqli_real_escape_string($conn,$_POST['pw']);
$sql="INSERT INTO user (username,email,password) VALUES(?,?,?);";
 
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql))
{
	echo "SQL Error";
}
else
{
	mysqli_stmt_bind_param($stmt,"sss",$username,$email,$passcode);
	mysqli_stmt_execute($stmt);
}

header("Location:loginpage.html?register=success");
?>	
</html>
