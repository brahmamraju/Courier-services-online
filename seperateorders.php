<?php
session_start();
include_once"include/dbh.php";
if(isset($_SESSION['name']))
{

	$username=$_SESSION['name'];
	$sql="select * from requests";
	$res=$conn->query($sql);
	$sqlh="insert into highpriority(ucode) values(?);";
	$sqll="insert into lowpriority(ucode) values(?);";
	 echo "<link rel=stylesheet href=https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css>";

	 if($res->num_rows > 0)	
	{		
		$stmt=mysqli_stmt_init($conn);
		while($row=$res->fetch_assoc())
			{	
				if($row['status']=='ON' and $row['seperated']==0)
					{
						if($row['deleverytype']=='fast')
							{	
								if(!mysqli_stmt_prepare($stmt,$sqlh))
									{	
										echo "SQL Error";
									}
								else
									{
										mysqli_stmt_bind_param($stmt,'i',$row['code']);
										mysqli_stmt_execute($stmt);
									}
							}
				else{
					if(!mysqli_stmt_prepare($stmt,$sqll))
						{	
							echo "SQL Error";
						}
					else
						{
							mysqli_stmt_bind_param($stmt,'i',$row['code']);
							mysqli_stmt_execute($stmt);
						}	
					  }
					}
		$sqlx="UPDATE requests SET seperated=1 where code=$row[code];";
		mysqli_query($conn,$sqlx);
	}
	
}	
else{
			header("Location:adminlogin.html");
			exit();

	}
		
		$sql="select * from highpriority";
		$res=$conn->query($sql);
		if($res->num_rows>0)
		{
			echo "<style>
			table, th, td {
			border: 2px solid black;
			border-collapse: collapse;
				}
			</style>";
			echo "<table style=width:20% >";
			echo "<h2>Fast Delivery Couriers\n</h2>";
			echo "<tr><th> ID </th><th>UNIQUECODE</th></tr>";
			while($row=$res->fetch_assoc())
			{
				echo "<tr><th>".$row['id'];
				echo "</th><th>";
				echo $row['ucode']."</th></tr>";
			}
			echo "</table>";
	
		}
	$sql="select * from lowpriority";
	$res=$conn->query($sql);
	if($res->num_rows>0)
	{
		echo "<style>
		table, th, td {
		border: 2px solid black;
		border-collapse: collapse;
					}
		</style>";
		 echo "<table style=width:20% >";
		 echo "<h2>Standard Delivery Couriers\n</h2>";
		 echo "<tr><th> ID </th><th>UNIQUECODE</th></tr>";
		while($row=$res->fetch_assoc())
		{
			echo "<tr><th>".$row['id'];
			echo "</th><th>";
			echo $row['ucode']."</th></tr>";
		}
		echo "</table>";
	
	}

}

else{
			header("Location:adminlogin.html");
			exit();

}

?>
<h3>
<<<a href="latestorders.php">Previous Page</a>
<br>
<a href="assignstaff.php">AssignStaff</a><br>
<form method="get" action="adminlogout.php">
    <button type="submit" >Logout</button>
</form>
</h3>
