<?php
session_start();
require_once ('../../../BusinessServiceLayer/SpController/spController.php');

$sprovider = new spController();
  $data = $sprovider->viewInfo()->fetchAll();

$sprovider="";
?>
<?=template_header('viewSP')?>


 <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br>

        <center><a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spView.php"><img src="../../../picture/Weserve.jpeg"></a>
        <p>SERVICE PROVIDER<p></center>
          <div class="list-group">
          <a href="spViewFood.php" class="list-group-item">Food </a>
          <a href="spViewGoods.php" class="list-group-item">Good </a>
          <a href="spViewMedical.php" class="list-group-item">Medical </a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">
                        <!-- call from database -->
          <?php foreach ($data as $row) { ?>


<div class="col-lg-10 col-md-6 mb-6"><br>
  <div class="container">
            <table class="table" width="100%">
              <form action="" method="POST" enctype="multipart/form-data">
              <tr>
                <td colspan="3"><center><b>SERVICE PROVIDER INFORMATION</b></center></td>
            </tr>
            <tr>
                <td width="200">Username</td>
                <td colspan="2"><?=$row['username']?></td>
            </tr>
            <tr>
                <td>Company Name</td>        
                <td colspan="2"><?=$row['S_Company_Name']?></td>
            </tr>
                <td>Company Address</td>
                <td colspan="2"><?=$row['S_CompanyAddress']?></td>
            </tr>
            </tr>
                <td>Phone Number</td>
                <td colspan="2"><?=$row['S_ServiceProviderPhoneNo']?></td>
            </tr>
           <tr>
            <td></td>
              <td><button type="button" onClick="location.href='spUpdateInfo.php?username=<?=$row['username']; ?>'" name="edit" value="edit" class="btn btn-info">EDIT</button></td>
              <td><button type="button" onClick="location.href='../spProduct/spView.php'" class="btn btn-danger">CANCEL</button></td>
            </tr>
       </form></table>
        
      </div>
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