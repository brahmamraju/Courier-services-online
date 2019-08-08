<?php
session_start(); 
if(isset($_SESSION['name']))
{
	
}
else{
			header("Location:adminlogin.html");
			exit();
}
?>

<html>
<a href="latestorders.php">Latest Orders</a>
<h1>admin</h1>
<br>
<form method="get" action="adminlogout.php">
    <button type="submit" >Logout</button>
</form>
</html>
