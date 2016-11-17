<?php
session_start();

// Database connection
$link = mysqli_connect("localhost", "root", "", "test") or die("Failed to connect to database.");

// Function that checks if email exists
function in_use($compareTo, $input) {
	global $link;
	$query = "SELECT * FROM user WHERE $compareTo='$input'";
	$result = mysqli_query($link, $query);
	if(mysqli_num_rows($result) == 1) {
		return True;
	}
	else {
		return False;
	}
}

$errorCount = 0;

//Check if email field is empty
if(!isset($_GET["email"]) || empty($_GET["email"])) {
	$_SESSION["emptyEmailEnteredError"] = True;
	header("location:register.php");
	$errorCount++;
}
else {
	$_SESSION["emptyEmailEnteredError"] = False;
}

//Check if username field is empty
if(!isset($_GET["username"]) || empty($_GET["username"])) {
	$_SESSION["emptyUsernameEnteredError"] = True;
	header("location:register.php");
	$errorCount++;
}
else {
	$_SESSION["emptyUsernameEnteredError"] = False;
}

//Check if password field is empty
if(!isset($_GET["password"]) || empty($_GET["password"])) {
	$_SESSION["emptyPasswordEnteredError"] = True;
	header("location:register.php");
	$errorCount++;
}
else {
	$_SESSION["emptyPasswordEnteredError"] = False;
}

//Check if email is already in use
if(in_use("email", $_GET["email"])) {
	$_SESSION["emailInUseError"] = True;
	header("location:register.php");
	$errorCount++;
}
else {
	$_SESSION["emailInUseError"] = False;
}

//Check if username is alaready in use
if(in_use("username", $_GET["username"])) {
	$_SESSION["usernameInUseError"] = True;
	header("location:register.php");
	$errorCount++;
}
else {
	$_SESSION["usernameInUseError"] = False;
}

//If there are more than 0 wrong input fields, go back to register form
if($errorCount > 0) {
	header("location:register.php");
	die();
}
else {
	$errorCount = 0;
}

//Save new registered user to db
$email = $_GET["email"];
$username = $_GET["username"];
$password = $_GET["password"];

$query = "INSERT INTO user (email, username, password) VALUES('$email', '$username', '$password')";
$result = mysqli_query($link, $query);

if($result) {
	header("location:login.php");
}
else {
	$_SESSION["unknownError"] = True;
	header("location:register.php");
	die();
}



?>