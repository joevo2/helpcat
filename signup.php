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
    <style>
      a.terms {
        color: #00AFFF;
      }
    </style>
  </head>
  <body>
    <div class="logonav">
        <div id="logo">HELP CAT</div>
    </div>
      <header>
      <h1 id="title">HELP CAT Suggestion and Issue</h1>
    <?php include "nav.php"; ?>
    </header>

    <div class="background">
    <h1>Sign Up</h1>
    <?php
      //Sign up logic
      include "logic/signuplogic.php";

      if (!empty($_SESSION['error'])) {
        echo $_SESSION['error'];
        $_SESSION['error'] = "";
      }
      if(!empty($_SESSION['stickyemail'])) {
        $email = $_SESSION['stickyemail'];
      }
    ?>
    <form method='post'>
      <input type='email' name='email' placeholder='Email' class="field" value='<?php print $email; ?>'><br>
      <input type='password' name='password' placeholder='Password' class="field"><br>
      <input type='password' name='cpassword' placeholder='Confirm Password' class="field"><br>
      <input type='checkbox' name='checkbox'>&nbsp I agree to to HELP CAT ISS <a class='terms' href='terms.php'>Terms</a><br>
      <input type='submit' value="Sign Up" class="button"><br>
    </form>
    </div>
  </body>
</html>
