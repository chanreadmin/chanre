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
        $copd = $_POST['copd'];
        $copd_duration = $_POST['copd_duration'];
        $copd_treatment = $_POST['copd_treatment'];
        $ba = $_POST['ba'];
        $ba_duration = $_POST['ba_duration'];
        $ba_treatment = $_POST['ba_treatment'];
        $ild = $_POST['ild'];
        $ild_duration = $_POST['ild_duration'];
        $ild_treatment = $_POST['ild_treatment'];
        $tb = $_POST['tb'];
        $tb_duration = $_POST['tb_duration'];
        $tb_treatment = $_POST['tb_treatment'];
        $riother = $_POST['riother'];
        $riother_duration = $_POST['riother_duration'];
        $riother_treatment = $_POST['riother_treatment'];

        $updateQuery = mysqli_query($con, "Update tbl_cardiac set copd= '$copd', 
        copd_duration = '$copd_duration', copd_treatment = '$copd_treatment', 
        ba = '$ba', ba_duration = '$ba_duration', ba_treatment = '$ba_treatment', ild = '$ild',
        ild_duration = '$ild_duration', ild_treatment = '$ild_treatment', tb = '$tb',
        tb_duration = '$tb_duration', tb_treatment = '$tb_treatment', riother = '$riother',
        riother_duration = '$riother_duration', riother_treatment = '$riother_treatment' where patient_id = '$sid'
        ");

        if($updateQuery){
            $msg = 'Data Saved Successfully';
        }
        else
        {
            $errmsg = 'Something is wrong!!';
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
                                        <h6 class="mb-0 text-uppercase">Respiratory Involvement</h6>
                                        <hr>
                                        <span class="text-success text-center"><?php echo $msg;?></span>
                                        <span class="text-danger text-center"><?php echo $errmsg;?></span>
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
                                                            <td>
                                                                <label for="">COPD</label>
                                                            </td>
                                                            <td> 
                                                                <select name="copd" class="form-control"><option value="Yes" <?php if($rows['copd'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['copd'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="copd_duration" id="copd_duration" value="<?php echo htmlentities($rows['copd_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="copd_treatment" id="copd_treatment" value="<?php echo htmlentities($rows['copd_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">BA</label>
                                                            </td>
                                                            <td>
                                                               <select name="ba" class="form-control"><option value="Yes" <?php if($rows['ba'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['ba'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ba_duration" id="ba_duration" value="<?php echo htmlentities($rows['ba_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ba_treatment" id="ba_treatment" value="<?php echo htmlentities($rows['ba_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">ILD</label>
                                                            </td>
                                                            <td>
                                                                <select name="ild" class="form-control"><option value="Yes" <?php if($rows['ild'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['ild'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ild_duration" id="ild_duration" value="<?php echo htmlentities($rows['ild_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ild_treatment" id="ild_treatment" value="<?php echo htmlentities($rows['ild_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">TB</label>
                                                            </td>
                                                            <td>
                                                                <select name="tb" class="form-control"><option value="Yes" <?php if($rows['tb'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['tb'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="tb_duration" id="tb_duration" value="<?php echo htmlentities($rows['tb_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="tb_treatment" id="tb_treatment" value="<?php echo htmlentities($rows['tb_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Others</label>
                                                            </td>
                                                            <td>
                                                                <select name="riother" class="form-control"><option value="Yes" <?php if($rows['riother'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['riother'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="riother_duration" id="riother_duration" value="<?php echo htmlentities($rows['riother_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="riother_treatment" id="riother_treatment" value="<?php echo htmlentities($rows['riother_treatment']) ?>" >
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