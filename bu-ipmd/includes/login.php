<?php
if(isset($_SESSION)){
  
}
else{
  session_start();
}

include("db.php");

if(isset($_SESSION['user_name'])){
  echo "<script>window.open('index.php?','_self')</script>";
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $user_name=$_POST['user_name'];
  $user_pass=md5($_POST['user_pass']);

  $get_user = "SELECT * FROM users WHERE user_name='$user_name' AND user_pass='$user_pass'";
  $run_user = mysqli_query($connect, $get_user);
  while ($row_user=mysqli_fetch_assoc($run_user)) {
        $user_id = $row_user["user_id"];
        $user_name = $row_user["user_name"];
        if($row_user['account_type']==1){
          $_SESSION['acc_type']='admin';
        }
        else{
          $_SESSION['acc_type']='user';
        }
  }

  if ($check_user = mysqli_num_rows($run_user)){
    $datenow = date('Y-m-d H:i:s');
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $insert_date="UPDATE users SET user_lastloginn = now() WHERE user_id = '$user_id'";
    $insert_date_que=mysqli_query($connect,$insert_date);
    echo "<script>alert('You logged in successfully!')</script>";
    echo "<script>window.open('../login.php?','_self')</script>";    
  }
  else{ 
    echo "<script>alert('Incorrect Username or Password. Please try again.')</script>";
    echo "<script>window.open('../login.php?','_self')</script>";    
  }
}

?>