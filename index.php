<?php session_start(); include "function.php";?>
<html>
  <head>
    <title>HELP CAT Suggestion and Issue</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
  </head>
  <body>
    <header>
      <h1>HELP CAT Suggestion and Issue</h1>
      <?php include "nav.php"; ?>
    </header>
    <main>
      <h2>Issue and Suggestion</h2>
      <form method='post'>
        <input type='text' name='issue' placeholder='Issue'><br>
        <input type='text' name='loc' placeholder='Location'><br>
        To insert multiple tag separte with comma<br>
        Example "lab, toilet, room 517, library"<br>
        <input type='text' name='tag' placeholder='tag'><br>
        <input type='submit' value="Submit"><br>
      </form>
      <?php
        echo "SQL: ".$sql."<br><br>";
        queryDisplay(queryAll($con, "complaint"));
      ?>
    </main>
  </body>
</html>
