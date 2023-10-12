<?php
    include 'connect.php';
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
            <div class="col-lg-9">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>PhoneNo</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                            $tabledata = $db -> prepare("SELECT * FROM admincontact");
                                            $tabledata -> execute();
                                            $tabledataCount = $tabledata -> rowCount();
                                            $tabledataarray = $tabledata -> fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($tabledataarray as $row) {
                                            echo    "<tr>
                                                        <td>{$row['Username']}</td>
                                                        <td>{$row['PhoneNo']}</td>
                                                        <td>{$row['Email']}</td>
                                                    </tr>";
                                        }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <a href="main.php"><button class="btn btn-primary btn-large btn-block">Go Back</button></a>
                </div>