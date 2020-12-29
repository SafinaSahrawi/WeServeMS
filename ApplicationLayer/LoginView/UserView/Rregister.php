<?php
error_reporting(0);
ini_set('display_errors', 0);
require_once "../../../BusinessServiceLayer/controller/RegisterController.php";

/// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$R_Runner_License = $R_Runner_Vehicletype = $R_Runner_VehicleNo = $R_Runner_PhoneNo = $R_Runner_Address = "";

$user = new RegisterController();

list($username_err, $password_err, $confirm_password_err) = $user->Rregister();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <p>Runner Registration</p>
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
                <label>License</label>
                <input type="text" name="R_Runner_License" class="form-control" value="<?php echo $R_Runner_License; ?>">
            </div>
            <div class="form-group"> 
                <label>Vehicle Type</label>
                <input type="text" name="R_Runner_Vehicletype" class="form-control" value="<?php echo $R_Runner_Vehicletype; ?>">
            </div>
            <div class="form-group"> 
                <label>Vehicle no</label>
                <input type="text" name="R_Runner_VehicleNo" class="form-control" value="<?php echo $R_Runner_VehicleNo; ?>">
            </div>
            <div class="form-group"> 
                <label>Phone No</label>
                <input type="text" name="R_Runner_PhoneNo" class="form-control" value="<?php echo $R_Runner_PhoneNo; ?>">
            </div>
            <div class="form-group"> 
                <label>Address</label>
                <input type="text" name="R_Runner_Address" class="form-control" value="<?php echo $R_Runner_Address; ?>" placeholder="Street Address">
                <input type="text" name="address" class="form-control" value="" placeholder="City">
                <input type="text" name="address" class="form-control" value="" placeholder="State">
                <input type="text" name="address" class="form-control" value="" placeholder="Postal/Zip Code">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="http://localhost/wsms/ApplicationLayer/LoginView/UserView/login.php">Login here</a>.</p>
        </form>
    </div>
</center>  
</body>
</html>