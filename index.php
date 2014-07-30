<?php session_start(); include "logic/indexlogic.php";?>
<html>
  <head>
    <title>HELP CAT Suggestion and Issue</title>
    <link rel='stylesheet' type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width">
    <style>
    .form {
      margin: 0;
    }

    .vote {
      margin: 0 auto;
      width: 80px;
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
      <?php }// end if

      //vote logic
      if(isset($_POST['up'])) {
        $PID = $_POST['id'];
        mysqli_query($con,"UPDATE complaint SET vote = vote+1 WHERE id=$PID");
      }
      if(isset($_POST['down'])) {
        $PID = $_POST['id'];
        mysqli_query($con,"UPDATE complaint SET vote = vote-1 WHERE id=$PID");
      }
      ?>
      <div>
      <?php
        $result = mysqli_query($con,"SELECT * FROM complaint ORDER BY vote DESC, timestamp DESC ");
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
          <div class='deletebox'>
            <form method='post' class="form">
              <input type="hidden" name="id" value="<?php print $row['id']; ?>">
              <input type="submit" class='deletebutton' name="up" value="Up">
              <?php
                print "<div class='vote'>Vote: ".$row['vote']."</div>";
              ?>
              <input type="submit" class='deletebutton' name="down" value="Down">
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
