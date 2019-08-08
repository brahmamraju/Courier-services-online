<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		echo $_SESSION['username'];
	}
	else
	{
		header("Location:loginpage.html");
	}
?>
<!Doctype html>
<html>
<head>
<title>Home</title>
</head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<body bg-colour="black">
<h1>

<a href=request_h.php>Request for pickup</a><br>
<a href=vieworders.php>View Placed orders</a><br>
<a href=cancel.php>Cancel request</a><br>
<a href=track.php>Track Package</a><br>
<a href=feedback.php>Complaints & Feedback</a><br>
<a href=tandc.php>Terms and Conditions</a>
<br>
<form method="get" action="logout.php">
<br>   
   <button type="submit" class="btn btn-primary">Logout</button>
</form>
</h1>
</body>
</html>

