<?php
session_start();
require_once ('../../../BusinessServiceLayer/SpController/spController.php');


$order = new spController();
  $data = $order->viewOrder()->fetchAll();

if(isset($_POST['acceptOrder'])){
  $order->acceptOrder();
}

?>
 <?=template_header('SPconfirm')?>
      <!-- /.col-lg-3 -->
      <div class="container">
      <div class="row">
      <div class="col-lg-3">

        <br>

        <center><a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spView.php"><img src="../../../picture/Weserve.jpeg" width="255px" height="225px"alt></a>
        <p>SERVICE PROVIDER</p></center>
          <input type="hidden" name="sp_id" value="<?=$_SESSION['id']?>">
          <div class="list-group">
          <a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spViewFood.php" class="list-group-item">Food </a>
          <a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spViewGoods.php" class="list-group-item">Good </a>
          <a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spViewMedical.php" class="list-group-item">Medical </a>
          <a href="http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/addProduct.php" class="list-group-item">Add Product </a>
        </div>

            </div>
      
      <div class="col-lg-9"><br>

        <h3><center>COMPLETED ORDER</center></h3>

        <div class="row">
          
            <table border="1" class="table table-hover">

              <form action="" method="POST"><div align="center">
              <thead>
              <tr>
                
                <th>Order No.</th>
                <th>Customer Address</th>
                <th>Customer Phone</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                
              </tr></thead>
              <tbody>
              <?php
            foreach($data as $row){
               echo "<tr>"
                       . "<td><center>".$row['id']."</center></td>"
                       . "<td>".$row['C_CustAddress']."</td>"
                       . "<td>".$row['C_CustPhoneNumber']."</td>"
                       . "<td><center>".$row['payment_complete']."</center></td>"
                       . "<td><center>".$row['sp_confirm']."</center></td>";
               ?>
            </div>
              
              <?php 
             echo "</tr>";
           }
             ?>
              </tbody>
            </form>
            </table>
          

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
  
<?=template_footer()?>