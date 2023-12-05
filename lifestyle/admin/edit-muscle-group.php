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
        $sfpower=$_POST['sfpower'];
        $sftone=$_POST['sftone'];
        $sfcord=$_POST['sfcord'];
        $sepower=$_POST['sepower'];
        $setone=$_POST['setone'];
        $secord=$_POST['secord'];
        $saddpower=$_POST['saddpower'];
        $saddtone=$_POST['saddtone'];
        $saddcord=$_POST['saddcord'];
        $sabdpower=$_POST['sabdpower'];
        $sabdtone=$_POST['sabdtone'];
        $sabdcord=$_POST['sabdcord'];
        $efpower=$_POST['efpower'];
        $eftone=$_POST['eftone'];
        $efcord=$_POST['efcord'];
        $wfpower=$_POST['wfpower'];
        $wftone=$_POST['wftone'];
        $wfcord=$_POST['wfcord'];
        $wepower=$_POST['wepower'];
        $wetone=$_POST['wetone'];
        $wecord=$_POST['wecord'];
        $hepower=$_POST['hepower'];
        $hetone=$_POST['hetone'];
        $hecord=$_POST['hecord'];
        $hipflexorpower=$_POST['hipflexorpower'];
        $hipflexortone=$_POST['hipflexortone'];
        $hipflexorcord=$_POST['hipflexorcord'];
        $hipabdpower=$_POST['hipabdpower'];
        $hipabdtone=$_POST['hipabdtone'];
        $hipabdcord=$_POST['hipabdcord'];
        $hipaddpower=$_POST['hipaddpower'];
        $hipaddtone=$_POST['hipaddtone'];
        $hipaddcord=$_POST['hipaddcord'];
        $kepower=$_POST['kepower'];
        $ketone=$_POST['ketone'];
        $kecord=$_POST['kecord'];
        $kfpower=$_POST['kfpower'];
        $kftone=$_POST['kftone'];
        $kfcord=$_POST['kfcord'];
        $adpower=$_POST['adpower'];
        $adtone=$_POST['adtone'];
        $adcord=$_POST['adcord'];
        $apfpower=$_POST['apfpower'];
        $apftone=$_POST['apftone'];
        $apfcord=$_POST['apfcord'];
        $eepower=$_POST['eepower'];
        $eetone=$_POST['eetone'];
        $eecord=$_POST['eecord'];
        $admin_name = $_SESSION['login'];
        $PostDate = date('d/m/Y');
        //Fetch User Details

        $queryinv = mysqli_query($con, "UPDATE  tbl_muscle 
     set sfpower='$sfpower',sftone='$sftone',sfcord='$sfcord',sepower='$sepower',setone='$setone',secord='$secord',saddpower='$saddpower',saddtone='$saddtone',saddcord='$saddcord',sabdpower='$sabdpower',sabdtone='$sabdtone',sabdcord='$sabdcord',efpower='$efpower',eftone='$eftone',efcord='$efcord',wfpower='$wfpower',wftone='$wftone',wfcord='$wfcord',wepower='$wepower',wetone='$wetone',wecord='$wecord',hepower='$hepower',hetone='$hetone',hecord='$hecord',hipflexorpower='$hipflexorpower',hipflexortone='$hipflexortone',hipflexorcord='$hipflexorcord',hipabdpower='$hipabdpower',hipabdtone='$hipabdtone',hipabdcord='$hipabdcord',hipaddpower='$hipaddpower',hipaddtone='$hipaddtone',hipaddcord='$hipaddcord',kepower='$kepower',ketone='$ketone',kecord='$kecord',kfpower='$kfpower',kftone='$kftone',kfcord='$kfcord',adpower='$adpower',adtone='$adtone',adcord='$adcord',apfpower='$apfpower',apftone='$apftone',apfcord='$apfcord',eepower='$eepower',eetone='$eetone',eecord='$eecord' where patient_id = $sid");

    
        if($queryinv){
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
                                    <h6 class="mb-0 text-uppercase text-center">INFORMATION OF MUSCLE GROUP</h6>
                                    <hr>
                                    <span class="text-success text-center"><?php echo $msg;?></span>
                                        <span class="text-danger text-center"><?php echo $errmsg;?></span>
                                    <form class="row g-3" method="POST">
                                        <div class="col-12 d-flex justify-content-center">
                                            <table class="text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Muscle Testing</th>
                                                        <th>Power</th>
                                                        <th>Tone</th>
                                                        <th>Coordination</th>
                                                    </tr>
                                                </thead>
                                                <tbody><?php
                                        $fquery = mysqli_query($con, "Select * from tbl_muscle where patient_id= $sid");
                                        while ($rows = mysqli_fetch_array($fquery)) {
                                        ?>
                                                    <?php include('component/edit-physiotherapy-data.php') ?>
                                               
                                               <?php } ?> </tbody>
                                            </table>

                                        </div>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary btn-rounded btn-sm">Add
                                                    Report</button>
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