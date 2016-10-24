<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db_name = "Stock";


function insert_purchase ($bill_date, $bill_amount, $bill_image_link, $stock_id, $quantity) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);
	
	$conn->query("use ".$db_name);

	$bill_id = enter_bill($bill_date, $bill_amount, $bill_image_link);

	$sql = "INSERT INTO purchase_list (stock_id, quantity, bill_id) VALUES (".$stock_id.", ".$quantity.", ".$bill_id.")";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

function insert_new_stock ($bill_date, $bill_amount, $bill_image_link, $name, $description, $image_link, $quantity) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);
	
	$conn->query("use ".$db_name);

	$stock_id = define_new_stock($name, $description, $image_link);

	insert_purchase($bill_date, $bill_amount, $bill_image_link, $stock_id, $quantity);
}

function create_new_user($user_fullname, $u_name, $password, $email_id) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);

	$conn -> query("use ".$db_name);

	$sql = "INSERT INTO users (user_fullname, username, password, email_id) VALUES (\"".$user_fullname."\", \"".$u_name."\", \"".md5($password)."\", \"".$email_id."\")";

	$conn -> query($sql);

	$conn->close();
}

function login($u_name, $password) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);

	$conn -> query("use ".$db_name);

	$result = $conn -> query("select user_id from users where username = \"".$u_name."\" && password = \"".md5($password)."\"");
	if ($result->num_rows > 0) {
		$data = $result->fetch_assoc();
		$_SESSION["user_id"] = $data["user_id"];
		$conn->close();
		return TRUE;
	}
	else {
		$conn->close();
		return FALSE;
	}
}

function issue_stock ($user_id, $stock_id, $quantity, $return_date) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);
	
	$conn->query("use ".$db_name);

	$sql = "INSERT INTO issued_stock_list (user_id, stock_id, quantity, issue_date, return_date) VALUES (".$user_id.", ".$stock_id.", ".$quantity.", curdate(), \"".$return_date."\")";

	if ($conn->query($sql) === TRUE) {
	    echo "New issue request created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

function enter_bill ($bill_date, $bill_amount, $bill_image_link) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);
	
	$conn->query("use ".$db_name);

	$sql = "INSERT INTO bills (bill_date, bill_amount, bill_image_link) VALUES (\"".$bill_date."\", ".$bill_amount.", \"".$bill_image_link."\")";

	if ($conn->query($sql) === TRUE) {
		$result = $conn -> query("SELECT bill_id FROM bills WHERE bill_date = \"".$bill_date."\" && bill_amount = ".$bill_amount." && bill_image_link = \"".$bill_image_link."\"");
		if ($result->num_rows > 0) {
			$data = $result->fetch_assoc();
			$bill_id = $data["bill_id"];
			$conn->close();
			return $bill_id;
		}
	}
	$conn->close();
}

function define_new_stock ($name, $description, $image_link) {
	global $servername, $username, $pass, $db_name;
	$conn = new mysqli($servername, $username, $pass);
	
	$conn->query("use ".$db_name);

	$sql = "INSERT INTO stock_description (name, description, image_link) VALUES (\"".$name."\", ".$description.", \"".$image_link."\")";

	if ($conn->query($sql) === TRUE) {
		$result = $conn -> query("SELECT stock_id FROM stock_description WHERE name = \"".$name."\" && description = \"".$description."\" && image_link = \"".$image_link."\"");
		if ($result->num_rows > 0) {
			$data = $result->fetch_assoc();
			$stock_id = $data["stock_id"];
			$conn->close();
			return $stock_id;
		}
	}
	$conn->close();
}


function validate_input($data) {
  	$data = trim($data);
  	$data = stripslashes($data);
  	$data = htmlspecialchars($data);
  	return $data;
}

?>