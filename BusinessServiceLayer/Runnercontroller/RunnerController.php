<?php
require_once '../../../BusinessServiceLayer/Runnermodel/RunnerModel.php';//handles the user input and take data from runner model

class RunnerController { 
    //to send the data to display the runner information in runner profile
    function viewRunnerinfo(){
        $runner = new RunnerModel;
        $runner->username = $_SESSION['username'];
        return $runner->viewRunnerDetail();
    }
   //to send the updated data to the runner view from the model
    function editRunnerinfo(){
        $runner = new RunnerModel;
        $runner->username = $_SESSION['username'];
        $runner->R_Runner_Vehicletype= $_POST['R_Runner_Vehicletype'];
        $runner->R_Runner_VehicleNo= $_POST['R_Runner_VehicleNo'];
        $runner->R_Runner_PhoneNo= $_POST['R_Runner_PhoneNo'];
        if($runner->updateRunnerinfo()){
            $message = "Your Details has been UPDATED!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'Runnerviewprofile.php?username=".$_POST['username']."';</script>";
        }
    }
   //to send all the delivery details to runner order interface
    function viewAllDelivery(){
        $runner = new RunnerModel();
        return $runner->viewAllDelivery();
    }
   //to send the accepted delivery to the next interface after runner pick the accept job button
    function viewAcceptDelivery($id){
    $runner = new RunnerModel();
    $runner->id = $id;
    return $runner->viewAcceptDelivery();
  }
    //to send the currentdelivery details which runner took to update the status
    function CurrentDelivery(){
        $runner = new RunnerModel();
        return $runner->CurrentDelivery();
    }
    //to send the delivery status where it is completed to the runner view.
    function CompleteDelivery($id){
        $runner = new RunnerModel();
        header('Location: RunnerHomepage');
        return $runner->completeDelivery($id);
    }
    //accept the pressed button in the interface
    function addDelivery($id){
        $runner = new RunnerModel();
        header('Location:RunnerAcceptOrder');
        return $runner->addDelivery($id);
    
    if($runner->addDelivery()){
      $message = "You Accepted the Job!";
      echo "<script type='text/javascript'>alert('$message');
             window.location ='../RunnerDeliveryInfo/RunnerDeliveredOrder';</script>";
          }
    }

}
function template_header($title) {
echo <<<EOT

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>WSMS</title>

  <!-- Bootstrap core CSS -->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#"><h1>WeServe</h1></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/wsms/ApplicationLayer/RunnerView/RunnerDeliveryInfo/RunnerHomepage.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/wsms/ApplicationLayer/RunnerView/RunnerViewInfo/RunnerProfile.php">Edit Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 
    
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
    
    <!-- Footer -->
    <footer class="py-5 bg-dark">
    <div class="col-sm-12">
      <p class="m-0 text-center text-white">Copyright &copy; WeServe 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

EOT;
}

?>
