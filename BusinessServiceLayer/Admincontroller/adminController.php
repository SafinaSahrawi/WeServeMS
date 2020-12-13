<?php
require_once '../../BusinessServiceLayer/Adminmodel/adminmodel.php'; //to get/call the data from adminmodel

class adminController {
    //to retrieve the runner login info data from function viewRunner in adminmodel
	function viewRunner() {

		$admin = new adminmodel();
		return $admin->viewRunner();

	}
    //to retrieve the service provider login info data from function viewsp in adminmodel
    function viewsp() {

        $admin = new adminmodel();
        return $admin->viewsp();

    }
    //to retrieve the approval data of runner from function accept in adminmodel
     function accept(){
        $admin = new adminmodel();
        $admin->id = $_POST['id'];
        if($admin->accept()){
            $message = "Request Approved";
		echo "<script type='text/javascript'>alert('$message');
		window.location = '../ApplicationLayer/AdminView/admin';</script>";
        }
    }	
    //to retrieve the approval data of service provider from function acceptsp in adminmodel
    function acceptsp(){
        $admin = new adminmodel();
        $admin->id = $_POST['id'];
        if($admin->acceptsp()){
            $message = "Request Approved";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../ApplicationLayer/AdminView/adminsp';</script>";
        }
    }   
    //to send the delete request to adminmodel for delete the runner login data in database
    function delete($id){
    $admin = new adminmodel();
    $admin->id = $_POST['$id'];

    if($admin->deleterun()){
      $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../AdminView/admin.php';</script>";
    }  
    }
    //to send the delete request to adminmodel for delete the runner login data in database
    function deletesvp($id){
    $admin = new adminmodel();
    $admin->id = $_POST['$id'];

    if($admin->deletesp()){
      $message = "Success Delete!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = '../AdminView/adminsp.php';</script>";
    }  
    }  
}
?>