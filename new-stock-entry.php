<!DOCTYPE html>
<?php
session_start();
$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
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
                    <li><a href="purchase.php">Purchase</a></li>
                    <li><a href="new-stock-entry.php">New Stock Entry</a></li>
                    <li><a href="delete-stock.php">Delete Stock</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
            <form role="form" action = "insert-purchase.php" method = "POST">
                     <div class="container" id="issue_tab">
                        <div class="row clearfix">
                            <div class="col-md-5 column">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr >
                                            <th class="text-center">
                                                Sno
                                            </th>
                                            <th class="text-center">
                                                Details
                                            </th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <tr id='addr2'>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                        <input type="Date" name='bill_date'  placeholder='Bill Date' class="form-control"/>
                                        </td>
                                        </tr>
                                        <tr id='addr1'>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                        <input type="text" name='bill_amount'  placeholder='Price of stock' class="form-control"/>
                                        </td>
                                        </tr>
                                        <tr id='addr4'>
                                        <td>
                                            5
                                        </td>
                                        <td>
                                        <input type="text" name='bill_image_link'  placeholder='Bill Image Link' class="form-control"/>
                                        </td>
                                        </tr>
                                        <tr id='addr3'>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                        <input type="text" name='name'  placeholder='Name of Stock' class="form-control"/>
                                        </td>
                                        </tr>
                                        <tr id='addr3'>
                                        <td>
                                            4
                                        </td>
                                        <td>
                                        <input type="text" name='quantity'  placeholder='Quantity' class="form-control"/>
                                        </td>
                                        </tr>
                                        
                                        <tr id='addr5'>
                                        <td>
                                            6
                                        </td>
                                        <td>
                                        <input type="text" name='description'  placeholder='Description' class="form-control"/>
                                        </td>
                                        </tr>
                                        <tr id='addr7'>
                                        <td>
                                            8
                                        </td>
                                        <td>
                                        <input type="text" name='image_link'  placeholder='Stock image link' class="form-control"/>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div >
                        <div id="">
                            <input type="SUBMIT" id="Purchased" value="Purchased" class="btn btn-default">
                        </div>
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

