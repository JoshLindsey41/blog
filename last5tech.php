<?php 
	$host="localhost"; // Host name 
	$username="jlindsey"; // Mysql username 
	$password="P!stons3"; // Mysql password 
	$db_name="web_blog"; // Database name 
	$tbl_name="post"; // Table name

	// Connect to server and select database.
	$connection = mysql_connect($host, $username, $password)or die("cannot connect server "); 
	$db = mysql_select_db("$db_name", $connection)or die("cannot select DB");
	
	echo "<br><h3>Last 5 Tech Posts</h3>";
	
	error_reporting(E_ERROR | E_PARSE);
	
		$sql= "SELECT * FROM post WHERE post_topic='technology' ORDER BY post_id DESC LIMIT 5";
		$result= mysql_query($sql);
		
		//check if query successful 
		if ($result != NULL) {
				while($row = mysql_fetch_assoc($result)) {
					extract($row);
					$pos = strpos($post_title, ' ', 25);
					if($pos !== false) {
						$trunc_title = substr($post_title, 0, $pos);
					}else {
						$trunc_title = $post_title;
					}
					
					$pos = strpos($post_body, ' ', 50);
					if($pos !== false) {
						$trunc_body = substr($post_body, 0, $pos);
					}else {
						$trunc_body = $post_body;
					}
					if (strlen($trunc_title) > 25) {
						$trunc_title = $trunc_title . "...";
					}
					echo "<a class='word' href='article.php?post=$post_id'>"."&nbsp&nbsp&nbsp".$trunc_title."</a></br>";
					echo "<a class='word' href='article.php?post=$post_id'>".$trunc_body."..."."</a><br></br>";
					
				}
			mysql_free_result($result);
		} else {
				echo "The first post was not found";
				die();
		}
	
?>