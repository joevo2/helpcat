<?php
  session_start();
  //if logged in then redirect to index.php
  if (isset($_SESSION['signin'])) {
    header('Location: index.php');
  }
?>
<html>
  <head>
    <title>Sign In</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
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
    <h1>Sign In</h1>
    <?php
      include 'function.php';
      //Print error message
      if (!empty($_SESSION['error'])) {
        echo $_SESSION['error'];
      }?>
    <form method='post'>
      <input type='email' class="field" name='email'
      value='<?php if(isset($_SESSION['stickyemail'])) echo $_SESSION['stickyemail']; ?>'
      placeholder='Email'><br>
      <input type='password' name='password' placeholder='Password' class="field"><br>
      <input type='submit' value="Sign In" class="button"><br>
    </form>
    </div>
  </body>
</html>
