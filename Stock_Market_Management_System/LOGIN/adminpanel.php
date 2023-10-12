<?php
    include ('operations.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

    <!-- Fontfaces CSS-->
    <link href="profilecss/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <title>Admin Panel</title>
</head>
<body>
    <div id="main">
        

        <div class="tables">
            <header><h1>&nbsp;Logs</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            
                            <thead>
                                <tr>
                                    <th>DateTime</th>
                                    <th>AccountID</th>
                                    <th>TransactionType</th>
                                    <th>ChangeAmount</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM log");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['DateTime']}</td>
                                                        <td>{$row['AccountID']}</td>
                                                        <td>{$row['TransactionType']}</td>
                                                        <td>{$row['ChangeAmount']}</td>
                                                    </tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <header><h1>&nbsp;Accounts</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>
                                            Balance
                                        </th>
                                        <th>
                                            Password
                                        </th>
                                        <th>
                                            isAdmin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                                $tabledata = $db -> prepare("SELECT * FROM account");
                                                $tabledata -> execute();
                                                $tabledataCount = $tabledata -> rowCount();
                                                $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                                foreach ($tabledataarray as $row) {
                                                echo    "<tr>
                                                            <td>{$row['Id']}</td>
                                                            <td>{$row['FirstName']}</td>
                                                            <td>{$row['LastName']}</td>
                                                            <td>{$row['Username']}</td>
                                                            <td>{$row['Balance']}</td>
                                                            <td>{$row['Password']}</td>
                                                            <td>{$row['isAdmin']}</td>
                                                        </tr>";
                                            }
                                        ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <header><h1>&nbsp;Transactions</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            
                            <thead>
                                <tr>
                                    <th>TransactionID</th>
                                    <th>AccountID</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>
                                        TransactionType
                                    </th>
                                    <th>
                                        ValuableType
                                    </th>
                                    <th>
                                        StockID
                                    </th>
                                    <th>
                                        CurrencyID
                                    </th>
                                    <th>
                                        Quantity/Amount
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM transaction");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['TransactionID']}</td>
                                                        <td>{$row['AccountID']}</td>
                                                        <td>{$row['Date']}</td>
                                                        <td>{$row['Time']}</td>
                                                        <td>{$row['TransactionType']}</td>
                                                        <td>{$row['ValuableType']}</td>
                                                        <td>{$row['StockID']}</td>
                                                        <td>{$row['CurrencyID']}</td>
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
            </div>
            <br>
            <header><h1>&nbsp;Owned Currencies</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>AccountID</th>
                                    <th>CurrrencyID</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM ownedcurrency");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['AccountID']}</td>
                                                        <td>{$row['CurrencyID']}</td>
                                                        <td>{$row['Amount']}</td>
                                                    </tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <header><h1>&nbsp;Owned Stocks</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>AccountID</th>
                                    <th>StockID</th>
                                    <th>Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM ownedstocks");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['AccountID']}</td>
                                                        <td>{$row['StockID']}</td>
                                                        <td>{$row['Count']}</td>
                                                    </tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <header><h1>&nbsp;Currencies</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>CurrencyID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM currencies");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['CurrencyID']}</td>
                                                        <td>{$row['Name']}</td>
                                                    </tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <header><h1>&nbsp;Stocks</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>StockID</th>
                                    <th>ShortName</th>
                                    <th>FullName</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM stocks");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['StockID']}</td>
                                                        <td>{$row['ShortName']}</td>
                                                        <td>{$row['FullName']}</td>
                                                    </tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <header><h1>&nbsp;Contact</h1></header>
            <div class="overflowrows">
                <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>AccountID</th>
                                    <th>PhoneNo</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM contact");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['AccountID']}</td>
                                                        <td>{$row['PhoneNo']}</td>
                                                        <td>{$row['Email']}</td>
                                                    </tr>"; 
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="admin-panel">

            <div class="admin-screen">
                <div class= "app-title">
                    <h3>Revoke Admin</h3>
                </div>
                <form action="adminoperations.php" method="post">
                    <div class="login-form">
                        <div class="control-group">
                            <input type="text" name= "username" class="login-field" placeholder="Username" id="login-username">
                            <label class="login-field-icon fui-user" for="login-username"></label>
                        </div>

                        <button name="revokeadminbutton" class="btn btn-primary btn-large btn-block">Revoke Admin</button>
                    </div>
                </form>
            </div>

            <div class="admin-screen">
                <div class= "app-title">
                    <h3>Set As Admin</h3>
                </div>
                <form action="adminoperations.php" method="post">
                    <div class="login-form">
                        <div class="control-group">
                            <input type="text" name= "username" class="login-field" placeholder="Username" id="login-username">
                            <label class="login-field-icon fui-user" for="login-username"></label>
                        </div>

                        <button name="setadminbutton" class="btn btn-primary btn-large btn-block">Set Admin</button>
                    </div>
                </form>
            </div>
            
            <div class="admin-screen">
                <div class= "app-title">
                    <h3>Delete Account</h3>
                </div>
                <form action="adminoperations.php" method="post">
                    <div class="login-form">
                        <div class="control-group">
                            <input type="text" name= "username" class="login-field" placeholder="Username" id="login-username">
                            <label class="login-field-icon fui-user" for="login-username"></label>
                        </div>

                        <button name="deleteaccountinadmin" class="btn btn-primary btn-large btn-block">Delete Account</button>
                    </div>
                </form>
            </div>

            <div class="admin-screen">
                <div class= "app-title">
                    <h3>Add Account</h3>
                </div>
                    <form action="adminoperations.php" method="post">
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
                            
                            
                                <button name="addaccountinadmin" class="btn btn-primary btn-large btn-block">Add Account</button>
                                
                            </div>

                    </form>
                    </div>
                    <a href="profile.php"><button class="btn btn-primary btn-large btn-block">Go Back</button></a>
            </div>

            
                    


        
        </div>
    </div>

        
</body>
</html>