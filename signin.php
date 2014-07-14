<?php session_start(); ?>
<html>
  <head>
    <title>Sign In</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
    <a href='index.php'><h1>HELP CAT Suggestion and Issue</h1></a>
    <h1>Sign In</h1>
    <?php
      include "function.php";
      $email = $password = "";

      //Check form for non empty field and assigned to variable
      if (!empty($_POST['email']) && !empty($_POST['password'])) {
        // escape variables for security
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
      }

      //Read from database and check password
      $result = mysqli_query($con,"SELECT * FROM user");
      while($row = mysqli_fetch_array($result)) {
        echo $row['email'] . " " . $row['password'];
        echo "<br>";
        if ($email == $row['email'] && $password == $row['password']) {
          $_SESSION['signin'] = true;
          break;
          //header('Location: index.php');
        }
      }
    ?>
    <?php if (!empty($_SESSION['signin'])) {echo $_SESSION['signin'];}?>
    <form  method='post'>
      <input type='text' placeholder='Email'><br>
      <input type='text' placeholder='Password'><br>
      <input type='submit' value="Sign In"><br>
    </form>
  </body>
</html>
