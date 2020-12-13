<?php
require_once '../../../BusinessServiceLayer/Customermodel/model.php';

class Controller{

  function viewCustomerinfo(){
   $customer = new model;
   $customer->username = $_SESSION['username'];
   return $customer->viewCustomerDetail();
  }

    function editCustomerinfo(){
        $customer = new model;
        $customer->username = $_SESSION['username'];
        $customer->C_CustAddress= $_POST['C_CustAddress'];
        $customer->C_CustPhoneNumber= $_POST['C_CustPhoneNumber'];
        if($customer->updateCustomerinfo()){
            $message = "Success Update!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'customerview.php?username=".$_POST['username']."';</script>";
        }
}

  function viewAllFood(){

    $Food = new Model();
    return $Food->viewFood();
  }

  function viewCertainFoodDetail($FoodId){
    $Food = new Model();
    $Food->FoodId = $FoodId;
    return $Food->viewFoodDetail();
  }
   function viewAllGood(){

    $Good = new Model();
    return $Good->viewGood();
  }

  function viewCertainGoodDetail($GoodId){
    $Good = new Model();
    $Good->GoodId = $GoodId;
    return $Good->viewGoodDetail();
  }
    function viewAllMedical(){

    $Medical = new Model();
    return $Medical->viewMedical();
  }

  function viewCertainMedicalDetail($MedicalId){
    $Medical = new Model();
    $Medical->MedicalId = $MedicalId;
    return $Medical->viewMedicalDetail();
  }

  function add(){
    $Product = new Model();
    $Product->product_id = $_POST['product_id'];
    $Product->customer_id = $_SESSION['id'];
    $Product->product_name = $_POST['product_name'];
    $Product->product_img = $_POST['product_img'];
    $Product->product_quantity = $_POST['quantity'];
    $Product->product_price = $_POST['price'];


    if($Product->InsertCart() > 0){
      $message = "success Insert!";
      echo "<script type='text/javascript'>alert('$message');
             window.location ='../custOrder/cart.php';</script>";
          }
  }

  function viewAllCart(){
    $Product = new Model();
    return $Product->viewCart();
  }


  function delete($id){
    $Product = new Model();
    $Product->id = $id;
    if($Product->deleteCart()){
      $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../custOrder/cart.php';</script>";
    }
  }

  function addCustomerPaymentInfo(){
    $PaymentInfo = new Model();
    $PaymentInfo->customer_id = $_SESSION['id'];
    $PaymentInfo->firstname = $_SESSION['username'];
    $PaymentInfo->email = $_POST['email'];
    $PaymentInfo->cust_add1 = $_POST['cust_add1'];
    $PaymentInfo->cust_add2 = $_POST['cust_add2'];
    $PaymentInfo->cust_postal_code = $_POST['cust_postal_code'];
    $PaymentInfo->cust_city = $_POST['cust_city'];
    $PaymentInfo->cust_state = $_POST['cust_state'];
    $PaymentInfo->cardNumber = $_POST['cardnumber'];
    $PaymentInfo->subtotal = $_POST['subtotal'];

    if($PaymentInfo->InsertCustomerPaymentInfo() >= 0){
      $message = "Press Proceed to proceed to payment gateway";
      echo "<script type='text/javascript'>alert('$message');
             window.location = 'custAddress.php';</script>";
            }
  }

  function viewAddress(){
    $payment = new Model();
    $payment->customer_id = $_SESSION['id'];
    return $payment->viewPaymentAddress();
  }

  function updatePaymentStatus(){
    $payment = new Model();
    $payment->customer_id = $_SESSION['id'];
    $payment->updatePaymentStatus();
  }

}
function template_header($title) {
echo <<<EOT

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="../../../css/shop-homepage.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/customer/ApplicationLayer/CustomerView/custAddCart/food.php"><h1>WeServe</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          </li>
          <li class="link-icons">
          <a class="nav-link" href="../custOrder/cart.php"> <i class="fa fa-shopping-cart" style="font-size:30px;color:white"></i></a> 
          <li class="nav-item">
            <a class="nav-link" href="../custUpdateInfo/customerview.php"><i class="material-icons" style="font-size:30px;color:white">person</i></a>
          </li>
                </div>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  
    
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
    
    <footer class="py-5 bg-dark">
    <div class="col-sm-12">
      <p class="m-0 text-center text-white">Welcome The WSMS 2020.</p>
    </div>
  </footer>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

EOT;
}

?>
