<?php
session_start();
	$con = mysql_connect("localhost","root",'');
	mysql_select_db("soap", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	//$sql="select * from Stock";
	//$sql="select A.ItemCode,A.ItemName,Sum(Quantity) as Quantity,Photo Items A,Items B,Stock C Where A.CategoryId=B.CategoryId and B.ItemCode=C.ItemCode Group By C.ItemCode";

	//$rs= mysql_query($sql,$con);
	//echo "<html>
echo "<head><title>Sales Report</title>";
?>
  
  
<style>
.center {
  margin: auto;
  width: 50%;
  border: 3px solid #73AD21;
  padding: 10px;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="Stylesheet" type="text/css" href="style.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" type="text/css" href="home.css">
    <link rel="stylesheet" href="foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
	
</head><body style='background-color: lightgreen;'>
 
<?php 


echo "<center>";
echo "<form name=f1 method=post action=viewcustomer.php>";


echo "<br/><br/>	<table align='center' cellspacing='0' cellpadding='0' width='100%' border='0'>";
echo "			<tr><td>";

echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<br/><br/><h2 align=center><font face='TAHOMA' color='darkgreen'>Select Date And Product</font></h2>";
	
	echo "<br/><table border=0 width='300' cellpadding='1' cellspacing='0'>";
?>
<tr><td>Order Date From</td><td><input type=text name='txtFromDate' value='<?php echo date('Y-m-d'); ?>'></td></tr><br>
<tr><td>Order Date To</td><td><input type=text name='txtToDate' value='<?php echo date('Y-m-d'); ?>'></td></tr><br>

<tr><td>Customer</td><td>

<select name="name">
					<?php
							$sql="SELECT name FROM users group by name";
		
							$tot=mysql_query($sql,$con); 
							echo "<option>All</option>";
							while($row = mysql_fetch_array($tot) )
							{
								
									echo "<option>" . $row['name'] . "</option>";
									
							}
						?>
</select>

</td></tr>


<tr><td colspan=2 align=center><input type=submit value=Show></td></tr>
<?php

	echo "</table></td></tr></table></center></form></body></html>";
	mysql_close($con);
?>