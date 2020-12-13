<?php
session_start();
//hold information about one user
require_once '../../../BusinessServiceLayer/Runnercontroller/RunnerController.php';//call the controller to get the function from controller

$username = isset($_GET['username']) ? $_GET['username'] : ''; //to get the info from view runner info
$runner = new RunnerController(); //object
$data = $runner->viewRunnerinfo(); //call by method

if(isset($_POST['update'])) //call the edit runner info to edit the runner profile
{
  $runner = new RunnerController();//object
  $runner->editRunnerinfo();//call by method
}
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
            <img src="../../AdminView/runner.png" style="width:105%">
            <br>
            <h1>Runner Update Information</h1>
            <?php foreach ($data as $row){?>
          <table border='1'>
          <form action=" " method="POST">
      <tr>
        <td>Name:</td>
        <td><?=$_SESSION['username'];?></td>
      </tr>
      <tr>
        <td>Vehicle Type:</td>
        <td><input type="text" name="R_Runner_Vehicletype" value="<?=$row['R_Runner_Vehicletype']?>"></td>
      </tr>
      <tr>
        <td>Vehicle No:</td>
        <td><input type="text" name="R_Runner_VehicleNo" value="<?=$row['R_Runner_VehicleNo']?>"></td>
      </tr>
      <tr>
        <td>Phone Number:</td>
        <td><input type="text" name="R_Runner_PhoneNo" value="<?=$row['R_Runner_PhoneNo']?>"></td>
      </tr>
      <tr> 
        <td colspan="2"><input type="submit" value="update" name="update"></td> <!-- this button will update the edited information and will bring back to runner view profile -->
      </tr>
     <?php } ?>
</form>
  </div>
</table>
</div>
</div>
</div>
</div>

      
  <!-- /.container -->
<br>
<?=template_footer()?>