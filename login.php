<?php

$user = "jlindsey";
$password = "P!stons3";
$IP = $_SERVER['REMOTE_ADDR'];

mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 


if (isset($_POST['submit'])) {
	
	if(!$_POST['username'] || !$_POST['pass']) {
		die('You did not fill in a required field.');
	}
	
	if (!get_magic_quotes_gpc()) {
		$username = addslashes($_POST['username']);
	}

	$check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
	$check2 = mysql_num_rows($check);
	
	if ($check2 == 0) {
		die('That user does not exist in our database. <a href=add.php>Click Here to Register</a>');
	}
	
	while($info = mysql_fetch_array( $check )) {
		$_POST['pass'] = stripslashes($_POST['pass']);
		$info['password'] = stripslashes($info['password']);
		$pass=$_POST['pass'];
		$salt="084ldunfveporvrbtb86969";
		$hashed_pass= hash('sha512', $pass.$salt);
		
		for ($i = 0; $i < 3; ++$i) {
			$hashed_pass =hash('sha512', $hashed_pass.$salt);
		}
		$_POST['pass'] = $hashed_pass;
		
		if ($_POST['pass'] == $info['password']) {
				// if login is ok then add session info
			$_POST['username'] = stripslashes($_POST['username']);
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['IP'] = $IP;
			header("Location: profile.php");
		
		} elseif ($_POST['pass'] != $info['password']) {
			die('Incorrect password, please <a href="profile.php">try again</a>.');
		//} else {
		//	die('Error, please try again.');
		}
	}
}	

?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
Username: <br>
<input type='text' name='username'><br>
Password: <br>
<input type='password' name='pass'><br>
<input type='submit' name='submit' value='Login'>
</form>