<?php

ob_start();
session_start();
require 'connect.php';

$JSON = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/pricemulti?fsyms=USD,EUR,GBP,CNY,JPY,BTC,ETH,RUB,CHF,CAD,LTC,XRP,BNB,SOL,DOGE,ADA,LINK,MATIC,TRX,LUNC,AVAX,SXP,SHIB&tsyms=TRY&api_key=c2d4ddeca55e6ee742ad2638e10ae5f0dd570a7d5c3ee1d2bf425e99e787bf40'), true);
$JSON2 = json_decode(file_get_contents('https://api.genelpara.com/embed/borsa.json'), true);

$appleprice = 124 * 18.72; $microsoftprice = 238 * 18.72; $googleprice = 89  * 18.72; $amazonprice = 85 * 18.72; $nvidiaprice = 142 * 18.72; $teslaprice = 106 * 18.72; $metaprice = 124 * 18.72; $alibabaprice = 91 * 18.72; $salesforceprice = 133  * 18.72; $intelprice = 26 * 18.72; $amdprice = 64 * 18.72; $paypalprice = 74 * 18.72; $activisionprice = 76 * 18.72; $eaprice = 122 * 18.72; $ttdprice = 43 * 18.72; $matchprice = 40  * 18.72; $zillowprice = 32 * 18.72; $yelpprice = 27 * 18.72; $ibmprice = 141 * 18.72; $oracleprice = 82 * 18.72; $adobeprice = 336 * 18.72; $motogineerprice = 1;

if(isset($_POST['signup'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_again = $_POST['password_again'];
    $balance = 0.0;

    if(!$username){
        echo "Please enter your username!";
        header('Refresh:2 , signup.php');
    }
    elseif(!$lastName){
        echo "Please enter your last name! ";
        header('Refresh:2 , signup.php');
    }
    elseif(!$firstName){
        echo "Please enter your first name!";
        header('Refresh:2 , signup.php');
    }

    elseif(!$password || !$password_again){
        echo "Please enter your password";
        header('Refresh:2 , signup.php');
    }
    elseif($password != $password_again){
        echo "Passwords do not match";
        header('Refresh:2 , signup.php');
    }else{
        $query = $db->prepare("SELECT * FROM account WHERE Username = '$username'");
        $result = $query->execute();
        $rowcount = $query->rowCount();

        if($rowcount > 0){
            echo "This username already exists, choose a new one!";
            header('Refresh:2 , signup.php');
        }
        
        else {
            $query = $db->prepare("INSERT INTO account (FirstName, LastName, Username, Balance, Password) 
            VALUES ('$firstName', '$lastName', '$username', $balance, '$password')");
            $add = $query->execute();
            if($add){
                echo "Sign up succesful, you're being redirected...";
                $_SESSION['username']=$username;
                header('Refresh:1; profile.php');
            }
            else{
                echo "Something is wrong, please check your input.";
                header('Refresh:1 , loginregister.php');
            }
        }
    }
}
//////////////////////GIRIS
if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!$username){
        echo "Please enter your username!";
    }
    elseif(!$password){
        echo "Please enter your password!";
    }else{
        $user_query = $db-> prepare('SELECT * FROM account WHERE Username=? && Password=?');
        $user_query-> execute([$username,$password]);
       
        $count =$user_query->rowCount();
        if($count==1){
            $_SESSION['username']=$username;
            echo "Signed in successfully, you're being redirected...";
            header('Refresh:1, profile.php');
        }
        else{
            echo "Something went wrong, please check your input.";
            header('Refresh:1 , loginregister.php');
        }
    }
}




?>