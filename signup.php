<?php session_start(); ?>
<html>
  <head>
    <title>Sign Up</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
    <a href='index.php'><h1>HELP CAT Suggestion and Issue</h1></a>
    <h1>Sign Up</h1>
    <form>
      <input type='text' placeholder='Email'><br>
      <input type='text' placeholder='Password'><br>
      <input type='text' placeholder='Confirm Password'><br>
      <input type='submit' value="Sign Up"><br>
    </form>
  </body>
</html>

<?php
  if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
    $_SESSION['emailErr'] = "Invalid email format";
  }
?>
