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
        
        $stroke = $_POST['stroke'];
        $stroke_duration = $_POST['stroke_duration'];
        $stroke_treatment = $_POST['stroke_treatment'];
        $parkinson = $_POST['parkinson'];
        $parkinson_duration = $_POST['parkinson_duration'];
        $parkinson_treatment = $_POST['parkinson_treatment'];
        $perin = $_POST['perin'];
        $perin_duration = $_POST['perin_duration'];
        $perin_treatment = $_POST['perin_treatment'];
        $sezdis = $_POST['sezdis'];
        $sezdis_duration = $_POST['sezdis_duration'];
        $sezdis_treatment = $_POST['sezdis_treatment'];
        

        $updateQuery = mysqli_query($con, "update tbl_cardiac set stroke = '$stroke',
            stroke_duration = '$stroke_duration', stroke_treatment = '$stroke_treatment',
            parkinson = '$parkinson', parkinson_duration = '$parkinson_duration', parkinson_treatment = '$parkinson_treatment', perin = '$perin', perin_duration = '$perin_duration', perin_treatment = '$perin_treatment', sezdis = '$sezdis', sezdis_duration = '$sezdis_duration', sezdis_treatment = '$sezdis_treatment'
         where patient_id = '$sid'
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
                                    <h6 class="mb-0 text-uppercase">NEUROLOGICAL INVOLVEMENT</h6>
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
                                                        <label for="">Stroke</label>
                                                    </td>
                                                    <td>
                                                        <select name="stroke" class="form-control">
                                                            <option value=" ">Not choosed</option>
                                                            <option value="Yes" <?php if($rows['stroke'] == 'Yes') { ?>
                                                                selected="selected" <?php } ?>>Yes</option>
                                                            <option value="No" <?php if($rows['stroke'] == 'No') { ?>
                                                                selected="selected" <?php } ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="stroke_duration"
                                                            id="stroke_duration"
                                                            value="<?php echo htmlentities($rows['stroke_duration']) ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="stroke_treatment"
                                                            id="stroke_treatment"
                                                            value="<?php echo htmlentities($rows['stroke_treatment']) ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">PARKINSON'S</label>
                                                    </td>
                                                    <td>
                                                        <select name="parkinson" class="form-control">
                                                            <option value=" ">Not choosed</option>
                                                            <option value="Yes"
                                                                <?php if($rows['parkinson'] == 'Yes') { ?>
                                                                selected="selected" <?php } ?>>Yes</option>
                                                            <option value="No" <?php if($rows['parkinson'] == 'No') { ?>
                                                                selected="selected" <?php } ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="parkinson_duration" id="parkinson_duration"
                                                            value="<?php echo htmlentities($rows['parkinson_duration']) ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="parkinson_treatment" id="parkinson_treatment"
                                                            value="<?php echo htmlentities($rows['parkinson_treatment']) ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">PERIPHERAL NEUROPATHY</label>
                                                    </td>
                                                    <td>
                                                        <select name="perin" class="form-control">
                                                            <option value=" ">Not choosed</option>
                                                            <option value="Yes" <?php if($rows['perin'] == 'Yes') { ?>
                                                                selected="selected" <?php } ?>>Yes</option>
                                                            <option value="No" <?php if($rows['perin'] == 'No') { ?>
                                                                selected="selected" <?php } ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="perin_duration"
                                                            id="perin_duration"
                                                            value="<?php echo htmlentities($rows['perin_duration']) ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="perin_treatment"
                                                            id="perin_treatment"
                                                            value="<?php echo htmlentities($rows['perin_treatment']) ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">SEZIURE DISORDER OTHERS</label>
                                                    </td>
                                                    <td>
                                                        <select name="sezdis" class="form-control">
                                                            <option value=" ">Not choosed</option>
                                                            <option value="Yes" <?php if($rows['sezdis'] == 'Yes') { ?>
                                                                selected="selected" <?php } ?>>Yes</option>
                                                            <option value="No" <?php if($rows['sezdis'] == 'No') { ?>
                                                                selected="selected" <?php } ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sezdis_duration"
                                                            id="sezdis_duration"
                                                            value="<?php echo htmlentities($rows['sezdis_duration']) ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sezdis_treatment"
                                                            id="sezdis_treatment"
                                                            value="<?php echo htmlentities($rows['sezdis_treatment']) ?>">
                                                    </td>
                                                </tr>


                                            </table>
                                            <?php } ?>
                                        </div>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary btn-rounded">Update</button>
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