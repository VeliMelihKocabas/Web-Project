<?php
require 'connect.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login">
        <div class="login-screen">
            <div class= "app-title">
                <h1>Sign Up</h1>
            </div>
                <form action="operations.php" method="post">
                        <div class="login-form">
                            <div class="control-group">
                                <input type="text" name= "username" class="login-field" placeholder="Username" id="login-username">
                                <label class="login-field-icon fui-user" for="login-username"></label>
                            </div>

                            <div class="control-group">
                                <input type="text" name= "first_name" class="login-field" placeholder="First Name" id="login-fname">
                                <label classs="login-field-icon fui-user" for="login-fname"></label>
                            </div>

                            <div class="control-group">
                                <input type="text" name= "last_name" class="login-field" placeholder="Last Name" id="login-lname">
                                <label classs="login-field-icon fui-user" for="login-lname"></label>
                            </div>
                            
                            <div class="control-group">
                                <input type="password" name= "password" class="login-field" placeholder="Password" id="login-pass">
                                <label class="login-field-icon fui-user" for="login-pass"></label>
                            </div>

                            <div class="control-group">
                                <input type="password" name= "password_again" class="login-field" placeholder="Password Again" id="login-pass2">
                                <label class="login-field-icon fui-user" for="login-pass2"></label>
                            </div>
                        
                        
                        <button href="signup.php" name="signup" class="btn btn-primary btn-large btn-block">Sign Up</button>
                            
                        </div>

                </form>
                <a href="loginregister.php"><button href="loginregister.php" class="btn btn-primary btn-large btn-block">Sign In</button></a>
            </div>
    </div>
</body>
</html>