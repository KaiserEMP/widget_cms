
<?php
require ('components/config.php');
?>

<?php
$query = "SELECT * FROM subjects WHERE visible = 1 ORDER BY position";
$result = mysqli_query($connect, $query);
$subject = mysqli_fetch_row($result);
?>



<?php 
 if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $currentPageQuery = "SELECT content FROM subjects where id = '{$id}'";
  $currentPageResult = mysqli_query($connect, $currentPageQuery);
  $currentPage = mysqli_fetch_assoc($currentPageResult);
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>WIDGET</title>
</head>
<body>

<h1>
<a href="crudexample/databases-read.php">LOE</a>
<hr>
<a href="crudexample/databases_create.php">LOO</a>
<hr>
</h1>
<a href="crudexample/databases_update.php">MUUDA</a>
<hr>
<a href="crudexample/databases_delete.php">KUSTUTA</a>
<hr><hr><hr>
<article>
<?php if (isset($_GET['id'])) { ?>
  <?php echo $currentPage['content']; ?>
<?php }?>
<a href="crudexample/databases_update.php?id=<?php echo $_GET['id'];?>">Muuda</a>
<a href="crudexample/databases_delete.php?id=<?php echo $_GET['id'];?>">Kustuta</a>
</article>


</body>
</html>