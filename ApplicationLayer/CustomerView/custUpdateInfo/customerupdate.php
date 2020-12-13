<?php
session_start();

require_once "../../../BusinessServiceLayer/Customercontroller/controller.php";

$username = isset($_GET['username']) ? $_GET['username'] : '';
$Customer = new Controller();
$data = $Customer->viewCustomerinfo();

if(isset($_POST['update']))
{
  $Customer = new Controller();
  $Customer->editCustomerinfo();
}
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
          <form action=" " method="POST">
      <tr>
        <td>Customer Name:</td>
        <td><?=$_SESSION['username'];?></td>
      </tr>
      <tr>
        <td>Customer Address:</td>
        <td><input type="text" name="C_CustAddress" value="<?=$row['C_CustAddress']?>"></td>
      </tr>
      <tr>
        <td>Customer Phone:</td>
        <td><input type="text" name="C_CustPhoneNumber" value="<?=$row['C_CustPhoneNumber']?>"></td>
      </tr>
      <tr> 
        <td colspan="2"><input type="submit" value="update" name="update"></td>
      </tr>


            <?php } ?>
</form>
  </div>
</table>
</div>
</div>
</div>
</div>



<?=template_footer()?>