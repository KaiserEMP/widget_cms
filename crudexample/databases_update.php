<?php
require('../components/config.php');


if (!isset($_GET['id'])) {
  header('location:../crudexample/databases-read.php');

}
$id = $_GET['id'];
  if (isset($_POST['submit'])){
  $menu_name = $_POST['menu_name'];
  $position = $_POST['position'];
  $visible = $_POST['visible'];
  $content = $_POST['content'];
    $query = "UPDATE subjects SET
            menu_name = '{$menu_name}',
            position = {$position},
            visible = {$visible},
            content = '{$content}'
            WHERE id = {$id}";
  $result = mysqli_query($connect, $query);
  
  if ($result) {
    $answer = "Õnnestus";
  } else {
    $answer = "Ebaõnnestus";
  }
}else {
  $query = "SELECT * FROM subjects WHERE id = $id";
  $result = mysqli_query($connect, $query);
  $subject = mysqli_fetch_assoc($result);
  $menu_name = $subject['menu_name'];
  $position = $subject['position'];
  $visible = $subject['visible'];

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Widget</title>
  <?php if(isset($_POST['submit'])) { ?>
    <meta http-equiv="refresh" content="2; url=databases-read.php">
   <?php } ?>
   <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>

<?php
if (isset($_POST['submit'])){
echo $answer;
}
?>



  <form action="databases_update.php?id=<?php echo $id;?>" method="post">
      
      <label for="menu-name" >Teema :</label>
      <input id="menu_name" type="text" name="menu_name"></input>

      <label for="menu-name" >Posi :</label>
      <select id="postition" name ="position">
        <?php  for ($i=1; $i < 18; $i++) {  ?>

        <option value="<?php echo $i;?>"><?php  echo $i;?></option>

        <?php
         }
         ?>


      </select>

      <label for="menu-name" >Invis :</label>
     <select id="visible" name="visible">

        <option value="1">Nähtav</option>
        <option value="0">Peidetud</option>

        </select>

      <label for="menu-name" >Text :</label>
      <textarea id="content" type="text" name="content" rows="4" cols="50"></textarea>

      <input type="submit" name="submit" value="Saada">

  </form>

<h1><a href="./databases-read.php">Tagasi</a></h1>

</body>
</html>

<?php 
mysqli_close($connect) ?>