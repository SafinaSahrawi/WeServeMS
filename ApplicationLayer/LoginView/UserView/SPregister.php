<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once "../../../BusinessServiceLayer/controller/RegisterController.php";

/// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$S_Company_Name = $S_CompanyAddress = $S_ServiceProviderPhoneNo = "";

$user = new RegisterController();

list($username_err, $password_err, $confirm_password_err) = $user->SPregister();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .header {
                padding: 40px;
                text-align: center;
                background: #808080;
                color: white;
                font-size: 30px;
                }
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
<center>
    <div class="header">
        <h1>WSMS</h1>
        <p>Service Provider Registration</p>
    </div>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Company Phone Number</label>
                <input type="text" name="S_ServiceProviderPhoneNo" class="form-control" value="<?php echo $S_ServiceProviderPhoneNo; ?>">
            </div>
            <div class="form-group">
                <label>Company Name</label>
                <input type="text" name="S_Company_Name" class="form-control" value="<?php echo $S_Company_Name; ?>">
                
            </div>
            <div class="form-group">
                <label>Company Address</label>
                <input type="text" name="S_CompanyAddress" class="form-control" value="<?php echo $S_CompanyAddress; ?>" placeholder="Street Address">
                <input type="text" name="address" class="form-control" value="" placeholder="City">
                <input type="text" name="address" class="form-control" value="" placeholder="State">
                <input type="text" name="address" class="form-control" value="" placeholder="Postal/Zip Code">
            </div>           
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset"> 
            </div>
            <p>Already have an account? <a href="http://localhost/WeServeMS/ApplicationLayer/LoginView/UserView/login.php">Login here</a>.</p>
        </form>
    </div>
<<<<<<< Updated upstream
</center>
=======
</center>   
>>>>>>> Stashed changes
</body>
</html>