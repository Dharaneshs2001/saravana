<!DOCTYPE html>
<html lang="en">
<?php 
  require('./config/db.php');
  $submit_id = $_GET['id'];
        $stmt = $pdo -> prepare('select * from orders where id = ?');
        $stmt -> execute(array($submit_id));
        $user = $stmt -> fetch();
        $uid =  $user -> userId;
        $pid = $user -> productId;
        $qty = $user -> quantity;
        

        $stmt1 = $pdo -> prepare('select * from users where id = ?');
        $stmt1 -> execute(array($uid));
        $user1 = $stmt1 -> fetch();
        

        $stmt2 = $pdo -> prepare('select * from  products where id = ?');
        $stmt2 -> execute(array($pid));
        $user2 = $stmt2 -> fetch();
        $prc = $user2 -> productPrice;
        
  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale="1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice- Saravana Tiles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="pdf.css" />
    <script src="pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

</head>


<body>
 

    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card" id="invoice">
                    <div class="row">
  <div class="col-75">
    <div class="container">
      <form action="#">
        <!-- <img src="img\main-logo.png"> -->
      <h2>Saravana Tiles</h2>
        <div class="row">
          <div class="col-50">
            <center><h3>Invoice</h3></center>
			<br>
            <label for="bfrom"><i class="fa fa-user"></i> Bill From: Saravana Tiles</label>
            
            <label for="bto"><i class="fa fa-envelope"></i> Bill To:</label>
            <input style="border: none;" type="text" id="email" name="email" value="<?php echo $user1 -> name;?>" disabled>

            <label for="ino"><i class="fa fa-address-card-o"></i> Invoice Id:</label>
            <input style="border: none;" type="text" id="adr" name="address" value="<?php echo $user -> id;?>" disabled>

            <label for="Acc"><i class="fa fa-institution"></i>Shipping Address: </label>
            <input style="border: none;" type="text" id="city" name="city" value="<?php echo $user1 -> shippingAddress;?>" disabled>

			<label for="name"><i class="fa fa-institution"></i>product Name: </label>
            <input style="border: none;" type="text" id="city" name="city" value="<?php echo $user2 -> productName;?>" disabled>
			<br>
			<label for="idate"><i class="fa fa-institution"></i> order Date:</label>
			<input style="border: none;" type="text" id="city" name="city" value="<?php echo $user -> orderDate;?>" disabled>
			<br>
      <label for="name"><i class="fa fa-institution"></i>Quantity: </label>
            <input style="border: none;" type="text" id="city" name="city" value="<?php echo $user -> quantity;?>" disabled>

			<label for="bdate"><i class="fa fa-institution"></i>price: </label>
            <input style="border: none;"type="text" id="city" name="city" value="<?php echo $user2 -> productPrice;?>" disabled>

			<label for="ddate"><i class="fa fa-institution"></i>payment method </label>
            <input style="border: none;" type="text" id="city" name="city" value="<?php echo $user -> paymentMethod;?>" disabled>

			<label for="Package">Total Amount</label>
            <input style="border: none;" type="text" id="state" name="state" value="<?php echo $qty*$prc ?>" disabled>  
            </div>
          </div>

         
          
        </div>
        
      </form>
	  <br>
    </div>
  </div>
  
</div>

                </div>
            </div>
        </div>
    </div>
	<div class="col-md-12 text-right mb-3">
                <button class="btn btn-primary" id="download"> download Invoice</button>
            </div>

</body>
<script>
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'Saravana Tiles.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
</script>

</html>