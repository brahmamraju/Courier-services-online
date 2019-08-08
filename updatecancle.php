<?php 
session_start();
if(isset($_SESSION['username']))
{
	include_once "include/dbh.php";
	if(isset($_POST['cancel']))
	{
		$username=$_SESSION['username'];
		$status="OFF";
		$ucode=$_POST['code'];
	
		$sql="update requests set status='OFF' where code=$ucode;";
		echo "<h2>";
		
			if(mysqli_query($conn,$sql)==TRUE)
			{
				echo "order with unique  code has  ".$ucode."  been canceled succesfully\n";
			}
		else
		{
			echo "<h2>";
			echo "please enter valid unique code</h2>";		
		}
	
	}
}
else{
			header("Location:loginpage.html");
			exit();

}
?>
<html>
<h1>
<br><a href="home.php">HOME</a>
<br><-<a href="cancel.php">Back</a>
</h1>	
</html>
