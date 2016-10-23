<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!isset($_SESSION["user_id"])) {
		$_SESSION["user_not_found"] = "Login first";
		header("Location: index.php");
	}
	$i = 0;
	
	if (isset($_POST["stock_id"]) && isset($_POST["quantity"]) && isset($_POST["return_date"])) {
		issue_stock($_SESSION["user_id"], $_POST["stock_id"], $_POST["quantity"], $_POST["return_date"]);
		$i++;
	}

	while (isset($_POST["stock_id".$i.""]) && isset($_POST["quantity".$i.""]) && isset($_POST["return_date".$i.""])) {
		issue_stock($_SESSION["user_id"], $_POST["stock_id".$i.""], $_POST["quantity".$i.""], $_POST["return_date".$i.""]);
		$i++;
	}
	header("Location: home.php");
}?>