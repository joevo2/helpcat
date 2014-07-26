<?php
  if (!empty($_POST['epassword']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
    // escape variables for security
    $epassword = mysqli_real_escape_string($con, $_POST['epassword']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //fetch data from database
    $result = mysqli_query($con,"SELECT * FROM user WHERE email='".$_SESSION['user']."'");
    while($row = mysqli_fetch_array($result)) {
      //Check password for security
      if ($epassword == $row['password']) {
        //confirm password
        if ($password == $cpassword) {
          //Insert new password into database
          $sql = "UPDATE user SET password='".$password."' WHERE email='".$_SESSION['user']."'";
          if (mysqli_query($con,$sql)) {
            $_SESSION['error'] = "Password changed";
          } else
            die('Error: ' . mysqli_error($con));
        } else
          $_SESSION['error'] = "Password does not match";
      } else
        $_SESSION['error'] = "Wrong existing password";
    }
  }
?>
