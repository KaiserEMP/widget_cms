<?php
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";
  mysqli_connect("localhost", "widget_cms", "secretpassword", "widget_corp");

  $connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  if (mysqli_connect_errno()) {
  	die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").");
    // Juhul kui veateate kood on olemas, teosta siin plokis paiknevad tegevused.
  }

	 $query = "SELECT * FROM pages";
	 $result = mysqli_query($connect, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Widget</title>
</head>
<body>
<pre>
<?php /*
 while ($row = mysqli_fetch_row($result)) {
   var_dump($row);
 }
 mysqli_free_result($result);
*/?>
<?php 
/*while ($subject = mysqli_fetch_assoc($result)) {
    echo "<article class='page'><header class='page-header'><h1 class='page-title'>" . $subject['menu_name'] . "</h1></header><div class='page-body'>" . $subject['content'] . "</div></article>";
  }
*/
while ($subject = mysqli_fetch_assoc($result)) {
    echo "<ul><li>" . $subject['menu_name'] . "</ul></li>";
}
 ?>
<?php /*


  while ($row = mysqli_fetch_assoc($result)) {
    echo "<h1>" . $row['menu_name'] . "</h1>";
  }

*/
 ?>
</pre>
</body>
</html>

<?php mysqli_close($connect); ?>