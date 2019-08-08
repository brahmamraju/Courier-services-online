<?php
session_start();
include_once"include/dbh.php";
if(isset($_SESSION['name']))
{
echo "<br><h2>Fast Delivery Orders<br>";
$val='NULL';
	$sql2="select * from staff";	
	$res2=$conn->query($sql2);

$sql="select * from highpriority  where staff='NULL'";
	$res=$conn->query($sql);
	$n=$res->num_rows;
	$row=mysqli_fetch_assoc($res);
	$_SESSION['hid']=$row['id'];
		$m=$n/10+1;
	echo "<style>select{position:relative;left:20px}</style>";

		echo "<form action=assignstaff2.php method=post>";
			echo "<div>";
	$j=0;
	for($i=0;$i<$m-1;$i++)
	{	
		echo $i*10;
			echo "--";
		if(($i+1)*10>$n)
			echo $n;
		else
			echo ($i+1)*10;
	
		echo "<select name=$j>";
			$j=$j+1;
		while($row2=$res2->fetch_assoc())
			{	
				echo "<option value=$row2[name]>$row2[name]</option>";
				
			}
			echo "</select><br>";
	$res2=$conn->query($sql2);

	}
	echo "";
echo "Standard Delivery Orders<br>";	
$sql1="select * from lowpriority  where staff='NULL'";
	 $res1=$conn->query($sql1);
		$n1= $res1->num_rows ;
		$m1=$n1/10+1;
	 $row=mysqli_fetch_assoc($res1);
	 $_SESSION['lid']=$row['id'];
		echo "";
	
	for($i1=0;$i1<$m1-1;$i1++)
	{	
		echo $i1*10;
			echo "--";
		if(($i1+1)*10>$n1)
			echo $n1;
		else
			echo ($i1+1)*10;
		echo "<style>select{position:relative;left:20px}</style>";
		echo "<select name=$j>";
		$j=$j+1;
		while($row2=$res2->fetch_assoc())
			{	
				echo "<option value=$row2[name]>$row2[name]</option>";
				
			}
			echo "</select><br>";
	$res2=$conn->query($sql2);
	}
	echo "</div>";
if($n==0 &&$n1==0)
	echo "no orders left for delivery";
else
	echo "<input type=submit>";
	echo "</form>";
	echo "<br>";
echo "<a href=adminhome.php>HOME</a>";
echo "</h2>";	
}
else
{
	header("Location:adminlogin.html");
}
?>
<h3><form method="get" action="adminlogout.php">
    <button type="submit" >Logout</button>
</form>
</h3>