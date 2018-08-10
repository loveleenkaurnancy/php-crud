<?php
	include("config.php");
	session_start();
	$id=0;
	$name = "";
	$address = "";
	$update = false;


	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($con, "INSERT INTO student (name, address) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Address saved"; 
		header('location: index.php');
	}

	else if (isset($_GET['del'])) {
		$id = $_GET['del'];

		mysqli_query($con, "DELETE FROM student where id=$id"); 
		$_SESSION['message'] = "Address Deleted-"; 
		header('location: index.php');
	}

	else if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$address = $_POST['address'];

		mysqli_query($con, "UPDATE student SET name='$name', address='$address' where id=$id"); 
		$_SESSION['message'] = "Updated"; 
		header('location: index.php');
	}

?>