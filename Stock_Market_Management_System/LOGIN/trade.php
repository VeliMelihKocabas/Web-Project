<?php

ob_start();
require 'connect.php';
require 'operations.php';

/* burayı sadece döviz kabul edecek şekilde değiştir htmller dahil */

$username = $_SESSION['username'];
$currencyName = $_POST['currencyName'];
$tlamount = $_POST['currencyBuySellAmount'];

$query = $db->prepare("SELECT CurrencyID FROM currencies WHERE `Name` = '$currencyName'");
$result = $query->execute();

$queryrow = $query -> fetch(PDO::FETCH_ASSOC);
$currencyID = $queryrow['CurrencyID'];

$query = $db->prepare("SELECT Id FROM account WHERE Username = '$username'");
$result = $query->execute();

$queryrow = $query -> fetch(PDO::FETCH_ASSOC);
$userID = $queryrow['Id'];

if(isset(($_POST['currencyBuyButton']))) /* user buys a currency */{
    $query = $db->prepare("SELECT Balance FROM account WHERE Username = '$username'");
    $result = $query->execute();

    $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
    $balance = $queryrow['Balance'];
    
    if($balance >= $tlamount){
        $unitprice = $JSON[$currencyName]['TRY'];
        $currencyamount = $tlamount / $unitprice;
        $newbalance = $balance - $tlamount;

        $query = $db->prepare("UPDATE account SET Balance = $newbalance WHERE Username = '$username'");
        $result = $query->execute();

        $query = $db->prepare("INSERT INTO `transaction` (`AccountID`, `Date`, `Time`, `TransactionType`, `ValuableType`, `CurrencyID`, `Quantity/Amount`, `Price`, `Total`) VALUES ($userID, curdate(), curtime(), 'buy', 'currency', $currencyID,$currencyamount,$unitprice, $tlamount)");
        $result = $query->execute();

        $query = $db->prepare("SELECT * FROM ownedcurrency WHERE `AccountID` = $userID AND `CurrencyID` = $currencyID");
        $result = $query->execute();
        $rowcount = $query->rowCount();

        if($rowcount == 0){
        $query = $db->prepare("INSERT INTO ownedcurrency (`AccountID`, `CurrencyID`, `Amount`) VALUES ($userID, $currencyID, $currencyamount)");
        $result = $query->execute();
        header('Refresh:0, profile.php');
        }

        else if($rowcount == 1){
            $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
            $ownedcurrencyamount = $queryrow['Amount'];
            $newamount = $ownedcurrencyamount + $currencyamount;

            $query = $db->prepare("UPDATE ownedcurrency SET Amount = $newamount WHERE AccountID = $userID AND CurrencyID = $currencyID");
            $result = $query->execute();
            header('Refresh:0, profile.php');
        }

        else{
            echo "Something went wrong... (ownedcurrencies returned more than one row)";
        }

    }
}

if(isset(($_POST['currencySellButton'])))  {
    $unitprice = $JSON[$currencyName]['TRY'];
    $currencyamount = $tlamount / $unitprice;

    $query = $db->prepare("SELECT * FROM ownedcurrency WHERE `AccountID` = $userID AND `CurrencyID` = $currencyID");
    $result = $query->execute();
    $rowcount = $query->rowCount();

    if($rowcount == 0){
        echo "You have insufficent amount of this currency!";
        header('Refresh:2, profile.php');
    }

    else if($rowcount == 1){
        $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
        $ownedcurrencyamount = $queryrow['Amount'];

        if ($currencyamount > $ownedcurrencyamount){
            echo "You have insufficent amount of this currency!";
            header('Refresh:2, profile.php');
            die();
        }

        else{
        $newamount = $ownedcurrencyamount - $currencyamount;

        $query = $db->prepare("INSERT INTO `transaction` (`AccountID`, `Date`, `Time`, `TransactionType`, `ValuableType`, `CurrencyID`, `Quantity/Amount`, `Price`, `Total`) VALUES ($userID, curdate(), curtime(), 'sell', 'currency', $currencyID,$currencyamount,$unitprice, $tlamount)");
        $result = $query->execute();

        $query = $db->prepare("SELECT Balance FROM account WHERE Username = '$username'");
        $result = $query->execute();

        $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
        $balance = $queryrow['Balance'];

        $newbalance = $balance + $tlamount;

        $query = $db->prepare("UPDATE account SET Balance = $newbalance WHERE Username = '$username'"); // balance trigger
        $result = $query->execute();

        $query = $db->prepare("UPDATE ownedcurrency SET Amount = $newamount WHERE AccountID = $userID AND CurrencyID = $currencyID");
        $result = $query->execute();
        header('Refresh:0, profile.php');
        }
    }
}

?>