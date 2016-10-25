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
    <div id="ishModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
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
                            <h3 class="panel-title">please enter the stock id  <small>    Only for CICians</small></h3>
                            </div>
                            <div class="panel-body">
                            <form role="form" action = "new-issue-request.php" method = "POST">
                                 <div class="container">
                                    <div class="row clearfix">
                                        <div class="col-md-5    column">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                                <thead>
                                                    <tr >
                                                        <th class="text-center">
                                                            Stock_id
                                                        </th>
                                                        <th class="text-center">
                                                            Quantity
                                                        </th>
                                                        <th class="text-center">
                                                            Return_Date
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id='addr0'>
                                                        <td>
                                                        <input type="text" name='stock_id'  placeholder='Stock_id' class="form-control"/>
                                                        </td>
                                                        <td>
                                                        <input type="text" name='quantity' placeholder='Quantity' class="form-control"/>
                                                        </td>
                                                        <td>
                                                        <input type="date" name='return_date' placeholder='Return_date' class="form-control"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                                    <input type="submit" value="ISSUE" class="btn btn-default">
                                    <!--<a id='delete_row' class="btn btn-default">SUBMIT</a>-->
                                </div>
                            
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
<script type="text/javascript">
         $(document).ready(function(){
      var i=1;
      $(document).on('click','.delete_button',function(){
        $(this).parent().parent()
  $(this).parent().parent().remove();i--;
});
     $("#add_row").click(function(){
      $('tbody').append("<tr id='addr"+i+"'><td><input name='Stock_id"+i+"' type='text' placeholder='Stock_id' class='form-control input-md'  /> </td><td><input  name='Quantity"+i+"' type='text' placeholder='Quantity'  class='form-control input-md'></td><td><input  name='Return_date"+i+"' type='text' placeholder='Return_date'  class='form-control input-md'></td><td><button class='delete_button' name='delete_row"+i+"' type='button'>delete</button> ");
       // $("#delete_button"+i).click(function(){$(this).parent().parent().remove();console.log(i);i--;console.log(this.name)} );
      i++; 
  });
    /*$("delete_row"+i).click()

     $("#delete_row").click(function(){
         if(i>1){
         $("#addr"+(i-1)).html('');
         i--;
         }
     });*/
});


    $("#menu-toggle").click( function (e){
        e.preventDefault();
        $("#wrapper").toggleClass("menuDisplayed");
    });
</script>
</body>
</html>