<?php session_start(); include "logic/indexlogic.php";?>
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

    .email {
      text-decoration: none;
      color: white;
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

    .vote {
      margin: 0 auto;
      width: 60px;
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
      <div>
      <?php
        $result = mysqli_query($con,"SELECT * FROM complaint ORDER BY timestamp DESC");
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
          print "<a class='email' href='mailto:".$row['email']."' target='_top'>"
          . $row['email'] . "</a>";
          print "<br>\n";
          print $row['timestamp'];
      ?>
          <br>
          </div>
          <div class='delete'>
            <form method='post' class="form">
              <input type="hidden" name="delete_id" value="<?php print $row['id']; ?>">
              <input type="submit" class='suggestbutton' name="up" value="Up">

              <?php
                print "<div class='vote'>Vote: ".$row['vote']."</div>";
              ?>
              <input type="submit" class='suggestbutton' name="down" value="Down">
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
