<?php

ob_start();
session_start();
require 'connect.php';

if(isset($_POST['addaccountinadmin'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_again = @$_POST['password_again'];
    $balance = 0.0;

    if(!$username){
        echo "Please enter a username!";
        header('Refresh:2; adminpanel.php');
    }
    elseif(!$lastName){
        echo "Please enter a last name! ";
        header('Refresh:2; adminpanel.php');
    }
    elseif(!$firstName){
        echo "Please enter a first name!";
        header('Refresh:2; adminpanel.php');
    }

    elseif(!$password || !$password_again){
        echo "Please enter a password";
        header('Refresh:2; adminpanel.php');
    }
    elseif($password != $password_again){
        echo "Passwords do not match";
        header('Refresh:2; adminpanel.php');
    }else{
        $query = $db->prepare("INSERT INTO account (FirstName, LastName, Username, Balance, Password) 
        VALUES ('$firstName', '$lastName', '$username', $balance, '$password')");
        $result = $query->execute();
        header('Refresh:0; adminpanel.php');
    }

}

else if(isset($_POST['deleteaccountinadmin'])){
    $username = $_POST['username'];

    if(!$username){
        echo "Please enter a username!";
        header('Refresh:2; adminpanel.php');
    }

    else{
        $query = $db->prepare("DELETE FROM account WHERE Username = '$username'");
        $result = $query->execute();
        header('Refresh:0; adminpanel.php');
    }

}

else if(isset($_POST['revokeadminbutton'])){
    $username = $_POST['username'];

    if(!$username){
        echo "Please enter a username!";
        header('Refresh:2; adminpanel.php');
    }

    else if($username == 'mehmet'){
        echo "<h2>This user is the main admin, you cannot revoke admin permissions from him.</h2>";
        header('Refresh:2; adminpanel.php');
    }

    else{
        $query = $db->prepare("CALL deleteAdmin('$username')");
        $result = $query->execute();
        header('Refresh:0; adminpanel.php');
    }
}

else if(isset($_POST['setadminbutton'])){
    $username = $_POST['username'];

    if(!$username){
        echo "Please enter a username!";
        header('Refresh:2; adminpanel.php');
    }

    else if($username == 'mehmet'){
        echo "<h2>This user is the main admin, you don't need to give him admin permissions.</h2>";
        header('Refresh:2; adminpanel.php');
    }

    else{
            $query = $db->prepare("CALL setAdmin('$username')");
            $result = $query->execute();
            header('Refresh:0; adminpanel.php');
    }
}





?>