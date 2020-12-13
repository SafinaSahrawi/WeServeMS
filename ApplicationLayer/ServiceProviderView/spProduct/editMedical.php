<?php
require_once ('../../../BusinessServiceLayer/SpController/spController.php');

$MedicalId = $_GET['MedicalId'];

$product = new spController();
$data = $product->viewMedical($MedicalId);


if(isset($_POST['update'])){
    $product->editMedical();
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

        <div class="row">
                        <!-- call from database -->
            <?php
            foreach($data as $row){ ?>

<div class="col-lg-10 col-md-6 mb-6">
  <div class="container"><br>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="table" width="100%">
              <input type="hidden" name="MedicalId" value="<?=$row['id']; ?>">
              <tr>
                <td colspan="3"><center>EDIT PRODUCT INFORMATION</center></td>
            </tr>
            <tr>
                <td width="200">Product Name</td>
                <td width="152"><input type="text" name="name" value="<?=$row['name']?>" required></td>
            </tr>
            <tr>
                <td>Price (RM)</td>
                <td><input type="number" name="price" min="0.10" step="any" value="<?=$row['price']?>"></td>
            </tr>
            <tr> 
                <td>Product Description</td>        
                <td><textarea name="des" cols="22" rows="4"><?=$row['des']?></textarea></td>
            </tr>
             <tr>
                <td>Stock Quantity</td>
                <td><input type="number" name="quantity" min="1" value="<?=$row['quantity']?>"></td>
            </tr>
            <tr>
                <td>Photo</td>
                <input type="hidden" name="photo" value="<?php echo $row['img']; ?>">
                <td><input type="file" name="img"></td>
              </tr>
            <tr>
                <td></td>
                <td><img src="../../../picture/<?php echo $row['img']; ?>" width="250px" height="250px"></td>
           </tr>
           <tr>
            <td></td>
              <td><button type="submit" name="update" value="updateMedical" class="btn btn-info">UPDATE</button></td>
              <td><button type="button" onClick="location.href='spViewMedical.php'" class="btn btn-danger">CANCEL</button></td>
            </tr>
       </table>
        </form></div>
            </div>

          </div>
          <?php } ?>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
<?=template_footer()?>