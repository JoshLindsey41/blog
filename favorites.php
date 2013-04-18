<?php 

$user = "jlindsey";
$password = "P!stons3";
$username = $_SESSION['username'];

mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 

$username = $_SESSION['username'];

if($username != NULL) {

	if(isset($_POST['submit'])) {

		$fav = $_POST['favorite'];
		
		if (!get_magic_quotes_gpc()) {
			
			$comment_data = addslashes($comment_data);

		}

		$sql= "INSERT INTO web_blog.favorite (fav, username, post_id) 
		VALUES ('$fav', '$username', '$post')";

		$result= mysql_query($sql);

		//check if query successful 
		if(!$result){
		echo"<br>";
		echo"<br>";
		echo "Error! <a href='index.php'>Go Back</a>.";
		}

		else {
		echo "Post Successfully Created! <a href='index.php'>Go Back</a><br>";
		}

	mysql_close();	
	} 
}
	
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type='hidden' name="favorite" value='1' />
		<input type='hidden' name="favorite" value='<?php $post_id ?>' />
		<input name="submit" type="submit" value="favorite" />
	</form>
