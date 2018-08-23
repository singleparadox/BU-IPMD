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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
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
                  <a class="dropdown-item" href="#">Copyright/ISP</a>
                  <a class="dropdown-item" href="utilitymodel.php">Utility Model</a>
                  <a class="dropdown-item" href="#">Industrial Design</a>
                  <a class="dropdown-item" href="#">Invention</a>
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
      	<br><br>
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

              $_SESSION['agen_id']=$age;
              $_SESSION['catn_id']=$cat;
              $_SESSION['statn_id']=$status;
            }

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
           
          ?>
        <h1 class="h3 orange-text text-center">EDIT UTILITY MODEL <br> RECORD NO. <?php echo $um_id;?></h1>
        <form action="update.php" method="post">
            <div class="form-row">
              <div class="col">
                <div class="md-form">
                        <textarea id="um_title" name="um_title" type="text" value="" class="form-control md-textarea" rows="2"><?php echo htmlspecialchars($title); ?></textarea>
                        <label for="um_title">Edit Title</label>
                </div>
              </div>
            </div>
            <div class="form-row">
                <div class="col">
                    <div class="md-form">
                        <textarea id="um_reg_no" name="um_reg_no" type="text" value="" class="form-control md-textarea" rows="3"><?php echo htmlspecialchars($reg_no); ?></textarea>
                        <label for="um_reg_no">Edit Reg. Number</label>
                    </div>
                </div>
                <div class="col">
                    <div class="md-form">
                        <textarea type="text" id="um_inventor" name="um_inventor" value="" class="form-control md-textarea" rows="3"><?php echo htmlspecialchars($inventor); ?></textarea>
                        <label for="um_inventor">Edit Inventor(s)</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                        <input type="text" id="um_agency" name="um_agency" class="mdl-textfield__input" value="<?php echo $age; ?>" placeholder="<?php echo $age; ?>" readonly>
                        <input type="hidden" value="" name="um_agency">
                        <label for="um_agency"  class="mdl-textfield__label">Edit Agency</label>
                        <ul for="um_agency" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <?php
                             $get_agency = "SELECT * FROM agencies";
                             $run_agency = mysqli_query($connect, $get_agency);

                             while ($row_agency=mysqli_fetch_array($run_agency)) {
                                   $age_id = $row_agency["agency_id"];
                                   $age1 = $row_agency["agency_name"];
                                   ?>
                                   <li class="mdl-menu__item" data-val="<?php echo $age_id;?>"><?php echo $age1;?> </li>
                                   <?php 
                             }
                            ?>
                        </ul>
                      
                    </div>
                </div>
                <div class="col">
                       <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                        <input type="text" id="um_category" name="um_category" class="mdl-textfield__input" value="<?php echo $cat; ?>" placeholder="<?php echo $cat; ?>"  readonly>
                        <input type="hidden" value="" name="um_category">
                        <label for="um_category"  class="mdl-textfield__label">Edit Category</label>
                        <ul for="um_category" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                      <?php
                                       $get_category = "SELECT * FROM categories";
                                       $run_category = mysqli_query($connect, $get_category);

                                       while ($row_category=mysqli_fetch_array($run_category)) {
                                             $cat_id = $row_category["category_id"];
                                             $cat1 = $row_category["category_name"];
                                             ?>
                                             <li class="mdl-menu__item" data-val="<?php echo $cat_id;?>"><?php echo $cat1;?> </li>
                                             <?php
                                       }
                                   ?>
                                  </ul>
                    </div>
                </div>
              <div class="col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height">
                      <input type="text" id="um_status" name="um_status" class="mdl-textfield__input" value="<?php echo $status; ?>" placeholder="<?php echo $status; ?>"  readonly>
                      <input type="hidden" value="" name="um_status">
                      <label for="um_status" class="mdl-textfield__label">Edit Status</label>
                      <ul for="um_status" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <?php
                                     $get_status = "SELECT * FROM status";
                                     $run_status = mysqli_query($connect, $get_status);

                                     while ($row_status=mysqli_fetch_array($run_status)) {
                                           $stat_id = $row_status["filestatus_id"];
                                           $stat1 = $row_status["filestatus_name"];
                                           ?>
                                           <li class="mdl-menu__item" data-val="<?php echo $stat_id;?>"><?php echo $stat1;?> </li>
                                           <?php
                                     }
                                    ?>
                                </ul>
                  </div>
              </div>
            </div>
            <div class="form-row">
                <div class="col-4">
                    <div class="md-form">
                        <label for="um_filing_date" disabled>Edit Filing Date</label><br>
                        <input type="Date" id="um_filing_date" name="um_filing_date" class="form-control" value="<?php echo $filing_date; ?>">
                        
                    </div>
                </div>
                <div class="col-4">
                    <div class="md-form">
                        <label for="um_issue_date" disabled>Edit Issue Date</label> <br>
                        <input type="date" id="um_issue_date" name="um_issue_date" class="form-control" value="<?php echo $issue_date; ?>">
                    </div>
                </div>
                <div class="col-4">
                  <div class="md-form">
                      <label for="um_publication_date" disabled>Edit Received Date</label><br>
                      <input type="date" id="um_publication_date" name="um_publication_date" class="form-control" value="<?php echo $rec_date; ?>">
                  </div>
                </div>
                <div class="col">
                  <div class="md-form">
                      <input type="number" id="um_year" name="um_year" class="form-control" value="<?php echo $year; ?>">
                      <label for="um_year">Edit Year</label>
                  </div>
              </div>
                <input type="hidden" id="um_id" name="um_id" value="<?php echo $um_id;?>">
            </div>
            <div class="form-row">
              <div class="col">
               <center>
                <button class="btn btn-primary btn-outline-success" name="update" type="submit">
                    SUBMIT
                </button>
                <a href="../../utilitymodel.php">
                <button class="btn btn-primary btn-outline-warning" type="button">
                    GO BACK
                </button></a>
              </center> 
            </div>
          </div>
        </form>
        <!-- Material form row -->
        </center>
        <!--Grid row-->
        <!-- Collapse buttons -->
        
        <!-- / Collapse buttons -->
      <!--/Grid row-->

      

      </section>
      <!--Section: Main features & Quick Start-->
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
    <script>
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>

    <script type="text/javascript" src="../../components/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../../components/js/popper.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../../components/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../../components/js/mdb.min.js"></script>
      <!-- Initializations -->
    <script type="text/javascript" src="../../components/js/getmdl-select.min.js"></script>
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
