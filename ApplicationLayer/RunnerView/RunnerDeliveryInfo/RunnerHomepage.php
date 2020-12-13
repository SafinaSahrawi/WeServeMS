<?php
require_once '../../../BusinessServiceLayer/Runnercontroller/RunnerController.php';//to get the function from controller
$runner = new RunnerController(); //to create object
$data = $runner->viewAllDelivery()->fetchAll();//to view all the delivery information
?>

<html lang="en">

<?=template_header('RunnerHomepage')?>
 <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
       <br><br>
        <img src='../../AdminView/WeServeSmall_Logo.png' width="255px" height="225px"alt='' />
         <br><br>
        <div class="list-group">
          <a href="http://localhost/wsms/ApplicationLayer/RunnerView/RunnerViewInfo/RunnerViewProfile.php" class="list-group-item">Runner Information</a>
          <a href="RunnerOrder.php" class="list-group-item">Delivery Management</a>
        </div>
        </div>
      <div class="col-lg-9 col-md-5 mb-4">
<div class="cart content-wrapper">
    <br><br><h1>Order to Deliver</h1><br>
    <form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td scope="col">Order ID</td>
                    <td scope="col">Customer Name</td>
                    <td scope="col">Delivery Address</td>
                    <td scope="col">Product Name</td>
                    <td scope="col">Quantity</td>
                </tr>
                <tbody>
                <?php
          $i = 1;
          foreach($data as $row){
            ?>  
            <tr>
              <td><?php echo $row['customer_id']; ?></td>
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['cust_add2']?></td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['product_quantity']; ?></td>
            </tr> 
            <?php
            $i++; //looping
          }
          ?>
            </tbody>
            </thead>
        </table>
      </form>
</div> 
</div> 
</div>
</div>
  <!-- /.container -->
  </center>
</aside>
<br>
<?=template_footer()?>