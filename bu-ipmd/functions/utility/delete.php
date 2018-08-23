<?php
session_start();
include_once("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>window.open('../../404.php?','_self')</script>";
}
else{
	if(isset($_GET['delete']))
	{
		$um_id = $_GET["um_id"];
	}
		$rem_del = mysqli_query($connect, "DELETE FROM utility_remarks WHERE um_id = '".$_GET['um_id']."'");

 		$query = mysqli_query($connect, "DELETE FROM utility_model WHERE um_id = '".$_GET['um_id']."'");

	if($rem_del){
		if($query){
			echo'<script>
			alert("Sucessfully Deleted!");
			window.location.href="../../utilitymodel.php";
			</script>';
		}
	}	 

	else{
		echo'<script>
		alert("Error in Deleting!");
		window.location.href="../../utilitymodel.php";
		</script>';
	}
}
?>