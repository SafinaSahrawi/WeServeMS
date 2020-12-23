<?php
require_once "../../BusinessServiceLayer/Admincontroller/adminController.php";//call the function from controller to get runner login list
//object
$admin = new adminController();
//get all the runner login information from view runner function
$data = $admin->viewRunner()->fetchAll();
//if else statement to approve the runner login
if (isset($_POST['approve'])){
  $admin->accept();
}
//if else statement to delete the runner login
if(isset($_GET['delete'])){
    $delete_id = $_GET["delete"];
    $admin->delete($delete_id);
}

?>
<form action="" method="POST">

<html lang="en">

<?php include('template/header.php'); ?>
 <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <img src="WeServeSmall_Logo.png">
        <div class="list-group">
          <a href="admin.php" class="list-group-item">Runner Approval List</a>
          <a href="adminsp.php" class="list-group-item">Service Provider List</a>
        </div>
        </div>
      <div class="col-lg-9 col-md-5 mb-4">  <!-- to create container -->
<div class="cart content-wrapper">
    <br><h1>Runner Approval</h1><br>
    <form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td scope="col">Runner ID</td>
                    <td scope="col">Runner Name</td>
                    <td scope="col">License</td>
                    <td scope="col">Vehicle Type</td>
                    <td scope="col">Vehicle No</td>
                    <td scope="col">Phone No</td>
                    <td scope="col">Address</td>
                    <td scope="col">Action</td>
                </tr>
                <tbody>
                <?php
          $i = 1;
          foreach($data as $row){ 
            ?>  
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td>
                <div class="font-weight-bold"><?php echo $row['username']; ?></div>
              </td>
              <td>
                <div class="font-weight-bold"><?php echo $row['R_Runner_License']; ?></div>
              </td>
              <td>
                <div class="font-weight-bold"><?php echo $row['R_Runner_Vehicletype']; ?></div>
              </td>
              <td>
                <div class="font-weight-bold"><?php echo $row['R_Runner_VehicleNo']; ?></div>
              </td>
              <td>
                <div class="font-weight-bold"><?php echo $row['R_Runner_PhoneNo']; ?></div>
              </td>
              <td>
                <div class="font-weight-bold"><?php echo $row['R_Runner_Address']; ?></div>
              </td>
               <td><a input type="hidden" name="id" value="<?=$row['id']?>"><input id="approve" type="submit" class="btn btn-primary mb-2" name="approve" value="Approve"></a><!-- this button will approve the runner login -->
               <a class="btn btn-danger" href="?delete=<?= $row['id']; ?>" >Remove</a></td> <!-- this button will remove the runner login -->
            </tr> 
            <?php
            $i++;//loop
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
<?php include('template/footer.php'); ?>

</html>