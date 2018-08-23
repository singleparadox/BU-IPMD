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
  <main>
    <!--Modal Add Form-->
          <div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg cascading-modal modal-notify modal-warning" role="document">
                <form action="includes/insert.php" method="post" enctype="multipart/form-data" class="mod">
                  <div class="modal-content">
                      <div class="modal-header text-center">
                          <h4 class="modal-title white-text w-100 font-weight-bold"> ADD NEW USER</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body mx-3">
                          <div class="row">
                            <div class="col">
                              <div class="md-form">
                                  <input type="text" id="user_name" name ="user_name" class="form-control validate">
                                  <label for="user_name">Username</label>
                              </div>
                            </div>
                            <div class="col">
                              <div class="md-form">
                                  <input type="text" id="user_position" name ="user_position" class="form-control validate">
                                  <label for="user_position">Position</label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="md-form">
                                  <input type="text" id="user_firstname" name ="user_firstname" class="form-control validate">
                                  <label for="user_firstname">First Name</label>
                              </div>
                            </div>
                            <div class="col">
                              <div class="md-form">
                                  <input type="text" id="user_lastname" name ="user_lastname" class="form-control validate">
                                  <label for="user_lastname">Last Name</label>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="md-form">
                                  <input type="password" id="user_pass" name ="user_pass" class="form-control validate">
                                  <label for="user_pass">Input Password</label>
                              </div>
                            </div>
                            <div class="col">
                              <div class="md-form">
                                  <input type="password" id="confirm_pass" name ="confirm_pass" class="form-control validate">
                                  <label for="confirm_pass">Confirm Password</label>
                              </div>
                            </div>
                          </div>
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="width: 100%;">
                              <input type="text" value="" class="mdl-textfield__input" id="account_type" readonly>
                              <input type="hidden" value="" name="account_type">
                              <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                              <label for="account_type" class="mdl-textfield__label">Account Type</label>
                              <ul for="account_type" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                  <?php
                                   $get_status = "SELECT * FROM account_type";
                                   $run_status = mysqli_query($connect, $get_status);

                                   while ($row_status=mysqli_fetch_array($run_status)) {
                                         $acc_id = $row_status["account_type_id"];
                                         $acc = $row_status["account_type_name"];
                                         ?>
                                         <li class="mdl-menu__item" data-val="<?php echo $acc_id;?>"><?php echo $acc;?> </li>
                                         <?php
                                   }
                                  ?>
                              </ul>
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
      <br><br>
      <!--Section: Main features & Quick Start-->
      <section>
      	<br><br>
        <center>
          <br>   
          <h1 class="indigo-text"><strong> ADMIN DASHBOARD </strong></h1>   
          <br>   
          <div class="row">
            <?php 
            if($_SESSION['acc_type']=='admin'){
                echo'
                <div class="col">
                  <div class="card indigo z-depth-2 bg2" style="height: 200px;">
                      <div class="card-body">
                          <h3 class="card-title white-text">Create New User</h3>
                          <p class="card-text white-text">Create a new user account.</p>
                          <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text" data-toggle="modal" data-target="#modalAddForm">
                            CLICK HERE
                          </button>
                      </div>
                  </div>
                </div>
    
                <div class="col">
                  <div class="card indigo z-depth-2 bg2"style="height: 200px">
                    <div class="card-body">
                        <h3 class="card-title white-text">View All Users</h3>
                        <p class="card-text white-text">View all user accounts.</p>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            CLICK HERE
                          </button>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card indigo z-depth-2 bg2" style="height: 200px">
                    <div class="card-body">
                        <h3 class="card-title white-text">View/Edit User Profile</h3>
                        <p class="card-text white-text">Change User information here.</p>
                        <a href="profile.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text">
                            CLICK HERE
                          </button></a>
                    </div>
                  </div>
                </div>';
            }
            else{
              echo'
              <div class="col">
                <div class="card indigo z-depth-2 bg2" style="height: 200px">
                  <div class="card-body">
                      <h3 class="card-title white-text">View/Edit User Profile</h3>
                      <p class="card-text white-text">Change User information here.</p>
                      <a href="profile.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text">
                          CLICK HERE
                        </button></a>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card indigo z-depth-2 bg2" style="height: 200px">
                  <div class="card-body">
                      <h3 class="card-title white-text">View/Edit User Profile</h3>
                      <p class="card-text white-text">VIEW TASKS</p>
                      <a href="tasks.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored white-text">
                          CLICK HERE
                        </button></a>
                  </div>
                </div>
              </div>';
            }
            
            ?>
          </div>
        </center>
      </section>
    </div>
  </main>
  <!--Main layout-->
  <div class="collapse" id="collapseExample">
          <hr>
          <div>
            <!--Table-->     
            <table id="mytable" class="table table-hover table-bordered table-responsive-md table-striped">
                <thead class="orange white-text">
                  <tr>
                    <th class="th-sm text-center">
                        Username 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">First Name
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">
                        Last Name
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">
                        Position 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center" style="width: 10%">
                        Account Type 
                        <i class="fa fa-sort"></i>
                    </th>
                    
                    
                    <?php 
                    if(isset($_SESSION['user_name'])){
                      echo'
                      <th class="th-sm text-center" style="width: 13%;">Actions</th>';
                    }
                    else{
                    }
                    ?>
                  </tr>
                </thead>
            <tbody>

              <?php
               	   $user = $_SESSION['user_name'];
                   $fetch_cus = mysqli_query($connect, "SELECT * FROM users")
                    or die("Error: Could not fetch rows!".mysqli_error($connect));

                   while($row = mysqli_fetch_array($fetch_cus))
                   {
	                   	if ($row['user_name']!=$_SESSION['user_name'])
	                   	{
		                    $user_id = $row['user_id'];
		                    $acc_que = "SELECT * FROM account_type WHERE account_type_id=".$row['account_type']."";
		                    $acc_res = mysqli_query($connect, $acc_que);
		                    $acc_row = mysqli_fetch_array($acc_res );
		                    $acc=$acc_row['account_type_name'];
		
		
		                    echo'<tr>

		                    <td class="text-center">'. $row['user_name'].'</td>
		                    <td class="text-center">'.$row['user_firstname'].'</td>
		                    <td class="text-center">'. $row['user_lastname'].'</td>
		                    <td class="text-center">'.$row['user_position'].'</td>
		                    <td class="text-center">'.$acc.'</td>'; 

		                    echo'
		                    <td class="text-center">
		                      <a name="umedit" href="includes/edit.php?user_id='.$user_id.'" target="_blank">
		                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Edit">
		                        <i class="material-icons">edit</i>
		                      </button></a>
		                  
		                      <a name="umview" href="includes/view.php?user_id='.$user_id.'" target="_blank">
		                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="View">
		                        <i class="material-icons">remove_red_eye</i>
		                      </button>
		                      </button></a>
		                  
		                      <a name ="umdelete" class="delete" data-confirm="Are you sure to delete this item?" href="includes/delete.php?user_id='.$user_id.'">
		                      <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Delete">
		                        <i class="material-icons">delete</i>
		                      </button></a>
		                      </td>';
		                }
		                else{
	                    }
                      
                    }   
                    ?>   
		                
            </tr>

        
            </tbody>
          </table>
                    <!--Table-->    
  </div>
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