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
        $ihd = $_POST['ihd'];
        $ihd_duration = $_POST['ihd_duration'];
        $ihd_treatment = $_POST['ihd_treatment'];
        $valv = $_POST['valv'];
        $valv_duration = $_POST['valv_duration'];
        $valv_treatment = $_POST['valv_treatment'];
        $hf = $_POST['hf'];
        $hf_duration = $_POST['hf_duration'];
        $hf_treatment = $_POST['hf_treatment'];
        $cardother = $_POST['cardother'];
        $cardother_duration = $_POST['cardother_duration'];
        $cardother_treatment = $_POST['cardother_treatment'];

        $query = mysqli_query($con, "Update tbl_cardiac set ihd = '$ihd', ihd_duration = '$ihd_duration',
        ihd_treatment = '$ihd_treatment', valv = '$valv', valv_duration = '$valv_duration', valv_treatment='$valv_treatment',
        hf= '$hf', hf_duration = '$hf_duration', hf_treatment = '$hf_treatment', cardother = '$cardother',
        cardother_duration = '$cardother_duration', cardother_treatment = '$cardother_treatment' where patient_id = '$sid'
         ");
            if($query){
            $msg = 'Data is successfully updated';
            }
            else{
                $error = 'Somthing is wrong!';
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
                                        <h6 class="mb-0 text-uppercase">Cardiac Involvement </h6>
                                        
                                        <hr>
                                        <span class="text-success text-center"><?php echo $msg;?></span>
                                        <span class="text-danger text-center"><?php echo $error;?></span>
                                        <form class="row g-3" method="POST">
                                            <div class="col-6">

                                            </div>
                                            <div class="col-6">
                                                <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                            </div>
                                            <div class="col-3">
                                            </div>
                                            <div class="col-12">
                                                <?php
                                                $nid = intval($_GET['pid']);
                                                $fquery = mysqli_query($con, "select * from tbl_cardiac where patient_id = $nid");
                                                while ($rows = mysqli_fetch_array($fquery)) {
                                                ?>
                                                    <table>
                                                        <tr>
                                                            <th></th>
                                                            <th>Diagnose</th>
                                                            <th>Duration(In Months)</th>
                                                            <th>Treatment</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">IHD</label>
                                                            </td>
                                                            <td> <select name="ihd" class="form-control"><option value="Yes" <?php if($rows['ihd'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['ihd'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select> </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ihd_duration" id="ihd_duration" value="<?php echo htmlentities($rows['ihd_duration']) ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ihd_treatment" id="ihd_treatment" value="<?php echo htmlentities($rows['ihd_treatment']) ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Valvular Disease</label>
                                                            </td>
                                                            <td>
                                                            <select name="valv" class="form-control"><option value="Yes" <?php if($rows['valv'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['valv'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="valv_duration" id="valv_duration" value="<?php echo htmlentities($rows['valv_duration']) ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="valv_treatment" id="valv_treatment" value="<?php echo htmlentities($rows['valv_treatment']) ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Heart Failure</label>
                                                            </td>
                                                            <td>
                                                            <select name="hf" class="form-control"><option value="Yes" <?php if($rows['hf'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['hf'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="hf_duration" id="hf_duration" value="<?php echo htmlentities($rows['hf_duration']) ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="hf_treatment" id="hf_treatment" value="<?php echo htmlentities($rows['hf_treatment']) ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Others</label>
                                                            </td>
                                                            <td>
                                                            <select name="cardother" class="form-control"><option value="Yes" <?php if($rows['cardother'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['cardother'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="cardother_duration" id="cardother_duration" value="<?php echo htmlentities($rows['cardother_duration']) ?>">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="cardother_treatment" id="cardother_treatment" value="<?php echo htmlentities($rows['cardother_treatment']) ?>">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-rounded">Update</button>
                                                </div>
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
        <!-- <script type="module" src="../../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script> -->
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