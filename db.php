<?php 
  // Create variables
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "shoutbox";

  // Connect to database
  $conn = mysqli_connect($host, $user, $pass, $dbname);

  // Test Connection
  if(mysqli_connect_errno()){
    die('Failed to Connect to Mysqli: '.mysqli_connect_error());
  }