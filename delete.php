<?php
	require_once 'conn.php';
	
	if(ISSET($_REQUEST['id'])){
		$query = "DELETE FROM `student` WHERE student_id = '$_REQUEST[id]'";
		$stmt = $conn->prepare($query);
		$stmt->execute();
		$conn = null;
		
		header('location: index.php');
	}

?>