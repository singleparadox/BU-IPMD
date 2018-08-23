<?php 
session_start();
include ("db.php");
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

<body style="background-color: #fff;">

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="../index.php" target="_blank">
        <strong>BU IPMD</strong>
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
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">AUDIT Section</a>
                    <a class="dropdown-item" href="#">ACOIP Section</a>
                    <a class="dropdown-item" href="#">PUMS Section</a>
                </div>
            </li>
          <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Copyright/ISP</a>
                    <a class="dropdown-item" href="#">Utility Model</a>
                    <a class="dropdown-item" href="#">Industrial Design</a>
                    <a class="dropdown-item" href="#">Invention</a>
                    <a class="dropdown-item" href="#">Trademark</a>
                </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../contact.php" target="">Contact</a>
            </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i></a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalLoginForm"> Login</a>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modalRegisterForm"> Register</a>
                </div>
            </li>
        </ul>

      </div>

    </div>
  </nav>
  <!-- Navbar -->
  <!-- LOGIN MODAL-->
	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog cascading-modal modal-notify modal-warning" role="document">
	        <div class="modal-content">
	            <!--Header-->
	            <div class="modal-header text-center">
	                <h4 class="modal-title white-text w-100 font-weight-bold py-2"> LOG IN</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true" class="white-text">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body mx-3">
	                <div class="md-form mb-5">
	                    <i class="fa fa-user fa-2x prefix"></i>
	                    <input type="email" id="defaultForm-email" class="form-control validate">
	                    <label data-error="wrong" data-success="right" for="defaultForm-email">Enter your Username</label>
	                </div>

	                <div class="md-form mb-4">
	                    <i class="fa fa-lock fa-2x prefix"></i>
	                    <input type="password" id="defaultForm-pass" class="form-control validate">
	                    <label data-error="wrong" data-success="right" for="defaultForm-pass">Enter your Password</label>
	                </div>

	            </div>
	            <div class="modal-footer d-flex justify-content-center">
	                <button class="btn btn-orange btn-block">LOGIN</button>
	            </div>
	        </div>
	    </div>
	</div>
	<!--/LOGIN MODAL-->
	<!--REGISTER MODAL-->
	<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    	<div class="modal-dialog cascading-modal modal-notify modal-success" role="document">
	        <div class="modal-content">
	            <div class="modal-header text-center">
	                <h4 class="modal-title white-text w-100 font-weight-bold"> REGISTER</h4>
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	            </div>
	            <div class="modal-body mx-3">
	                <div class="md-form mb-4">
	                    <i class="fa fa-user prefix grey-text"></i>
	                    <input type="text" id="orangeForm-name" class="form-control validate">
	                    <label for="orangeForm-name">Your name</label>
	                </div>
	                <div class="md-form mb-4">
	                    <i class="fa fa-envelope prefix grey-text"></i>
	                    <input type="email" id="orangeForm-email" class="form-control validate">
	                    <label for="orangeForm-email">Your email</label>
	                </div>
	                <div class="md-form mb-4">
	                    <i class="fa fa-question-circle prefix grey-text"></i>
	                    <input type="text" id="orangeForm-pass" class="form-control validate">
	                    <label for="orangeForm-pass">Are you a Student/Faculty?</label>
	                </div>
	                <div class="md-form mb-4">
	                    <i class="fa fa-lock prefix grey-text"></i>
	                    <input type="password" id="orangeForm-pass" class="form-control validate">
	                    <label for="orangeForm-pass">Your password</label>
	                </div>
	                <div class="md-form mb-4">
	                    <i class="fa fa-lock prefix grey-text"></i>
	                    <input type="password" id="orangeForm-pass" class="form-control validate">
	                    <label for="orangeForm-pass">Confirm password</label>
	                </div>
	            </div>
	            <div class="modal-footer d-flex justify-content-center">
	                <button class="btn btn-success btn-block">REGISTER</button>
	            </div>
	        </div>
	    </div>
	</div>
	<!--/REGISTER MODAL-->
  <!--Main layout-->
  <main >
    <div class="container">
      <br><br>
      <!--Section: Main features & Quick Start-->
      <section>
      	<br><br><br><br>
        <center>
          <?php 
          if(isset($_GET['um_id']))
            {
              $um_id = $_GET["um_id"];
              $query = mysqli_query($connect, "SELECT * FROM utility_model WHERE um_id = $um_id");

              $row=mysqli_fetch_array($query);
              $title=$row['um_title'];
              $reg_no=$row['um_reg_no'];
              $age=$row['agency_id'];
              $cat=$row['category_id'];
              $filing_date=$row['um_filing_date'];
              $issue_date=$row['um_issue_date'];
              $rec_date=$row['um_publication_date'];
              $year=$row['um_year'];
              $inventor=$row['um_inventor'];
              $status=$row['filestatus_id'];

              $agen_que = "SELECT * FROM agencies WHERE agency_id=$age";
              $agen_res = mysqli_query($con, $agen_que);
              $agen_row = mysqli_fetch_array($agen_res );
                $age=$agen_row['agency_name'];

              $catn_que = "SELECT * FROM categories WHERE category_id=$cat";
              $catn_res = mysqli_query($con, $catn_que);
              $catn_row = mysqli_fetch_array($catn_res );
                $cat=$catn_row['category_name'];

              $statn_que = "SELECT * FROM filestatus WHERE filestatus_id=$status";
              $statn_res = mysqli_query($con, $statn_que);
              $statn_row = mysqli_fetch_array($statn_res );
                $status=$statn_row['filestatus_name'];

            }
          ?>
        <h1 class="h3 orange-text text-center">DISPLAY UTILITY MODEL RECORD</h1>
        <h2>Title: <?php echo $title; ?></h2>     
        <!-- Material form row -->
        <form>
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        <textarea type="text" value="" id="textareaBasic" class="form-control md-textarea" rows="3" disabled><?php echo htmlspecialchars($reg_no); ?></textarea>
                        <label for="textareaBasic">Reg. Number</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <textarea type="text" value="" id="textareaBasic" class="form-control md-textarea" rows="3" disabled><?php echo htmlspecialchars($inventor); ?></textarea>
                        <label for="textareaBasic">Inventor(s)</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $age; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">Agency</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $cat; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Category</label>
                    </div>
                </div>
                <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $year; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Year</label>
                  </div>
              </div>
              <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $status; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Status</label>
                  </div>
              </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $filing_date; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">Filing Date</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $issue_date; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Issue Date</label>
                    </div>
                </div>
                <div class="col-4">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $rec_date; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Received Date</label>
                  </div>
                </div>
            </div>
              <center>
              <div clas="col-12">
                <br>
                <h2>REMARKS:</h2>
                <h6>(ordered by latest to oldest)</h6>
                <br><div class="card-group">
                  <?php
                    $rem_query = "SELECT max(um_remarks_id) AS max_value FROM um_remarks WHERE um_id=$um_id";
                      $fetch_que =mysqli_query($con,$rem_query);
                      $row = mysqli_fetch_assoc($fetch_que);
                      $rem_id=$row["max_value"];

                      $rem_query2 = "SELECT um_remarks_time,um_remarks_desc FROM um_remarks WHERE um_remarks_id=$rem_id";
                      if($fetch_res = mysqli_query($connect, $rem_query2)){
                          $rem_que = "SELECT * FROM um_remarks WHERE um_id=$um_id ORDER BY um_remarks_time DESC";
                          if($rem_res = mysqli_query($connect, $rem_que)){
                            while($rem_row = mysqli_fetch_array($rem_res)){
                              if ($rem_row['um_remarks_id']=""){
                                echo'<h3 class="h3">NONE</h3> ';
                              }
                              else{

                              echo'
                              <div clas="col">
                                <div class="card border-warning mb-3 w-100" style="width:100%;">
                                    <div class="card-header">Date & Time: '.$rem_row['um_remarks_time'].'</div>
                                    <div class="card-body text-warning">
                                        <h5 class="card-title">Description:</h5>
                                        <p class="card-text">'.$rem_row['um_remarks_desc'].'</p>
                                    </div>
                                </div>
                              </div>';
                              }
                            }
                          }
                        }
                      else{
                        echo'<h5 class="grey-text">NO REMARKS FOUND</h5>';
                      }    
                  ?>
                </div>
                </center>
              </div>
        </form>
        <!-- Material form row -->
        </center>
        <!--Grid row-->
        <!-- Collapse buttons -->
        <div>
          <center>
            <br>
            <a href="../utilitymodel.php">
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
    <script type="text/javascript" src="../components/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../components/js/popper.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../components/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../components/js/mdb.min.js"></script>
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
