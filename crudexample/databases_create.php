<?php

require('../components/config.php');

  if (isset($_POST['submit'])){
  $menu_name = $_POST['menu_name'];
  $position = $_POST['position'];
  $visible = $_POST['visible'];
  $content = $_POST['content'];


	 //$query = "SELECT * FROM pages";
    $query = "INSERT INTO subjects (menu_name, position, visible, content)
            VALUES ('{$menu_name}', {$position}, {$visible}, '{$content}')";
	 $result = mysqli_query($connect, $query);

  if ($result) {
    $vastus = "Õnnestus";
  } else {
    $vastus = "Ebaõnnestus";
  }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Widget</title>
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
    <?php if(isset($_POST['submit'])) { ?>
    <meta http-equiv="refresh" content="2; url=databases-read.php">
   <?php } ?>
   <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
</head>
<body>

<?php
if (isset($_POST['submit'])){
echo $vastus;
}
?>


  <form method="post" action="databases_create.php">
      
      <label for="menu-name" >Teema :</label>
      <input id="menu_name" type="text" name="menu_name"></input>

      <label for="menu-name" >Posi :</label>
        <select id="postition" name ="position">
          <?php for ($i=1; $i < 18; $i++) {  ?>

          <option value="<?php echo $i;?>"><?php echo $i;?></option>

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
<h1><a href="../index.php">Tagasi</a></h1>
</body>
</html>

<?php 
mysqli_close($connect) ?>