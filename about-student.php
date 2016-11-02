<!DOCTYPE html>
<?php
session_start();
$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
    header("Location: index.php");
}
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

require_once "functions.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $quantity_arr = $_POST["quantity"];
    $issue_flag = $_POST["issue_flag"];

    $conn = setup();
    
    $result = $conn->query("SELECT stock_id FROM stock_description");
    
    foreach ($issue_flag as $key => $value) {
        $result->data_seek($value);
        $data = $result->fetch_assoc();
        issue_stock($_SESSION["user_id"], $data["stock_id"], $quantity_arr[$value]);
    }
}

?>
<html lang="en">
<head>
    <title>stock</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="stock.css">
</head>
<body>
    <div id="header">
        <div id="top-nav">
            <img src="images/cic_logo.png" height="100px">
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                    <ul class="nav navbar-nav">
                    <li><div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="btn btn-success" id="menu-toggle"><span ><?php require_once "functions.php";
                            if (isset($_SESSION["user_id"]))
                                {echo "Hello, ".get_username()."";}
                            else 
                                { header("Location: index.php");} ?></span></a>
                        </div>
                    </div></li>
                        <li ><a href="#" >HOME</a></li>
                        <li class="active"><a href="#" >ABOUT</a></li>
                        <li ><a href="#" >CONTENT</a></li>
                        <li ><a href="issue-page.php">ISSUE</a></li>
                        <li  ><a href="#" >RETURN</a></li>
                    </ul>
            </div>
         </nav>
    </div>
        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Settings</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
            <form role="form" action = "<?php echo validate_input($_SERVER["PHP_SELF"]);?>" method = "POST">
                     <div class="container" id="issue_tab">
                        <div class="row clearfix">
                            <div class="col-md-9 column">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr >
                                            <th class="text-center">
                                                Sno
                                            </th>
                                            <th class="text-center">
                                                Stock items
                                            </th>
                                            <th class="text-center">
                                                stock_id
                                            </th>
                                            <th class="text-center">
                                                Left in stock
                                            </th>
                                            <th class="text-center">
                                                Quantity
                                            </th>
                                            <th class="text-center">
                                                Issue[y/n]
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- you have to mulltiply this box bro  -->
<?php 
require_once "functions.php";
$conn = setup();
$result = $conn->query("SELECT * FROM stock_description");
$i = 1;
if ($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) { ?>

                                        <tr id='addr1'>
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td><?php echo $data["name"]; ?></td>
                                        <td><?php echo $data["stock_id"]; ?></td>
                                        <td><?php echo calculate_quantity(2, $data["stock_id"]); ?></td>
                                        <td><input type="text" name='quantity[]'  placeholder='QUANTITY' class="form-control"/></td>
                                        <td><label class="checkbox-inline"><input type="checkbox" name = "issue_flag[]" value = <?php echo $i-1; ?>>issue me</label></td>
                                        </tr>
<?php
$i++;
}}
$conn->close();
?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div >
                        <input type="SUBMIT" id="issue" value="issue" class="btn btn-default">
                    </div>

                </form>
        <div id="page-content-wrapper">
            <div class="container-fluid">
            </div>
        </div>
        <footer>
            <img src="images/logo_footer.png" class="img-responsive"  widht="40" height="20">
       </footer>
<script type="text/javascript">
    $("#menu-toggle").click( function (e){
        e.preventDefault();
        $("#wrapper").toggleClass("menuDisplayed");
    });
</script>
</body>
</html>