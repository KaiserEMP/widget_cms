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


 $editmode = true;
 ?>