<?php
require_once '../../../BusinessServiceLayer/Runnercontroller/RunnerController.php';//call the controller to get the function
$runner = new RunnerController();//object
$data = $runner->viewAllDelivery()->fetchAll();//get all the entered order information from the view all delivery table

if (isset($_GET['act'])) { //if else statement for accept the order button

  if ($_GET['act'] == 'accept') {
    $runner->addDelivery($_GET['id']);//get the information followed by it's unique id
  }  
}

if (isset($_GET['approve'])){

  if ($_GET['approve'] == '0'){
    $runner->AcceptDelivery($_GET['id']);
  }
}

?>

<html lang="en">

<?=template_header('RunnerOrder')?>
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
    <br><br><h1>Order List</h1><br>
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
              <td><?php echo $row['firstname']; ?></td>
              <td><?php echo $row['cust_add2']?></td>
              <td><?php echo $row['product_name']; ?></td>
              <td><?php echo $row['product_quantity']; ?></td>
              <td><form action="" method="POST">
         <span onclick="location.href='RunnerDeliveredOrder.php?id=<?=$row['id']?>'" value="add">&nbsp;
          <i class="btn btn-success"> Accept job</i><!-- this button will bring to runner deliver order page where runner can update the order status -->
          </span>
                </form></td>
            </tr> 
            <?php
            $i++;
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