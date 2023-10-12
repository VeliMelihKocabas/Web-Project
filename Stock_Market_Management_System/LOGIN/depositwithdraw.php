<?php

ob_start();
session_start();
require 'connect.php';

$username = $_SESSION['username'];

if(isset($_POST['depositbutton'])){
    $amount = $_POST['depositamount'];
    $query = $db->prepare("SELECT Balance FROM account WHERE Username = '$username'");
    $result = $query->execute();

    $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
    $balance = $queryrow['Balance'];

    $newbalance = $balance + $amount;

    $query = $db->prepare("UPDATE account SET Balance = $newbalance WHERE Username = '$username'");
    $depositdone = $query->execute();

    $_POST['depositamount'] = false;
    header('Refresh:0, table.php');
    
}

else if(isset($_POST['withdrawbutton'])){
    $amount = $_POST['withdrawamount'];
    $query = $db->prepare("SELECT Balance FROM account WHERE Username = '$username'");
    $result = $query->execute();

    $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
    $balance = $queryrow['Balance'];
    
    if($balance >= $amount){
        $newbalance = $balance - $amount;
        $query = $db->prepare("UPDATE account SET Balance = $newbalance WHERE Username = '$username'");
        $depositdone = $query->execute();

        $_POST['withdrawamount'] = false;
        header('Refresh:0, table.php');
    }
    else{
        echo "You have insufficent balance!";
        $_POST['withdrawamount'] = false;
        header('Refresh:2, table.php');
    }
}
?>