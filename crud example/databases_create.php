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


  if (isset($_POST['submit'])){
  $menu_name = $_POST['menu_name'];
  $position = $_POST['position'];
  $visible = $_POST['visible'];


	 //$query = "SELECT * FROM pages";
    $query = "INSERT INTO subjects (menu_name, position, visible)
            VALUES ('{$menu_name}', {$position}, {$visible})";
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
      <input type="submit" name="submit" value="Saada">

  </form>

</body>
</html>

<?php 
mysqli_close($connect) ?>