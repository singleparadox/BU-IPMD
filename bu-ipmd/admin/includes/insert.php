<?php
if(isset($_SESSION)){
  
}
else{
  session_start();
}

include("db.php");

if(!isset($_SESSION['user_name'])){
  
}

else{
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_id=$_SESSION['user_id'];
    $task_name=$_POST['task_name'];
    $task_desc=$_POST['task_desc'];
    $task_progress_id='1';
    $task_taggedto=$_POST['task_taggedto'];
    $task_taggedby=$user_id;

    $insert_new_task = "INSERT INTO task (task_name,task_desc,task_progress_id,task_taggedto,task_tagby) VALUES ('$task_name','$task_desc','$task_progress_id','$task_taggedto','$task_taggedby')";

    $insert_task=mysqli_query($connect,$insert_new_task);
    echo "<script>alert('Successfully added a new task.')</script>";
    echo "<script>window.open('../tasks.php?','_self')</script>";
  }
}
?>