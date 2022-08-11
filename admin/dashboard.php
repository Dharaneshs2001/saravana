<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin | Dashboard</title>
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <?php include('include/header.php');?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                <?php include('include/sidebar.php');?>		
                    
                    <div class="span9">
                        <div class="content">
                            <div class="btn-controls">
                             
                                <div class="btn-box-row row-fluid">
                                    <a href="todays-orders.php" class="btn-box big span4"><img src="images/order-icon.png"><b><?php
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
 $result = mysql_query("SELECT * FROM Orders where orderDate Between '$from' and '$to'");
$num_rows1 = mysql_num_rows($result);
{

                                            echo htmlentities($num_rows1); 
                                            } ?></b>
                                        <p class="text-muted">
                                            Today's Orders</p>
                                    </a><a href="Pending-orders.php" class="btn-box big span4"><img src="images/pending-icon.jpg"><b>
                                        
<?php   
    $status='Delivered';                                     
$ret = mysql_query("SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysql_num_rows($ret);
{ echo htmlentities($num); 
 } ?>

                                    </b>
                                        <p class="text-muted">
                                            Pending Orders</p>
                                    </a><a href="delivered-orders.php" class="btn-box big span4"><img src="images/delivery-icon.jpg"><b>
                                        
                                        <?php   
    $status='Delivered';                                     
$rt = mysql_query("SELECT * FROM Orders where orderStatus='$status'");
$num1 = mysql_num_rows($rt);
{ echo htmlentities($num1); 
 } ?>
                                    </b>
                                        <p class="text-muted">
                                            Delivered Orders</p>
                                    </a>
                                </div>
                            </div>
                          
                        
                           
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
<?php include('include/footer.php');?>
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="scripts/common.js" type="text/javascript"></script>
    </body>
    <?php } ?>
