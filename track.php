<?php

	session_start();
	if(isset($_SESSION['username']))
	{}
else
{
	header("Location:loginpage.html");
}
?>
<html>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<h2>IN PROCESSING</h2>
</html><form method="get" action="logout.php">
<br>   
   <button type="submit" class="btn btn-primary">Logout</button>
</form>
<a href=home.php>Previous page</a>
</html>