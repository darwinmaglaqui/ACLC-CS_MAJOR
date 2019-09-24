<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>main form</title>
    <link rel="stylesheet" type="text/css" href="user.css">
   
</head>
<body>

	<?php
   include('session.php')
   ?>


<h1>Welcome <?php echo $login_session; ?></h1> 
<form action="user.php" method="post">
    <input type="submit" value="User">
</form>

<form action="product.php" method="post">
    <input type="submit" value="Product">
</form>

<form action="reports.php" method="post">
    <input type="submit" value="Reports">
</form>

</body>
</html>

