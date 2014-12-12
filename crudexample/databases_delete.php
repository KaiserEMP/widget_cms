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
    $id = $_GET['id'];
	 $query = "DELETE FROM subjects WHERE id = {$id};";
	 $result = mysqli_query($connect, $query);


    if ($result) { ?>
  <p style="color: green;"><?php echo "Rida kustutatud"; ?></p>
<?php } else { ?>
  <p style="color: red;"><?php echo "Sellist rida andmebaasis ei ole"; ?></p>
<?php } ?>

<?php 
  if ($result && mysqli_affected_rows($connect)) {
  }
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Widget</title>
</head>
<body>
<h1><a href="./databases-read.php">Tagasi</a></h1>
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
  /*
while ($subject = mysqli_fetch_assoc($result)) { ?>
<ul><li class="page-title"><?php echo $subject['menu_name'];?></li></ul>
<a href="databases_update.php?id=<?php echo $subject['id'];?>">Muuda</a>
<?php }?>
<?php mysqli_free_result($result);?>
*/
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