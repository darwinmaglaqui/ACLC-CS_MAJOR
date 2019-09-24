<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'csmajor');

	// initialize variables
	$pname = "";
	$description = "";
	$date = "DATE: Auto CURDATE()";
	$id = 0;
	$stock = "";
	$update = false;
	//$image = "";
	$msg = "";
	//$date = now();
	if (isset($_POST['save'])) {
		$pname = $_POST['pname'];
		$description = $_POST['description'];
		$date = $_POST['date'];
		$stock = $_POST['stock'];
			$image = $_FILES['image']['name'];
			$target = "images/".basename($image);


		mysqli_query($db, "INSERT INTO product_tbl (pname, description, date,stock,img) VALUES ('$pname', '$description', '$date', '$stock','$image')"); 

			

		$_SESSION['message'] = "Saved"; 
		
		header('location: product.php');
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
		

	}

	if (isset($_POST['update'])) {
		$pname = $_POST['pname'];
		$description = $_POST['description'];
		$date = $_POST['date'];
		$stock = $_POST['stock'];


		mysqli_query($db, "UPDATE product_tbl SET pname='$pname', description='$description', date = '$date', stock = '$stock' WHERE id=$id");
		$_SESSION['message'] = "Successfully updated!"; 
		header('location: product.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM product_tbl WHERE id=$id");
	$_SESSION['message'] = "deleted!"; 
	header('location: product.php');
}


	$results = mysqli_query($db, "SELECT * FROM product_tbl");


?>