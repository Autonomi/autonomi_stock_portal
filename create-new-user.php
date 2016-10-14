<html>
<body>
<?php
require_once "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST["user_fullname"]) && isset($_POST["u_name"]) && isset($_POST["password"]) && isset($_POST["email_id"])) {
		create_new_user($_POST["user_fullname"], $_POST["u_name"], $_POST["password"], $_POST["email_id"]);
	}
}
else { ?>
<h2>insert details of the new user</h2>
<form action = "<?php echo validate_input($_SERVER['PHP_SELF']);?>", method = "post">
full name: <input type = "text" name = "user_fullname">
<br>
username: <input type = "text" name = "u_name">
<br>
password: <input type = "password" name = "password">
<br>
email id: <input type = "text" name = "email_id">
<br> 
<button type = "submit">
	create new user
</button>
</form>
<?php } ?>
</body>
</html>