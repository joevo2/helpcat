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
     .delete {
       vertical-align: top;
       width: 100px;
       display: inline-block;
     }

     .suggestbutton {
       max-width: 120px;
       margin: 10px;
     }

     .box {
       width: 85%;
       display: inline-block;

     }

     .form {
       margin: 0;
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
      <div>
      <?php
        //Delete post
        if(isset($_POST['delete'])) {
          $PID = $_POST['id'];
          mysqli_query($con,"DELETE FROM complaint WHERE id=$PID");
        }

        $result = mysqli_query($con,"SELECT * FROM complaint WHERE email='" . $_SESSION['user'] . "' ORDER BY timestamp DESC;");
        while($row = mysqli_fetch_array($result)) {
          print "<div class='textbox'>";
          print "<div class='box'>";
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
          </div>
            <div class='delete'>
              <form method='post' class="form">
                <input type="hidden" name="id" value="<?php print $row['id']; ?>">
                <input type="submit" class='suggestbutton' name="delete" value="Delete">
              </form>
            </div>
        </div>
      <?php
        } // end loop for fetching data from database
      ?>
      </div>
    </main>
  </body>
</html>
