<?php

ob_start();
require 'connect.php';
require 'operations.php';

$stockprices = array(
    'VMK' => $motogineerprice,
    'MSFT'=> $microsoftprice,
    'AAPL' => $appleprice,
    'GOOG' => $googleprice,
    'IBM' => $ibmprice,
    'ORCL' => $oracleprice,
    'INTC' => $intelprice,
    'ADBE' => $adobeprice,
    'AMZN' => $amazonprice,
    'TSLA' => $teslaprice,
    'NVDA' => $nvidiaprice,
    'META' => $metaprice,
    'BABA' => $alibabaprice,
    'AMD' => $amdprice,
    'PYPL' => $paypalprice,
    'ATVI' => $activisionprice,
    'EA' => $eaprice,
    'TTD' => $ttdprice,
    'MTCH' => $matchprice,
    'ZG' => $zillowprice,
    'YELP' => $yelpprice,
    'CRM' => $salesforceprice
);

/* burayı sadece döviz kabul edecek şekilde değiştir htmller dahil */

$username = $_SESSION['username'];
$stockName = $_POST['stockName'];
$tlamount = $_POST['stockBuySellAmount'];

$query = $db->prepare("SELECT StockID FROM stocks WHERE `ShortName` = '$stockName'");
$result = $query->execute();

$queryrow = $query -> fetch(PDO::FETCH_ASSOC);
$stockID = $queryrow['StockID'];

$query = $db->prepare("SELECT Id FROM account WHERE Username = '$username'");
$result = $query->execute();

$queryrow = $query -> fetch(PDO::FETCH_ASSOC);
$userID = $queryrow['Id'];

if(isset(($_POST['stockBuyButton']))) /* user buys a currency */{
    $query = $db->prepare("SELECT Balance FROM account WHERE Username = '$username'");
    $result = $query->execute();

    $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
    $balance = $queryrow['Balance'];
    
    if($balance >= $tlamount){
        $unitprice = $stockprices[$stockName];
        $stockamount = $tlamount / $unitprice;
        $newbalance = $balance - $tlamount;

        $query = $db->prepare("UPDATE account SET Balance = $newbalance WHERE Username = '$username'");
        $result = $query->execute();

        $query = $db->prepare("INSERT INTO `transaction` (`AccountID`, `Date`, `Time`, `TransactionType`, `ValuableType`, `StockID`, `Quantity/Amount`, `Price`, `Total`) VALUES ($userID, curdate(), curtime(), 'buy', 'stock', $stockID, $stockamount, $unitprice, $tlamount)");
        $result = $query->execute();

        $query = $db->prepare("SELECT * FROM ownedstocks WHERE `AccountID` = $userID AND `StockID` = $stockID");
        $result = $query->execute();
        $rowcount = $query->rowCount();

        if($rowcount == 0){
        $query = $db->prepare("INSERT INTO ownedstocks (`AccountID`, `StockID`, `Count`) VALUES ($userID, $stockID, $stockamount)");
        $result = $query->execute();
        header('Refresh:0, profile.php');
        }

        else if($rowcount == 1){
            $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
            $ownedstockamount = $queryrow['Count'];
            $newamount = $ownedstockamount + $stockamount;

            $query = $db->prepare("UPDATE ownedstocks SET Count = $newamount WHERE AccountID = $userID AND StockID = $stockID");
            $result = $query->execute();
            header('Refresh:0, profile.php');
        }

        else{
            echo "Something went wrong... (ownedstocks returned more than one row)";
        }

    }
}

if(isset(($_POST['stockSellButton'])))  {
    $unitprice = $stockprices[$stockName];
    $stockamount = $tlamount / $unitprice;

    $query = $db->prepare("SELECT * FROM ownedstocks WHERE `AccountID` = $userID AND `StockID` = $stockID");
    $result = $query->execute();
    $rowcount = $query->rowCount();

    if($rowcount == 0){
        echo "You have insufficent amount of this currency!";
        header('Refresh:2, profile.php');
    }

    else if($rowcount == 1){
        $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
        $ownedstockamount = $queryrow['Count'];

        if ($stockamount > $ownedstockamount){
            echo "You have insufficent amount of this stock!";
            header('Refresh:2, profile.php');
            die();
        }

        else{
        $newamount = $ownedstock - $stockamount;

        $query = $db->prepare("INSERT INTO `transaction` (`AccountID`, `Date`, `Time`, `TransactionType`, `ValuableType`, `StockID`, `Quantity/Amount`, `Price`, `Total`) VALUES ($userID, curdate(), curtime(), 'sell', 'stock', $stockID,$stockamount,$unitprice, $tlamount)");
        $result = $query->execute();

        $query = $db->prepare("SELECT Balance FROM account WHERE Username = '$username'");
        $result = $query->execute();

        $queryrow = $query -> fetch(PDO::FETCH_ASSOC);
        $balance = $queryrow['Balance'];

        $newbalance = $balance + $tlamount;

        $query = $db->prepare("UPDATE account SET Balance = $newbalance WHERE Username = '$username'"); // balance trigger
        $result = $query->execute();

        $query = $db->prepare("UPDATE ownedstocks SET Count = $newamount WHERE AccountID = $userID AND StockID = $stockID");
        $result = $query->execute();
        header('Refresh:0, profile.php');
        }
    }
}

?>