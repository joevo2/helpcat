<?php session_start(); include "function.php";?>
<html>
  <head>
    <title>HELP CAT Suggestion and Issue</title>
    <link rel='stylesheet' type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <h1>HELP CAT Suggestion and Issue</h1>
      <nav>
        <a href='signup.php'>Sign Up</a>
        <a href='signin.php'>Sign In</a>
        <a href='admin.php'>Admin</a>
      </nav>
    </header>
    <main>

      <br>
      <h2>Issue Submition</h2>
      <form>
        <input type='text' placeholder='Issue'><br>
        <input type='text' placeholder='Location'><br>
        To insert multiple tag example "lab, toilet, room 517, library"<br>
        <input type='text' placeholder='tag'><br>
        <input type='submit' value="Submit"><br>
      </form>
      <?php
        queryDisplay(queryAll($con, "complaint"));
      ?>
    </main>
  </body>
</html>
