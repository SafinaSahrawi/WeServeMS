<?php
require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";

  $Good = new Controller();
  $data = $Good->viewAllGood()->fetchAll();
  ?>


<?=template_header('good')?>
        
     <title>Good Page</title>
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
          <div class="col-lg-5 col-md-5 mb-4">
           <div class="cart content-wrapper">
            <br>
            <h1>Good Categories</h1>
           
            
                <?php foreach ($data as $row): ?>
             <div class="card h-100">
              <a href="productgood.php?GoodId=<?=$row['id']?>" method="post" class="good">
                <img src="../../../picture/<?=$row['img']?>" width="200" height="200" alt="<?=$row['name']?>"></a>
                <div class="card-body">
                <h4 class="card-title">
              <span class="#"><?=$row['name']?></span><br>
            </h4>
            <h5>
              <span class="#">RM<?=$row['price']?></span><br>
            </h5>
               <span class="card-text"><?=$row['des']?></span><br>
               <div class="card-footer">
                

              </div>
            
          </div>
        
       
    </div>
<?php endforeach; ?>
  </div>
</div>
</div>
</div>





<?=template_footer()?>