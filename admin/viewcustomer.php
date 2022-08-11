<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
   <title>Report details</title>
  
  
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
  
</head>
  
  <body>
  



<div class="update">
    <?php
     $conn = mysqli_connect("localhost", "root", "", "soap");
    // Check connection
     if($conn === false){
     die("ERROR: Could not connect. ". mysqli_connect_error());}

     $status = "";?>

<nav role='navigation' style='width:100px'>
 <?php
    
    ?>
</nav>

<table border='0' style="align:right">
<tr>

<td valign='top'>
  

<!--<div  class="table-responsive" style="background-color:white;width:600px">-->
<br/><br/>
<h1 style="color:Black;font-weight:bold;text-align:center; color: green;">SALES REPORT</h1>

<table>

<tr>

<td style='width:100px'>
</td>
<td>
<table class="table table-hover " style="width:100%">
<thead>
<tr>

                
        <th style="font-weight:bold;color:black;">Order Date</th>       
        <th style="font-weight:bold;color:black;">User Name</th>
                <th style="font-weight:bold;color:black;">Product Name</th>
        
                <th style="font-weight:bold;color:black;">Qty</th>
                <th style="font-weight:bold;color:black;">Price</th>
                <th style="font-weight:bold;color:black;">Total</th>
                <th style="font-weight:bold;color:black;">Payment Method</th>
                
</tr>
</thead>
<tbody>
<?php
$count=1;


$FromDate=$_REQUEST["txtFromDate"];
$ToDate=$_REQUEST["txtToDate"];


$name=$_REQUEST["name"];
if ($name=="All")
{
$query="select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,orders.cakeMsg as cakeMsg,orders.paymentMethod as paymentmethod,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId  Where  orderdate Between '" . $FromDate . "' and '" . $ToDate . "' ORDER BY orderdate;";

}

else
{
  $query="select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,orders.cakeMsg as cakeMsg,orders.paymentMethod as paymentmethod,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId  Where orderdate Between '" . $FromDate . "' and '" . $ToDate . "' and username=  '" . $name . "' ORDER BY orderdate;";

}
$op ="Order Date,User Name,Product Name,Qty,Price,Total,Payment\n";
#and a.email='" . $_SESSION['emailid'] . "' 
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)) { ?>

<td width='150px' style='width:150px;font-size:11px'><?php echo $row["orderdate"]; ?></td>
<td><?php echo $row["username"]; ?></td>
<td><?php echo $row["productname"]; ?></td>


<td><?php echo $row["quantity"]; ?></td>
<td><?php echo $row["productprice"]; ?></td>
<td><?php echo $row["quantity"]*$row["productprice"] ?></td>
<td><?php echo $row["paymentmethod"]; ?></td>
<td><?php 

/*if(  $row["Approved"] =='Approved')
{
  echo "<font color='green' size='3px'>" . $row["Approved"] ."</font>";
}
else
  
  /*{
    echo "<font color='red' size='3px'>" . $row["Approved"] ."</font>";
  }*/
  $op =$op . $row['orderdate'] . "," .  $row['username'] . "," .  $row['productname'] . "," .  $row['quantity'] . "," .  $row['productprice'] . "," .  $row["quantity"]*$row["productprice"] . "," . $row['paymentmethod'] . "\n" ;
 ?>
  </td>


<td align="center">
</td>
</tr>
<?php $count++; } 

$myfile = fopen("orders.csv", "w") or die("Unable to open file!");
$txt = $op;

fwrite($myfile, $txt);
fclose($myfile);

?>
<tr><td colspan='10'>
 <button style="background-color:darkgreen"><a style="color:white;" href="orders.csv" style="color:green">Export</a></button></h1></td></tr>
</tbody>
</table> </div>
</div>

  </section>
</main>
 

</body>
</html>
