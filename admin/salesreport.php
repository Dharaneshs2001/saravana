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

<?php 


echo "<center>";
echo "<form name=f1 method=post action=vieworders.php>";


echo "<br/><br/>	<table align='center' cellspacing='0' cellpadding='0' width='100%' border='0'>";
echo "			<tr><td>";

echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<br/><br/><h2 align=center><font face='TAHOMA' color='darkgreen'>Select Date And Product</font></h2>";
	
	echo "<br/><table border=0 width='300' cellpadding='1' cellspacing='0'>";
?>

<tr><td>Order Date From</td><td><input type=text name='txtFromDate' value='<?php echo date('Y-m-d'); ?>'></td></tr><br>
<tr><td>Order Date To</td><td><input type=text name='txtToDate' value='<?php echo date('Y-m-d'); ?>'></td></tr><br>

<tr><td colspan=2 align=center><input type=submit value=Show></td></tr>
<?php

	echo "</table></td></tr></table></center></form></body></html>";
	mysql_close($con);
?>

