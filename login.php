<?php
session_start();

require_once "functions.php";

$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}

$_SESSION['discard_after'] = $now + 3600;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["u_name"]) && isset($_POST["password"])) {
		if (login($_POST["u_name"], $_POST["password"]) != TRUE) {
			$_SESSION["login_error"] = "INVALID USERNAME OR PASSWORD";
			header("Location: index.php");
		}
		else {
			$user_type = check_user_type();
			if ($user_type == 'student') {
				header("Location: home-student.php");
			}
			else if ($user_type == 'admin') {
				header("Location: home.php");
			}
			else {
				header("Location: index.php");
			}
		}
	}
}
else {
	header("Location: index.php");
}
?>