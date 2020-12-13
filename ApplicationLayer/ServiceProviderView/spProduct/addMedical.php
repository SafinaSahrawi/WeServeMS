<?php
require_once ('../../../BusinessServiceLayer/SpController/spController.php');

$product = new spController();
$data = $product->viewAllMedical();

if(isset($_POST['medical'])){
    $product->addMedical();
}

?>

<?=template_header('view')?>

      <div class="container">
      <div class="row">
      <div class="col-lg-3">

        <br>

        <center><a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spView.php"><img src="../../../picture/Weserve.jpeg" width="255px" height="225px"alt></a>
        <p>SERVICE PROVIDER</p></center>
          <input type="hidden" name="sp_id" value="<?=$_SESSION['id']?>">
          <div class="list-group">
          <a href="spViewFood.php" class="list-group-item">Food </a>
          <a href="spViewGoods.php" class="list-group-item">Good </a>
          <a href="spViewMedical.php" class="list-group-item">Medical </a>
          <a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/addProduct.php" class="list-group-item">Add Product </a>
        </div>
            </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row"><br>

            <div class="col-lg-10 col-md-6 mb-4">
<div class="container"><br>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="table" width="100%">
              <tr>
                <td colspan="3"><center>ADD NEW PRODUCTS</center></td>
              </tr>
            <tr>
                <td width="149">Product Name</td>
                <td width="152"><input type="text" name="name" required></td>
            </tr>
          <tr>
                <td>Price</td>
                <td><input type="number" name="price" min="1" step="any"></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td><textarea name="des" cols="22" rows="4"></textarea></td>
            </tr>
            <tr>
                <td>Stock Quantity</td>
                <td><input type="number" name="quantity" min="1"></td>
            </tr>
            <tr>
                <td>Upload Photo</td>
                <td><input type="file" name="img" accept="image/*"></td>
           </tr>
           <tr>
            <td></td>
            <td></td>
            </tr>
            <tr>
              <td colspan="3"><center><button type="submit" name="medical" value="addMedical" class="btn btn-info">ADD </button>
              <button type="button" name="cancel" onclick="location.href='http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/addProduct.php'" class="btn btn-danger">CANCEL</button></center></td>
            </tr>
       </table>
        </form><!-- form ends -->
      </div>
      </div>



        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

<?=template_footer()?>