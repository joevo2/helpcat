<?php
  //if is not sign in redirect to index
  session_start();
  if (empty($_SESSION['signin'])) {
    header('Location: index.php');
  }
  include "logic/function.php";
?>
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
      <h2>My Issue</h2>
      <div class="col-2">
      <?php
        //Delete post
        if(isset($_POST['delete'])) {
          $PID = $_POST['delete_id'];
          mysqli_query($con,"DELETE FROM complaint WHERE id=$PID");
        }

        $result = mysqli_query($con,"SELECT * FROM complaint WHERE email='" . $_SESSION['user'] . "' ORDER BY timestamp DESC;");
        while($row = mysqli_fetch_array($result)) {
          print "<div class='textbox'>";
          print "<div class='p'>";
          print $row['issue'];
          print "</div>";
          print "<br>\n";
          print $row['location'];
          print "<br>\n";
          print $row['tag'];
          print "<br>\n";
          print $row['email'];
          print "<br>\n";
          print $row['timestamp'];
          ?>
          <br>
          <form method='post'>
          <input type="hidden" name="delete_id" value="<?php print $row['id']; ?>">
          <input type="submit" class='suggestbutton' name="delete" value="Delete">
        </form>
        </div>
      <?php
        } // end loop for fetching data from database
      ?>
      </div>
    </main>
  </body>
</html>
