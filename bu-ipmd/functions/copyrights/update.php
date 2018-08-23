<?php
session_start();
include_once("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>alert('You are not allowed to be here!')</script>";
  echo "<script>window.open('../../index.php?','_self')</script>";
}

	if(isset($_POST['update']))
	{
		$copyrights_id= $_POST["copyrights_id"];
		$copyrights_reg_no= $_POST["copyrights_reg_no"];
		$copyrights_title= $_POST["copyrights_title"];
        $agency_id=$_POST["agency_id"];
        $class_id=$_POST["class_id"];
        $category_id=$_POST["category_id"];
        $filestatus_id=$_POST["filestatus_id"];
        $copyrights_authors=$_POST["copyrights_authors"];
        $copyrights_owner=$_POST["copyrights_owner"];
        $copyrights_received_date=$_POST["copyrights_received_date"];
        $copyrights_reg_date=$_POST["copyrights_reg_date"];
        $copyrights_year=$_POST["copyrights_year"];
        $copyrights_issue_date=$_POST["copyrights_issue_date"];
        $copyrights_submitted_date=$_POST["copyrights_submitted_date"];
        $copyrights_created_date=$_POST["copyrights_created_date"];
        $copyrights_project_duration=$_POST["copyrights_project_duration"];
        $copyrights_fee=$_POST["copyrights_fee"];
        $copyrights_address=$_POST["copyrights_address"];
		
		if(empty($_POST["agency_id"])){
			$agency_id= $_SESSION["agen_id"];
		}
		else if (!empty($_POST["agency_id"])){
			$agency_id   = $_POST["agency_id"];
		}

		if(empty($_POST["class_id"])){
			$class_id= $_SESSION["class_id"];
		}
		else if (!empty($_POST["class_id"])){
			$class_id   = $_POST["class_id"];
		}

		if(empty($_POST["category_id"])){
			$category_id= $_SESSION['catn_id'];
		}
		else if (!empty($_POST["category_id"])){
			$category_id = $_POST["category_id"];
		}

		if(empty($_POST["filestatus_id"])){
			$filestatus_id= $_SESSION['statn_id'];
		}
		else if (!empty($_POST["filestatus_id"])){
			$filestatus_id  = $_POST["filestatus_id"];
		} 
		
              
		

	$statement = mysqli_query($connect, "UPDATE copyrights SET copyrights_reg_no='".$copyrights_reg_no."', copyrights_title='".$copyrights_title."', agency_id='".$agency_id."', class_id='".$class_id."', category_id='".$category_id."', filestatus_id='".$filestatus_id."', copyrights_authors='".$copyrights_authors."', copyrights_owner='".$copyrights_owner."', copyrights_received_date='".$copyrights_received_date."', copyrights_reg_date='".$copyrights_reg_date."', copyrights_year='".$copyrights_year."', copyrights_issue_date='".$copyrights_issue_date."', copyrights_submitted_date='".$copyrights_submitted_date."', copyrights_created_date='".$copyrights_created_date."', copyrights_project_duration='".$copyrights_project_duration."', copyrights_fee='".$copyrights_fee."', copyrights_address='".$copyrights_address."' WHERE copyrights_id='".$copyrights_id."'") or die("Error: ".mysqli_error($connect));

	if($statement){
		echo'<script>
		alert("Record Updated!");
		window.location.href="../../copyright.php";
		</script>';
	}	

	else{
		header("location:update.php?error");
	}
}
?>