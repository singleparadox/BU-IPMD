<?php
session_start();
include ("../db.php");

	if(isset($_POST['update']))
	{
		$um_id	  = $_POST["um_id"];
		$um_reg_no	  = $_POST["um_reg_no"];
		$um_title   = $_POST["um_title"];
		$um_inventor   = $_POST["um_inventor"];
		$um_issue_date    = $_POST["um_issue_date"];
		$um_filing_date    = $_POST["um_filing_date"];
		$um_publication_date   = $_POST["um_publication_date"];
		$um_year    = $_POST["um_year"];
		
		if(empty($_POST["um_agency"])){
			$um_agency= $_SESSION["agen_id"];
		}
		else if (!empty($_POST["um_agency"])){
			$um_agency   = $_POST["um_agency"];
		}

		if(empty($_POST["um_category"])){
			$um_category= $_SESSION['catn_id'];
		}
		else if (!empty($_POST["um_category"])){
			$um_category = $_POST["um_category"];
		}

		if(empty($_POST["um_status"])){
			$um_status= $_SESSION['statn_id'];
		}
		else if (!empty($_POST["um_status"])){
			$um_status   = $_POST["um_status"];
		} 
		
              
		

	$statement = mysqli_query($connect, "UPDATE utility_model SET um_reg_no='".$um_reg_no."', um_title='".$um_title."', agency_id='".$um_agency."', category_id='".$um_category."', um_issue_date='".$um_issue_date."', um_filing_date='".$um_filing_date."', um_publication_date='".$um_publication_date."', um_year='".$um_year."', filestatus_id='".$um_status."', um_inventor='".$um_inventor."' WHERE um_id='".$um_id."'") or die("Error: ".mysqli_error($connect));

	if($statement){
		echo'<script>
		alert("Record Updated!");
		window.location.href="../../utilitymodel.php";
		</script>';
	}	

	else{
		header("location: umupdate.php?error");
	}
}
?>