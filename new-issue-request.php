<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_SESSION["user_id"])) {
		$_SESSION["user_not_found"] = "Login first";
		header("Location: index.php");
	}
	
	for ($i = 0; $i < 5; $i++) {
		if ($_POST["stock_id$i"] != "") {
			issue_stock($_SESSION["user_id"], $_POST["stock_id".$i.""], $_POST["quantity".$i.""], $_POST["return_date".$i.""]);
		}
	}
	header("Location: home.php");
}
?>