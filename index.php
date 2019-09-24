<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM user_tbl WHERE userid=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$username = $n['username'];
			$password = $n['password'];
			$userlvl = $n['userlvl'];

		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>USER INFORMATION </title>
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

<?php $results = mysqli_query($db, "SELECT * FROM user_tbl"); ?>

<table>
	<thead>
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Userlvl</th>
			
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><?php echo $row['userlvl']; ?></td>
			
			<td>
				<a href="index.php?edit=<?php echo $row['userid']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['userid']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="text" name="password" value="<?php echo $password; ?>">
	</div>
	<div class="input-group">
		<label>User Level</label>
		<input type="number" name="userlvl" value="<?php echo $userlvl ; ?>">
	</div>
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