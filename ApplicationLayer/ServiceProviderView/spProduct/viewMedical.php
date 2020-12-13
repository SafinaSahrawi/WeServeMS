<?php
require_once ('../../../BusinessServiceLayer/SpController/spController.php');

$MedicalId = $_GET['MedicalId'];
$product = new spController();
$data = $product->viewMedical($MedicalId);

if(isset($_POST['delete'])){
    $product->deleteMedical();
}
?>

<?=template_header('viewMedical')?>
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

<div class="col-lg-10 col-md-6 mb-4">
  <div class="container"><br>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="table table-hover">
              <input type="hidden" name="MedicalId" value="<?=$row['id']?>">
              <tr>
                <td colspan="3">PRODUCT DETAILS</td>
            </tr>
            <tr>
                <td width="149">Product Name</td>
                <td width="152"><?=$row['name']?></td>
            </tr>
            <tr>
                <td>Product Description</td>        
                <td><?=$row['des']?></td>
            </tr>
            <tr>
                <td>Price (RM)</td>
                <td><?=$row['price']?></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td><?=$row['quantity']?></td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><img src="../../../picture/<?php echo $row['img']; ?>" width="250px" height="250px"></td>
           </tr>
           <tr>
              <td></td>
              <td><center><button type="button" onClick="location.href='editMedical.php?MedicalId=<?=$row['id']; ?>'" value="EDIT" class="btn btn-info">EDIT</button></td> 

              <td><button type="submit" class="btn btn-danger" name="delete" value="DELETE" onClick="return confirm('Are you SURE you want to delete?')" class="button button2">DELETE</button></center></td>
       </table>
        </form>
            </div><!--end container -->
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