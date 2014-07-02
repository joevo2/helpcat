<?php session_start(); include "function.php";?>
<html>
  <head>
    <title>Admin</title>
    <link rel='stylesheet' type="text/css" href="style.css">
  </head>
  <body>
    <a href='index.php'><h1>HELP CAT Suggestion and Issue</h1></a>
    <h1>Admin Panel</h1>
    <br>
    User:
    <?php
      queryDisplay(queryAll($con, "user"));
    ?>
  </body>
</html>
