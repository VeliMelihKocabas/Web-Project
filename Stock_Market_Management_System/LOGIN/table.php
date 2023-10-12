<?php
    include('operations.php');

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
        }
    }

    $usercurrencydata = $db -> prepare("SELECT `Name`, Amount FROM currencies JOIN ownedcurrency ON currencies.CurrencyID = ownedcurrency.CurrencyID WHERE ownedcurrency.AccountID = (select Id FROM account WHERE Username = '$userName')");
    $usercurrencydata -> execute();
    $currencyDataCount = $usercurrencydata -> rowCount();
    $currencydataarray = $usercurrencydata -> fetchAll(PDO::FETCH_ASSOC);

    $userstockdata = $db -> prepare("SELECT `ShortName`, Count FROM stocks JOIN ownedstocks ON stocks.StockID = ownedstocks.StockID WHERE ownedstocks.AccountID = (select Id FROM account WHERE Username = '$userName')");
    $userstockdata -> execute();
    $stockDataCount = $userstockdata -> rowCount();
    $stockdataarray = $userstockdata -> fetchAll(PDO::FETCH_ASSOC);

    $usertransactiondata = $db -> prepare("SELECT TransactionID, `Date`, `Time`, TransactionType, stocks.FullName, currencies.Name, `Quantity/Amount`, Price, Total FROM `transaction` LEFT JOIN stocks ON transaction.StockID = stocks.StockID LEFT JOIN currencies ON transaction.CurrencyID = currencies.CurrencyID JOIN account ON transaction.AccountID = account.Id WHERE account.Username = '$userName'");
    $usertransactiondata -> execute();
    $transactionDataCount = $usertransactiondata -> rowCount();
    $transactiondataarray = $usertransactiondata -> fetchAll(PDO::FETCH_ASSOC);

    


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags-->
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta name="description" content="au theme template" />
        <meta name="author" content="Hau Nguyen" />
        <meta name="keywords" content="au theme template" />

        <!-- Title Page-->
        <title>Tables</title>

        <!-- Fontfaces CSS-->
        <link href="css/font-face.css" rel="stylesheet" media="all" />
        <link
            href="vendor/font-awesome-4.7/css/font-awesome.min.css"
            rel="stylesheet"
            media="all"
        />
        <link
            href="vendor/font-awesome-5/css/fontawesome-all.min.css"
            rel="stylesheet"
            media="all"
        />
        <link
            href="vendor/mdi-font/css/material-design-iconic-font.min.css"
            rel="stylesheet"
            media="all"
        />

        <!-- Bootstrap CSS-->
        <link
            href="vendor/bootstrap-4.1/bootstrap.min.css"
            rel="stylesheet"
            media="all"
        />

        <!-- Vendor CSS-->
        <link
            href="vendor/animsition/animsition.min.css"
            rel="stylesheet"
            media="all"
        />
        <link
            href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
            rel="stylesheet"
            media="all"
        />
        <link href="vendor/wow/animate.css" rel="stylesheet" media="all" />
        <link
            href="vendor/css-hamburgers/hamburgers.min.css"
            rel="stylesheet"
            media="all"
        />
        <link href="vendor/slick/slick.css" rel="stylesheet" media="all" />
        <link
            href="vendor/select2/select2.min.css"
            rel="stylesheet"
            media="all"
        />
        <link
            href="vendor/perfect-scrollbar/perfect-scrollbar.css"
            rel="stylesheet"
            media="all"
        />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Main CSS-->
        <link href="css/theme.css" rel="stylesheet" media="all" />
    </head>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.html">
                                <h1 id="wallet-logo">Wallet</h1>
                            </a>
                            <button
                                class="hamburger hamburger--slider"
                                type="button"
                            >
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li>
                                <a href="table.php">
                                    <i class="fas fa-table"></i>Wallet</a
                                >
                            </li>
                            <li>
                                <a href="profile.php">
                                    <i class="fas fa-user"></i>Account</a
                                >
                            </li>
                            <li>
                                <a href="loginregister.php">
                                    <i class="fas fa-sign-in-alt"></i>Login &
                                    Register</a
                                >
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <h1 id="wallet-logo">Wallet</h1>
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">
                            <li>
                                <a href="table.php">
                                    <i class="fas fa-table"></i>Wallet</a
                                >
                            </li>
                            <li>
                                <a href="profile.php">
                                    <i class="fas fa-user"></i>Account</a
                                >
                            </li>
                            <li>
                                <a href="loginregister.php">
                                    <i class="fas fa-sign-in-alt"></i>Login &
                                    Register</a
                                >
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap"></div>
                        </div>
                    </div>
                </header>
                <!-- END HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div
                                        class="table-responsive table--no-card m-b-30"
                                    >
                                        <h3>Transaction History</h3>
                                        <table
                                            class="table table-borderless table-striped table-earning"
                                        >
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>ID</th>
                                                    <th>Stock/Currency Name</th>
                                                    <th class="text-right">
                                                        Buy/Sell
                                                    </th>
                                                    <th class="text-right">
                                                        quantity/amount
                                                    </th>
                                                    <th class="text-right">
                                                        price <!-- unit price -->
                                                    </th>
                                                    <th class="text-right">
                                                        total <!-- total price -->
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?php
                                                         foreach ($transactiondataarray as $row) {
                                                            echo    "<tr>
                                                                        <td>{$row['Date']}</td>
                                                                        <td>{$row['Time']}</td>
                                                                        <td>{$row['TransactionID']}</td>
                                                                        <td>{$row['FullName']}{$row['Name']}</td>
                                                                        <td>{$row['TransactionType']}</td>
                                                                        <td>{$row['Quantity/Amount']}</td>
                                                                        <td>{$row['Price']}</td>
                                                                        <td>{$row['Total']}</td>
                                                                    </tr>";
                                                        }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <h3>Portfolio</h3>
                                    <div
                                        class="au-card au-card--bg-blue au-card-top-countries m-b-30"
                                    >
                                        <div class="au-card-inner">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-top-countries"
                                                >
                                                    <tbody>
                                                        <?php
                                                            foreach ($currencydataarray as $row) {
                                                                echo "<tr>
                                                                        <td>Currency</td>
                                                                        <td>{$row['Name']}</td>
                                                                        <td>{$row['Amount']}</td>
                                                                     </tr>";
                                                            }

                                                            foreach ($stockdataarray as $row) {
                                                                echo "<tr>
                                                                        <td>Stock</td>
                                                                        <td>{$row['ShortName']}</td>
                                                                        <td>{$row['Count']}</td>
                                                                     </tr>";
                                                            }
                                                            
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- USER DATA-->
                                    <div class="user-data m-b-30">
                                        <h3 class="title-3 m-b-30">
                                            <i
                                                class="zmdi zmdi-account-calendar"
                                            ></i
                                            >Deposit Money Into Account
                                        </h3>
                                        <form action="depositwithdraw.php" method="post">
                                            <p>&nbsp;&nbsp;&nbsp;Deposit money into this IBAN: TR32 0010 0099 9990 1234 5678 90</p>
                                            <br>
                                            <label for="depositamount">&nbsp;&nbsp;&nbsp;Deposit Amount(TL):</label>
                                            <input type="number" id="depositamount" class="dwinput" name="depositamount">
                                            <input type="submit" name="depositbutton" value="deposit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    </div>
                                    <!-- END USER DATA-->
                                </div>
                                <div class="col-lg-6">
                                    <!-- USER DATA-->
                                    <div class="user-data m-b-30">
                                        <h3 class="title-3 m-b-30">
                                            <i
                                                class="zmdi zmdi-account-calendar"
                                            ></i
                                            >Withdraw Money From Account
                                        </h3>
                                        <form action="depositwithdraw.php" method="post">
                                            <label for="iban">&nbsp;&nbsp;&nbsp;IBAN:</label>
                                            <input type="text" class="dwinput" id="iban" name="iban"><br>

                                            <label for="withdrawamount">&nbsp;&nbsp;&nbsp;Withdraw Amount(TL):</label>
                                            <input type="number" class="dwinput" id="withdrawamount" name="withdrawamount">
                                            <input type="submit" name="withdrawbutton" value="withdraw" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js"></script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js"></script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js"></script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
    </body>
</html>
<!-- end document-->
