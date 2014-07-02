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
?>
