<?php 
session_start();

require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";
require_once '../../../BusinessServiceLayer/Customermodel/model.php';

$Cart = new Controller();
$data = $Cart->viewAllCart()->fetchAll();

$_SESSION['subtotal'] = 0.00;
$deliveryfee=4.00;
$TotalDeliveryFee = 0.00;
$total_price = 0;

if (isset($_POST['MakePayment'])){
  $payment = new Controller();
  $payment->addCustomerPaymentInfo();
  }


?>

<title>Payment</title>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://www.paypal.com/sdk/js?client-id=client-id=AcC0qn_BkGUZfQOzjHsZmBUAWG1WpHY-zJCq5hWxAA9bgiIWK6LUowr_A-LOLB7880tdsrExkk5Tt3G0&currency=MYR">
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.
</script>
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
  background-color: #808080;
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
  background-color: #bfbfbf;
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

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="POST">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text"  name="firstname" value="<?php echo $_SESSION["username"]; ?>" readonly>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text"  name="email" placeholder="example@example.com" required>
            <label for="adr1"><i class="fa fa-address-card-o"></i> Address 1</label>
            <input type="text"  name="cust_add1" placeholder="Address" required>
             <label for="adr2"><i class="fa fa-address-card-o"></i> Address 2</label>
            <input type="text"  name="cust_add2" placeholder="Address" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text"  name="cust_city" placeholder="City" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" name="cust_state" placeholder="State" required>
              </div>
              <div class="col-50">
                <label for="zip">Poskod</label>
                <input type="text"  name="cust_postal_code" placeholder="81300" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" name="cardname" placeholder="Name on card" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX" required>
            <label for="exp">Exp</label>
            <input type="text"  name="exp" placeholder="XX/XX" required>
            <div class="row">
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text"  name="cvv" placeholder="xxx" required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
      
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
       <?php foreach ($data as $row): ?>
      <p><?=$row['product_id']?><?=$row['product_name']?></a><span class="price"><?=$row['product_price'] * $row['product_quantity']?></span></p>
      <?php $_SESSION['subtotal'] += $row['product_price'] * $row['product_quantity'] + $deliveryfee; ?>
      <?php $TotalDeliveryFee += $deliveryfee; ?>
    <?php endforeach; ?>
      <hr>
      <p>Total delivery fee<span class="price" style="color:black"><b><?php echo "$TotalDeliveryFee"; ?></b></span></p>
      <p>Total <span class="price" style="color:black"><b><?=$_SESSION['subtotal']?></b></span></p>
    </div>
  </div>
</div>
    <input type="hidden" name="subtotal" value="<?=$_SESSION['subtotal']?>" >
    <input type="hidden" name="username" value="<?=$_SESSION['username']?>" >
    <input type="hidden" name="customer_id" value="<?=$_SESSION['id']?>" >
    <input type="hidden" name="subtotal" value="<?=$_SESSION['subtotal']?>" >
    <input type="submit" name="MakePayment" value="Make Payment" class="btn" >
</form>
</body>
</html>