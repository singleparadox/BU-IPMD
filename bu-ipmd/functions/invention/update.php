<?php
session_start();
include ("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>window.open('../../404.php?','_self')</script>";
}

	if(isset($_POST['update']))
	{
		$invention_id	  = $_POST["invention_id"];
		$invention_application_no	  = $_POST["invention_application_no"];
		$invention_title   = $_POST["invention_title"];
		$invention_inventors   = $_POST["invention_inventors"];
		$invention_issue_date    = $_POST["invention_issue_date"];
		$invention_filing_date    = $_POST["invention_filing_date"];
		$invention_received_date   = $_POST["invention_received_date"];
		$invention_year    = $_POST["invention_year"];
		
		if(empty($_POST["invention_agency"])){
			$invention_agency= $_SESSION["agen_id"];
		}
		else if (!empty($_POST["invention_agency"])){
			$invention_agency   = $_POST["invention_agency"];
		}

		if(empty($_POST["invention_category"])){
			$invention_category= $_SESSION['catn_id'];
		}
		else if (!empty($_POST["invention_category"])){
			$invention_category = $_POST["invention_category"];
		}

		if(empty($_POST["invention_status"])){
			$invention_status= $_SESSION['statn_id'];
		}
		else if (!empty($_POST["invention_status"])){
			$invention_status   = $_POST["invention_status"];
		} 
		
              
		

	$statement = mysqli_query($connect, "UPDATE invention SET invention_application_no='".$invention_application_no."', invention_title='".$invention_title."', agency_id='".$invention_agency."', category_id='".$invention_category."', invention_issue_date='".$invention_issue_date."', invention_filing_date='".$invention_filing_date."', invention_received_date='".$invention_received_date."', invention_year='".$invention_year."', filestatus_id='".$invention_status."', invention_inventors='".$invention_inventors."' WHERE invention_id='".$invention_id."'") or die("Error: ".mysqli_error($connect));

	if($statement){
		echo'<script>
		alert("Record Updated!");
		window.location.href="../../invention.php";
		</script>';
	}	

	else{
		header("location:update.php?error");
	}
}
?>