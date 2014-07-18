<?php
  //if logged in then redirect to index.php
  if (isset($_SESSION['signin'])) {
    header('Location: index.php');
  }
  session_start();
?>
<html>
  <head>
    <title>Sign Up</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
    <a href='index.php'><h1>HELP CAT Suggestion and Issue</h1></a>
    <h1>Sign Up</h1>
    <?php
      include "function.php";
      $email = $password = $cpassword = "";

      if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
        // escape variables for security
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        //email validation
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //password length validation
          if (strlen($password) >= 8) {
            if ($password == $cpassword) {
              $sql="INSERT INTO user (email, password)
              VALUES ('$email', '$password')";
              if (mysqli_query($con,$sql)) {
                header('Location: success.php');
              } else {
                die('Error: ' . mysqli_error($con));
              }
            } else {
              $_SESSION['error'] = "Password does not match";
            }
          } else {
            $_SESSION['error'] = "Password must be more than 8 character";
          }
        } else {
          $_SESSION['error'] = "Wrong email format";
        }
      }
    ?>
    <?php if (!empty($_SESSION['error'])) {echo $_SESSION['error'];}?>
    <form method='post'>
      <input type='text' name='email' placeholder='Email'><br>
      <input type='password' name='password' placeholder='Password'><br>
      <input type='password' name='cpassword' placeholder='Confirm Password'><br>
      <input type='submit' value="Sign Up"><br>
    </form>
  </body>
</html>
<?php session_destroy(); ?>
