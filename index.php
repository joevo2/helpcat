<?php session_start(); include "function.php";?>
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
      <h2>Issue and Suggestion</h2>
        <?php
        //if is signed in only show the form
        if (isset($_SESSION['signin'])) {
          if (!empty($_SESSION['error'])) {
            echo $_SESSION['error'];
            $_SESSION['error'] = "";
          }?>
      <div class="tbox">
        <form method='post'>
          <input type='text' name='issue' placeholder='Issue' class="recbox">
          <input type='text' name='loc' placeholder='Location' class="recbox">
        <input type='text' name='tag' placeholder='tag' class="recbox">
            <input type='submit' value="Suggest!" class="suggestbutton"><br>
          To insert multiple tag separte with comma<br>
          Example "lab, toilet, room 517, library"<br>
        </form>
      </div>
      <?php }// end if ?>
      <div class="col-2">
      <?php
        $result = mysqli_query($con,"SELECT * FROM complaint ORDER BY timestamp DESC");

        while($row = mysqli_fetch_array($result)) {
          echo "<div class='textbox'>";
          echo "<div class='p'>";
          echo $row['issue'];
          echo "</div>";
          echo "<br>";
          echo $row['location'];
          echo "<br>";
          echo $row['tag'];
          echo "<br>";
          echo $row['email'];
          echo "<br>";
          echo $row['timestamp'];
          echo "<br>";
          echo "</div>";
          if(isset($_POST['up'])) {
            mysqli_query($con,"UPDATE complaint SET vote=vote+1 WHERE id=".$row['id'].";");
          }

          if(isset($_POST['down'])) {
            mysqli_query($con,"UPDATE complaint SET vote=vote-1 WHERE id=".$row['id'].";");
          }
        }
      ?>
      </div>


    </main>
  </body>
</html>
