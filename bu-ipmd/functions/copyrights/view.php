<?php 
session_start();
include ("../db.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BU IPMD</title>
    <!--Favicon image-->
    <link rel="icon" href="../../favicon.ico" type="image/ico">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../../components/css/bootstrap.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../../components/css/mdb.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../../components/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../components/css/getmdl-select.min.css">
    <link rel="stylesheet" href="../../components/css/material.css"">
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

<body style="background-color: #eee;">

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand" href="index.php">
        <strong><img src="../../favicon.ico" style="height: 30px;width: 30px; margin-top: -4px;"> BU IPMD </strong>
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
            <a class="nav-link" href="../../index.php">Home
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
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services<span class="sr-only">(current)</span></a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="../../copyright.php">Copyright/ISP</a>
                  <a class="dropdown-item" href="../../utilitymodel.php">Utility Model</a>
                  <a class="dropdown-item" href="../../industrialdesign.php">Industrial Design</a>
                  <a class="dropdown-item" href="../../invention.php">Invention</a>
                  <a class="dropdown-item" href="../../trademark.php">Trademark</a>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../../contact.php" target="">Contact</a>
            </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php
                  if (isset($_SESSION['user_name'])) {
                      echo "<b>Hi,&nbsp;</b>";
                      echo $_SESSION['user_name'];
                  }
                  else{
                      echo '<i class="fa fa-user-circle"></i>';
                  }
                 
                ?>
                </a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                      if (!isset($_SESSION['user_name'])) {
                          echo "<a href='../../login.php' class='dropdown-item'>Login</a>";
                      }
                      else{
                          echo "<a href='../../includes/logout.php' data-confirm='Are you sure to delete this item?'  class='dropdown-item'>Logout</a>";
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
          if(isset($_GET['copyrights_id']))
            {
              $copyrights_id = $_GET["copyrights_id"];
              $query = mysqli_query($connect, "SELECT * FROM copyrights WHERE copyrights_id = $copyrights_id");

              $row=mysqli_fetch_array($query);
              $copyrights_title=$row['copyrights_title'];
              $copyrights_reg_no=$row['copyrights_reg_no'];
              $agency_id=$row['agency_id'];
              $class_id=$row['class_id'];
              $category_id=$row['category_id'];
              $filestatus_id=$row['filestatus_id'];
              $copyrights_authors=$row['copyrights_authors'];
              $copyrights_owner=$row['copyrights_owner'];
              $copyrights_received_date=$row['copyrights_received_date'];
              $copyrights_reg_date=$row['copyrights_reg_date'];
              $copyrights_year=$row['copyrights_year'];
              $copyrights_issue_date=$row['copyrights_issue_date'];
              $copyrights_submitted_date=$row['copyrights_submitted_date'];
              $copyrights_created_date=$row['copyrights_created_date'];
              $copyrights_project_duration=$row['copyrights_project_duration'];
              $copyrights_fee=$row['copyrights_fee'];
              $copyrights_address=$row['copyrights_address'];
              

              $agen_que = "SELECT * FROM agencies WHERE agency_id=$agency_id";
              $agen_res = mysqli_query($connect, $agen_que);
              $agen_row = mysqli_fetch_array($agen_res );
                $agency_id=$agen_row['agency_name'];

              $clas_que = "SELECT * FROM classes WHERE class_id=$class_id";
              $clas_res = mysqli_query($connect, $clas_que);
              $clas_row = mysqli_fetch_array($clas_res );
                $class_id=$clas_row['class_name'];
                $class_name=$clas_row['class_desc'];

              $catn_que = "SELECT * FROM categories WHERE category_id=$category_id";
              $catn_res = mysqli_query($connect, $catn_que);
              $catn_row = mysqli_fetch_array($catn_res );
                $category_id=$catn_row['category_name'];

              $statn_que = "SELECT * FROM filestatus WHERE filestatus_id=$filestatus_id";
              $statn_res = mysqli_query($connect, $statn_que);
              $statn_row = mysqli_fetch_array($statn_res );
                $filestatus_id=$statn_row['filestatus_name'];

            }
          ?>
        <h1 class="h3 orange-text text-center">DISPLAY COPYRIGHT RECORD</h1>
        <h3>Title: </h3><br><h2></l><b><?php echo $copyrights_title; ?></b></h2><br></lin>     
        <!-- Material form row -->
        <form>

            <div class="form-row">

                <div class="col">
                    <div class="md-form">
                        <textarea type="text" value="" id="textareaBasic" class="form-control md-textarea" rows="3" disabled><?php echo htmlspecialchars($copyrights_reg_no); ?></textarea>
                        <label for="textareaBasic">Reg. Number</label>
                    </div>
                </div>

            </div>

            <div class="form-row">

                <div class="col">
                    <div class="md-form">
                        <textarea type="text" value="" id="textareaBasic" class="form-control md-textarea" rows="3" disabled><?php echo htmlspecialchars($copyrights_authors); ?></textarea>
                        <label for="textareaBasic">Author(s)</label>
                    </div>
                </div>

                <div class="col">
                    <div class="md-form">
                        <textarea type="text" value="" id="textareaBasic" class="form-control md-textarea" rows="3" disabled><?php echo htmlspecialchars($copyrights_owner); ?></textarea>
                        <label for="textareaBasic">Owner(s)</label>
                    </div>
                </div>
                
            </div>

            <div class="form-row">

                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $agency_id; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">Agency</label>
                    </div>
                </div>

                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $class_id; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Class</label>
                    </div>
                </div>

                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $category_id; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Category</label>
                    </div>
                </div>

              <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $filestatus_id; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Status</label>
                  </div>
              </div>

            </div>

            <div class="form-row">
              
                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $class_name; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Class Description</label>
                    </div>
                </div>

            </div>

            <div class="form-row">
              
                <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $copyrights_received_date; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Received Date</label>
                  </div>
                </div>
                
                <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $copyrights_reg_date; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Registration Date</label>
                  </div>
                </div>

                <div class="col">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $copyrights_year; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Year Issued</label>
                  </div>
                </div>

            </div>

            <div class="form-row">

                <div class="col-4">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $copyrights_issue_date; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">Issue Date</label>
                    </div>
                </div>

                <div class="col-4">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $copyrights_submitted_date; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Submitted Date</label>
                    </div>
                </div>

                <div class="col-4">
                  <div class="md-form">
                      <input type="text" class="form-control" value="<?php echo $copyrights_created_date; ?>" id="formGroupExampleInputMD" disabled>
                      <label for="formGroupExampleInputMD">Created Date</label>
                  </div>
                </div>
                                                  
            </div>

             <div class="form-row">

                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $copyrights_project_duration; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">Project Duration</label>
                    </div>
                </div>

                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $copyrights_fee; ?>" id="formGroupExampleInputMD" disabled>
                        <label for="formGroupExampleInputMD">Fee</label>
                    </div>
                </div>
                                                  
            </div>


            <div class="form-row">

                <div class="col">
                    <div class="md-form">
                        <input type="text" class="form-control" value="<?php echo $copyrights_address; ?>" id="formGroupExampleInputMD"  disabled>
                        <label for="formGroupExampleInputMD">Address</label>
                    </div>
                </div>
                                                  
            </div>

              <center>
                  <div class="col-12">
                    <br><br>

                      <?php
                      if (isset($_SESSION['user_name'])) {
                        echo'<h2 class="orange-text">REMARKS HISTORY:</h2>
                                <h6>(ordered by latest to oldest)</h6>
                                      <div class="card-group">';
                        $rem_query = "SELECT max(copyrights_remarks_id) AS max_value FROM copyrights_remarks WHERE copyrights_id=$copyrights_id";
                        $fetch_que =mysqli_query($connect,$rem_query);
                        $row = mysqli_fetch_assoc($fetch_que);
                        $rem_id=$row["max_value"];

                        $rem_query2 = "SELECT copy_remarks_time,copy_remarks_desc FROM copyrights_remarks WHERE copyrights_remarks_id=$rem_id";
                        if($fetch_res = mysqli_query($connect, $rem_query2)){
                        $rem_row = mysqli_fetch_assoc($fetch_res);
                          echo'
                            <div class="card border-warning mb-3 w-100" style="width:100%;">
                                <div class="card-header">Date & Time: '.$rem_row['copy_remarks_time'].'</div>
                                <div class="card-body text-warning text-center">
                                    <h5 class="card-title">Description:</h5>
                                    <p class="card-text">'.$rem_row['copy_remarks_desc'].'</p>
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
                          <form action="../../remarks.php" method="post" enctype="multipart/form-data" class="mod">
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
                                        <textarea type="text" id="copy_remarks_desc" name="copy_remarks_desc" class="form-control md-textarea validate"></textarea>
                                        <label for="copy_remarks_desc">Description</label>   
                                    </div>
                                  </div> 
                                  <div class="col">  
                                    <div class="md-form">
                                        <label for="copy_remarks_time" disabled>Remark Date:</label><br>
                                        <input type="date" id="copy_remarks_time" name="copy_remarks_time" class="form-control validate">    
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
            <a href="javascript:window.open('','_self').close();">
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
 
 function fetch_post_data(copyrights_id)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{copyrights_id:copyrights_id},
   success:function(data)
   {
    $('#post_modal').modal('show');
    $('#post_detail').html(data);
   }
  });
 }

 $(document).on('click', '.view', function(){
  var copyrights_id = $(this).attr("id");
  fetch_post_data(copyrights_id);
 });

 
});
</script>
