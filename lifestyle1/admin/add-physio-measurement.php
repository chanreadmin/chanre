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
       
        $mdate=$_POST['mdate'];
        $midarm=$_POST['midarm'];
        $midforearm=$_POST['midforearm'];
        $chest=$_POST['chest'];
        $abdomen=$_POST['abdomen'];
        $waist=$_POST['waist'];
        $midthigh=$_POST['midthigh'];
        $midcalf=$_POST['midcalf'];
        $admin_name = $_SESSION['login'];
        $PostDate = date('d/m/Y');
        //Fetch User Details

        $queryinv = mysqli_query($con, "Insert into tbl_measurements 
        (mdate, midarm, midforearm, chest, abdomen, waist, midthigh, midcalf,admin_name, patient_name, patient_id)
        
        values('$mdate','$midarm','$midforearm','$chest','$abdomen','$waist','$midthigh','$midcalf','$admin_name','$username','$sid')");
        
        if ($queryinv) {
            echo "<script>alert('Report is successfuly Added');</script>";
        } else {
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
                                    <h6 class="mb-0 text-uppercase">MEASUREMENTS</h6>
                                    <hr>
                                    <form class="row g-3 needs-validation" novalidate method="post">
                                        <div class="col-md-3">
                                            <label for="validationCustom01" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="validationCustom01" name="mdate"
                                                required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom02" class="form-label">MID ARM</label>
                                            <input type="text" class="form-control" name="midarm"
                                                id="validationCustom02" placeholder="MID ARM" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">MID FOREARM</label>
                                            <input class="result form-control" type="text" id="midforearm"
                                                name="midforearm" placeholder="MID FOREARM">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom01" class="form-label">CHEST</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="chest"
                                                placeholder="CHEST" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="validationCustom02" class="form-label">ABDOMEN</label>
                                            <input type="text" class="form-control" name="abdomen"
                                                id="validationCustom02" placeholder="ABDOMEN" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">WAIST</label>
                                            <input class="result form-control" type="text" id="waist" name="waist"
                                                placeholder="WAIST">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">MID THIGH</label>
                                            <input class="result form-control" type="text" id="midthigh" name="midthigh"
                                                placeholder="MID THIGH">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">MID CALF</label>
                                            <input class="result form-control" type="text" id="midcalf" name="midcalf"
                                                placeholder="MID CALF">
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
</body>

</html>
<?php } ?>