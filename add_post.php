<?php 

$user = "jlindsey";
$password = "P!stons3";
$username = $_SESSION['username'];

mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 


if(isset($_POST['submit'])) {

	$post_title = $_POST['post_title'];
	$post_topic = $_POST['post_topic'];
	$post_body = $_POST['post_body'];
	


	if (!get_magic_quotes_gpc()) {
		
		$post_title = addslashes($post_title);
		$post_topic = addslashes($post_topic);
		$post_body = addslashes($post_body);
	}

	$sql= "INSERT INTO web_blog.post (post_title, post_topic, post_date, post_body, username) 
	VALUES ('$post_title', '$post_topic', NOW(), '$post_body', '$username')";

	$result= mysql_query($sql);

	//check if query successful 
	if(!$result){
	echo"<br>";
	echo"<br>";
	echo "Error! <a href='profile.php'>Go Back</a>.";
	}

	else {
	echo "Post Successfully Created! <a href='profile.php'>Go Back</a><br>";
	}

mysql_close();	
} 
echo "<br><br>";					

?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table class="add_post">
			<tr>
				<th class="" colspan="2">Add a post</th>
			</tr>
			<tr>
				<td class="body1">Post Title</td>
				<td class="body2"><input type="text" name="post_title" maxlength="40"></td>
			</tr>
			<tr>
				<td class="body1">Subject Topic</td>
				<td class="body2">
				<select name="post_topic">
					<option value="current">Current Events</option>
					<option value="humor">Humor</option>
					<option value="politics">Politics</option>
					<option value="technology">Technology</option>
				</select>
				</td>
			</tr>
			<tr>
				<td class="body1">Post Body</td>
				<td class="body2"><textarea name="post_body" maxlength="20000"></textarea></td>
			</tr>
			<tr>
				<td class="blog_post2"><input name="submit" type="submit" value="submit" /></td>
			</tr>
		</table>
	</form>
