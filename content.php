<?PHP

$user_name = "jlindsey";
$password = "P!stons3";
$database = "web_blog";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

	$SQL = "SELECT * FROM post ORDER BY post_id DESC LIMIT 10";
	$result = mysql_query($SQL);
	
	
	
	while ( $db_field = mysql_fetch_assoc($result) ) {
		
		echo "<p class='post_title'>".stripslashes($db_field['post_title']) . "</p>";
		echo "<span class='post_info'>".$db_field['username'];
		echo " posted on " . $db_field['post_date'] . "</span><br><br>";
		echo "<span class='post_body'>".stripslashes($db_field['post_body']) . "</span>";
		
		$id = $db_field['post_id'];
		//echo $db_field['post_id'];
		
		echo "<br><br><button class='comment'>Comments</button>";
		$SQL2 = "SELECT * FROM comment WHERE post_id = '$id'";
		$result2 = mysql_query($SQL2);
		while ($info = mysql_fetch_assoc($result2) ) {
		
			echo "<p class='comment'>".$info['username'] . "</p>";
			echo "<p class='comment'>".stripslashes($info['comment_data'])."</p>";
			
		}
		
		if($username != NULL) {
		
			echo "<h3>Add a Comment</h3>";
			echo "<form action='add_comment.php' method='post'>";
			echo "<td class='body2'><textarea name='comment' maxlength='20000'></textarea>";
			echo "<input type='hidden' name='post' value='$id'/>";
			echo "<input type='hidden' name='username' value='$username'/>";
			echo "<input name='submit' type='submit' value='submit' />";
			echo "</form>";
		}
		
		echo "<br>";
		include 'favorites.php';
		//include 'add_comment.php';
		echo "<br><hr><br>";
		
		if($db_field == 10) {
			echo "<a href='next.php'>Older Posts</a>";
		}
	}

	mysql_close($db_handle);

} else {
	echo "Database NOT Found ";
	mysql_close($db_handle);
}

?>