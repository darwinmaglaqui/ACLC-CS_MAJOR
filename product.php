<?php 
include('serverp.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM product_tbl WHERE id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$pname = $n['pname'];
			$description = $n['description'];
			$date = $n['date'];
			$stock = $n['stock'];
			$image = $n['img'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>PRODUCT INFORMATION </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM product_tbl"); ?>

<table>
	<thead>
		<tr>
			<th>Item</th>
			<th>Description</th>
			<th>Date</th>
			<th>Stocks</th>
			<th>image</th>
			
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['pname']; ?></td>
			<td><?php echo $row['description']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['stock']; ?></td>

			
			<td>
				<a href="product.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="serverp.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="serverp.php" enctype="multipart/form-data" >

	<input type="hidden" name="id" value="<?php echo $id; ?> req">

	<div class="input-group">
		<label>Item</label>
		<input type="text" name="pname" value="<?php echo $pname; ?>"required>
	</div>
	<div class="input-group">
		<label>Description</label>
		<input type="comment" name="description" value="<?php echo $description; ?>"required>
	</div>
	<!-- <div class="input-group">
		<label>Date Added</label>
		<input type="date" name="date" value="<?php echo $date ; ?>">
	</div> -->
	<div class="input-group">
		<label>Stocks</label>
		<input type="number" name="stock" value="<?php echo $stock ; ?>"required>
	</div>



	<div class="input-group">
		<label>Image</label>
		<div>
  	  <input type="file" name="image">
  		</div>


  		<div id="content">
  <?php
    while ($row = mysqli_fetch_array($results)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['img']."' >";
      	
      echo "</div>";
    }
  ?>


	<div class="input-group">




		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>





