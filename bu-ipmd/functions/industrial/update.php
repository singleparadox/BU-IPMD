<?php
session_start();
include_once("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>alert('You are not allowed to be here!')</script>";
  echo "<script>window.open('../../index.php?','_self')</script>";
}

	if(isset($_POST['update']))
	{
		$industrial_id	  = $_POST["industrial_id"];
		$industrial_reg_no	  = $_POST["industrial_reg_no"];
		$industrial_title   = $_POST["industrial_title"];
		$inventor   = $_POST["inventor"];
		$industrial_issue_date    = $_POST["industrial_issue_date"];
		$industrial_filing_date    = $_POST["industrial_filing_date"];
		$industrial_publication_date   = $_POST["industrial_publication_date"];
		$industrial_design_year    = $_POST["industrial_design_year"];
		
		if(empty($_POST["agency_id"])){
			$agency_id= $_SESSION["agen_id"];
		}
		else if (!empty($_POST["agency_id"])){
			$agency_id   = $_POST["agency_id"];
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
		
              
		

	$statement = mysqli_query($connect, "UPDATE industrial_design SET industrial_reg_no='".$industrial_reg_no."', industrial_title='".$industrial_title."', agency_id='".$agency_id."', category_id='".$category_id."', industrial_issue_date='".$industrial_issue_date."', industrial_filing_date='".$industrial_filing_date."', industrial_publication_date='".$industrial_publication_date."', industrial_design_year='".$industrial_design_year."', filestatus_id='".$filestatus_id."', inventor='".$inventor."' WHERE industrial_id='".$industrial_id."'") or die("Error: ".mysqli_error($connect));

	if($statement){
		echo'<script>
		alert("Record Updated!");
		window.location.href="../../industrialdesign.php";
		</script>';
	}	

	else{
		header("location:update.php?error");
	}
}
?>