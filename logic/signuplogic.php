<?php
  include 'function.php';
  //Sign up logic
  $email = $password = $cpassword = "";

  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
      // escape variables for security
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
      //email validation
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Sticky email
        $_SESSION['stickyemail'] = $email;
        if (!empty($_POST['checkbox'])) {
        //password length validation
          if (strlen($password) >= 8) {
            if ($password == $cpassword) {
              $sql="INSERT INTO user (email, password)
              VALUES ('$email', '$password')";
              if (mysqli_query($con,$sql)) {
                header('Location: success.php');
                $_SESSION['success'] = true;
              } else
                die('Error: ' . mysqli_error($con));
            } else
              $_SESSION['error'] = "Password does not match";
          } else
            $_SESSION['error'] = "Password must be more than 8 character";
        } else
          $_SESSION['error'] = "Please accept the Terms and Condition";
      } else
        $_SESSION['error'] = "Wrong email format";
  }
?>
