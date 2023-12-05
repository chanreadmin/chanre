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
        
        $ibd = $_POST['ibd'];
        $ibd_duration = $_POST['ibd_duration'];
        $ibd_treatment = $_POST['ibd_treatment'];
        $ibs = $_POST['ibs'];
        $ibs_duration = $_POST['ibs_duration'];
        $ibs_treatment = $_POST['ibs_treatment'];
        $gerd = $_POST['gerd'];
        $gerd_duration = $_POST['gerd_duration'];
        $gerd_treatment = $_POST['gerd_treatment'];
        $giother = $_POST['giother'];
        $giother_duration = $_POST['giother_duration'];
        $giother_treatment = $_POST['giother_treatment'];
        

        $updateQuery = mysqli_query($con, "update tbl_cardiac set ibd = '$ibd', ibd_duration = '$ibd_duration',
            ibd_treatment = '$ibd_treatment', ibs = '$ibs', ibs_duration = '$ibs_duration',
            ibs_treatment = '$ibs_treatment', gerd = '$gerd', gerd_duration = '$gerd_duration',
            gerd_treatment = '$gerd_treatment', giother = '$giother', giother_duration='$giother_duration', giother_treatment = '$giother_treatment'
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
                                        <h6 class="mb-0 text-uppercase">GIT Involvement</h6>
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
                                                                <label for="">IBD</label>
                                                            </td>
                                                            <td> 
                                                                <select name="ibd" class="form-control"><option value="Yes" <?php if($rows['ibd'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['ibd'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ibd_duration" id="ibd_duration" value="<?php echo htmlentities($rows['ibd_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ibd_treatment" id="ibd_treatment" value="<?php echo htmlentities($rows['ibd_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">IBS</label>
                                                            </td>
                                                            <td>
                                                               <select name="ibs" class="form-control"><option value="Yes" <?php if($rows['ibs'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['ibs'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ibs_duration" id="ibs_duration" value="<?php echo htmlentities($rows['ibs_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="ibs_treatment" id="ibs_treatment" value="<?php echo htmlentities($rows['ibs_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">GERD/PUD</label>
                                                            </td>
                                                            <td>
                                                                <select name="gerd" class="form-control"><option value="Yes" <?php if($rows['gerd'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['gerd'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="gerd_duration" id="gerd_duration" value="<?php echo htmlentities($rows['gerd_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="gerd_treatment" id="gerd_treatment" value="<?php echo htmlentities($rows['gerd_treatment']) ?>" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <label for="">Others</label>
                                                            </td>
                                                            <td>
                                                                <select name="giother" class="form-control"><option value="Yes" <?php if($rows['giother'] == 'Yes') { ?> selected="selected"<?php } ?>>Yes</option><option value="No"<?php if($rows['giother'] == 'No') { ?> selected="selected"<?php } ?>>No</option></select>
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="giother_duration" id="giother_duration" value="<?php echo htmlentities($rows['giother_duration']) ?>" >
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" name="giother_treatment" id="giother_treatment" value="<?php echo htmlentities($rows['giother_treatment']) ?>" >
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