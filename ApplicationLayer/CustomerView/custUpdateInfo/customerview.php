<?php
session_start();

require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";

$Customer = new Controller();
$data = $Customer->viewCustomerinfo();

$customer="";
?>

<?=template_header('customerview')?>
      <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <br><br>
        <img src='../../../picture/Weserve.jpeg' width="255px" height="225px"alt='' />
         <br><br>
        <div class="list-group">
         <a href="../custAddCart/food.php" class="list-group-item">Back To Home Page </a>
           <a href="customerupdate.php" class="list-group-item">Edit </a>
          <a href="http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php" class="list-group-item">Log Out</a>
        </div>
        
    </div>
     <!-- /.col-lg-3 -->
          <div class="col-lg-5 col-md-5 mb-4">
           <div class="cart content-wrapper">
            <br><br>
            <img src="../../AdminView/cust.jpg" style="width:100%">
            <br><br>
            <h1>Customer Information</h1>
            <?php foreach ($data as $row){?>
          <table border='1'>
      <tr>
        <td>Customer Name:</td>
        <td><?=$_SESSION['username'];?></td>
      </tr>
      <tr>
        <td>Customer Address:</td>
        <td><?=$row['C_CustAddress'];?></td>
      </tr>
      <tr>
        <td>Customer Phone:</td>
        <td><?=$row['C_CustPhoneNumber'];?></td>
      </tr>
      <tr>
        <td colspan="2"><a href="customerupdate.php?username=<?=$row['username']?>"><button type="button" class="btn btn-success">Edit Profile</button></a></td>
      </tr>

            <?php } ?>

  </div>
</table>
</div>
</div>
</div>
</div>

<?=template_footer()?>