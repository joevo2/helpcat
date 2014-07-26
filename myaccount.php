<?php
  //if is not sign in redirect to index
  session_start();
  if (empty($_SESSION['signin'])) {
    header('Location: index.php');
  }
  include "logic/function.php";
?>
<html>
  <head>
    <title>HELP CAT Suggestion and Issue</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
    <style>
     h2 {
       padding: 2% 5%;
       font-size: 40px;
       margin: 0 auto;
     }

     .button {
       background-color: rgba(229, 28, 35, 1);
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
    <main>
      <h2>My Account</h2>
      <div class="background">
        <h3>Change New Password</h3>
        <?php if (isset($_SESSION['error'])) {echo $_SESSION['error'];} ?>
        <form method='post'>
          <input type='password' name='epassword' placeholder='Existing Password' class="field"><br>
          <input type='password' name='password' placeholder='New Password' class="field"><br>
          <input type='password' name='cpassword' placeholder='Confirm Password' class="field"><br>
          <input type='submit' value="Change Password" class="button"><br>
        </form>
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
      </div>
    </main>
  </body>
</html>
