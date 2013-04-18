<?php

$user_name = "jlindsey";
$password = "P!stons3";
$database = "web_blog";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {
	$order=$order+
	$SQL = "SELECT * FROM post ORDER BY post_id DESC LIMIT 10, '$order'";
	$result = mysql_query($SQL);
	$row = 1;
	
	
	while ( $db_field = mysql_fetch_assoc($result) ) {
		
		echo "<p class='post_title'>".stripslashes($db_field['post_title']) . "</p>";
		echo "<span class='post_info'>".stripslashes($db_field['username']);
		echo " posted on " . $db_field['post_date'] . "</span><br><br>";
		echo "<span class='post_body'>".stripslashes($db_field['post_body']) . "</span><br><hr><br><br>";
		
		$SQL2 = "SELECT * FROM comments WHERE post_id = '$row'";
		$result2 = mysql_query($SQL2);
		while ($row = mysql_fetch_assoc($result2) ) {
			echo "<p class='comment_title'>".stripslashes($db_field['username']) . "</p>";
			echo "<span class='comment'>".stripslashes($db_field['comment_data']);
		}
		
		
		if($db_field == 10) {
			echo "<a href='content.php?order=10'>Older Posts</a>";
		}
	}

	mysql_close($db_handle);

} else {
	echo "Database NOT Found ";
	mysql_close($db_handle);
}

?>