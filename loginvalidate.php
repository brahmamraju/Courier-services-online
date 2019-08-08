
<?php
session_start();
include_once"include/dbh.php";
$username=mysqli_real_escape_string($conn,$_POST['username']);
$passcode=mysqli_real_escape_string($conn,$_POST['pw']);
$sql="SELECT * FROM user  WHERE username=?;";
$stmt=mysqli_stmt_init($conn);
	
if(!mysqli_stmt_prepare($stmt,$sql))
{
	echo "sql error";
}
else
{
	mysqli_stmt_bind_param($stmt,"s",$username);
	mysqli_stmt_execute($stmt);
	$result=mysqli_stmt_get_result($stmt);
	if($row=mysqli_fetch_assoc($result))
	{
		if($row['password']==$passcode)
		{
			$_SESSION['username']=$username;
			$_SESSION['password']=$passcode;
			header("Location:home.php?Login=success");
		}
	}
			else
		{
			header("Location:loginpage.html");
			exit();
		}

}
?>