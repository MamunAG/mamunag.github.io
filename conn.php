<?php
	$conn = new PDO('sqlite:db/db_student.sqlite3');
 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
	$query = "CREATE TABLE IF NOT EXISTS student (student_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, firstname TEXT, lastname TEXT, gender TEXT, address TEXT)";
 
	$conn->exec($query);
?>