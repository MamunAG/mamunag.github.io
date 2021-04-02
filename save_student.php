<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		
		$query = "INSERT INTO `student` (firstname, lastname, gender, address) VALUES(:firstname, :lastname, :gender, :address)";
		
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':address', $address);
		
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
		
	}
?>