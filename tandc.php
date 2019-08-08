<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:loginpage.html");
}

echo "<h1>Yet to be Created</h1>";
?>
<a href="home.php">HOME</a>