<?php
require_once ('../../../BusinessServiceLayer/SpController/spController.php');


$product = new spController();
  $data = $product->viewAllMedical()->fetchAll();

if(isset($_POST['delete'])){
    $product->deleteMedical();
}

?>
<?=template_header('spViewMedical')?>

 <!-- Page Content -->
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
          <a href="addProduct.php" class="list-group-item">Add Product </a>
        </div>

            </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">
                        <!-- call from database -->
            <?php
            foreach($data as $row){ ?>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="viewMedical.php?MedicalId=<?=$row['id']?>" method="post" class="medical"><img class="card-img-top" src="../../../picture/<?php echo $row['img']; ?>" alt="" width="250px" height="250px"></a>
          
              <div class="card-body">
                <h4 class="card-title">
                  <a href="viewMedical.php?MedicalId=<?=$row['id']?>">
                    <?=$row['name']?></a>
                </h4>
                <h5>RM <?=$row['price']?></h5>
                <p class="card-text"><?=$row['des']?></p>
              </div>
              <div>
              <form action="" method="POST">
              <p class="page-header">
              <span><center>

              <input type="hidden" name="MedicalId" value="<?=$row['id']?>"><button type="button" class="btn btn-info" name="view" value="VIEW" onClick="location.href='viewMedical.php?MedicalId=<?=$row['id']; ?>'" class="button button2">VIEW</button>
              <button type="button" onClick="location.href='editMedical.php?MedicalId=<?=$row['id']; ?>'" value="EDIT" class="btn btn-info">EDIT</button>
              </center></span>
              </p></form></div>

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