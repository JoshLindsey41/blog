<?php include 'header.php'; 

$user = "jlindsey";
$password = "P!stons3";


mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 

?>

<h3>Search by one of the following criteria</h3>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
Search by blog title <input type="text" name='title'><br>
<input type="submit" name="submit">
</form><br><br>

<?php

if(isset($_POST['submit'])) {
	$search = $_POST['title'];
	$title='%'.$search.'%';
	$check=mysql_query("SELECT post_title, post_date, post_body FROM post WHERE title = '$title' ORDER BY post_id DESC 10");

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
			echo "No posts were found matching the search $search.";
	}
}
include 'footer.php';

?>

