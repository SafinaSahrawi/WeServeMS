<?php
session_start();
//hold info about one single user
require_once '../../../BusinessServiceLayer/Runnercontroller/RunnerController.php';
//to get the function from runner controller
$runner = new RunnerController();//to create object
$data = $runner->viewRunnerinfo();//to view the information from runner table

$runner="";
?>

<html lang="en">

<?=template_header('Runnerviewprofile')?>
<style>
body {
  background-color: white;
}
</style>
<aside></aside>
<center>

 <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
      <br><br>
        <img src='../../AdminView/WeServeSmall_Logo.png' width="255px" height="225px"alt='' />
         <br><br>
        <div class="list-group">
          <a href="Runnerviewprofile.php" class="list-group-item">Runner Information</a>
          <a href="http://localhost/wsms/ApplicationLayer/RunnerView/RunnerDeliveryInfo/RunnerOrder.php" class="list-group-item">Delivery Management</a>
        </div>
      </div>
 
      <div class="col-lg-5 col-md-5 mb-4">
           <div class="cart content-wrapper">
            <img src="../../AdminView/runner.png" style="width:130%">
            <br>
            <h1>Runner Profile</h1>
            <?php foreach ($data as $row){?>
          <table border='1'>
      <tr>
        <td>Name:</td>
        <td><?=$_SESSION['username'];?></td>
      </tr>
      <tr>
        <td>Vehicle Type:</td>
        <td><?=$row['R_Runner_Vehicletype'];?></td>
      </tr>
      <tr>
        <td>Vehicle Number:</td>
        <td><?=$row['R_Runner_VehicleNo'];?></td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td><?=$row['R_Runner_PhoneNo'];?></td>
      </tr>
      <tr>
        <td colspan="2"><a href="RunnerProfile.php?username=<?=$row['username']?>"><button type="button" class="btn btn-success">Edit Profile</button></a></td> <!-- /.this button will bring the data to update in runner profile -->
      </tr>

            <?php } ?>

  </div>
</table>
</div>
</div>
</div>
</div>
      
  <!-- /.container -->
<br>
<?=template_footer()?>