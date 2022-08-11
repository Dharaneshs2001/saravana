<?php
ob_start();
session_start(); 
include('includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	//$framesize=mysql_real_escape_string($_POST['framesize']);
	//$fsize='1';
	$orderid=mysql_real_escape_string($_POST['orderid']);
	$framesize=mysql_real_escape_string($_POST['framesize']);
	$ftype=mysql_real_escape_string($_POST['ftype']);
	$qty=mysql_real_escape_string($_POST['qty']);
	$price=mysql_real_escape_string($_POST['price']);
	$total=mysql_real_escape_string($_POST['total']);
	$status="Order Not Process Yet";
		$uid = $_SESSION['id'];
			
			 $result = mysql_query("SELECT max(sno)as max FROM frame");
									 $row = mysql_fetch_array($result);
									 $id=$row['max']+1;
											
											if($_FILES["file"]["name"]<>"")
											{								
												$filename=$id;				
												$allowedExts = array("jpg","png","bmp","gif","jpeg","pdf");
												$temp = explode(".", $_FILES["file"]["name"]);
												$extension = end($temp);
												if (in_array($extension, $allowedExts))
												{
												move_uploaded_file($_FILES["file"]["tmp_name"],"frame/$filename.$extension" );
												}
												$path="frame/$filename.$extension";		 
											}
									
	date_default_timezone_set('Asia/Kolkata'); 
$currentdate= date("Y-m-d H:i:s"); // time in India								 

mysql_query ("insert into frame(framesize,ftype,qty,price,total,sno,path,uid,orderid,cdate,status) values ('$framesize','$ftype','$qty','$price','$total','$id','$path','$uid','$orderid','$currentdate','$status')");

echo '<script language="javascript">';
echo 'alert("Frame Ordered Successfully!")';
echo '</script>';

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Order Frame</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
<script type="text/javascript">
function submit1(){
             var first_number = parseInt(document.getElementById("qty").value);
            var second_number = parseInt(document.getElementById("price").value);
            var result = first_number * second_number;

            document.getElementById("total").value = result;
}
        </script>
	</head>
    <body class="cnt-home">
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          Order Frame
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		
				<div class="col-md-12 col-sm-12 already-registered-login">

					<form class="register-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    	
                        <div class="form-group">
					    <label class="info-title" for="Order ID">Order ID <span>*</span></label>
			 			<input type="text" class="form-control unicase-form-control text-input" required name="orderid" value="<?php echo $randnum = rand(11111,99999);?>" readonly>
					  </div>
                      
					  <div class="form-group">
					    <label class="info-title">Frame Size<span>*</span></label>
					    <select class="form-control unicase-form-control text-input" name="framesize" required>
                        	<option value=""> Choose Frame Size </option>
                            <option value="8x10"> 8" x 10" </option>
                            <option value="11x14"> 11" x 14"	 </option>
                            <option value="16x20"> 16" x 20" </option>
                            <option value="20x24"> 20" x 24" </option>
                            <option value="24x36"> 24" x 36" </option>
                            <option value="30x40"> 30" x 40" </option>
                        </select>
					  </div>
                      
                      <div class="form-group">
					    <label class="info-title">Frame Type<span>*</span></label>
					    <select class="form-control unicase-form-control text-input" name="ftype" required>
                        	<option value=""> Choose Frame Type </option>
                            <option value="Wooden"> Wooden </option>
                            <option value="Glass"> Glass	 </option>
                            <option value="Plastic"> Plastic </option>
                        </select>
					  </div>
                      
                      <div class="form-group">
					    <label class="info-title" for="Billing State ">Quantity<span>*</span></label>
			 			<input type="text" class="form-control unicase-form-control text-input" required name="qty" id="qty">
					  </div>
                      
                      <div class="form-group">
					    <label class="info-title" for="Billing State ">Price Per Frame <span>*</span></label>
			 			<input type="text" class="form-control unicase-form-control text-input" required name="price" id="price" value="250" readonly>
					  </div>
                      
                      <div class="form-group">
					   
			 			<button type="button" class="btn btn-info" onClick="submit1()">Calculate</button>
					  </div>
                     
						<div class="form-group">
					    <label class="info-title" for="Billing State ">Grandtotal <span>*</span></label>
			 			<input type="text" class="form-control unicase-form-control text-input" required name="total" id="total" readonly>
					  </div>
						<div class="form-group">
					    <label class="info-title" for="Billing State ">Sample Photo <span>*</span></label>
			 			<input type="file" class="form-control unicase-form-control text-input" required name="file">
					  </div>
                      <input type="submit" value="Order"  class="btn-upper btn btn-primary checkout-page-button" name="btnSubmit">
					</form>
					
				</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					    
					  	
					</div><!-- /.checkout-steps -->
				</div>
			<?php include('includes/myaccount-sidebar.php');?>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
	<?php include('includes/brands-slider.php');?>

</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>