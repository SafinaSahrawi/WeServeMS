<?php
require_once '../../libs/database.php';
//to connect the model to database & mysql

class adminmodel {
	//to take the login information from runner table
	function viewRunner() {
		$sql = "select * from runner where R_Status='0'";
        return DB::run($sql);
	}
  //to take the login information from service provider table
	function viewsp() {
		$sql = "select * from serviceprovider where S_status='0'";
        return DB::run($sql);
	}
  //admin to update the runner status for admin approval
	function accept() {
		$sql = "update runner set R_Status = '1' WHERE id = :id ";
        $args = [':id'=>$this->id];
          return DB::run($sql,$args);
	}
  //admin to update the service provider status for admin approval
	function acceptsp() {
		$sql = "update serviceprovider set S_status = '1' WHERE id = :id ";
        $args = [':id'=>$this->id];
          return DB::run($sql,$args);
	}
  //to delete the runner login details frrom database
	function deleterun(){
    $sql = "DELETE FROM runner WHERE id= :id";
    $args = [':id'=>$this->id];
    return DB::run($sql,$args);
    }
  //to delete the service provider details from database
    function deletesp(){
    $sql = "DELETE FROM runner WHERE id= :id";
    $args = [':id'=>$this->id];
    return DB::run($sql,$args);
    }
}
?>