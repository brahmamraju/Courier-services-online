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

<form action="request.php" method="post">
<h4 style="position:relative;left:2%">What's your courier</h4>
<textarea rows="3" cols="25" name="description" style="position:relative;left:2%"></textarea><br>
<h4 style="position:relative;left:2%">Select Type</h4>
<input type="radio" name="type" value="delicate" style="position:relative;left:5%">Delicate<br>
<input type="radio" name="type" value="strong" style="position:relative;left:5%">Strong
<h4 style="position:relative;left:2%">Select Courier Size</h4>
<input type="radio" name="size" value="tiny" style="position:relative;left:5%">Tiny<br>
<input type="radio" name="size" value="Small" style="position:relative;left:5%">Small<br>
<input type="radio" name="size" value="Big" style="position:relative;left:5%">Big<br>
<h4 style="position:relative;left:2%">Select Time for pick up</h4>
<select name="time" style="position:relative;left:2%">
<option value="09:00 to 12:00">09:00 to 12:00</option>
<option value="12:00 to 03:00">12:00 to 03:00</option>
<option value="03:00 to 06:00">03:00 to 06:00</option>
<option value="06:00 to 09:00">06:00 to 09:00</option>
</select>
<h4 style="position:relative;left:2%">Delivery Type</h4><br>
<select name="deliverytype" style="position:relative;left:2%">
<option value="standard">Standard</option>
<option value="fast">Fast</option>
</select>
<h4 style="position:relative;left:2%">Address</h4>
<textarea rows="5" cols="25" style="position:relative;left:2%" name="address"></textarea><br>
<br>
<input type="submit" class="btn btn-primary" style="position:absolute;left:2%" value="Request" name="request">
</form>
<br>
<h3>
<<<a href="home.php">Previous Page</a>
	</h3>

</body>
</html>