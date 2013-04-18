<?php
include 'header.php';

if(!$_SESSION['username']) {
	echo "<h2>You must be logged in to view this page.</h2>";
	echo "<h3>User Login</h3>";
	include 'login.php';
	echo "<br><br><br>";
	include 'footer.php';
	die();
} else {
	$user = "jlindsey";
	$password = "P!stons3";
	$username = $_SESSION['username'];

	mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
	mysql_select_db("web_blog") or die(mysql_error()); 

	echo "<h2>User Portal</h2><br><br>";
	echo "<h3>Favorite Articles</h3><br>";
	
	$result2 = mysql_query("SELECT * FROM users WHERE username ='$username'")or die(mysql_error());
	if($result2 != NULL) {
		while($row = mysql_fetch_assoc($result2)) {
			extract($row);
			
			if($row['user_type'] == 'admin') {
				include('add_post.php');
				
			}
			
			if(!$row['user_type']) { 
				echo "no usertype found."; 
			}
		}
	}
	
	
	/*
	$sql = mysql_query("SELECT post_title FROM post WHERE favorite='$username' ORDER BY post_id")or die(mysql_error());
	$sql2 = mysql_query("SELECT user_type FROM username WHERE username ='$username'")or die(mysql_error());

	if($info['usertype'] == "admin") {
		include('add_post.php');
		echo "ADMIN";
	}
	if ($result = mysql_query($sql)) {
		while($row = mysql_fetch_assoc($result)) {
			echo "<div id='post_title'>" . stripslashes($row['post_title']) . "</div>";
		}
		mysql_free_result($result);
	} */
	
	echo"<br><br>";
	echo "<a href='logout.php'>Logout</a>";
}
include 'footer.php';
?>