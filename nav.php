      <nav>
        <ul>
          <li><a href='index.php'>Home</a></li>

          <?php
            if(isset($_SESSION['user'])) {
              echo "<li><a href='myissue.php'>My Issue</a></li>" 
                    . "<li><a href='myaccount.php'>" . $_SESSION['user'] . "</a></li>"
                    . "<li><a href='signout.php'>Sign Out</a></li>";

              if(isset($_SESSION['type']) && $_SESSION['type'] == "admin")
                echo "<li><a href='http://localhost/~Joel/phpMyAdmin/'>Admin</a></li>";
            } else {
              echo "<li><a href='signup.php'>Sign Up</a></li>
                    <li><a href='signin.php'>Sign In</a></li>";
            }
          ?>
        </ul>
      </nav>
