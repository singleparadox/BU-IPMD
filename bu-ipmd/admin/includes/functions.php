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
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $confirm_pass=$_POST['confirm_pass'];

    if($user_pass==$confirm_pass){
      $user_pass = md5($confirm_pass);
      $user_firstname = $_POST['user_firstname'];
      $user_lastname = $_POST['user_lastname'];
      $account_type = $_POST['account_type'];
      $user_position = $_POST['user_position'];

      $insert = "INSERT INTO users (user_name,user_pass,user_firstname,user_lastname,account_type,user_position) VALUES ('$user_name','$user_pass','$user_firstname','$user_lastname','$account_type','$user_position')";

      $insert_user=mysqli_query($connect,$insert);
      echo "<script>alert('Successfully added a new account.')</script>";
      echo "<script>window.open('../dashboard.php?','_self')</script>";
    }
    else{
      echo "<script>alert('Passwords do not match. Please try again.')</script>";
      echo "<script>window.open('../dashboard.php?','_self')</script>";
    }
  }
}
?>