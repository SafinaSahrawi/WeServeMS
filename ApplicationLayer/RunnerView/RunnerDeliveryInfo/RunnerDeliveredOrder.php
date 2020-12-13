<?php
require_once '../../../BusinessServiceLayer/Runnercontroller/RunnerController.php';

$runner = new RunnerController();
$data = $runner->CurrentDelivery();

if (isset($_GET['act'])) {

  if ($_GET['act'] == 'complete') {

    $runner->completeDelivery($_GET['id']);
  } 
}

?>

<html lang="en">

<?=template_header('RunnerDeliveredOrder')?>
 <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
      <br><br>
        <img src='../../AdminView/WeServeSmall_Logo.png' width="255px" height="225px"alt='' />
         <br><br>
        <div class="list-group">
          <a href="RunnerDeliveredOrder.php" class="list-group-item">Completed List</a>
          
        </div>
        </div>
      <div class="col-lg-9 col-md-5 mb-4">
<div class="cart content-wrapper">
    <br><h1>Accepted Order</h1><br>
    <form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td scope="col">Order ID</td>
                    <td scope="col">Customer Name</td>
                    <td scope="col">Delivery Address</td>
                    <td scope="col">Product Name</td>
                    <td scope="col">Quantity</td>
                    <td scope="col">Action</td>
                </tr>
                <tbody>
                <?php
          $i = 1;
          foreach($data as $row){
            ?>  
            <tr>
              <td><?php echo $row['customer_id']; ?></td>
              <td>
                <div class="font-weight-bold"><?php echo $row['firstname']; ?></div>
              </td>
              <td>
                <div class="font-weight-bold"><?php echo $row['cust_add2']?></div>
              </td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['product_quantity']; ?></td>
               <td><a href="RunnerDeliveredOrder?act=complete&id=<?php echo $row['id']; ?> " onclick="return confirm()" class="btn btn-success">Complete</a></td>
            </tr> 
            <?php
            $i;
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