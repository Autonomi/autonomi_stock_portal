<?php
require_once "functions.php";

echo implode(" ",$_POST);

for ($i = 0; $i < 5; $i++) {
	if ($_POST["stock_id$i"] != "") {
		issue_stock($_SESSION["user_id"], $_POST["stock_id".$i.""], $_POST["quantity".$i.""], $_POST["return_date".$i.""]);
	}
}

?>