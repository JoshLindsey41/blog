<?php include 'header.php'; 

$user = "jlindsey";
$password = "P!stons3";

mysql_connect("localhost", "$user", "$password") or die(mysql_error()); 
mysql_select_db("web_blog") or die(mysql_error()); 

?>

<h3>Search by one of the following criteria</h3>
<form action="actions/search_title.php" method="POST">
Search by blog title <input type="text" name='title'><br>
<input type="submit" name="submit">
</form><br><br>
<form action="actions/search_author.php" method="POST">
Search by author name<input type="text" name='author'><br>
<input type="submit" name="submit">
</form><br><br>


<?php
include 'footer.php';
?>