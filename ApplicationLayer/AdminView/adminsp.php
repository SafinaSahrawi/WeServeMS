<?php
require_once "../../BusinessServiceLayer/Admincontroller/adminController.php";//call controller to tak the service provider login information from viewsp function

//object
$admin = new adminController();
//get the data from function
$data = $admin->viewsp()->fetchAll();
//if else statement to approve the service provider login
if (isset($_POST['approve'])){
  $admin->acceptsp();
}
//if else statement to delete the service provider login
if(isset($_GET['delete'])){
    $delete_id = $_GET["delete"];
    $admin->deletesvp($delete_id);
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
      <div class="col-lg-9 col-md-5 mb-4">
<div class="cart content-wrapper">
    <br><h1>Service Provider Approval</h1><br>
    <form>
        <table class="table table-striped"> 
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">COMPANY NAME</td>
                    <td scope="col">Action</td>
                </tr>
                <tbody>
                <?php
          $i = 1;
          foreach($data as $row){ //rows
            ?>  
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td>
                <div class="font-weight-bold"><?php echo $row['S_Company_Name']; ?></div>
              </td>
              <td><a input type="hidden" name="id" value="<?=$row['id']?>"><input id="approve" type="submit" class="btn btn-primary mb-2" name="approve" value="Approve"></a> <!-- this button will approve the service provider login -->
               <a class="btn btn-danger" href="?delete=<?= $row['id']; ?>" >Remove</a></td> <!-- this button will delete the service provider login -->
            </tr> 
            <?php
            $i++;//loops
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