<?php

	function insert_column($table, $column_name, $type, $dbh) {
		$query = "ALTER TABLE {$table} ADD COLUMN :column_name :type";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':column_name', $column_name, PDO::PARAM_STR);
		$stmt->bindParam(':type', $type, PDO::PARAM_STR);
		$stmt->execute();
	}

	/*function insert_values($table, $array, $dbh) {
		$values = null;
		$length = count($array);
		for ($i = 0; $i < $length-1; $i++) {
			$values = $values . "'{" . $array[$i] . "}', " ;
		}
		$values = $values . "'{" . $array[$length-1] . "}'";
		$values = "(" . $values . ")";
		$column_name = array();
		$column_name = name_of_column($table, $dbh);
		
		echo $values . '</br>' . $column . '</br>';

		$query = "INSERT INTO {$table} :column VALUES :values";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':column', $column, PDO::PARAM_STR);
		$stmt->bindParam(':values', $values, PDO::PARAM_STR);
		echo $query . '</br>';
		$stmt->execute();
		$err = $stmt->errorInfo();
		print_r($err);
		
		return 1;
	}*/

	function name_of_column($table, $dbh) {
		$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = :table";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':table', $table, PDO::PARAM_STR);
		$stmt->execute();
		$output = array();
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$output[] = $row['COLUMN_NAME'];
		}

		return $output;
	}

	function login($username, $pass, $dbh) {
		$table = "cms";
		$query = "SELECT * FROM {$table} WHERE username = :username AND password = :pass";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->rowCount();
		if (($row) == 1) {
			return 1;
		} else {
			return 0;
		}
	}

	function check_user($username, $table, $dbh) {
		$query = "SELECT * FROM {$table} WHERE username = :username";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':username', $username, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->rowCount();
		if ($row == 1) {
			return 1;
		} else {
			return 0;
		}
	}
		
	function check_id($email_id, $table, $dbh) {
		$query = "SELECT * FROM {$table} WHERE email_id = :id";
		$stmt = $dbh->prepare($query);
		$stmt->bindParam(':id', $email_id, PDO::PARAM_STR);
		$stmt->execute();
		$row = $stmt->rowCount();
		if ($row == 1) {
			return 1;
		} else {
			return 0;
		}
	}

?>
