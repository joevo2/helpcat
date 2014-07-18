<?php
  session_start();
  //if logged in then redirect to index.php
  if (isset($_SESSION['signin'])) {
    header('Location: index.php');
  }
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
      //Sign up logic
      include "function.php";

      if (!empty($_SESSION['error'])) {echo $_SESSION['error'];}
    ?>
    <form method='post'>
      <input type='text' name='email' placeholder='Email'><br>
      <input type='password' name='password' placeholder='Password'><br>
      <input type='password' name='cpassword' placeholder='Confirm Password'><br>
      <input type='submit' value="Sign Up"><br>
    </form>
  </body>
</html>
<?php session_destroy(); ?>
