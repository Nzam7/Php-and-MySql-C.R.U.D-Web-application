<?php
    include 'db.php';
    $id = (int)$_GET['id'];

    $query = "delete from task where id = '$id' ";
    $result = mysqli_query($db, $query);

    if($result) {
      echo "Deleted" . header('location: index.php');
    } else {
      echo "Not Deleted";
    }

 ?>
