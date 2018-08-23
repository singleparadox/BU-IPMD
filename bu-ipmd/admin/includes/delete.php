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

 		$query = mysqli_query($connect, "DELETE FROM utility_model WHERE um_id = '".$_GET['um_id']."'");

	if($query){
		echo'<script>
		alert("Sucessfully Deleted!");
		window.location.href="../../utilitymodel.php";
		</script>';

	}	 

	else{
		echo'<script>
		alert("Error in Deleting!");
		window.location.href="../../utilitymodel.php";
		</script>';

	}
}
?>