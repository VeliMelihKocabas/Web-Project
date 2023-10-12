<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="login">
        <div class="login-screen">
            <div class= "app-title">
                <h1>Sign In</h1>
            </div>
                <form action="operations.php" method="post">
                        <div class="login-form">
                            <div class="control-group">
                                <input type="text" name= "username" class="login-field" placeholder="Username" id="login-name">
                                <label class="login-field-icon fui-user" for="login-name"></label>
                            </div>

                            <div class="control-group">
                                <input type="password" name= "password" class="login-field" placeholder="Password" id="login-pass">
                                <label class="login-field-icon fui-user" for="login-pass"></label>
                            </div>

                        </div>
                        <button name="signin" class="btn btn-primary btn-large btn-block">Sign In</button>
                        
                </form>
                <a href="signup.php"><button class="btn btn-primary btn-large btn-block">Sign Up</button></a>
        </div>
    </div>
</body>
</html>