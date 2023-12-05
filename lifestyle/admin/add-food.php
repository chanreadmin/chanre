<?php


session_start();
include('layout/config.php');
error_reporting(0);

/*get username*/
$sid = intval($_GET['pid']);
$query1 = mysqli_query($con, "select * from tbl_users where id = $sid");
$rows = mysqli_fetch_array($query1);
$username = $rows['fname'];
$lname = $rows['lname'];
$queryvisit = mysqli_query($con, "Select * from investigation where patient_id = $sid ORDER BY visit DESC LIMIT 1");
$row1 = mysqli_fetch_array($queryvisit);
// $newvisit = $row1['visit'] + 1;
/*get username*/

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
       $item = $_POST['item'];
       $calories = $_POST['calories'];
       $protien = $_POST['protien'];
       $carbohydrate= $_POST['carbohydrate'];
       $fat= $_POST['fat'];
       $fibre= $_POST['fibre'];
       $quantity = $_POST['quantity'];
       $isActive = 1;
       //$PostDate = date('d/m/Y');
       //Fetch User Details
        $queryinv = mysqli_query($con, "Insert into tbl_dietlist(item, calories, protien, carbohydrate, fat, fibre, quantity, isActive)
        values('$item','$calories','$protien','$carbohydrate','$fat','$fibre','$quantity','$isActive')");
        if ($queryinv) 
        {
            echo "<script>alert('Report is successfuly Added');</script>";
        } 
        else 
        {
            echo "<script>alert('Report could not Added');</script>";
        }
    }
?>
<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />
    <title>Assestment Book</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start sidebar -->
        <?php include('layout/sidemenu.php'); ?>
        <!--end sidebar -->
        <!--start top header-->
        <?php include('layout/topheader.php'); ?>
        <!--end top header-->
        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                <div class="row">
                    <div class="col-xl-10 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase">Add Meals</h6>
                                    <hr>
                                    <form class="row g-3 needs-validation" novalidate method="post">
                                        <div class="col-md-3">
                                            <label for="validationCustom01" class="form-label">Item</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="item" placeholder="item" 
                                                required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom02" class="form-label">Calories</label>
                                            <input type="text" class="form-control" name="calories" id="calories" placeholder="calories" 
                                                required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Protein</label>
                                            <input class="result form-control" type="text" id="protien" name="protien"
                                                placeholder="protien">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Carbohydrate</label>
                                            <input class="result form-control" type="text" id="carbohydrate" name="carbohydrate"
                                                placeholder="carbohydrate">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Fat</label>
                                            <input class="result form-control" type="text" id="fat" name="fat"
                                                placeholder="fat">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Dietary fibre</label>
                                            <input class="result form-control" type="text" id="fibre" name="fibre"
                                                placeholder="fibre">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Quantity</label>
                                            <input class="result form-control" type="text" id="quantity" name="quantity"
                                                placeholder="quantity">
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->
        <!--start footer-->
        <footer class="footer">
            <div class="footer-text">
                Copyright © 2023. All right reserved.
            </div>
        </footer>
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->

        <!--start switcher-->

        <!--end switcher-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->


    <!-- JS Files-->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

</body>

</html>

<?php } ?>