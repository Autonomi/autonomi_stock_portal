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
                        <li class="active"><a href="#" >HOME</a></li>
                        <li ><a href="#" >ABOUT</a></li>
                        <li ><a href="#" >CONTENT</a></li>
                        <li ><a href="about-student.php" >ISSUE</a></li>
                        <li ><a href="account-student.php" >RETURN</a></li>
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
        <!-- Page content -->
            <div class="container-fluid">
                <div class="row">
                <section class="col-xs-12 col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                    <h1 class="page-header"> Stock </h1>
                </section>
            </div>
            <div class="row">
                
                
                <div id="alumni-cards" class="col-xs-12 col-lg-10 col-lg-offset-2">
                    
                    <!--<div class="row">-->

<?php 
require_once "functions.php";
$conn = setup();
$result = $conn->query("SELECT * FROM stock_description");
if ($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) { ?>
                    <div class="alumni-card-container col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <div class="alumni-card">
                            <div class= "row">
                                <img class="img-circle col-xs-offset-2 col-xs-10 alumni-photo" src="images/6.jpg"/>
                            </div>
                            <div class="row">
                                <div class="alumni-card-details">
                                    <h4><?php echo $data["name"]; ?></h4>
                                    <h5><?php echo $data["description"]; ?></h5>
                                    <h6><br><?php echo calculate_quantity(2, $data['stock_id']); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
}}
$conn->close();
?>

            </div>
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