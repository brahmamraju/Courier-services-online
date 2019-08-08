<?php
session_start();
if(!isset($_SESSION['username']))
{
	header("Location:loginpage.html");
}
?>

<html>
<body>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<form method="get" action="logout.php">
    <button type="submit" class="btn btn-primary" style="position:absolute; transition: .5s ease;top:7%;right:10%">Logout</button>
</form>
<form action="feedback_p.php" method="post">
<h4 style="position:absolute; top:9%;left:10%">Write your Feedback</h4>
<textarea rows="5" cols="25" name="feedback"  style="position:absolute; top:14%;left:10%" ></textarea><br>
<input type="submit" class="btn btn-primary" style="position:absolute; top:34%;left:10%" value="Submit" >

</form>
<a href="home.php" style="position:absolute;transition: .5s ease; top:40%;left:10%">Previous Page</a>
</body>
</html>