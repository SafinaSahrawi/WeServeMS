<?php
session_start();
require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";



$Cart = new Controller();
$data2 = $Cart->viewAllCart()->fetchAll();

$address = new Controller();
$data = $address->viewAddress();
$customer_name = "";
$customer_name = $_SESSION['username'] ;
$_SESSION['subtotal']= 0.00;
$TotalDeliveryFee = 0.00;
$DeliveryFee = 4.00;
?>




<title>Payment</title>

<!DOCTYPE html>
<html>
<head>
  <script src="https://www.paypal.com/sdk/js?client-id=AcC0qn_BkGUZfQOzjHsZmBUAWG1WpHY-zJCq5hWxAA9bgiIWK6LUowr_A-LOLB7880tdsrExkk5Tt3G0&currency=MYR">
        // Required. Replace SB_CLIENT_ID with your sandbox client ID.
    </script>
  <title>address</title>
</head>
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
<body>

  <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
   <?php foreach ($data2 as $row2): ?>
      <p><?=$row2['product_id']?><?=$row2['product_name']?></a><span class="price"><?=$row2['product_price'] * $row2['product_quantity']?></span></p>
      <?php $_SESSION['subtotal'] += $row2['product_price'] * $row2['product_quantity'] + $DeliveryFee; ?>
      <?php $TotalDeliveryFee += $DeliveryFee; ?>
    <?php endforeach; ?>
 
     <hr>
     <p>Total Delivery Fee<span class="price" style="color:black"><b><?=$TotalDeliveryFee?></b></span></p>
     <p>Total <span class="price" style="color:black"><b><?=$_SESSION['subtotal']?></b></span></p>
  </div>





  <?php foreach ($data as $row) { ?>

    <?php $_SESSION['shipping_address'] = $row['cust_add1'] . ', ' . $row['cust_add2'] . ', ' . $row['cust_postal_code'] . ', ' . $row['cust_city'] . ', ' . $row['cust_state'] ?>

  <?php } ?>

     

  <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                createOrder: function(data, actions) {
                    // This function sets up the details of the transaction, including the amount and line item details.
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code: 'MYR',
                                value: '<?= $row["total_price"]; ?>',
                            },
                            shipping: {
                                name: {
                                    full_name: '<?= $row["firstname"]; ?>'
                                },
                                address: {
                                    address_line_1: '<?= $row["cust_add1"]; ?>',
                                    address_line_2: '<?= $row["cust_add2"]; ?>',
                                    admin_area_2: '<?= $row["cust_city"]; ?>',
                                    admin_area_1: '<?= $row["cust_state"]; ?>',
                                    postal_code: '<?= $row["cust_postal_code"]; ?>',
                                    country_code: 'MY'
                                }
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    // This function captures the funds from the transaction.
                    return actions.order.capture().then(function(details) {
                        // This function shows a transaction success message to your buyer.
                        alert('Transaction completed by ' + '<?=$row['firstname'];?>' );
                        window.location.href = "custPaymentComplete.php"
                    });
                }
            }).render('#paypal-button-container');
            //This function displays Smart Payment Buttons on your web page.
            </script>
</body>
</html>