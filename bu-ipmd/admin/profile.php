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
    <link href="../components/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../components/css/getmdl-select.min.css">
    <link rel="stylesheet" href="../components/css/material.css"">
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
          <li class="nav-item active">
            <a class="nav-link" href="dashboard.php">Dashboard Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="profile.php" target="">Profile</a>
          </li>
          <li class="nav-item">
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
  <main >
    <div class="container">
      <br><br>
      <!--Section: Main features & Quick Start-->
      <section>
      	<br><br><br><br>
        <center>
          <?php 
          if(isset($_GET['user_id']))
            {
              $user_id = $_GET["user_id"];
              $query = mysqli_query($connect, "SELECT * FROM users WHERE user_id = $user_id");

              $row=mysqli_fetch_array($query);
              $user_name=$row['user_name'];
              $user_firstname=$row['user_firstname'];
              $user_lastname=$row['user_lastname'];
              $user_position=$row['user_position'];
              $acc_type=$row['account_type'];

              $acc_que = "SELECT * FROM account_type WHERE account_type_id=".$row['account_type']."";
              $acc_res = mysqli_query($connect, $acc_que);
              $acc_row = mysqli_fetch_array($acc_res );
              $acc=$acc_row['account_type_name'];

            }
          ?>
        <h1 class="h3 orange-text text-center">VIEW/EDIT USER PROFILE</h1> 
        <!-- Material form row -->
        <form>
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $user_name; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">User Name</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">User First Name</label>
                    </div>
                </div>
                <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $year; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">User Last Name</label>
                  </div>
              </div>
              <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $status; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">User Position</label>
                  </div>
              </div>
            </div>
              <center>
                  <div clas="col-12">
                    <br><br>

                      <?php
                      if (isset($_SESSION['user_name'])) {
                        echo'<h2 class="orange-text">REMARKS HISTORY:</h2>
                                <h6>(ordered by latest to oldest)</h6>
                                      <div class="card-group">';
                        $rem_query = "SELECT max(um_remarks_id) AS max_value FROM utility_remarks WHERE um_id=$um_id";
                        $fetch_que =mysqli_query($connect,$rem_query);
                        $row = mysqli_fetch_assoc($fetch_que);
                        $rem_id=$row["max_value"];

                        $rem_query2 = "SELECT um_remarks_time,um_remarks_desc FROM utility_remarks WHERE um_remarks_id=$rem_id";
                        if($fetch_res = mysqli_query($connect, $rem_query2)){
                        $rem_row = mysqli_fetch_assoc($fetch_res);
                          echo'
                            <div class="card border-warning mb-3 w-100" style="width:100%;">
                                <div class="card-header">Date & Time: '.$rem_row['um_remarks_time'].'</div>
                                <div class="card-body text-warning text-center">
                                    <h5 class="card-title">Description:</h5>
                                    <p class="card-text">'.$rem_row['um_remarks_desc'].'</p>
                                </div>
                            </div>
                            <br><br>';
                        }

                      else{
                        echo'
                            <div class="card w-100" style="width:100%;">
                                <div class="card-body text-center">
                                    <p class="card-text">NO REMARKS FOUND</p>
                                </div>
                            </div>
                            <br><br>';
                          }
                      } 
                      else{
                        
                      }   
                      ?>
                    </div>
                    <br>
                    <!--Modal Add Form-->
                      <div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg cascading-modal modal-notify modal-warning" role="document">
                          <form action="remarks.php" method="post" enctype="multipart/form-data" class="mod">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title white-text w-100 font-weight-bold"> ADD NEW REMARK</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body mx-3">
                                  <div class="col">
                                    <div class="md-form">
                                        <textarea type="text" id="um_remarks_desc" name="um_remarks_desc" class="form-control md-textarea validate"></textarea>
                                        <label for="um_remarks_desc">Description</label>   
                                    </div>
                                  </div> 
                                  <div class="col">  
                                    <div class="md-form">
                                        <label for="um_remarks_time" disabled>Remark Date:</label><br>
                                        <input type="date" id="um_remarks_time" name="um_remarks_time" class="form-control validate">    
                                    </div>
                                  </div>
                                  </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-outline-warning btn-block" name="insert_post" type="submit">SUBMIT</button>
                                </div>
                                </div> 
                            </div>
                          </form>
                        </div>
                      </div>
                    <!--/Modal Add Form-->
                    </center>
                  </div>
                  </center>
            </center>
        </form>
        <!-- Material form row -->
        </center>
        <!--Grid row-->
        <!-- Collapse buttons -->
        <div>
          <center>
            <br>
            <a href="../../utilitymodel.php">
            <button class="btn btn-primary btn-outline-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                GO BACK
            </button></a>
          </center>
        </div>
        <!-- / Collapse buttons -->
      <!--/Grid row-->

      

      </section>
      <!--Section: Main features & Quick Start-->


      <!--Section: More-->
      <section>

      </section>
      <!--Section: More-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
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
    <script type="text/javascript" src="../../components/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../components/js/popper.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../components/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../components/js/mdb.min.js"></script>
      <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();
  </script>
</body>

</html>




<script>
$(document).ready(function(){
 
 function fetch_post_data(um_id)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{um_id:um_id},
   success:function(data)
   {
    $('#post_modal').modal('show');
    $('#post_detail').html(data);
   }
  });
 }

 $(document).on('click', '.view', function(){
  var um_id = $(this).attr("id");
  fetch_post_data(um_id);
 });

 
});
</script>
