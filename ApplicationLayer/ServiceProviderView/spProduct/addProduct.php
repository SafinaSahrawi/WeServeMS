<?php
require_once ('../../../BusinessServiceLayer/SpController/spController.php');

$product = new spController();
$data = $product->viewAllFood();
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

        <div class="row"><br><br>

            <div class="col-lg-10 col-md-6 mb-4">
            <div class="container"><br>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="table" width="100%">
              <tr>
                <td colspan="3"><center>CHOOSE PRODUCT CATEGORY:</center></td>
              </tr>
            <tr>
                <td width="152"><a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/addFood.php">Food Products</a></td>
            </tr>
            <tr>
                <td width="152"><a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/addGood.php">Good Products</a></td>
            </tr>
            <tr>
                <td width="152"><a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/addMedical.php">Medical Products</a></td>
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