<?php
  include 'db.php';
  if (isset($_POST['submit'])) {

  $text = htmlspecialchars($_POST['task']);

  $query = "INSERT INTO task(name) VALUES('$text')";
  $result = mysqli_query($db, $query);

  if ($result) {
   header('location: index.php');
  } else {
    echo "Not Added to database";
  }

  }

 ?>
