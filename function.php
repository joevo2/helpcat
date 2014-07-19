<?php
  include "con.php";

	#Commonly used SQL function
	#Use default value to create function with optional parameter
	function queryDisplay($result,$rowCount = -1) {
		if ($rowCount == -1) {
			$rowCount = mysqli_num_rows($result);
		}
		for ($x=0; $x < $rowCount; $x++) {
			$row = mysqli_fetch_row($result);
			for ($i=0; $i < count($row); $i++) {
					echo $row[$i] . " ";
			}
			echo "<br>";
		}
	}

  function queryItem($con, $table, $col, $item) {
		if (is_array($col) && is_array($item)) {
			$query = "SELECT * FROM $table WHERE ";
			for ($i=0; $i < count($item); $i++) {
				$query .= $col[$i] . " = '" . $item[$i] . "'";
				if ($i != count($item)-1) {
					$query .= " AND ";
				}
			}
		}
		else {
			$query = "SELECT * FROM $table WHERE $col = '$item'";
		}
		$result = mysqli_query($con, $query) or die(mysqli_error($con));

		return $result;
	}

	function queryAll($con, $table) {
		$query = "SELECT * FROM $table";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));

		return $result;
	}

    //Index.php logic
    $issue = $loc = $tag = $sql = "";
    $userid = 0;

    if (!empty($_POST['issue']) && !empty($_POST['loc']) && !empty($_POST['tag'])) {
      // escape variables for security
      $issue = mysqli_real_escape_string($con, $_POST['issue']);
      $loc = mysqli_real_escape_string($con, $_POST['loc']);
      $tag = mysqli_real_escape_string($con, $_POST['tag']);

      //To be implement as the post is associated to the user
      $_SESSION['id'] = 1;
      $userid = $_SESSION['id'];

      $sql="INSERT INTO complaint (issue, location, tag, userid)
      VALUES ('$issue', '$loc', '$tag', $userid)";

      if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
      }
    }

    //Sign up logic
    $email = $password = $cpassword = "";

    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['cpassword'])) {
      // escape variables for security
      $email = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['password']);
      $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

      //email validation
      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      //password length validation
        if (strlen($password) >= 8) {
          if ($password == $cpassword) {
            $sql="INSERT INTO user (email, password)
            VALUES ('$email', '$password')";
            if (mysqli_query($con,$sql)) {
              header('Location: success.php');
            } else {
              die('Error: ' . mysqli_error($con));
            }
          } else {
            $_SESSION['error'] = "Password does not match";
          }
        } else {
          $_SESSION['error'] = "Password must be more than 8 character";
        }
      } else {
        $_SESSION['error'] = "Wrong email format";
      }
    }

    //Sign in logic
    $email = $password = "";
    $_SESSION['error'] = "";

    //Check form for non empty field and assigned to variable
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

      //Read from database and check password
      $result = mysqli_query($con,"SELECT * FROM user");
      while($row = mysqli_fetch_array($result)) {
        if ($email == $row['email'] && $password == $row['password']) {
          $_SESSION['signin'] = true;
          $_SESSION['user'] = $row['email'];
          $_SESSION['type'] = $row['type'];
          header('Location: index.php');
        } else {
          $_SESSION['error'] = "Wrong username or password";
        }
      }
    }

?>
