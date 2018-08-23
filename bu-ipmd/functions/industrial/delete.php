<?php
session_start();
include_once("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>alert('You are not allowed to be here!')</script>";
  echo "<script>window.open('../../index.php?','_self')</script>";
}

	if(isset($_GET['delete']))
	{
		$industrial_id = $_GET["industrial_id"];
	}

 		$query = mysqli_query($connect, "DELETE FROM industrial_design WHERE industrial_id = '".$_GET['industrial_id']."'");

	if($query){
		echo'<script>
		alert("Sucessfully Deleted!");
		window.location.href="../../industrialdesign.php";
		</script>';

	}	 

	else{
		echo'<script>
		alert("Error in Deleting!");
		window.location.href="../../industrialdesign.php";
		</script>';

	}
?>