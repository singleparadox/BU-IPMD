<?php
session_start();
include_once("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>alert('You are not allowed to be here!')</script>";
  echo "<script>window.open('../../index.php?','_self')</script>";
}

	if(isset($_GET['delete']))
	{
		$invention_id = $_GET["invention_id"];
	}
		$query1 = mysqli_query($connect, "DELETE FROM invention_remarks WHERE invention_id = '".$_GET['invention_id']."'");
 		$query = mysqli_query($connect, "DELETE FROM invention WHERE invention_id = '".$_GET['invention_id']."'");

if ($query1){
	if($query){
		echo'<script>
		alert("Sucessfully Deleted!");
		window.location.href="../../invention.php";
		</script>';

	}
}	 

	else{
		echo'<script>
		alert("Error in Deleting!");
		window.location.href="../../invention.php";
		</script>';

	}
?>