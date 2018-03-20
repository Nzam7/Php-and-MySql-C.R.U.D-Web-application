<?php

    include 'db.php';

    $id= (int)$_GET['id'];

    $sql = "select * from task where id=$id";

    $rows = mysqli_query($db, $sql);

    $row= mysqli_fetch_assoc($rows);
    if(isset($_POST['submit'])){

    $task = htmlspecialchars($_POST['update']);

    $sql2 ="update task";
    $sql2 .=" set name='$task'";
    $sql2 .= " where id =$id";

    $result = mysqli_query($db,$sql2);

    if($result){
        header('location: index.php');
    } else {
      echo "Data not updated";
    }


    } ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crud app</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</head>
<body>
              <div class="container">
                 <div class="row">
                   <div class="container">

                     <center>
                       <h1>Todo list</h1>
                     </center>


                   </div>
                       <div class="col-md-10 offset-md-1">



                               <br>

                               <!-- Modal -->
                                              <form method="post">
                                                    <div class="form-group">
                                                      <label>Task Name</label>
                                                      <input type="text" required name="update"  value="<?php echo $row['name'];?>" class="form-control">
                                                    </div>
                                                    <input type="submit" name="submit" value="Update Task" class="btn btn-success">
                                                <a href="index.php" class="btn btn-warning">Back</a>
                                              </form>   <!-- form -->


                       </div>

                 </div>
              </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>

</html>
