<?php
// Initialize the session
session_start();
 
require_once "../../../BusinessServiceLayer/controller/LoginController.php";

/// Define variables and initialize with empty values
$username = "";

$user = new LoginController();

list($username_err, $password_err) = $user->Login();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .header {
                padding: 20px;
                text-align: center;
                background: #808080;
                color: white;
                font-size: 30px;
                }
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; padding: 20px; margin-left: auto; margin-right: auto}
    </style>
</head>
<body>
    <div class="header">
        <h1><img src="../../../picture/Weserve.jpeg"></h1>
        
    </div>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account?</p>
            <a href="Cregister.php">Sign up as customer</a><br>
            <a href="SPregister.php">Sign up as service provider</a><br>
            <a href="Rregister.php">Sign up as runner</a>
            <br>
            <a href="http://localhost/wsms/ApplicationLayer/AdminView/admin.php">Admin</a>
        </form>
    </div>
</body>
</html>