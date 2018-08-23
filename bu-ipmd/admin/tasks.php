<?php 
session_start();
include ("../functions/db.php");

if(!isset($_SESSION['user_name'])){
  echo "<script>window.open('../404.php?','_self')</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BU IPMD</title>
  <!--Favicon image-->
  <link rel="icon" href="../favicon.ico" type="image/ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../components/css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../components/css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="../components/css/getmdl-select.min.css">
  <link rel="stylesheet" href="../components/css/material.css"">
  <link rel="stylesheet" href="../components/css/style.css">
  <style type="text/css">
    @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
  </style>
  <script type="text/javascript">
    $('.collapse').collapse()

    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
      })

    $("form").on('submit', function(){
       $('modalViewForm.modal').show();
    })
  </script>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="../index.php">
        <strong><img src="../favicon.ico" style="height: 30px;width: 30px; margin-top: -4px;"> BU IPMD </strong>
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="profile.php" target="">Profile</a>
          </li>
          <li class="nav-item active">
          <a class="nav-link" href="tasks.php" target="">Tasks
          <?php
            $user_id=$_SESSION['user_id'];
            $notif="SELECT COUNT(task_id) AS tasks FROM task WHERE task_taggedto=$user_id";
            if($notif_run=mysqli_query($connect,$notif)){
              if($row=mysqli_fetch_assoc($notif_run)){
                if(($row['tasks']==0) || ($row['tasks']==NULL)){
                  echo '<span class="badge badge-success">';
                  echo $row['tasks'];
                  echo '</span>';
                }
                else{
                  echo '<span class="badge badge-danger">';
                  echo $row['tasks'];
                  echo '</span>';
                }
              } 
            }
          ?>
          </a>
          </li>

        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php
                  if (isset($_SESSION['user_name'])) {
                      echo "<b>Hi,&nbsp</b>";
                      echo $_SESSION['user_name'];
                      ?>
                      
                      <?php
                        $user_id=$_SESSION['user_id'];
                        $notif="SELECT COUNT(task_id) AS tasks FROM task WHERE task_taggedto=$user_id";
                        if($notif_run=mysqli_query($connect,$notif)){
                          if($row=mysqli_fetch_assoc($notif_run)){
                            if(($row['tasks']==0) || ($row['tasks']==NULL)){
                              echo '<span class="badge badge-success">';
                              echo $row['tasks'];
                              echo '</span>';
                            }
                            else{
                              echo '<span class="badge badge-danger">';
                              echo $row['tasks'];
                              echo '</span>';
                            }
                          }
                          
                        }
                      ?>
                        
                      
                      <?php
                  }
                  else{
                      echo '<i class="fa fa-user-circle"></i>';
                  }
                 
                ?>
                 
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                      if (!isset($_SESSION['user_name'])) {
                          echo "<a href='utilitymodel.php' class='dropdown-item'>Login</a>";
                      }
                      else{
                          echo "<a href='includes/logout.php' class='dropdown-item'>Logout</a>";    
                      }
                    ?>
                </div>
            </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->
  <!--Main layout-->
  <main>
    <!--Modal Add Form-->
          <div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg cascading-modal modal-notify modal-warning" role="document">
                <form action="includes/insert.php" method="post" enctype="multipart/form-data" class="mod">
                  <div class="modal-content">
                      <div class="modal-header text-center">
                          <h4 class="modal-title white-text w-100 font-weight-bold"> ASSIGN TASK FORM</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body mx-3">
                          <div class="row">
                            <div class="col">
                              <div class="md-form">
                                  <input type="text" id="task_name" name ="task_name" class="form-control validate">
                                  <label for="task_name">Task Name</label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="md-form">
                                  <textarea type="text" id="task_desc" name="task_desc" class="form-control md-textarea validate"></textarea>
                                  <label for="task_desc">Task Description</label>
                                  <input type="hidden" id="task_taggedby" name ="task_taggedby" class="form-control validate" value="<?php echo $_SESSION['user_id'];?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="width: 100%;">
                                  <input type="text" value="" class="mdl-textfield__input" id="task_taggedto" readonly>
                                  <input type="hidden" value="" name="task_taggedto">
                                  <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                  <label for="task_taggedto" class="mdl-textfield__label">Tag a User</label>
                                  <ul for="task_taggedto" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                      <?php
                                       $user_id=$_SESSION['user_id'];
                                       $get_category = "SELECT * FROM users WHERE user_id != $user_id";
                                       $run_category = mysqli_query($connect, $get_category);

                                       while ($row_category=mysqli_fetch_array($run_category)) {
                                             $cat_id = $row_category["user_id"];
                                             $cat = $row_category["user_name"];
                                             ?>
                                             <li class="mdl-menu__item" data-val="<?php echo $cat_id;?>"><?php echo $cat;?> </li>
                                             <?php
                                       }
                                   ?>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                          <button class="btn btn-warning btn-block" name="insert_post" type="submit">SUBMIT</button>
                      </div>
                      </div> 
                  </div>
                </form>
              </div>
          </div>
        <!--/Modal Add Form-->
    <div class="container">
      <br><br><br><br><br><br><br><br><br><br>
      <!--Section: Main features & Quick Start-->
      <center>
        <?php
          $user_id=$_SESSION['user_id'];
          $notif2="SELECT COUNT(task_id) AS tasks_by FROM task WHERE task_tagby=$user_id";
          if($notif_run2=mysqli_query($connect,$notif2)){
            if($row2=mysqli_fetch_assoc($notif_run2)){
              if(($row2['tasks_by']==0) || ($row2['tasks_by']==NULL)){
                $_SESSION['task_made'] = '0';
              }
              else{
                echo '<h1>';
                echo $row['tasks'];
                echo ' - TASK(S) ASSIGNED BY    <strong class="red-text">';
                echo $_SESSION['user_name'];
                echo'</strong></h1>';
                $_SESSION['task_made'] = '1';
              }
            }
            
          }

          $notif="SELECT COUNT(task_id) AS tasks FROM task WHERE task_taggedto=$user_id";
          if($notif_run=mysqli_query($connect,$notif)){
            if($row=mysqli_fetch_assoc($notif_run)){
              if(($row['tasks']==0) || ($row['tasks']==NULL)){
                echo '<h1>NO TASKS ASSIGNED TO    <strong class="red-text">';
                echo $_SESSION['user_name'];
                echo'</strong></h1>';
                $_SESSION['task_assigned'] = '0';
              }
              else{
                echo '<h1>';
                echo $row['tasks'];
                echo ' - TASK(S) ASSIGNED TO    <strong class="red-text">';
                echo $_SESSION['user_name'];
                echo'</strong></h1>';
                $_SESSION['task_assigned'] = '1';
              }
            }
            
          }
          
            echo'<br><br><br>
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                VIEW ALL TASKS
              </button>'; 
          
        ?>
      <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text" data-toggle="modal" data-target="#modalAddForm">
        ASSIGN NEW TASK
      </button>
      </center>
    </div>
  </main>
  <!--Main layout--><?php 

    if(($_SESSION['task_assigned']=='0') && ($_SESSION['task_made']=='0')){
      echo '<div class="collapse" id="collapseExample"><h3><center>NO TASK ASSIGNED<center></h3></div>';
    }
    else{
      ?>
      <div class="collapse" id="collapseExample">
        <hr>
        <div>
          <!--Table 1-->
          <!--Table-->     
          <center><h4>TASK ASSIGNED TO ME:</h4></center>
          <table id="mytable" class="table table-hover table-bordered table-responsive-md table-striped">
            <thead class="orange white-text">
              <tr>
                <th class="th-sm text-center">Task Name</th>
                <th class="th-sm text-center">Task Description</th>
                <th class="th-sm text-center">Task Remarks</th>
                <th class="th-sm text-center">Task Progress</th>
                <th class="th-sm text-center">Task Tagged by:</th>
                <th class="th-sm text-center" style="width: 13%;">Actions</th>
              </tr>
            </thead>
          <tbody>

          <?php
                $user = $_SESSION['user_id'];
               $fetch_cus = mysqli_query($connect, "SELECT * FROM task WHERE task_taggedto =$user")
                or die("Error: Could not fetch rows!".mysqli_error($connect));

               while($row = mysqli_fetch_array($fetch_cus))
               {
                  $task_id = $row['task_id'];

                  $rem_query = "SELECT max(task_remarks_id) AS max_value FROM task_remarks WHERE task_id=$task_id";
                  $fetch_que =mysqli_query($connect,$rem_query);
                  $row2 = mysqli_fetch_assoc($fetch_que);
                  if($row2['max_value']=="NULL"){
                    $rem_id=$row2["max_value"];
                    $rem_query2 = "SELECT task_datetime,task_remarks_desc FROM task_remarks WHERE task_remarks_id=$rem_id";
                    if($fetch_res = mysqli_query($connect, $rem_query2)){
                    $rem_row = mysqli_fetch_assoc($fetch_res);

                      if(($rem_row['um_remarks_time'])==""){
                        $task_rem = "NO ACTIONS YET";
                      }

                      else{
                        $task_rem = '<p><small class="green-text">'.$rem_row['um_remarks_time'].'</small><small><br>'.$rem_row['um_remarks_desc'].'</small></p>';
                      }
                    }
                  }

                  else{
                    $task_rem = "NO ACTIONS YET";
                  }

                    $task_que = "SELECT * FROM task_progress_id WHERE task_progress_id=".$row['task_progress_id']."";
                    if($task_res = mysqli_query($connect, $task_que)){
                      $task_row = mysqli_fetch_array($task_res );
                      $task_progress=$task_row['task_progress_name'];
                    }
                    else{
                      $task_progress="NO PROGRESS YET";
                    }

                    $task_tagby="SELECT * FROM users WHERE user_id=".$row['task_tagby']."";
                    if($tagby_res= mysqli_query($connect, $task_tagby)){
                      $tagby_row = mysqli_fetch_array($tagby_res);
                      $tagby_user=$tagby_row['user_name'];
                    }

                    echo'<tr>

                    <td class="text-center">'. $row['task_name'].'</td>
                    <td class="text-center">'.$row['task_desc'].'</td>
                    <td class="text-center">'. $task_rem.'</td>
                    <td class="text-center">'. $task_progress.'</td>
                    <td class="text-center">'. $tagby_user.'</td>';  

                    echo'
                    <td class="text-center">
                      <a name="edit" href="includes/edit.php?user_id='.$task_id.'" target="_blank">
                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Edit">
                        <i class="material-icons">edit</i>
                      </button></a>
                  
                      <a name="view" href="includes/view.php?user_id='.$user_id.'" target="_blank">
                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="View">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                      </button></a>
                      <a name ="remarkview" href="functions/utility/remarks.php?um_id" target="_blank">
                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Actions taken" data-toggle="modal" data-target="#modalViewForm">
                        <i class="material-icons">library_add</i>
                      </button></a>
                      ';

                      if($row['task_progress_id'] == "3"){
                        echo '<a name ="umdelete" class="delete" data-confirm="Are you sure to delete this item?" href="functions/utility/delete.php?um_id='.$um_id.'"><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Delete">
                        <i class="material-icons">delete</i>
                      </button></a></td>';
                      }

                      else{
                        echo '</td>';
                      }
                  
                }   

                ?>   
          </tbody>
          </table>
          <!--Table--> 
          <!--Table 2-->
          <!--Table-->
          <center><h4>TASK ASSIGNED BY ME:</h4></center>     
          <table id="mytable" class="table table-hover table-bordered table-responsive-md table-striped">
            <thead class="orange white-text">
              <tr>
                <th class="th-sm text-center">Task Name</th>
                <th class="th-sm text-center">Task Description</th>
                <th class="th-sm text-center">Task Remarks</th>
                <th class="th-sm text-center">Task Progress</th>
                <th class="th-sm text-center">Task Tagged by:</th>
                <th class="th-sm text-center" style="width: 13%;">Actions</th>
              </tr>
            </thead>
          <tbody>

          <?php
                $user = $_SESSION['user_id'];
               $fetch_cus = mysqli_query($connect, "SELECT * FROM task WHERE task_tagby =$user")
                or die("Error: Could not fetch rows!".mysqli_error($connect));

               while($row = mysqli_fetch_array($fetch_cus))
               {
                  $task_id = $row['task_id'];

                  $rem_query = "SELECT max(task_remarks_id) AS max_value FROM task_remarks WHERE task_id=$task_id";
                  $fetch_que =mysqli_query($connect,$rem_query);
                  $row2 = mysqli_fetch_assoc($fetch_que);
                  if($row2['max_value']=="NULL"){
                    $rem_id=$row2["max_value"];
                    $rem_query2 = "SELECT task_datetime,task_remarks_desc FROM task_remarks WHERE task_remarks_id=$rem_id";
                    if($fetch_res = mysqli_query($connect, $rem_query2)){
                    $rem_row = mysqli_fetch_assoc($fetch_res);

                      if(($rem_row['um_remarks_time'])==""){
                        $task_rem = "NO ACTIONS YET";
                      }

                      else{
                        $task_rem = '<p><small class="green-text">'.$rem_row['um_remarks_time'].'</small><small><br>'.$rem_row['um_remarks_desc'].'</small></p>';
                      }
                    }
                  }

                  else{
                    $task_rem = "NO ACTIONS YET";
                  }

                    $task_que = "SELECT * FROM task_progress_id WHERE task_progress_id=".$row['task_progress_id']."";
                    if($task_res = mysqli_query($connect, $task_que)){
                      $task_row = mysqli_fetch_array($task_res );
                      $task_progress=$task_row['task_progress_name'];
                    }
                    else{
                      $task_progress="NO PROGRESS YET";
                    }

                    $task_tagby="SELECT * FROM users WHERE user_id=".$row['task_tagby']."";
                    if($tagby_res= mysqli_query($connect, $task_tagby)){
                      $tagby_row = mysqli_fetch_array($tagby_res);
                      $tagby_user=$tagby_row['user_name'];
                    }

                    echo'<tr>

                    <td class="text-center">'. $row['task_name'].'</td>
                    <td class="text-center">'.$row['task_desc'].'</td>
                    <td class="text-center">'. $task_rem.'</td>
                    <td class="text-center">'. $task_progress.'</td>
                    <td class="text-center">'. $tagby_user.'</td>';  

                    echo'
                    <td class="text-center">
                      <a name="edit" href="includes/edit.php?user_id='.$task_id.'" target="_blank">
                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Edit">
                        <i class="material-icons">edit</i>
                      </button></a>
                  
                      <a name="view" href="includes/view.php?user_id='.$user_id.'" target="_blank">
                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="View">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                      </button></a>
                      <a name ="remarkview" href="functions/utility/remarks.php?um_id" target="_blank">
                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Actions taken" data-toggle="modal" data-target="#modalViewForm">
                        <i class="material-icons">library_add</i>
                      </button></a>
                      ';

                      if($row['task_progress_id'] == "3"){
                        echo '<a name ="umdelete" class="delete" data-confirm="Are you sure to delete this item?" href="functions/utility/delete.php?um_id='.$um_id.'"><button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Delete">
                        <i class="material-icons">delete</i>
                      </button></a></td>';
                      }

                      else{
                        echo '</td>';
                      }
                  
                }   

                ?>   
          </tbody>
          </table>
          <!--Table-->   
      </div>
      <?php
    }
  ?>
</div>
  <!--Footer-->
  <br><br><br><br>
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">
    <!-- Social icons -->
    <div class="col" style="height: 30px;"></div>
    <div class="pb-4">
      <center><p>Connect with us through <br>any of the links below</p></center>
      <a href="https://www.facebook.com/buipmd" title="BUIPMD FACEBOOK" target="_self">
        <i class="fa fa-facebook mr-3"></i>
      </a>

      <a href="contact.php" title="(052) 742-1909" target="_self">
        <i class="fa fa-phone mr-3"></i>
      </a>

      <a href="contact.php" title="0928-756-9576" target="_self">
        <i class="fa fa-send mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      <strong>BU IPMD © 2018 </strong>
    </div>
    <!--/.Copyright-->
  </footer>
  <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../components/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../components/js/popper.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../components/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../components/js/mdb.min.js"></script>
      <!-- Initializations -->
    <script type="text/javascript" src="../components/js/getmdl-select.min.js"></script>
    <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

    var deleteLinks = document.querySelectorAll('.delete');

    for (var i = 0; i < deleteLinks.length; i++) {
      deleteLinks[i].addEventListener('click', function(event) {
          event.preventDefault();

          var choice = confirm(this.getAttribute('data-confirm'));

          if (choice) {
            window.location.href = this.getAttribute('href');
          }
      });
    }
  </script>
</body>
</html>