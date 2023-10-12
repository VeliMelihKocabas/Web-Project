<?php
    require 'connect.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website Design -Easy Tutorials</title>
    <link rel="stylesheet" href="stylee.css"><!--css linkini bağladık-->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<section class="header">
    <nav>
        <a href="index.html"><img src="logo.png"></a><!--logomuz-->
        <h1>TKK TRADING</h1>
        <div class="nav-links" id="navLinks">
            <i class="fa fa-times" onclick="hideMenu()"></i><!--sağda çıkan menuyu kapama logosu-->
            <ul>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="loginregister.php">LOGIN & REGISTER</a></li>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i><!--daralınca menu tuşu için-->
    </nav>

    
<div class="text-box">
    <h1>Welcome To The World's Smallest Currency And Stock Exchange Place: TKK Trading!</h1>
    <p>This site is a place where you can buy and sell different kinds of currencies and stocks. <br>No commisions!</p>
</div>

</section>


<div class="currency-iframe">
    <iframe src="https://api.genelpara.com/iframe/?symbol=para-birimleri&pb=XU100,USD,EUR,GA,BTC,GBP,&stil=stil-1&renk=beyaz" title="Döviz ve Altın Fiyatları" frameborder="0" width="1000" height="60">
</div>



</body>
</html>
