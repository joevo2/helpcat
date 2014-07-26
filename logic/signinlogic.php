<?php
  include 'function.php';

  //Sign in logic
  $email = $password = "";
  $_SESSION['error'] = "";

  //Check form for non empty field and assigned to variable
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Read from database and check password
    $result = mysqli_query($con,"SELECT * FROM user");
    while($row = mysqli_fetch_array($result)) {
      if ($email == $row['email'] && $password == $row['password']) {
        $_SESSION['signin'] = true;
        $_SESSION['user'] = $row['email'];
        $_SESSION['type'] = $row['type'];
        header('Location: index.php');
      } else {
        $_SESSION['error'] = "Wrong username or password";
      }
    }
    $_SESSION['stickyemail'] = $_POST['email'];
  }
?>
