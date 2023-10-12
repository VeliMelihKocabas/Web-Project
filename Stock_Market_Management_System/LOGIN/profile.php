<?php
include ('operations.php');

if (isset($_SESSION['username'])){
    $userdata = $db -> prepare("SELECT * FROM account WHERE username = ? ");
    $usernameArray = array($_SESSION['username']);
    $userdata -> execute($usernameArray);
    $userdataCount = $userdata -> rowCount();
    $userdatarow = $userdata -> fetch(PDO::FETCH_ASSOC);

    if($userdataCount > 0){
        $userId = $userdatarow['Id'];
        $userName = $userdatarow['Username'];
        $firstName = $userdatarow['FirstName'];
        $lastName = $userdatarow['LastName'];
        $balance = $userdatarow['Balance'];
        $isAdmin = $userdatarow['isAdmin'];
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 2</title>

    <!-- Fontfaces CSS-->
    <link href="profilecss/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <h1 id="profile-logo">Profile</h1>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
                    </div>
                    <h4 class="name"><?php echo $userName;?></h4>
                    <a href="#">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="table.php">
                            <i class="fas fa-table"></i>Wallet</a>
                        </li>
                        <li>
                                <a href="main.php">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>Main Menu</a>
                        </li>
                        <li>
                            <a href="loginregister.php">
                            <i class="fas fa-sign-in-alt"></i>Login & Register</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-settings"></i>Setting</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-money-box"></i>Billing</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="images/icon/avatar-big-01.jpg" alt="John Doe" />
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="index.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 1</a>
                                    </li>
                                    <li>
                                        <a href="index2.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="index3.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 3</a>
                                    </li>
                                    <li>
                                        <a href="index4.html">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard 4</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="inbox.html">
                                    <i class="fas fa-chart-bar"></i>Inbox</a>
                                <span class="inbox-num">3</span>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-shopping-basket"></i>eCommerce</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-trophy"></i>Features
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="table.php">
                                            <i class="fas fa-table"></i>Tables</a>
                                    </li>
                                    <li>
                                        <a href="form.html">
                                            <i class="far fa-check-square"></i>Forms</a>
                                    </li>
                                    <li>
                                        <a href="calendar.html">
                                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                                    </li>
                                    <li>
                                        <a href="map.html">
                                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="login.html">
                                            <i class="fas fa-sign-in-alt"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="register.html">
                                            <i class="fas fa-user"></i>Register</a>
                                    </li>
                                    <li>
                                        <a href="forget-pass.html">
                                            <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-desktop"></i>UI Elements
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="button.html">
                                            <i class="fab fa-flickr"></i>Button</a>
                                    </li>
                                    <li>
                                        <a href="badge.html">
                                            <i class="fas fa-comment-alt"></i>Badges</a>
                                    </li>
                                    <li>
                                        <a href="tab.html">
                                            <i class="far fa-window-maximize"></i>Tabs</a>
                                    </li>
                                    <li>
                                        <a href="card.html">
                                            <i class="far fa-id-card"></i>Cards</a>
                                    </li>
                                    <li>
                                        <a href="alert.html">
                                            <i class="far fa-bell"></i>Alerts</a>
                                    </li>
                                    <li>
                                        <a href="progress-bar.html">
                                            <i class="fas fa-tasks"></i>Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="modal.html">
                                            <i class="far fa-window-restore"></i>Modals</a>
                                    </li>
                                    <li>
                                        <a href="switch.html">
                                            <i class="fas fa-toggle-on"></i>Switchs</a>
                                    </li>
                                    <li>
                                        <a href="grid.html">
                                            <i class="fas fa-th-large"></i>Grids</a>
                                    </li>
                                    <li>
                                        <a href="fontawesome.html">
                                            <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                    </li>
                                    <li>
                                        <a href="typo.html">
                                            <i class="fas fa-font"></i>Typography</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    <?php
                                        if($isAdmin == 1){
                                            echo '<a href="adminpanel.php"><button class="au-btn au-btn-icon au-btn--green">
                                            go to admin panel</button></a>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">&#8378;<?php echo $balance; ?></h2>
                                    <span class="desc">total earnings</span>
                                    <div class="icon">
                                        <i><span>&#8378;</span></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-data3">
                                    <tbody>
                                        <tr>
                                            <form action="stocktrade.php" method="post">
                                                <td><label for="stockName">Stock Name:</label>
                                                <input type="text" id="stockName" class="dwinput" name="stockName"></td>
                                                <td><label for="stockBuySellAmount">Please enter an amount(&#8378;):</label>
                                                <input type="number" id="stockBuySellAmount" class="dwinput" name="stockBuySellAmount"></td>
                                                <td><input class="btn btn-success" type="submit" name="stockBuyButton" value="Buy"></td>
                                                <td><input class="btn btn-success" type="submit" name="stockSellButton" value="Sell"></td>
                                        </tr>
                                    </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-borderless table-data3">
                                    <tbody>
                                        <tr>
                                            <form action="trade.php" method="post">
                                                <td><label for="currencyName">Currency Name:</label>
                                                <input type="text" id="currencyName" class="dwinput" name="currencyName"></td>
                                                <td><label for="currencyBuySellAmount">Please enter an amount(&#8378;):</label>
                                                <input type="number" id="currencyBuySellAmount" class="dwinput" name="currencyBuySellAmount"></td>
                                                <td><input class="btn btn-success" type="submit" name="currencyBuyButton" value="Buy"></td>
                                                <td><input class="btn btn-success" type="submit" name="currencySellButton" value="Sell"></td>
                                        </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Currency Name</th>
                                                <th>price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>USD (United States Dollar)</td>
                                                <td>&#8378;<?php echo $JSON['USD']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>EUR (Euro)</td>
                                                <td>&#8378;<?php echo $JSON['EUR']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>GBP (Sterling)</td>
                                                <td>&#8378;<?php echo $JSON['GBP']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CNY (Chinese Yuan)</td>
                                                <td>&#8378;<?php echo $JSON['CNY']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>JPY (Japanese Yen)</td>
                                                <td>&#8378;<?php echo $JSON['JPY']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>RUB (Russian Ruble)</td>
                                                <td>&#8378;<?php echo $JSON['RUB']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CHF (Swiss Franc)</td>
                                                <td>&#8378;<?php echo $JSON['CHF']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CAD (Canadian Dollar)</td>
                                                <td>&#8378;<?php echo $JSON['CAD']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>BTC (Bitcoin)</td>
                                                <td>&#8378;<?php echo $JSON['BTC']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ETH (Etherium)</td>
                                                <td>&#8378;<?php echo $JSON['ETH']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>LTC (LiteCoin)</td>
                                                <td>&#8378;<?php echo $JSON['LTC']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>XRP (Ripple)</td>
                                                <td>&#8378;<?php echo $JSON['XRP']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>BNB (Binance Coin)</td>
                                                <td>&#8378;<?php echo $JSON['BNB']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>SOL (Solana)</td>
                                                <td>&#8378;<?php echo $JSON['SOL']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>DOGE (DogeCoin)</td>
                                                <td>&#8378;<?php echo $JSON['DOGE']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ADA (Cardano)</td>
                                                <td>&#8378;<?php echo $JSON['ADA']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>LINK (ChainLink)</td>
                                                <td>&#8378;<?php echo $JSON['LINK']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>MATIC (Polygon)</td>
                                                <td>&#8378;<?php echo $JSON['MATIC']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>TRX (TRON)</td>
                                                <td>&#8378;<?php echo $JSON['TRX']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>LUNC (Terra Classic)</td>
                                                <td>&#8378;<?php echo $JSON['LUNC']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>AVAX (Avalance)</td>
                                                <td>&#8378;<?php echo $JSON['AVAX']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>SXP (Swipe)</td>
                                                <td>&#8378;<?php echo $JSON['SXP']['TRY']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>SHIB (Shiba Inu)</td>
                                                <td>&#8378;<?php echo $JSON['SHIB']['TRY']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Stock Name</th>
                                                <th>price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>VMK (Motogineer)</td>
                                                <td>&#8378;<?php echo $motogineerprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>MSFT (Microsoft)</td>
                                                <td>&#8378;<?php echo $microsoftprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>AAPL (Apple)</td>
                                                <td>&#8378;<?php echo $appleprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>GOOG (Alphabet Inc.)</td>
                                                <td>&#8378;<?php echo $googleprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>IBM (International Business Machines Corporation)</td>
                                                <td>&#8378;<?php echo $ibmprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ORCL (Oracle)</td>
                                                <td>&#8378;<?php echo $oracleprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>INTC (Intel Corp.)</td>
                                                <td>&#8378;<?php echo $intelprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ADBE (Adobe)</td>
                                                <td>&#8378;<?php echo $adobeprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>AMZN (Amazon)</td>
                                                <td>&#8378;<?php echo $amazonprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>TSLA (Tesla, Inc.)</td>
                                                <td>&#8378;<?php echo $teslaprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>NVDA (NVIDIA Corp.)</td>
                                                <td>&#8378;<?php echo $nvidiaprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>META (Meta Platforms, Inc.)</td>
                                                <td>&#8378;<?php echo $metaprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>BABA (Alibaba Group Holding Limited)</td>
                                                <td>&#8378;<?php echo $alibabaprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>AMD (Advanced Micro Devices, Inc.)</td>
                                                <td>&#8378;<?php echo $amdprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>PYPL (PayPal Holdings, Inc.)</td>
                                                <td>&#8378;<?php echo $paypalprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ATVI (Activision Blizzard, Inc.)</td>
                                                <td>&#8378;<?php echo $activisionprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>EA (Electronic Arts Inc.)</td>
                                                <td>&#8378;<?php echo $eaprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>TTD (The Trade Desk, Inc.)</td>
                                                <td>&#8378;<?php echo $ttdprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>MTCH (Match Group, Inc.)</td>
                                                <td>&#8378;<?php echo $matchprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>ZG (Zillow Group, Inc.)</td>
                                                <td>&#8378;<?php echo $zillowprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>YELP (Yelp Inc.)</td>
                                                <td>&#8378;<?php echo $yelpprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>CRM (Salesforce, Inc.)</td>
                                                <td>&#8378;<?php echo $salesforceprice; ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->


