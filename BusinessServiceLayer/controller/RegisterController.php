<?php

class RegisterController{

    private $model_class = null;
    private $pdo = null;

    public function __construct() {
        // Include config file
        include "../template/database.php";
        require_once "../../../BusinessServiceLayer/model/model.php";

        $this->model_class = new model();
        $this->pdo = $pdo;
    }

    function Cregister(){
        // declare variable
        $username_err = ""; 
        $password_err = ""; 
        $confirm_password_err = "";


        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = '$username'";
                
                if($stmt = $this->pdo->prepare($sql)){
                   
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
            
            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                
            

                // set model variable
                $C_CustAddress = trim($_POST["address"]);
                $C_CustPhoneNumber = trim($_POST["PhoneNumber"]);
                $this->model_class->username = $username;
                $this->model_class->password = $password;
                $this->model_class->usertype = "Customer";
                $this->model_class->C_CustAddress = $C_CustAddress;
                $this->model_class->C_CustPhoneNumber = $C_CustPhoneNumber;
               

                try{
                    $this->pdo->beginTransaction();
                    // add user
                    $this->model_class->addUser();
                    // register customer
                    $this->model_class->registerCustomer();

                    $this->pdo->commit();
                    header("location: http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php");
                }catch(PDOException $e) {
                    $this->pdo->rollBack();
                    header("location: http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php");
                }
            }
            
            // Close connection
            unset($pdo);
        }

        return [$username_err, $password_err, $confirm_password_err];
    }

   function SPregister(){
        // declare variable
        $username_err = ""; 
        $password_err = ""; 
        $confirm_password_err = "";


        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = '$username'";
                
                if($stmt = $this->pdo->prepare($sql)){
                    
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
            
            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                

                // set model variable
                $S_Company_Name = trim($_POST["S_Company_Name"]);
                $S_CompanyAddress = trim($_POST["S_CompanyAddress"]);
                $S_ServiceProviderPhoneNo = trim($_POST["S_ServiceProviderPhoneNo"]);
                $this->model_class->username = $username;
                $this->model_class->password = $password;
                $this->model_class->usertype = "Service Provider";
                $this->model_class->S_Company_Name = $S_Company_Name;
                $this->model_class->S_CompanyAddress = $S_CompanyAddress;
                $this->model_class->S_ServiceProviderPhoneNo = $S_ServiceProviderPhoneNo;
               

                try{
                    $this->pdo->beginTransaction();
                    // add user
                    $this->model_class->addUser();
                    // register service Provider
                    $this->model_class->registerServiceProvider();

                    $this->pdo->commit();
                    header("location: http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php");
                }catch(PDOException $e) {
                    $this->pdo->rollBack();
                    header("location: http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php");
                }

            }
            
            // Close connection
            unset($pdo);
        }

        return [$username_err, $password_err, $confirm_password_err];
    }

    function Rregister(){
        // declare variable
        $username_err = ""; 
        $password_err = ""; 
        $confirm_password_err = "";


        // Processing form data when form is submitted
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = trim($_POST["username"]);
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } else{
                // Prepare a select statement
                $sql = "SELECT id FROM users WHERE username = '$username'";
                
                if($stmt = $this->pdo->prepare($sql)){
                   
                    
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
            
            // Validate password
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter a password.";     
            } elseif(strlen(trim($_POST["password"])) < 6){
                $password_err = "Password must have atleast 6 characters.";
            } else{
                $password = trim($_POST["password"]);
            }
            
            // Validate confirm password
            if(empty(trim($_POST["confirm_password"]))){
                $confirm_password_err = "Please confirm password.";     
            } else{
                $confirm_password = trim($_POST["confirm_password"]);
                if(empty($password_err) && ($password != $confirm_password)){
                    $confirm_password_err = "Password did not match.";
                }
            }

            // Check input errors before inserting in database
            if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
                

                // set model variable
                $R_Runner_License = trim($_POST["R_Runner_License"]);
                $R_Runner_Vehicletype = trim($_POST["R_Runner_Vehicletype"]);
                $R_Runner_VehicleNo = trim($_POST["R_Runner_VehicleNo"]);
                $R_Runner_PhoneNo = trim($_POST["R_Runner_PhoneNo"]);
                $R_Runner_Address = trim($_POST["R_Runner_Address"]);
                $this->model_class->username = $username;
                $this->model_class->password = $password;
                $this->model_class->usertype = "Runner";
                $this->model_class->R_Runner_License = $R_Runner_License;
                $this->model_class->R_Runner_Vehicletype = $R_Runner_Vehicletype;
                $this->model_class->R_Runner_VehicleNo = $R_Runner_VehicleNo;
                $this->model_class->R_Runner_PhoneNo = $R_Runner_PhoneNo;
                $this->model_class->R_Runner_Address = $R_Runner_Address;
               

                try{
                    $this->pdo->beginTransaction();
                    // add user
                    $this->model_class->addUser();
                    // register service Provider
                    $this->model_class->registerRunner();

                    $this->pdo->commit();
                    header("location: http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php");
                }catch(PDOException $e) {
                    $this->pdo->rollBack();
                    header("location: http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php");
                }

            }
            
            // Close connection
            unset($pdo);
        }

        return [$username_err, $password_err, $confirm_password_err];
    }

}

?>