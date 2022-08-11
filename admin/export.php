<?php  
//export.php  
$connect = mysql_connect("localhost", "root", "", "soap");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM orders";
 $result = mysql_query("select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingAddress as shippingaddress,users.shippingCity as shippingcity,users.shippingState as shippingstate,users.shippingPincode as shippingpincode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,orders.cakeMsg as cakeMsg,orders.paymentMethod as paymentmethod,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderDate Between '$from' and '$to'");
 if(mysql_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                   <tr>
                    <th>id</th>
                     <th> userId</th>
                                                       
                 <th>productId</th>
 
               <th>quantity</th>
     <th>orderDate</th>
         </tr>
  ';
  while($row = mysql_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["username"].'</td>
                         <td>'.$row["shippingaddress"].'</td>  
                         <td>'.$row["orderDate"].'</td>  
                         <td>'.$row["quantity"].'</td>  
       <td>'.$row["orderDate"].'</td>  
      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>