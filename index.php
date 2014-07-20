<?php session_start(); include "function.php";?>
<html>
  <head>
    <title>HELP CAT Suggestion and Issue</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
    <style>
      main {
        display: inline-block;
      }
      .col-1 {
        border: solid black;
        padding: 20px;
        width: 35%;
        float: left;
        margin: 10px;
        border-radius:5px;
      }

      .col-2 {
        width: 60%;
        float: left;
        margin: 20px 10px;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>HELP CAT Suggestion and Issue</h1>
      <?php include "nav.php"; ?>
    </header>
    <main>
      <h2>Issue and Suggestion</h2>
      <h3>Latest | Highest Vote</h3>
      <div class="col-2">
      <?php
        //Debug
        //echo "SQL: ".$sql."<br><br>";
        queryDisplay(queryAll($con, "complaint"));
      ?>
      </div>

      <?php
        //if is signed in only show the form
        if (isset($_SESSION['signin'])) {?>
      <div class="col-1">
        <form method='post'>
          <input type='text' name='issue' placeholder='Issue'><br>
          <input type='text' name='loc' placeholder='Location'><br>
          To insert multiple tag separte with comma<br>
          Example "lab, toilet, room 517, library"<br>
          <input type='text' name='tag' placeholder='tag'><br>
          <input type='submit' value="Submit"><br>
        </form>
      </div>
      <?php }// end if ?>
    </main>
  </body>
</html>
