<?php

      include 'db.php';

      $page = (isset($_GET['page']) ? (int)$_GET['page'] : 1);
      $perPage = (isset($_GET['per-page']) && (int)($_GET['per-page']) <= 50 ? (int)$_GET['per-page'] : 5);
      $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;


      $query = "SELECT * FROM task limit ".$start.", ".$perPage." ";
      $total = $db ->query("SELECT * FROM task")->num_rows;
      $pages = ceil($total / $perPage) ;
      $rows = mysqli_query($db, $query);

      define("Aurthor", "Nzam Pistis Sangolo ");
     ?>
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
                           <h2><?php echo Aurthor; ?><?php echo date("l") . " ". date("Y-m-d"); ?></h2>
                         </center>

                       </div>
                           <div class="col-md-10 offset-md-1">


                                <table class="table table-hover">
                                   <button type="button" data-target="#myModal" data-toggle="modal" class="btn btn-success"name="button">Add Task</button>
                                   <button type="button" class="btn btn-secondary float-right" name="button" onclick="print()">Print</button>
                                   <br>
                                   <br>
                                   <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <form class="" action="add.php" method="post">
                                        <div class="form-group">
                                          <label>Task Name</label>
                                          <input type="text" required name="task" class="form-control">
                                        </div>
                                          <input type="submit" name="submit" value="Add Task" class="btn btn-success">
                                    </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                    </div>
                                    </div>    <!-- model end -->

                                   <thead>

                                     <tr>

                                      <div class=" col-md 12 text-center">
                                      <p>Search</p>
                                        <form class="search.php" action="search.php" class="form-group" method="post">
                                            <input type="text" placeholder="Search" name="search" class="form-control">
                                        </form>
                                      </div>
                                       <th>Id</th>
                                       <th>Task</th>

                                     </tr>
                                   </thead>
                                   <tbody>
                                     <tr class="success">
                                       <?php while($row = mysqli_fetch_assoc($rows)): ?>
                                       <td><?php echo $row['id']; ?></td>
                                       <td class="col-md-10"><?php echo $row['name']; ?></td>
                                       <td> <a href="update.php?id=<?php echo $row['id'];?>" class="btn btn-success"> Edit</a>  </td>
                                       <td> <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger"> Delete</a></td>
                                     </tr>
                                     <?php endwhile; ?>
                                   </tbody>
                                 </table>
                                 <center >
                                   <ul class="pagination justify-content-center">
                                     <?php for($i = 1; $i <= $pages; $i++): ?>
                                     <li class="page-item"> <a class="page-link" href="?page=<?php echo $i; ?>&per-page=<?php echo $perPage; ?>"><?php echo $i; ?></a></li>
                                   <?php endfor; ?>
                                   </ul>
                                 </center>


                           </div>

                     </div>
                  </div>
    </body>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"> </script>

    </html>
