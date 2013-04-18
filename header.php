<?php
session_start();
// store session data

$_SESSION['views']=1;

?>

<!DOCTYPE html>
<html>
<head>
	<title>Josh Lindsey - Home</title>
	<link rel="stylesheet" href="sample3.css" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<script src="js/wymeditor/jquery/jquery.js"></script>
	<script src="js/wymeditor/wymeditor/jquery.wymeditor.js"></script>
	<script>
		$(document).ready(function(){
		  console.log($('.wysiwyg'));
		  $('.wysiwyg').wymeditor();
		   console.log("there");
		  $(".comment").click(function(){
			$("p.comment").toggle();
		  });
		});
	</script>
</head>
<body>
	<div id="nav">
	
			<div class="header">
				<p class="title"><a class="white" href="index.php">THE BLOG</a><p>
			</div>
			<div class="login">
				
				<?php 
					if(isset($_SESSION['username'])) {
						echo "<br><font color='white'>Welcome, ".$_SESSION['username'].".</font>";
					} else {
						echo "<ul id='dropnav'><li><a class='white' href='login.php'>log in here</a><ul><li><form method='post' action='navlogin.php'>Username<br><input type='text' name='username'></li><li>Password<br><input type='password' name='pass'></li><li><input type='submit'></form></li></ul></li></ul>";
					}
				?>
			</div>
			<ul class="nav">
				<li class="spacer">&nbsp </li>
				<li class="nav"><a class="nav" href="index.php">Home</a></li>
				<li class="nav"><a class="nav" href="profile.php">Profile</a></li>
				<li class="nav"><a class="nav" href="search.php">Search</a></li>
				<li class="nav"><a class="nav" href="topics.php">Topics</a></li>
				<li class="nav"><a class="nav" href="http://www.josh-lindsey.com/index.php">Back to Site</a></li>
			</ul>
	
	</div>
	<div id="wrapper">
		
		<div id="right">
			<?php include "last5tech.php"; ?>
			<?php include "last5current.php"; ?>
			<?php include "socialmedia.php"; ?>
		</div>
		<div id="left">
		