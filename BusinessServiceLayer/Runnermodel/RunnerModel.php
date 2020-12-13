<?php
require_once "../../../libs/database.php";
//to connect with mysql

class RunnerModel{

    //to update the edited runner info in database
	function updateRunnerinfo(){

        $sql = "update runner set R_Runner_VehicleNo =:R_Runner_VehicleNo,R_Runner_Vehicletype=:R_Runner_Vehicletype,R_Runner_PhoneNo=:R_Runner_PhoneNo where username=:username";
        $args = [':username'=>$this->username,':R_Runner_VehicleNo'=>$this->R_Runner_VehicleNo, ':R_Runner_Vehicletype'=>$this->R_Runner_Vehicletype,':R_Runner_PhoneNo'=>$this->R_Runner_PhoneNo];
        return DB::run($sql,$args);
    }
    //to view runner personal details from database
     function viewRunnerDetail(){

        $sql = "SELECT * FROM runner WHERE username = :username";
        $args = [':username'=>$this->username];
        return DB::run($sql, $args);
    }

    //view all the order delivery from database
	function viewAllDelivery(){  
		$sql = "SELECT*FROM cart INNER JOIN payment ON cart.customer_id=payment.customer_id";
		return DB::run($sql);
	}
    
    //To avoid the loop, if the runner picked up the job it will change to 1 in the database
	function AcceptDelivery(){
        $sql = "UPDATE cart SET item_status = '0' WHERE id = :id ";
        $args = [':id'=>$this->id];
          return DB::run($sql,$args);

    }
    //to display and change status to completed in database
    function CompleteDelivery($id){

        $sql = "UPDATE cart SET O_status='Completed' where id=:id;";
        $args = [ ':id'=>$id ];
        return DB::run($sql,$args);
        
    }
    //to display the orders after run picked up the job
    function CurrentDelivery(){
        $sql = "SELECT * FROM cart c, payment p WHERE c.payment_id=id AND p.O_status=:O_status";
        $args = [':O_status'=>'Delivering',
            ':payment_id'=>$_SESSION['payment_id'] 
        ];

        return DB::run($sql,$args);

    }
    //to add the button of runner accept job with the status delivering,Once the runner clicked into the button the item status would be delivering
	function addDelivery($id){

        $sql = "begin;
         update payment set payment_id=:payment_id where payment_id=:id;
        update cart set item_status='Delivering' where id=:id;
        commit";
        $args = [ 
            ':id'=>$id, 
        ];
        return DB::run($sql,$args);
    }
}
?>
