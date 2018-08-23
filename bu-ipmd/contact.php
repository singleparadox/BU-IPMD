<?php 
session_start();
include ("functions/db.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>BU IPMD</title>
  <!--Favicon image-->
  <link rel="icon" href="favicon.ico" type="image/ico">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="components/css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="components/css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="components/css/style.css" rel="stylesheet">
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
        <strong><img src="favicon.ico" style="height: 30px;width: 30px; margin-top: -4px;"> BU IPMD </strong>
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
            <a class="nav-link" href="index.php">Home
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
                    <a class="dropdown-item" href="copyright.php">Copyright/ISP</a>
                    <a class="dropdown-item" href="utilitymodel.php">Utility Model</a>
                    <a class="dropdown-item" href="industrialdesign.php">Industrial Design</a>
                    <a class="dropdown-item" href="invention.php">Invention</a>
                    <a class="dropdown-item" href="trademark.php">Trademark</a>
                </div>
            </li>
            <li class="nav-item active">
            <a class="nav-link" href="contact.php" target="">Contact</a>
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
                          echo "<a href='login.php' class='dropdown-item'>Login</a>";
                      }
                      else{
                          echo "<a href='admin/dashboard.php' class='dropdown-item'>View Dashboard</a>";
                          echo "<a href='includes/logout.php' data-confirm='Are you sure to delete this item?' class='dropdown-item'>Logout</a>"; 
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
        <h1 class="h1 orange-text text-center mb-3">CONTACT US</h1>   
        <hr> 
          
        </center>
		<div class="row">
			<div class="col-6">
			<iframe src="https://www.google.com/maps/embed?pb=!4v1526973723203!6m8!1m7!1s9XP3ZCHaBnXBoN_yflU6QQ!2m2!1d13.14606073516661!2d123.7304700929786!3f323.36326036948066!4f-1.6731455236840276!5f2.9029923084482085" height="250" frameborder="0" style="width: 100%" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-6">
				<p class="h5">We are located at:</p>
				<p><strong>Bicol University East Campus, HERRC Bldg.</strong><br> 4500 Daraga - Legazpi City - Tiwi Rd,<br> Legazpi City, 4500 Albay</p>
				<p class="h5">Contact No.:</p>
				<p><strong>0928-756-9576</strong></p>
				<p class="h5">Contact Person.:</p>
				<p><strong>Engr. Christopher D. Pacardo<br><small>Director, IPMD</small></strong></p>
			</div>
			<br>
		</div>
      	<div class="row">
			<div class="col-6">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d717.228126920623!2d123.72962415064758!3d13.14726874231478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a1015fffcb0247%3A0x24bdc8cbeba7b4b3!2sBicol+University+East+Campus!5e0!3m2!1sen!2sph!4v1526974438094" style="width: 100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
			<div class="col-6">
				<p class="h5">Social Media Account:</p>
				<a href="https://www.facebook.com/buipmd"><button class="btn btn-rounded btn-sm btn-primary" data-toggle="modal" data-target="#modalAddForm" type="button">
                <i class="fa fa-facebook"></i>&nbsp;&nbsp;@buipmd
            </button></a>
            	<p class="h5">Telephone No:</p>
            	<p><strong>(052) 742-1909</strong></p>
			</div>
		</div>

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
    <script type="text/javascript" src="components/js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="components/js/popper.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="components/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="components/js/mdb.min.js"></script>
      <!-- Initializations -->
    <script type="text/javascript" src="components/js/getmdl-select.min.js"></script>
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

<?php 
if (isset($_POST['insert_post'])) {
  //getting the text data from the fields
  $um_reg_no = $_POST['um_reg_no'];
  $um_title = $_POST['um_title'];
  $um_agency = $_POST['um_agency'];
  $um_inventor = $_POST['um_inventor'];
  $um_category = $_POST['um_category'];
  $um_filing_date = $_POST['um_filing_date'];
  $um_issue_date = $_POST['um_issue_date'];
  $um_publication_date = $_POST['um_publication_date'];
  $um_year = $_POST['um_year'];
  $um_status = $_POST['um_status'];

  //getting the image from the field
  $um_image = $_FILES['um_image']['name'];
  $um_image_tmp = $_FILES['um_image']['tmp_name'];

  move_uploaded_file($um_image_tmp, "components/img/$um_image");
  //getting the image from the field ends here


  $um_comment = $_POST['um_comment'];


  $insert_utility = "insert into 
  utility_model(um_reg_no,um_title,agency_id,um_inventor,category_id,um_filing_date,um_issue_date,um_publication_date,um_year,filestatus_id,um_image,um_comment)
  
  values('$um_reg_no','$um_title','$um_agency','$um_inventor','$um_category','$um_filing_date','$um_issue_date','$um_publication_date','$um_year','$um_status','$um_image','$um_comment')";

   $insert_um = mysqli_query($connect, $insert_utility);

   if ($insert_um) {
    echo "<script>alert('Utility Model added!')</script>";
    echo "<script>window.open('utilitymodel.php?','_self')</script>";
   }
}

?>