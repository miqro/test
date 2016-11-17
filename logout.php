<?php
session_start();

if (isset($_SESSION["username"]) && $_SESSION["username"] !== '') {
	session_unset($_SESSION["username"]);
	header("location:home.php");
}
else {
	header("location:home.php");
}

?>