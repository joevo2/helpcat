<?php
  session_start();
  //if logged in then redirect to index.php
  if (empty($_SESSION['success'])) {
    header('Location: index.php');
  }
?>
<html>
  <head>
    <title>Success!</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
    <style>
      .success {
        max-width: 400px;
        margin: 100px auto;
        font-size: 25px;
        text-align: center;
      }

      a.here {
        color: #00AFFF;
      }
    </style>
  </head>
  <body>
    <header>
      <h1 id="title">HELP CAT Suggestion and Issue</h1>
      <?php include "nav.php"; ?>
    </header>
    <main>
      <p class = "success">
        Account successfully created<br>
        Please login <a href="signin.php" class='here'>HERE</a>
      </p>
    </main>
  </body>
</html>
<?php session_destroy(); ?>
