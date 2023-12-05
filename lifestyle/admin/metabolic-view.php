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
                                        <h6 class="mb-0 text-uppercase">Metabolic Disorder</h6>
                                        <hr>
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
                                                $fquery = mysqli_query($con, "select * from tbl_metabolic where patient_id = $nid");
                                                while ($rows = mysqli_fetch_array($fquery)) {
                                                ?>
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <label for="">DM</label>
                                                            </td>
                                                            <td> <input type="text" class="form-control" value="<?php echo htmlentities($rows['dm']) ?>" disabled> </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="dm_duration" id="dm_duration" value="<?php echo htmlentities($rows['dm_duration']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="dm_treatment" id="dm_treatment" value="<?php echo htmlentities($rows['dm_treatment']) ?>" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">HTN</label>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="htn" id="htn" value="<?php echo htmlentities($rows['htn']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="htn_duration" id="htn_duration" value="<?php echo htmlentities($rows['htn_duration']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="htn_treatment" id="htn_treatment" value="<?php echo htmlentities($rows['htn_treatment']) ?>" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Hypothyroidism</label>
                                                            </td>
                                                            <td>
                                                                <input name="hypothyroidism" id="hypothyroidism" class="form-control" value="<?php echo htmlentities($rows['hypothyroidism']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="hypothyroidism_duration" id="hypothyroidism_duration" value="<?php echo htmlentities($rows['hypothyroidism_duration']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="hypothyroidism_treatment" id="hypothyroidism_treatment" value="<?php echo htmlentities($rows['hypothyroidism_treatment']) ?>" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Hypercholestero</label>
                                                            </td>
                                                            <td>
                                                                <input name="hypercholestero" id="hypercholestero" class="form-control" value="<?php echo htmlentities($rows['hypercholestero']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="hypercholestero_duration" id="hypercholestero_duration" value="<?php echo htmlentities($rows['hypercholestero_duration']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="hypercholestero_treatment" id="hypercholestero_treatment" value="<?php echo htmlentities($rows['hypercholestero_treatment']) ?>" disabled>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Others</label>
                                                            </td>
                                                            <td>
                                                                <input name="mbdothers" id="mbdothers" class="form-control" value="<?php echo htmlentities($rows['mbdothers']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="mbdothers_duration" id="mbdothers_duration" value="<?php echo htmlentities($rows['mbdothers_duration']) ?>" disabled>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="mbdother_treatment" id="mbdother_treatment" value="<?php echo htmlentities($rows['mbdother_treatment']) ?>" disabled>
                                                            </td>
                                                        </tr>

                                                    </table>
                                                <?php } ?>
                                            </div>
                                            <!-- <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Associaated Chills and Rigors</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Myalgia</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Type continuous / Remittent/ Intermittent</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Lethargy/Generalised Weakness</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Lethargy/ Generalised weakness</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Excessive sweating </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="cm" id="cm" class="form-control">
                                                <option value="">Excessive sweating </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div> -->

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <!-- <button type="submit" name="submit" class="btn btn-primary btn-rounded">Add
                                                        Report</button> -->
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