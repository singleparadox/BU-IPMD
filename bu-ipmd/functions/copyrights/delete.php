<?php
session_start();
include_once("../db.php");
if(!isset($_SESSION['user_name'])){
  echo "<script>alert('You are not allowed to be here!')</script>";
  echo "<script>window.open('../../index.php?','_self')</script>";
}

	if(isset($_GET['delete']))
	{
		$copyrights_id = $_GET["copyrights_id"];
	}
		$query1 = mysqli_query($connect, "DELETE FROM copyrights_remarks WHERE copyrights_id = '".$_GET['copyrights_id']."'");
 		$query = mysqli_query($connect, "DELETE FROM copyrights WHERE copyrights_id = '".$_GET['copyrights_id']."'");
 		
if ($query1){
	if($query){
			echo'<script>
			alert("Sucessfully Deleted!");
			window.location.href="../../copyright.php";
			</script>';

		}	 

}
	

	else{
		echo'<script>
		alert("Error in Deleting!");
		window.location.href="../../copyright.php";
		</script>';

	}
?>