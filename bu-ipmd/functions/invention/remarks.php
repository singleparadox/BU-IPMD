<?php 
session_start();
include ("../db.php");


if(!isset($_SESSION['user_name'])){
  echo "<script>window.open('../../404.php?','_self')</script>";
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
                  <a class="dropdown-item" href="copyright.php">Copyright/ISP</a>
                  <a class="dropdown-item" href="utilitymodel.php">Utility Model</a>
                  <a class="dropdown-item" href="#">Industrial Design</a>
                  <a class="dropdown-item" href="invention.php">Invention</a>
                  <a class="dropdown-item" href="#">Trademark</a>
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
          if(isset($_GET['invention_id']))
            {
              $invention_id = $_GET["invention_id"];
              $_SESSION['invention_id']=$invention_id;
              $query = mysqli_query($connect, "SELECT * FROM invention WHERE invention_id = $invention_id");

              $row=mysqli_fetch_array($query);
              $title=$row['invention_title'];
              $reg_no=$row['invention_application_no'];
              $age=$row['agency_id'];
              $cat=$row['category_id'];
              $filing_date=$row['invention_filing_date'];
              $issue_date=$row['invention_issue_date'];
              $rec_date=$row['invention_received_date'];
              $year=$row['invention_year'];
              $inventor=$row['invention_inventors'];
              $status=$row['filestatus_id'];

              $agen_que = "SELECT * FROM agencies WHERE agency_id=$age";
              $agen_res = mysqli_query($connect, $agen_que);
              $agen_row = mysqli_fetch_array($agen_res );
                $age=$agen_row['agency_name'];

              $catn_que = "SELECT * FROM categories WHERE category_id=$cat";
              $catn_res = mysqli_query($connect, $catn_que);
              $catn_row = mysqli_fetch_array($catn_res );
                $cat=$catn_row['category_name'];

              $statn_que = "SELECT * FROM filestatus WHERE filestatus_id=$status";
              $statn_res = mysqli_query($connect, $statn_que);
              $statn_row = mysqli_fetch_array($statn_res );
                $status=$statn_row['filestatus_name'];

            }
          ?>

        <!-- Material form row -->
        <div class="row">
          <div class="col-6">
            <h3 class="h3 orange-text text-center">RECORD DETAILS:</h3>
            <h4>Title: <?php echo $title; ?></h4>    
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
            </form>
          </div>
          <div class="col-6">
            <center>
                  <div clas="col-12">
                    <br>
                    <h2 class="orange-text">REMARKS LATEST:</h2>
                    <h6>(ordered by latest to oldest)</h6>
                    <br>
                      <?php
                        $rem_query = "SELECT * FROM invention_remarks WHERE invention_id=$invention_id";
                        if($fetch_res = mysqli_query($connect, $rem_query)){
                        while($rem_row = mysqli_fetch_assoc($fetch_res)){
                          echo'
                            <div class="card border-warning mb-3 w-100" style="width:100%;">
                                <div class="card-header">Date & Time: '.$rem_row['in_remarks_time'].'</div>
                                <div class="card-body text-warning text-center">
                                    <h5 class="card-title">Description:</h5>
                                    <p class="card-text">'.$rem_row['in_remarks_desc'].'</p>
                                </div>
                            </div>';
                          }
                        }

                      else{
                        echo'
                            <div class="card w-100" style="width:100%;">
                                <div class="card-body text-center">
                                    <p class="card-text">NO REMARKS FOUND</p>
                                </div>
                            </div>';
                      }    
                      ?>
                    
                    <br>
                    <button class="mdl-button mdl-js-button mdl-button--colored" data-toggle="modal" data-target="#modalAddForm">
                      ADD NEW REMARK
                    </button>
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
                                        <textarea type="text" id="in_remarks_desc" name="in_remarks_desc" class="form-control md-textarea validate"></textarea>
                                        <label for="in_remarks_desc">Description</label>   
                                    </div>
                                  </div> 
                                  <div class="col">  
                                    <div class="md-form">
                                        <label for="in_remarks_time" disabled>Remark Date:</label><br>
                                        <input type="date" id="in_remarks_time" name="in_remarks_time" class="form-control validate">    
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
          </div>
        </div>
        <!-- Material form row -->
        
        <!--Grid row-->
        <!-- Collapse buttons -->
        <div>
          <center>
            <br>
            <a href="../../invention.php">
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
<?php
if (isset($_POST['insert_post'])) {
  //getting the text data from the fields
  $invention_id = $_SESSION['invention_id'];
  $in_remarks_time=$_POST['in_remarks_time'];
  $in_remarks_desc=$_POST['in_remarks_desc'];

  $insert_invention_remarks = "INSERT INTO invention_remarks(invention_id,in_remarks_time,in_remarks_desc)
  
  VALUES('$invention_id','$in_remarks_time','$in_remarks_desc')";

  //getting the image from the field
  //$um_image = $_FILES['um_image']['name'];
  //$um_image_tmp = $_FILES['um_image']['tmp_name'];

  //move_uploaded_file($um_image_tmp, "components/img/$um_image");
  //getting the image from the field ends here


  //$um_comment = $_POST['um_comment'];


  

  $insert_inremarks = mysqli_query($connect, $insert_invention_remarks);

  if ($insert_inremarks) {
    $invention_id= $_SESSION['invention_id'];
    echo "<script>alert('Remarks added!')</script>";
    echo "<script>window.open('remarks.php?invention_id=".$invention_id.",'_self')</script>";
  }
}
?>