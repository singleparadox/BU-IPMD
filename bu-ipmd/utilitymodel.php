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
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <link rel="stylesheet" href="components/css/getmdl-select.min.css">
  <link rel="stylesheet" href="components/css/material.css"">
  <link href="components/css/style.css" rel="stylesheet">
   <link href="components/css/pagination_css.css" rel="stylesheet">
  <style type="text/css">
    @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
  </style>
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
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="copyright.php">Copyright/ISP</a>
                    <a class="dropdown-item" href="utilitymodel.php">Utility Model</a>
                    <a class="dropdown-item" href="industrialdesign.php">Industrial Design</a>
                    <a class="dropdown-item" href="invention.php">Invention</a>
                    <a class="dropdown-item" href="trademark.php">Trademark</a>
                </div>
            </li>
            <li class="nav-item">
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
        <h1 class="h1 orange-text text-center mb-3">UTILITY MODEL</h1>    
          <p class="black-text lead col-8">"A  Utility Model is a protection option, which is designed to protect innovations that are not sufficiently inventive to meet the inventive threshold required for standard patents application. It may be any useful machine, implement, tools, product, composition, process, improvement or part of the same, That is of practical utility, novelty and industrial applicability. A utility model is entitled to seven (7) years of protection from the date of filing, with no possibility of renewal."<small> - Intellectual Property Office of the Philippines (IPOPHIL)</small></p>
        </center>
        <!--Grid row-->
        <!-- Collapse buttons -->
        <div>
          <center>
            <button class="btn btn-rounded btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <span>VIEW DATABASE</span>
            </button>
            <?php 

            if(isset($_SESSION['user_name'])){
            echo'<button class="btn btn-rounded btn-danger" data-toggle="modal" data-target="#modalAddForm" type="button">
                <span><i class="fa fa-plus-circle"></i>  ADD RECORD</span>
            </button>';}
            else{
              
            }
            ?>
          </center>
        </div>
        <!-- / Collapse buttons -->
        <!--Modal Add Form-->
          <div class="modal fade" id="modalAddForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg cascading-modal modal-notify modal-danger" role="document">
                <form action="utilitymodel.php" method="post" enctype="multipart/form-data" class="mod">
                  <div class="modal-content">
                      <div class="modal-header text-center">
                          <h4 class="modal-title white-text w-100 font-weight-bold"> UTILITY MODEL ADD FORM</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body mx-3">
                          <div class="md-form">
                              <input type="text" id="um_reg_no" name ="um_reg_no" class="form-control validate">
                              <label for="um_reg_no">Reg. Number</label>
                          </div>
                          <div class="md-form">
                              <textarea type="text" id="um_title" name="um_title" class="form-control md-textarea validate"></textarea>
                              <label for="um_title">Title</label>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="width: 100%;">
                                  <input type="text" value="" class="mdl-textfield__input" id="um_category" required onkeypress="return false;">
                                  <input type="hidden" value="" name="um_category">
                                  <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                  <label for="um_category" class="mdl-textfield__label">Research Category</label>
                                  <ul for="um_category" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                      <?php
                                       $get_category = "SELECT * FROM categories";
                                       $run_category = mysqli_query($connect, $get_category);

                                       while ($row_category=mysqli_fetch_array($run_category)) {
                                             $cat_id = $row_category["category_id"];
                                             $cat = $row_category["category_name"];
                                             ?>
                                             <li class="mdl-menu__item" data-val="<?php echo $cat_id;?>"><?php echo $cat;?> </li>
                                             <?php
                                       }
                                   ?>
                                  </ul>
                              </div>
                            </div>
                            <div class="col">
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="width: 100%;">
                                <input type="text" value="" class="mdl-textfield__input" id="um_agency" required onkeypress="return false;">
                                <input type="hidden" value="" name="um_agency">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="um_agency" class="mdl-textfield__label">Agency</label>
                                <ul for="um_agency" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <?php
                                     $get_agency = "SELECT * FROM agencies";
                                     $run_agency = mysqli_query($connect, $get_agency);

                                     while ($row_agency=mysqli_fetch_array($run_agency)) {
                                       $age_id = $row_agency["agency_id"];
                                       $age = $row_agency["agency_name"];
                                       ?>
                                       <li class="mdl-menu__item" data-val="<?php echo $age_id;?>"><?php echo $age;?> </li>
                                       <?php 
                                     }
                                 ?>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="md-form">
                              <textarea type="text" id="um_inventor" name="um_inventor" class="form-control md-textarea validate"></textarea>
                              <label for="um_inventor">Inventor(s)</label>
                          </div>
                          <div class="row">
                            <div class="col">
                              <div class="md-form">
                                  <label for="um_issue_date" disabled>Issue Date:</label><br>
                                  <input type="date" id="um_issue_date" name="um_issue_date" class="form-control validate">    
                              </div>
                            </div>
                            <div class="col">  
                              <div class="md-form">
                                  <label for="um_filing_date" disabled>Filing Date:</label><br>
                                  <input type="date" id="um_filing_date" name="um_filing_date" class="form-control validate">    
                              </div>
                            </div>
                            <div class="col">   
                              <div class="md-form">
                                  <label for="um_publication_date" disabled>Publication Date:</label><br>
                                  <input type="date" id="um_publication_date" name="um_publication_date" class="form-control validate">    
                              </div>
                            </div>
                          </div>
                            <div class="md-form">
                                <input type="number" id="um_year" name="um_year" maxlength="4" class="form-control validate" aria-describedby="um_year_helper" value="2018">
                                <label for="um_year" disabled>Issue On (Year):</label><br>    
                            </div>
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height" style="width: 100%;">
                                <input type="text" value="" class="mdl-textfield__input" id="um_status" required onkeypress="return false;">
                                <input type="hidden" value="" name="um_status">
                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                <label for="um_status" class="mdl-textfield__label">Status</label>
                                <ul for="um_status" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <?php
                                     $get_status = "SELECT * FROM filestatus";
                                     $run_status = mysqli_query($connect, $get_status);

                                     while ($row_status=mysqli_fetch_array($run_status)) {
                                           $stat_id = $row_status["filestatus_id"];
                                           $stat = $row_status["filestatus_name"];
                                           ?>
                                           <li class="mdl-menu__item" data-val="<?php echo $stat_id;?>"><?php echo $stat;?> </li>
                                           <?php
                                     }
                                    ?>
                                </ul>
                            </div>
                          </div>
                          <div class="modal-footer d-flex justify-content-center">
                          <button class="btn btn-danger btn-block" name="insert_post" type="submit">SUBMIT</button>
                      </div>
                      </div> 
                  </div>
                </form>
              </div>
          </div>
        <!--/Modal Add Form-->
        <!-- Collapsible element -->
        <div class="collapse" id="collapseExample">
          <hr>
          <div>
            <!--Table-->     
            <div class="form-group">
              <h6>Select Number of Rows</h6>
              <select name="state" id="maxRows" class="form-control" style="width:150px;">
                  <option value="5000">Show All</option>
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="15">15</option>
                  <option value="20">20</option>
                  <option value="50">50</option>
                  <option value="75">75</option>
                  <option value="100">100</option>
              </select>
            </div>
            <table id="mytable" class="table table-hover table-bordered table-responsive-md table-striped">
                <thead class="orange white-text">
                  <tr>
                    <th class="th-sm text-center">
                        Year 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">Reg. No. 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center" style="width: 20%;">
                        Title 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center" style="width: 5%">
                        Agency 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center" style="width: 10%">
                        Category 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">
                        Issued 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">
                        Received 
                        <i class="fa fa-sort"></i>
                    </th>
                    <th class="th-sm text-center">
                        Status 
                        <i class="fa fa-sort"></i>
                    </th>
                    
                    
                    <?php 
                    if(isset($_SESSION['user_name'])){
                      echo'
                      <th class="th-sm text-center" style="width: 10%;">Remarks (latest)</th>
                      <th class="th-sm text-center" style="width: 13%;">Actions</th>';
                    }
                    else{
                      echo'<th class="th-sm text-center" style="width:8%;">View Record</th>';
                    }
                    ?>
                  </tr>
                </thead>
            <tbody>

              <?php
                   $fetch_cus = mysqli_query($connect, "SELECT * FROM utility_model ORDER BY um_year DESC")
                    or die("Error: Could not fetch rows!".mysqli_error($connect));

                   while($row = mysqli_fetch_array($fetch_cus))
                   {
                    $um_id = $row['um_id'];
                    $agen_que = "SELECT * FROM agencies WHERE agency_id=".$row['agency_id']."";
                    $agen_res = mysqli_query($connect, $agen_que);
                    $agen_row = mysqli_fetch_array($agen_res );
                    $age=$agen_row['agency_name'];

                    $catn_que = "SELECT * FROM categories WHERE category_id=".$row['category_id']."";
                    $catn_res = mysqli_query($connect, $catn_que);
                    $catn_row = mysqli_fetch_array($catn_res );
                    $cat=$catn_row['category_name'];

                    $statn_que = "SELECT * FROM filestatus WHERE filestatus_id=".$row['filestatus_id']."";
                    $statn_res = mysqli_query($connect, $statn_que);
                    $statn_row = mysqli_fetch_array($statn_res );
                    $status=$statn_row['filestatus_name'];


                    echo'<tr>

                    <td class="text-center">'. $row['um_year'].'</td>
                    <td class="text-center">'.$row['um_reg_no'].'</td>
                    <td class="text-center">'. $row['um_title'].'</td>
                    <td class="text-center">'.$age.'</td>
                    <td class="text-center">'.$cat.'</td>
                    <td class="text-center">';
                    if(($row['um_issue_date']=="")||($row['um_issue_date']=="0000-00-00")){
                      echo "NOT YET ISSUED";
                    }
                    else{
                      echo $row['um_issue_date'];
                    }
                    echo'</td> 
                    <td class="text-center">';
                    if(($row['um_publication_date']=="")||($row['um_publication_date']=="0000-00-00")){
                      echo "NOT YET PUBLISHED";
                    }
                    else{
                      echo $row['um_publication_date'];
                    }
                    echo'</td>
                    <td class="text-center">'.$status.'</td>'
                    ; 

                    ?> 
                    <?php 
                      if(isset($_SESSION['user_name'])){
                        $rem_query = "SELECT max(um_remarks_id) AS max_value FROM utility_remarks WHERE um_id=$um_id";
                        $fetch_que =mysqli_query($connect,$rem_query);
                          $row = mysqli_fetch_assoc($fetch_que);
                          $rem_id=$row["max_value"];

                          $rem_query2 = "SELECT um_remarks_time,um_remarks_desc FROM utility_remarks WHERE um_remarks_id=$rem_id";
                          if($fetch_res = mysqli_query($connect, $rem_query2)){
                          $rem_row = mysqli_fetch_assoc($fetch_res);
                            echo'
                            
                            <td class="text-center">';
                            if(($rem_row['um_remarks_time'])==""){
                              
                            }

                            else{
                              echo'<p><small class="green-text">'.$rem_row['um_remarks_time'].'</small><small><br>'.$rem_row['um_remarks_desc'].'</small></p>
                            </td>';
                            }
                          }

                        else{
                          echo '<td class="text-center">
                          NO REMARKS YET</td>';
                        }
                      }
                      ?>

                      <!--MODAL GOES HERE-->

                      <?php
                      if(!isset($_SESSION['user_name'])){
                        echo '<td class="text-center"><a name="umview" href="functions/utility/view.php?um_id='.$um_id.'" target="_blank">
                        <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="View">
                          <i class="material-icons">remove_red_eye</i>
                        </button>
                        </button></a></td>';
                      }
                      else{
                        echo'
                        <td class="text-center">
                          <a name="umedit" href="functions/utility/edit.php?um_id='.$um_id.'" target="_blank">
                          <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Edit">
                            <i class="material-icons">edit</i>
                          </button></a>
                      
                          <a name="umview" href="functions/utility/view.php?um_id='.$um_id.'" target="_blank">
                          <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="View">
                            <i class="material-icons">remove_red_eye</i>
                          </button>
                          </button></a>
                      
                          <a name ="umdelete" class="delete" data-confirm="Are you sure to delete this item?" href="functions/utility/delete.php?um_id='.$um_id.'">
                          <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="Delete">
                            <i class="material-icons">delete</i>
                          </button></a>
                          <a name ="remarkview" href="functions/utility/remarks.php?um_id='.$um_id.'" target="_blank">
                          <button class="mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect mdl-button--colored" type="button" data-placement="top" title="View/Add Remarks" data-toggle="modal" data-target="#modalViewForm">
                            <i class="material-icons">add_comment</i>
                          </button></a>
                          </td>';
                          } 
                      }
                      
                        
                      ?>   
            </tr>

        
            </tbody>
          </table>
                    <!--Table-->    
        <div class="pagination">
          <center><nav>
                <ul class="pagination"></ul>
            </nav></center>
        </div>
          </div>
        </div>
        <!-- / Collapsible element -->
      <!--/Grid row-->

    <script src="components/js/jquery.min.js"></script>
    <script src="components/js/bootstrap2.min.js"></script>

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
  <!--/Footer-->

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

   <!-- PAGINATION -->   <!-- PAGINATION -->   <!-- PAGINATION -->   <!-- PAGINATION -->   <!-- PAGINATION -->
<script>
    var table = '#mytable'
    $('#maxRows').on('change', function(){
        $('.pagination').html('')
        var trnum = 0
        var maxRows = parseInt($(this).val())
        var totalRows = $(table+' tbody tr').length
        $(table+' tr:gt(0)').each(function(){
            trnum++
            if(trnum > maxRows){
                $(this).hide()
            }
            if(trnum <= maxRows){
                $(this).show()
            }
        })
        if(totalRows > maxRows){
            var pagenum = Math.ceil(totalRows/maxRows)
            for(var i=1;i<=pagenum;){
                $('.pagination').append('<li data-page="'+i+'">\<span>'+ i++ +'<span class="sr-only">(current)</span></span>\</li>').show()
            }
        }
        $('.pagination li:first-child').addClass('active')
        $('.pagination li').on('click',function(){
            var pageNum = $(this).attr('data-page')
            var trIndex = 0;
            $('.pagination li').removeClass('active')
            $(this).addClass('active')
            $(table+' tr:gt(0)').each(function(){
                trIndex++
                if(trIndex > (maxRows*pageNum) || trIndex <= ((maxRows*pageNum)-maxRows)){
                    $(this).hide()
                } else{
                    $(this).show()
                }
            })
        })
    })
   /* $(function(){
        $('table tr:eq(0)').prepend('<th>ID</th>')
        var id = 0;
        $('table tr:gt(0)').each(function(){
            id++
            $(this).prepend('<td>'+id+'</td>')
        })
    })*/
    </script>
   <!-- PAGINATION -->   <!-- PAGINATION -->   <!-- PAGINATION -->   <!-- PAGINATION -->   <!-- PAGINATION -->




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

//LOGIN
if (isset($_POST['login'])) {
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];

    $user_acct = "select * from users where user_name='$user_name' AND user_pass='$user_pass'";
    $run_user = mysqli_query($connect, $user_acct);
    $check_user = mysqli_num_rows($run_user);
    
    if ($check_user==0) {
      
      $_SESSION['user_email'] = $user_email;
      echo "<script>alert('You logged in successfully!')</script>";
      //echo "<script>window.open('utilitymodel.php?','_self')</script>";
      $_SESSION['user_name'] = $user_name;
    }else{
      
      echo "<script>alert('Incorrect Username or Password. Please try again.')</script>";
    }
}

?>
