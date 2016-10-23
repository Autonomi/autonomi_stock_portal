<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["u_name"]) && isset($_POST["password"])) {
		if (login($_POST["u_name"], $_POST["password"]) != TRUE) {
			$_SESSION["login_error"] = "INVALID USERNAME OR PASSWORD";
			header("Location: index.php");
		}
		else {
			header("Location: home.php");
		}
	}
}
?>