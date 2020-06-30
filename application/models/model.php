<?php
	function getEmployees(){
		include 'include/konekDb.php';
		$query = "SELECT * FROM employees";
		$result = $conn->query($query);
		return $result;
	}

	function getLogin(){
		include 'include/konekDb.php';
		$query = "SELECT * FROM student";
		$result = $db->query($query);	
		return $result;
		
	}

	function getUser($email){
		include 'include/konekDb.php';
		$sql = "SELECT * FROM user WHERE email = '$email'";
		$result = $db->query($sql)->fetchAll();
		return $result;
	}
	
?>