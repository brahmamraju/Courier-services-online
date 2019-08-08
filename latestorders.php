<?php
session_start();
include_once"include/dbh.php";
if(isset($_SESSION['name']))
{

$username=$_SESSION['name'];
$sql="select * from requests";
$res=$conn->query($sql);
if($res->num_rows > 0)
{	
	echo "<style>
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
				}
		</style>";


		 echo "<table style=width:100% >";
		 echo "<tr><th>USERNAME</th><th>DESCRIPTION</th><th>TYPE </th><th>	SIZE</th><th>	 DELIVERYTYPE </th><th>	TIME</th><th>	 ADDRESS 	</th><th>STATUS</th>";
		echo "<th>CODE</th><th>DATE</th></tr>";
		while($row=$res->fetch_assoc())
		{	
 			echo "<tr><th>";
			echo $row['username'];
			echo "</th><th>";
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
			
		}
			echo "</table>";
}	
else
{
	
	echo "<h1>No ordres to display</h1>";
}	

}

else{
			header("Location:adminlogin.html");
			exit();

}
?>
<h3>
<<<a href="adminhome.php">Previous Page</a><br>
<a href="seperateorders.php">SeperateOrders</a>
<br>
<form method="get" action="adminlogout.php">
    <button type="submit" >Logout</button>
</form>

</h3>
