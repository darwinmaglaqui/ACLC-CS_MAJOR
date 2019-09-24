<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'csmajor');

	// initialize variables
	$username = "";
	$password = "";
	$userlvl = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userlvl = $_POST['userlvl'];

		mysqli_query($db, "INSERT INTO user_tbl (username, password, userlvl) VALUES ('$username', '$password', '$userlvl')"); 
		$_SESSION['message'] = "Saved"; 
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$userlvl = $_POST['userlvl'];

		mysqli_query($db, "UPDATE user_tbl SET username='$username', password='$password', userlvl = '$userlvl' WHERE userid=$id");
		$_SESSION['message'] = "Successfully updated!"; 
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM user_tbl WHERE userid=$id");
	$_SESSION['message'] = "deleted!"; 
	header('location: index.php');
}


	$results = mysqli_query($db, "SELECT * FROM user_tbl");


?>