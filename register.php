<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION["username"] !== '') {
	header("location:dashboard.php");
}

$_SESSION["currentPage"] = "Register";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Register</title>
		<!-- Bootstrap 3 -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php include 'navbar.php'; ?>
		<div style="width:400px; max-width: 90%; margin: 0 auto;">
			<form action="registration.php" method="GET">
				<label for="email">Email</label><input class="form-control" type="text" name="email">
				<label for="username">Username</label><input class="form-control" type="text" name="username">
				<label for="password">Password</label><input class="form-control" type="password" name="password"><br>
				<input type="submit" class="btn btn-success btn-lg">
			</form>
		</div>
	</body>
</html>