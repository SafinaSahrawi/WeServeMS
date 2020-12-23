<?php 
session_start();
require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";

$Cart = new Controller();
$data = $Cart->viewAllCart()->fetchAll();

if(isset($_GET['delete'])){
    $delete_id = $_GET["delete"];
    $Cart->delete($delete_id);
}
$deliveryfee=4.00;
$TotalDeliveryFee = 0.00;
$subtotal = 0.00;
?>

<title>Cart</title>
<?=template_header('cart')?>
<!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br><br>
        <img src='../../../picture/Weserve.jpeg' width="255px" height="225px"alt='' />
         <br><br>
        <div class="list-group">
          <a href="../custAddCart/food.php" class="list-group-item">Food </a>
          <a href="../custAddCart/good.php" class="list-group-item">Good </a>
          <a href="../custAddCart/medical.php" class="list-group-item">Medical </a>
        </div>
        
    </div>
     <!-- /.col-lg-3 -->
<div class="col-lg-9 col-md-5 mb-4">
<div class="cart content-wrapper">
	<br>
    <h1>Shopping Cart</h1>
    <form action="../custMakePayment/custAddress.php" method="post">
        <table border='2'>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price(RM)</td>
                    <td>Quantity</td>
                    <td>Total(RM)</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($data)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($data as $row): ?>
                <tr>
                    <td class="img">
                       <a href="productfood.php?FoodId=<?=$row['product_id']?>">
                            <img src="../../../picture/<?=$row['product_img']?>"  width="50" height="50" >
                        </a>
                    </td> 
                    <td>
                         <a href="productfood.php?FoodId=<?=$row['product_id']?>"></a><?=$row['product_name']?>
                        <br>
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <a class="btn btn-danger" href="?delete=<?= $row['id']; ?>" >Remove</a>
                    </td>
                     <td class="price"><?=$row['product_price']?>
                    <td class="quantity">
                        <input type="number" name="quantity" value="<?=$row['product_quantity']?>" >
                    </td>
                     <td class="price"><?=$row['product_price'] * $row['product_quantity']?></td>
                    <?php $subtotal += $row['product_price'] * $row['product_quantity'] + $deliveryfee; ?>
                    <?php $TotalDeliveryFee += $deliveryfee; ?>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
  <div class="subtotal">
            <span class="text">Delivery Fee For each product=</span>
            <span class="price">RM<?=$deliveryfee?></span><br>
            <span class="text">Total Delivery Fee=</span>
            <span class="price">RM<?=$TotalDeliveryFee?></span><br>
            <span class="text">Subtotal=</span>
            <span class="price">RM<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Check Out" name="placeorder">
        </div>
    </form>
</div>
</div>
</div>
</div>

<?=template_footer()?>

