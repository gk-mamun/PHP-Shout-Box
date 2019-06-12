<?php  
  include 'db.php';

  // Check the form is submitted or not
  if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['user']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Set the timezone
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time = date('h:i:s a', time());

    // Validation 
    if(!isset($user) || $user == '' || !isset($message) || $message == '') {
      $error = "Please enter your name and message";
      header("Location: index.php?error=".urlencode($error));
      exit();
    } else {
      $query = "INSERT INTO shouts (user, message, time)
                VALUES('$user', '$message', '$time')";
      
      if(!mysqli_query($conn, $query)){
        die('Error: '.mysqli_error($conn));
      } else {
        header('Location: index.php');
        exit();
      }
    }
  }