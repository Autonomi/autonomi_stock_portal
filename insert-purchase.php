<html>
<body>
<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["stock_id"]) && isset($_POST["quantity"]) && isset($_POST["bill_number"])) {
		insert_purchase($_POST["stock_id"], $_POST["quantity"], $_POST["bill_number"]); ?>
<a href = "insert-purchase.php">
<button type = "button">
new entry
</button>
</a>
		<?php
	}
}
else {?>
<h2>insert the details of your latest purchases</h2>
<form action = "insert-purchase.php", method = "post">
Stock id: <input type = "text" name = "stock_id">
<br>
Quantity: <input type = "text" name = "quantity">
<br>
bill number: <input type = "text" name = "bill_number">
<br>
<button type = "submit">
	cool
</button>
</form>
<?php } ?>
</body>
</html>