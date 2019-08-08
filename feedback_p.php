<?php
session_start();
include_once"include/dbh.php";
if(!isset($_SESSION['username']))
{
	header("Location:loginpage.html");
}
else
{
		$f=$_POST['feedback'];
		$sql ="insert into feedback(name,data) values(?,?)";
		$stmt=mysqli_stmt_init($conn);
		$stmt=mysqli_prepare($conn, $sql);
		$name=$_SESSION['username'];
		mysqli_stmt_bind_param($stmt,"ss",$name,$f);
		$a=mysqli_stmt_execute($stmt);
		echo "<br><br><br>";
		if($a)
		{
			echo"feedback submitted";
		}
		else{
			echo "error";
		}
		echo "<br>";
		echo "<br><a href=home.php>HOME</a>";
}
?>