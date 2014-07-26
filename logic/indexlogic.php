<?php
  include 'function.php';
  //Index.php logic
  $issue = $loc = $tag = $sql = "";
  $userid = 0;

  if (!empty($_POST['issue']) && !empty($_POST['loc']) && !empty($_POST['tag'])) {
    // escape variables for security
    $issue = mysqli_real_escape_string($con, $_POST['issue']);
    $loc = mysqli_real_escape_string($con, $_POST['loc']);
    $tag = mysqli_real_escape_string($con, $_POST['tag']);

    //To be implement as the post is associated to the user
    $email = $_SESSION['user'];

    $sql="INSERT INTO complaint (issue, location, tag, email, vote)
    VALUES ('$issue', '$loc', '$tag', '$email', 0)";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
  }
?>
