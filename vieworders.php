<?php
session_start();
include_once"include/dbh.php";
if(isset($_SESSION['username']))
{
	function cancle()
	{
		echo "cancled";
	}
$username=$_SESSION['username'];
$sql="select * from requests where username=?";
$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))
	{
		echo "SQL Error\n";
	}
else
{	
	mysqli_stmt_bind_param($stmt,"s",$username);
	mysqli_stmt_execute($stmt);
	$res=mysqli_stmt_get_result($stmt);

echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>";
$row=$res->fetch_assoc();
if(sizeof($row)>0)
{

		 echo "<table class='table table-dark' >";
		 echo "<tr><th>DESCRIPTION</th><th>TYPE </th><th>	SIZE</th><th>	 DELIVERYTYPE </th><th>	TIME</th><th>	 ADDRESS 	</th><th>STATUS</th>";
		echo "<th>CODE</th><th>DATE</th></tr>";
		do
		{	
			echo "<tr><th>";
			echo $row['description'];
			echo "</th><th>";
			echo $row['type'];
			echo "</th><th>";
			echo $row['size'];
			echo "</th><th>";
			echo $row['deleverytype'];
			echo "</th><th>";
			echo $row['time'];
			echo "</th><th>";
			echo $row['address'];
			echo "</th><th>";
			echo $row['status'];
			echo "</th><th>";
			echo $row["code"];
			echo "</th><th>";
			echo $row['date'];
			echo "</th></tr>";
			
			}while($row =$res->fetch_assoc());
					echo "</table>";
	
}
else
{
	
	echo "<h1>No ordres to display</h1>";
}	
	}
}
else{
			header("Location:loginpage.html");
			exit();

}
?>
<br>
<h3>
<<<a href="home.php">Previous Page</a>
<br>
<form method="get" action="logout.php">
    <button type="submit"  >Logout</button>
</form>

</h3>
