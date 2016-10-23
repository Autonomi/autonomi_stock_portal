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
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                    <ul class="nav navbar-nav">
                    <li><div class="row">
                        <div class="col-lg-12">
                            <a href="#" class="btn btn-success" id="menu-toggle"><span >Student</span></a>
                        </div>
                    </div></li>
                        <li class="active"><a href="#" >HOME</a></li>
                        <li ><a href="#" >ABOUT</a></li>
                        <li ><a href="#" >CONTENT</a></li>
                        <li><a href="#">ISSUE</a></li>
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
                <form role="form">
                     <div class="container" id="issue_tab">
                        <div class="row clearfix">
                            <div class="col-md-5 column">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr >
                                            <th class="text-center">
                                                #
                                            </th>
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
                                                1
                                            </td>
                                            <td>
                                            <input type="text" name='Stock_id0'  placeholder='Stock_id' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                                            </td>
                                            <tr id='addr1'>
                                            <td>
                                                2
                                            </td>
                                            <td>
                                            <input type="text" name='Stock_id1'  placeholder='Stock_id' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                                            </td>
                                            <tr id='addr2'>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                            <input type="text" name='Stock_id2'  placeholder='Stock_id' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                                            </td>
                                            <tr id='addr3'>
                                            <td>
                                                4
                                            </td>
                                            <td>
                                            <input type="text" name='Stock_id3'  placeholder='Stock_id' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                                            </td>
                                            <tr id='addr4'>
                                            <td>
                                                5
                                            </td>
                                            <td>
                                            <input type="text" name='Stock_id4'  placeholder='Stock_id' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                                            </td>
                                            <td>
                                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div >
                        <input type="SUBMIT" id="issue_me" value="issue_me" class="btn btn-default">
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
































<!--<form role="form">
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
                            <input type="text" name='Stock_id 0'  placeholder='Stock_id' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                            </td>
                            <td>
                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                            </td>
                            <tr id='addr0'>
                            <td>
                            <input type="text" name='Stock_id 1'  placeholder='Stock_id' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                            </td>
                            <td>
                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                            </td>
                            <tr id='addr0'>
                            <td>
                            <input type="text" name='Stock_id 2'  placeholder='Stock_id' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                            </td>
                            <td>
                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                            </td>
                            <tr id='addr0'>
                            <td>
                            <input type="text" name='Stock_id 3'  placeholder='Stock_id' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                            </td>
                            <td>
                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                            </td>
                            <tr id='addr0'>
                            <td>
                            <input type="text" name='Stock_id 4'  placeholder='Stock_id' class="form-control"/>
                            </td>
                            <td>
                            <input type="text" name='Quantity' placeholder='Quantity' class="form-control"/>
                            </td>
                            <td>
                            <input type="date" name='Return_date' placeholder='Return_date' class="form-control"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a id="add_row" type="s" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="btn btn-default">SUBMIT</a>
    </div>

</form>