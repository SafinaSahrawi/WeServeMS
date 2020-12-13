<?php


class model{
	public $username, $password, $usertype;
    private $pdo = null;

    public function __construct() {
        include '../template/database.php';
        $this->pdo = $pdo;
    }

    public function registerCustomer() {
        $sql = "INSERT INTO customer (username, C_CustAddress, C_CustPhoneNumber) VALUES (:username, :C_CustAddress, :C_CustPhoneNumber)";
        $args= [
            ':username'=>$this->username,
            ':C_CustAddress'=> $this->C_CustAddress,
            ':C_CustPhoneNumber'=> $this->C_CustPhoneNumber

        ];


        $stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
    }


    public function registerServiceProvider() {
        $sql = "INSERT INTO serviceprovider (username, S_Company_Name, S_CompanyAddress, S_ServiceProviderPhoneNo) VALUES (:username, :S_Company_Name, :S_CompanyAddress, :S_ServiceProviderPhoneNo)";
        $args= [
            ':username'=>$this->username,
            ':S_Company_Name'=> $this->S_Company_Name,
            ':S_CompanyAddress'=> $this->S_CompanyAddress,
            ':S_ServiceProviderPhoneNo'=>$this->S_ServiceProviderPhoneNo

        ];


        $stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
    }

    public function registerRunner() {
        $sql = "INSERT INTO runner (username, R_Runner_License, R_Runner_Vehicletype, R_Runner_VehicleNo, R_Runner_PhoneNo, R_Runner_Address) VALUES (:username, :R_Runner_License, :R_Runner_Vehicletype, :R_Runner_VehicleNo, :R_Runner_PhoneNo, :R_Runner_Address)";
        $args= [
            ':username'=>$this->username,
            ':R_Runner_License'=> $this->R_Runner_License,
            ':R_Runner_Vehicletype'=> $this->R_Runner_Vehicletype,
            ':R_Runner_VehicleNo'=>$this->R_Runner_VehicleNo,
            ':R_Runner_PhoneNo'=>$this->R_Runner_PhoneNo,
            ':R_Runner_Address'=>$this->R_Runner_Address,

        ];


        $stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
    }


	function addUser(){

		$sql = "INSERT INTO users (username, password, usertype) VALUES (:username, :password, :usertype)";
		$args= [
            ':username'=>$this->username, 
            ':password'=>password_hash($this->password, PASSWORD_DEFAULT), 
            ':usertype' => $this->usertype
        ];


		$stmt = $this->pdo->prepare($sql);            
        // Attempt to execute the prepared statement
        $stmt->execute($args);
            //     // Redirect to login page
            //     header("location: ../view/login.php");
            // } else{
            //     echo "Something went wrong. Please try again later.";
            
	}

	function validateUser(){
		 $sql = "SELECT id FROM users WHERE username = :username";
                
                if($stmt = $pdo->prepare($sql)){
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
                    
                    // Set parameters
                    $param_username = trim($_POST["username"]);
                    
                    // Attempt to execute the prepared statement
                    if($stmt->execute()){
                        if($stmt->rowCount() == 1){
                            $username_err = "This username is already taken.";
                        } else{
                            $username = trim($_POST["username"]);
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    unset($stmt);
                }
	}

}