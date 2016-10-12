<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "Stock";


function insert_purchase ($stock_id, $quantity, $bill_id) {
	global $servername, $username, $password, $db_name;
	$conn = new mysqli($servername, $username, $password);
	
	$conn->query("use ".$db_name);

	$sql = "INSERT INTO purchase_list (stock_id, quantity, bill_id) VALUES (".$stock_id.", ".$quantity.", ".$bill_id.")";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

function create_new_user($user_fullname, $u_name, $password, $email_id) {
	global $servername, $username, $password, $db_name;
	$conn = new mysqli($servername, $username, $password);

	$conn -> query("use ".$db_name);

	$sql = "INSERT INTO users (user_fullname, username, password, email_id) VALUES (\"".$user_fullname."\", \"".$u_name."\", \"".md5($password)."\", \"".$email_id."\")";

	if ($conn -> query($sql) === TRUE) {
		echo "New User Created";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

function insert_purche ($name, $description, $image_link) {
	global $servername, $username, $password, $db_name;
	$conn = new mysqli($servername, $username, $password);
	
	$conn->query("use ".$db_name);

	$sql = "INSERT INTO purchase_list (stock_id, quantity, bill_id) VALUES (".$stock_id.", ".$quantity.", ".$bill_id.")";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
}

?>