<?php session_start(); include "function.php";?>
<html>
  <head>
    <title>Admin</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
    <header>
      <a href='index.php'><h1>HELP CAT Suggestion and Issue</h1></a>
      <?php include "nav.php"; ?>
    </header>
    <main>
      <h1>Admin Panel</h1>
      <br>
      User:
      <?php
        queryDisplay(queryAll($con, "user"));
      ?>
    </main>
  </body>
</html>
