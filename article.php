<?php 
	
	include 'header.php.';
	
	$host="localhost"; // Host name 
	$username="jlindsey"; // Mysql username 
	$password="P!stons3"; // Mysql password 
	$db_name="web_blog"; // Database name 
	$tbl_name="post"; // Table name

	// Connect to server and select database.
	$connection = mysql_connect($host, $username, $password)or die("cannot connect server "); 
	$db = mysql_select_db("$db_name", $connection)or die("cannot select DB");
	
	echo "<br><h3>Last 5 Current Events Posts</h3>";
	
	$post_id = $_GET['post'];
	
	error_reporting(E_ERROR | E_PARSE);
	
		$sql= "SELECT * FROM post WHERE post_id='$post_id'";
		$result= mysql_query($sql);
		
	//check if query successful 
	if ($result != NULL) {
			while($row = mysql_fetch_assoc($result)) {
				echo "<p class='post_title'>".stripslashes($row['post_title']) . "</p>";
				echo "<span class='post_info'>".stripslashes($row['username']);
				echo " posted on " . $row['post_date'] . "</span><br><br>";
				echo "<span class='post_body'>".stripslashes($row['post_body']) . "</span><br><hr><br><br>";
			}
			
			$next = $post_id + 1;
			$prev = $post_id - 1;
			
			if($prev>=1) {
				echo "<a class='prev' href='article.php?post=$prev'>Previous</a>";
			}
			$sql= "SELECT * FROM post WHERE post_id='$next'";
			$result= mysql_query($sql);
			$num_rows = mysql_num_rows($result);
			if($num_rows >= 1) {
				echo "<a class='next' href='article.php?post=$next'>Next</a>";
			}
			
	mysql_close($sql);

	} else {
		echo "Database NOT Found ";
		mysql_close($sql);
	}
	
	include 'footer.php';

?>