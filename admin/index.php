<?php

require '../db/connect.php';
require '../functions/security.php';
$err="";

if(!empty($_POST))
{
	if(isset($_POST['Username'],$_POST['Password']))
	{
		$username=trim($_POST['Username']);
		$password=trim($_POST['Password']);
		if(!empty($username) && !empty($password))
		{
			$select=$db->prepare("Select * from users Where Username=? and Password=?");
			$select->bind_param('ss',$username,$password);
			if($select->execute())
			{
				if($select->num_rows>0)
				{
					header('Location: home.php');
					die();
				}
				else
				{
					$err="Invalid Username or Password";
				}
			}
			else
			{
				$err="Seems to have issue executing the query";
			}
		}
		else
		{
			$err="Please enter username or password";
		}		
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form action="" method="post">
	<label for="Username">Username</label>
	<input type="text" name="Username" autocomplete="off">
		<br>
	<label for="Password">Password</label>
	<input type="password" name="Password" autocomplete="off">
		<br>
		<p><?php echo $err ?></p>
		<input type="submit" value="Login">
</form>
</body>
</html>

