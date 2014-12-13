<?php

require('../components/config.php');

	 $query = "SELECT * FROM subjects";
	 $result = mysqli_query($connect, $query);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Widget</title>

  <style type="text/css">

  .page-title {
    width: 200px;
    background-color: #ccc;
    list-style: none;
    color: green;
    font-size: 1.5em;
    padding: 5px;
    border-radius: 3px;

  }
  .MK{
    width:60px;
    color: black;
    margin-left: 50px;
  }

  </style>
</head>
<body>

<aside>
<?php /*
 while ($row = mysqli_fetch_row($result)) {
   var_dump($row);
 }
 mysqli_free_result($result);
*/?>
<?php if ($editmode == true) { ?>
<h1><a href="./databases_create.php">Loo uus!</a></h1>
<?php } ?>
<h1><a href="../index.php">Tagasi</a></h1>
<?php 
/*while ($subject = mysqli_fetch_assoc($result)) {
    echo "<article class='page'><header class='page-header'><h1 class='page-title'>" . $subject['menu_name'] . "</h1></header><div class='page-body'>" . $subject['content'] . "</div></article>";
  }
*/
while ($subject = mysqli_fetch_assoc($result)) { ?>
<ul><li class="page-title"><a href="../index.php?id=<?php echo $subject['id']; ?>"><?php echo $subject['menu_name']; ?></a></li></ul>
<?php if ($editmode == true) { ?>
<a href="databases_update.php?id=<?php echo $subject['id'];?>" class="MK">Muuda</a>
<a href="databases_delete.php?id=<?php echo $subject['id'];?>" class="MK">Kustuta</a>
<?php }} ?>

<?php mysqli_free_result($result);?>
</aside>


<?php /*


  while ($row = mysqli_fetch_assoc($result)) {
    echo "<h1>" . $row['menu_name'] . "</h1>";
  }

*/
 ?>

</body>
</html>

<?php mysqli_close($connect); ?>