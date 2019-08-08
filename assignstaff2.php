<?php
session_start();
include_once"include/dbh.php";
if(isset($_SESSION['name']))
{
$hid=$_SESSION['hid'];
$lid=$_SESSION['lid'];
$sql1="update highpriority set staff=? where id	=?";
$stmt=mysqli_stmt_init($conn);
$stmt=mysqli_prepare($conn, $sql1);
$s="select * from highpriority";
 $r=$conn->query($s);
 $n=$r->num_rows;
	
$j=0;
$i=0;
$bol=TRUE;
//echo $n;
$c=0;
while($n>$c)
{
	 $x=$_POST[$j];
	//echo $x."1";
 for($k=0;$k<10;$k++)
 {
	 
	 //echo $x;
	 mysqli_stmt_bind_param($stmt,'si',$x,$hid);
	 $bol=mysqli_stmt_execute($stmt);
	 if($bol==FALSE)
		 break;
	// echo $bol;
	 $hid=$hid+1;
	 $c++;
 }
 	 if($bol==FALSE)
		 break;
 $j=$j+1;
}

$sql1="update lowpriority set staff=? where id	=?";
$stmt=mysqli_stmt_init($conn);
$stmt=mysqli_prepare($conn, $sql1);

while(count($_POST)>$j)
{
	 $x=$_POST[$j];
	//echo $x."2";
 for($k=0;$k<10;$k++)
 {

	 mysqli_stmt_bind_param($stmt,'si',$x,$lid);
	 $bol=mysqli_stmt_execute($stmt);
	 if($bol==FALSE)
		 break;
	 $lid=$lid+1;	 
 }
 	 if($bol==FALSE)
		 break;
 $j=$j+1;
}
echo "<br>";
echo "<h1>Staff Assigned";
echo "<a href=adminhome.php>HOME</a></h1>";
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