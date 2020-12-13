<?php

class LoginController{

	function Login(){ 
	
 
	//declare variable
	$username_err = "";
	$password_err = "";

 	// Include config file
	require_once "../template/database.php";

	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password, usertype FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $username = $row["username"];
                        $hashed_password = $row["password"];
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect type of user to their page
                            $usertype = $row["usertype"];
                            if($usertype == "Customer"){
                                header("location: http://localhost/wsms/ApplicationLayer/CustomerView/custAddCart/food.php");
                            }
                            else if($usertype == "Service Provider"){
                                header("location: http://localhost/wsms/ApplicationLayer/ServiceProviderView/spProduct/spView.php");
                            }
                            else if($usertype == "Runner"){
                                header("location: http://localhost/wsms/ApplicationLayer/RunnerView/RunnerDeliveryInfo/RunnerHomepage.php");
                            }
                            else if($usertype == "Admin"){
                                header("location: http://localhost/wsms/ApplicationLayer/AdminView/admin.php");
                            }

                            else{
                            header("location: login.php");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            unset($stmt);
        }
    }
    
    // Close connection
    unset($pdo);
}
	return[$username_err, $password_err];
	}
}
?>