<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		$student_id = $_POST['student_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		
		$query = "UPDATE `student` SET `firstname` = :firstname, `lastname` = :lastname, `gender` = :gender, `address` = :address WHERE `student_id` = :student_id";
		
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':gender', $gender);
		$stmt->bindParam(':address', $address);
		$stmt->bindParam(':student_id', $student_id);
		
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
		
	}
?>