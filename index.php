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
<?php 
if (isset($_SESSION["registration_error"]))
    echo "<script> $(\"#upModal\").modal(\"show\")</script>";
else if (isset($_SESSION["login_error"]))
    echo "<script> $(\"#inModal\").modal(\"show\")</script>";
?>
    <div id="header">
        <div id="top-nav">
            <img src="images/cic_logo.png" height="100px">
            <ul class="nav navbar-nav navbar-right" style="margin-right:0px">
                <li ><a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#upModal" style="border-radius:0px 0px 5px 5px " href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#inModal" style="border-radius:0px 0px 5px 5px " href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                    <ul class="nav navbar-nav">
                    <li><div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="btn btn-success" id="menu-toggle"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
                        </div>
                    </div></li>
                    <li ><a href="#" >HOME</a></li>
                        <li class="active"><a href="#" >ABOUT</a></li>
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
                    <li><a href="#">Logout</a></li>
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




    <div id="upModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AUTONOMI</h4>
      </div>
      <div class="modal-body">
        <div class="row ">
        <div class="col-xs-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h3 class="panel-title">Please sign up for Autonomi<small>    Only for CICians</small></h3>
                        </div>
                        <div class="panel-body">
                        <?php 
                        if (isset($_SESSION["registration_error"])){
                            echo $_SESSION["registration_error"];
                            unset($_SESSION["registration_error"]);
                        }
                        ?>
                        <form role="form" action = "create-new-user.php" method = "POST">
                                    <div class="form-group">
                                        <input type="text" name="user_fullname" id="full_name" class="form-control input-sm" placeholder="Full Name">
                                    </div>
                            <div class="form-group">
                                <input type="text" name="u_name" id="u_name" class="form-control input-sm" placeholder="User Name">
                            </div>                                

                            <div class="form-group">
                                <input type="email" name="email_id" id="email" class="form-control input-sm" placeholder="Email Address">
                            </div>

                        <div class="row">

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="confirm_password" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                            </div>
                        </div>
                            
                            <input type="submit" value="Register" class="btn btn-info btn-block">
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
      </div>
    </div>

  </div>
    </div>
    </div>


<div id="inModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">AUTONOMI</h4>
      </div>
      <div class="modal-body">
        <div class="row ">
        <div class="col-xs-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <h3 class="panel-title">Please log in for Autonomi<small>    Only for CICians</small></h3>
                        </div>
                        <div class="panel-body">
                        <?php 
                        if (isset($_SESSION["login_error"])){
                            echo $_SESSION["login_error"];
                            unset($_SESSION["login_error"]);
                        }
                        ?>
                        <form role="form" action = "login.php" method = "POST">
                        <!--
                             <div class="dropdown">
                              <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Account Type
                              <span class="caret"></span></button>
                              <ul class="dropdown-menu">
                                <li><a href="#">ADMIN</a></li>
                                <li><a href="#">TEACHER</a></li>
                                <li><a href="#">STUDENT</a></li>
                              </ul>
                            </div>
                            -->
                            <div class="form-group">
                                <input type="text" name="u_name" id="u_name" class="form-control input-sm" placeholder="username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                            </div>
                            <input type="submit" value="LOG IN" class="btn btn-info btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Exit</button>
      </div>
    </div>

  </div>
</div>






       <!-- Menu toggle script -->
        <script>
            $("#menu-toggle").click( function (e){
                e.preventDefault();
                $("#wrapper").toggleClass("menuDisplayed");
            });
        </script>
</body>
</html>