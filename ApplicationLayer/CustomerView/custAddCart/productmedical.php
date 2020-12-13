<?php

session_start();
require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";

$MedicalId = $_GET['MedicalId'];
$Medical = new Controller();
$data = $Medical->viewCertainMedicalDetail($MedicalId);

if(isset($_POST['add']))
{
  $Product = new Controller();
  $Product->add();
}
?>
<title>Medical Details</title>
<?=template_header('productmedical')?>


<!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br><br>
        <img src='../../../picture/Weserve.jpeg' width="255px" height="225px"alt='' />
         <br><br>
        <div class="list-group">
          <a href="food.php" class="list-group-item">Food </a>
          <a href="good.php" class="list-group-item">Good </a>
          <a href="medical.php" class="list-group-item">Medical </a>
        </div>
        
        
    </div>
     <!-- /.col-lg-3 -->
<div class="col-lg-4">
<div class="product content-wrapper">
<br>
<br>

<h1>Product Details</h1>
<?php foreach ($data as $row){?>
    <img src="../../../picture/<?=$row['img']?>" width="500" height="500" alt="<?=$row['name']?>">
    <div>
        <h1 class="name"><?=$row['name']?></h1>
        <span class="price">RM<?=$row['price']?>
        </span>
  <form action="productmedical.php" method="POST">
            <input type="number" name="quantity" value="" min="1" max="<?=$row['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$row['id']?>">
            <input type="hidden" name="product_name" value="<?=$row['name']?>">
            <input type="hidden" name="product_img" value="<?=$row['img']?>">
            <input type="hidden" name="price" value="<?=$row['price']?>">
            <input type="submit" value="Add To Cart" name="add">
        </form>
        <div class="description">
            <?=$row['des']?> 
        </div>
    </div>
    <?php } ?>
</div>
</div>
</div>
</div>
 <?=template_footer()?>
