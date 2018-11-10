<!-- this page is for all the links and scripts --
-- that will run to website -->
<?php
    include '../includes/dbh.inc.php';
    include 'server.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico"/>
    <!-- BOOTSTRAP, js AND CSS SCRIPT -->
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/scroller.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/datatables/buttons.bootstrap4.min.css">
    <script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/scroller.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../assets/datatables/buttons.print.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/pdfmake.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/jszip.min.js"></script>
    <script type="text/javascript" src="../assets/datatables/buttons.html5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../assets/font-awesome/webfonts/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- END OF BOOSTRAP AND CSS SCRIPT -->
</head>
<body>
<?php include 'scripts.php'; ?>