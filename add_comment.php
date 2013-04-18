<?php 

$user = "jlindsey";
$password = "P!stons3";


mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 

		$username = $_POST['username'];
		$comment_data = $_POST['comment'];
		$post_id = $_POST['post'];
		
		if (!get_magic_quotes_gpc()) {
			
			$comment_data = addslashes($comment_data);

		}
		
		$sql= "INSERT INTO web_blog.comment (comment_data, username, post_id) 
		VALUES ('$comment_data', '$username', '$post_id')";

		$result= mysql_query($sql);

		//check if query successful 
		if(!$result){
		echo"<br>";
		echo"<br>";
		echo "Error! <a href='index.php'>Go Back</a>.";
		}

		else {
		echo "Comment Successfully Created! <a href='index.php'>Go Back</a><br>";
		}
	
	
?>

