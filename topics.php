<?php include 'header.php'; 

$user = "jlindsey";
$password = "P!stons3";


mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 


?>

<h3>Choose a blog topic</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<select name="post_topic">
	<option value="current">Current Events</option>
	<option value="humor">Humor</option>
	<option value="politics">Politics</option>
	<option value="technology">Technology</option>
</select>
<input type="submit" name="submit">
</form><br><br>

<?php



if(isset($_POST['submit'])) {
	$post_topic = $_POST['post_topic'];

	$check=mysql_query("SELECT post_title, post_date, post_body FROM post WHERE post_topic = '$post_topic' ORDER BY post_id DESC 10");

	if ($result = mysql_query($check)) {
		
			while($row = mysql_fetch_assoc($result)) {
					
				echo "<div id='post_title'>" . stripslashes($row['post_title']) . "</div>";
				echo "<div id='post_info'>" . stripslashes($row['name']) . "</div>";		
				echo "<div id='post_info'>" . $row['post_date'] . "</div>";		
				echo "<div id='post_body'>" . stripslashes($row['post_body']) . "</div>";		
									
			}

			mysql_free_result($result);
			mysql_close();
		} else {
			echo "No posts were found";
	}
}
include 'footer.php';

?>

