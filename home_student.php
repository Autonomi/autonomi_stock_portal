<!DOCTYPE html>
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
            <ul class="nav navbar-nav navbar-right" style="margin-right:0px">
                <li ><a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ishModal" style="border-radius:0px 0px 5px 5px " href="#"><span class="glyphicon glyphicon-user"></span> ISSUE</a></li>
                <li><?php 
                if (isset($_SESSION["user_id"])) {
                    echo $_SESSION["user_id"];
                }
                else echo "login please";
                ?>
                    </li>
            </ul>
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
                                { echo "Student";} ?></span></a>
                        </div>
                    </div></li>
                        <li class="active"><a href="#" >HOME</a></li>
                        <li ><a href="#" >ABOUT</a></li>
                        <li ><a href="#" >CONTENT</a></li>
                        <li ><a href="issue_page.php" >ISSUE</a></li>
                        <li ><a href="return.php" >RETURN</a></li>
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
                    <li><a href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Page content -->
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