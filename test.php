<?php
require_once "functions.php";

// echo calculate_quantity(0, 1);
// echo "\n";
// echo calculate_quantity(1, 1);
// echo "\n";
// echo calculate_quantity(2, 1);

foreach ($_POST as $key => $value) {
	foreach ($_POST[$key] as $inkey => $invalue) {
		echo $inkey.'='.$invalue.'<br/>';
	}
}
        

?>