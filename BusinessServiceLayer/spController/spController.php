<?php
require_once ('../../../BusinessServiceLayer/spModel/spModel.php'); 

class spController{

    function addFood(){
        $product = new spModel();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->des = $_POST['des'];
        $product->img = $_FILES['img']['name'];

        $source = $_FILES['img']['tmp_name'];
        $folder = '../../../picture/';
        move_uploaded_file($source, $folder.$product->img);


        if($product->insertFood() > 0){
            $message = "Record Added!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../spProduct/spViewFood.php';</script>";
        }
    }

    function addGood(){
        $product = new spModel();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->des = $_POST['des'];
        $product->img = $_FILES['img']['name'];

        $source = $_FILES['img']['tmp_name'];
        $folder = '../../../picture/';
        move_uploaded_file($source, $folder.$product->img);


        if($product->insertGood() > 0){
            $message = "Record Added!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../spProduct/spViewGoods.php';</script>";
        }
    }

    function addMedical(){
        $product = new spModel();
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->des = $_POST['des'];
        $product->img = $_FILES['img']['name'];

        $source = $_FILES['img']['tmp_name'];
        $folder = '../../../picture/';
        move_uploaded_file($source, $folder.$product->img);


        if($product->insertMedical() > 0){
            $message = "Record Added!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../spProduct/spViewMedical.php';</script>";
        }
    }

    function viewAll(){
        $product = new spModel();
        return $product->viewAllProduct();
    }
    
    function viewAllFood(){
        $product = new spModel();
        return $product->displayAllFood();
    }

    function viewAllGood(){
        $product = new spModel();
        return $product->displayAllGood();
    }

    function viewAllMedical(){
        $product = new spModel();
        return $product->displayAllMedical();
    }
    
    function viewFood($FoodId){
        $product = new spModel();
        $product->FoodId = $FoodId;
        return $product->viewFoodDetail();
    }

    function viewGood($GoodId){
        $product = new spModel();
        $product->GoodId = $GoodId;
        return $product->viewGoodDetail();
    }

    function viewMedical($MedicalId){
        $product = new spModel();
        $product->MedicalId = $MedicalId;
        return $product->viewMedicalDetail();
    }
    
    
    function editFood(){
        $product = new spModel();
        $product->FoodId = $_GET['FoodId'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->des = $_POST['des'];
        $product->img = $_FILES['img']['name'];


        $source = $_FILES['img']['tmp_name'];
        $folder = '../../../picture/';

        if($product->img != '')
          {
            //update old image
            move_uploaded_file($source, $folder.$product->img);
            $product->modifyFood();
            $message = "Update Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../spProduct/viewFood.php?FoodId=".$_GET['FoodId']."';</script>";
            
          }
          else
          {
           // if no image selected the old image remain as it is.
            $product->modifyFoodwImg();
            $message = "Update W/O IMAGE Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../spProduct/viewFood.php?FoodId=".$_GET['FoodId']."';</script>";
            // old image from database
          } 
    }

    function editGood(){
        $product = new spModel();
        $product->GoodId = $_GET['GoodId'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->des = $_POST['des'];
        $product->img = $_FILES['img']['name'];


        $source = $_FILES['img']['tmp_name'];
        $folder = '../../../picture/';

        if($product->img != '')
          {
            //update old image
            move_uploaded_file($source, $folder.$product->img);
            $product->modifyGood();
            $message = "Update Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../spProduct/viewGoods.php?GoodId=".$_GET['GoodId']."';</script>";
            
          }
          else
          {
           // if no image selected the old image remain as it is.
            $product->modifyGoodwImg();
            $message = "Update W/O IMAGE Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../spProduct/viewGoods.php?GoodId=".$_GET['GoodId']."';</script>";
            // old image from database
          } 
    }

    function editMedical(){
        $product = new spModel();
        $product->MedicalId = $_GET['MedicalId'];
        $product->name = $_POST['name'];
        $product->price = $_POST['price'];
        $product->quantity = $_POST['quantity'];
        $product->des = $_POST['des'];
        $product->img = $_FILES['img']['name'];


        $source = $_FILES['img']['tmp_name'];
        $folder = '../../../picture/';

        if($product->img != '')
          {
            //update old image
            move_uploaded_file($source, $folder.$product->img);
            $product->modifyMedical();
            $message = "Update Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../spProduct/viewMedical.php?MedicalId=".$_GET['MedicalId']."';</script>";
            
          }
          else
          {
           // if no image selected the old image remain as it is.
            $product->modifyMedicalwImg();
            $message = "Update W/O IMAGE Successful!";
            echo "<script type='text/javascript'>alert('$message');
            window.location = '../spProduct/viewMedical.php?MedicalId=".$_GET['MedicalId']."';</script>";
            // old image from database
          } 
    }

    function deleteFood(){
        $product = new spModel();
        $product->FoodId = $_GET['FoodId'];
        if ($product->dropFood()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'spViewFood.php';</script>";
        }
          }

    function deleteGood(){
        $product = new spModel();
        $product->GoodId = $_GET['GoodId'];
        if ($product->dropGood()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'spViewGoods.php';</script>";
        }
    }

    function deleteMedical(){
        $product = new spModel();
        $product->MedicalId = $_GET['MedicalId'];
        if ($product->dropMedical()){
            $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'spViewMedical.php';</script>";
        }
    }

    function viewCartOrder(){
    $order = new spModel();
    return $order->viewCartOrder();
  }

  function acceptOrder(){
    $order = new spModel();
    $order->cartId = $cartId;
    $order->sp_confirm = $_POST['sp_confirm'];

    if($order->accept() > 0){
      $message = "Order Confirmed!";
      echo "<script type='text/javascript'>alert('$message');
             window.location ='../spConfirmOrder/sp_confirm.php';</script>";
          }
  }

  function viewInfo(){
    $sprovider = new spModel();
    $sprovider->username = $_SESSION['username'];
    return $sprovider->viewSPinfo();
  }

  function updateInfo(){
    $sprovider = new spModel();
    $sprovider->username = $_SESSION['username'];
    $sprovider->S_Company_Name = $_POST['S_Company_Name'];
    $sprovider->S_CompanyAddress = $_POST['S_CompanyAddress'];
    $sprovider->S_ServiceProviderPhoneNo = $_POST['S_ServiceProviderPhoneNo'];

    if($sprovider->updateSP() > 0){
      $message = "Profile Updated!";
      echo "<script type='text/javascript'>alert('$message');
             window.location ='spViewInfo.php';</script>";
    }

  }

  }//productController ends

  function template_header($title) {
echo <<<EOT

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="/wsms/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="/wsms/css/shop-homepage.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spView.php"><h1>WeServe</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spInfo/spViewInfo.php"><i class="material-icons" style="font-size:30px;color:white">person</i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/wsms/index.php"><i class="material-icons" style="font-size:30px;color:white">keyboard_tab</i></a>
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
    
    <!-- Footer -->
    <footer class="py-5 bg-dark">
    <div class="col-sm-12">
      <p class="m-0 text-center text-white">Copyright &copy; WeServe 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="/wsms/vendor/jquery/jquery.min.js"></script>
  <script src="/wsms/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

EOT;
}



?>      
