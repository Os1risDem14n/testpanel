
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
	require('db.php');
	session_start();
	if ($_POST['username']='os1ris')
	{
		if ($_POST['password']='11235813')
		{
			$_SESSION['username'] = $_POST['username'];
			header("Location: index.php"); // Redirect user to index.php
		}
		else
		{
			echo "<div class='form'><h3>Password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
		}
	}
	else
	{
		echo "<div class='form'><h3>Username is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
	}
    // If form submitted, insert values into the database.
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>

<br /><br />

</div>


</body>
</html>
