<?php
//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'soap');
?>
<html>
	<head>
		<title>Invoice generator</title>
	</head>
	<body>
		select invoice:
		<form method='get' action='invoice-db.php'>
			<select name='invoiceid'>
				<?php
					//show invoices list as options
					$query = mysqli_query($con,"select * from invoice");
					while($invoice = mysqli_fetch_array($query)){
						echo "<option value='".$invoice['invoiceid']."'>".$invoice['invoiceid']."</option>";
					}
				?>
			</select>
			<input type='submit' value='Generate'>
		</form>
	</body>
</html>
