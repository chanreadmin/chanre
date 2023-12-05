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
        $cetender = $_POST['cetender']; 
        $ceswell = $_POST['ceswell']; 
        $cearom = $_POST['cearom']; 
        $ceprom = $_POST['ceprom']; 
        $shrttender = $_POST['shrttender']; 
        $shrtswell = $_POST['shrtswell']; 
        $shrtarom = $_POST['shrtarom']; 
        $shrtprom = $_POST['shrtprom']; 
        $shlttender = $_POST['shlttender']; 
        $shltsell = $_POST['shltsell']; 
        $shltarom = $_POST['shltarom']; 
        $shltprom = $_POST['shltprom']; 
        $elrttender = $_POST['elrttender']; 
        $elrtswell = $_POST['elrtswell']; 
        $elrtarom = $_POST['elrtarom']; 
        $elrtprom = $_POST['elrtprom']; 
        $ellttender = $_POST['ellttender']; 
        $elltswell = $_POST['elltswell']; 
        $elltarom = $_POST['elltarom']; 
        $elltprom = $_POST['elltprom']; 
        $wrttender = $_POST['wrttender']; 
        $wrtswell = $_POST['wrttender']; 
        $wrtarom = $_POST['wrtarom']; 
        $wrtprom = $_POST['wrtprom']; 
        $wrlttender = $_POST['wrlttender']; 
        $wrltswell = $_POST['wrltswell']; 
        $wrltarom = $_POST['wrltarom']; 
        $wrltprom = $_POST['wrltprom']; 
        $harttender = $_POST['harttender']; 
        $hartswell = $_POST['hartswell']; 
        $hartarom = $_POST['hartarom']; 
        $hartprom = $_POST['hartprom']; 
        $halttender = $_POST['halttender']; 
        $haltswell = $_POST['haltswell']; 
        $haltarom = $_POST['haltarom']; 
        $haltprom = $_POST['haltprom']; 
        $hiptender = $_POST['hiptender']; 
        $hipswell = $_POST['hipswell']; 
        $hiparom = $_POST['hiparom']; 
        $hipprom = $_POST['hipprom']; 
        $kneetender = $_POST['kneetender']; 
        $kneeswell = $_POST['kneeswell']; 
        $kneearom = $_POST['kneearom']; 
        $kneeprom = $_POST['kneeprom']; 
        $ankletender = $_POST['ankletender']; 
        $ankleswell = $_POST['ankleswell']; 
        $anklearom = $_POST['anklearom']; 
        $ankleprom = $_POST['ankleprom'];
        $admin_name = $_SESSION['login'];
        $PostDate = date('d/m/Y');
        //Fetch User Details
        $queryinv = mysqli_query($con, "Update  tbl_jointassesment set 
        cetender='$cetender', ceswell='$ceswell', cearom='$cearom', ceprom='$ceprom', shrttender='$shrttender', shrtswell='$shrtswell', shrtarom='$shrtarom', shrtprom='$shrtprom', shlttender='$shlttender', shltsell='$shltsell', shltarom='$shltarom', shltprom='$shltprom', elrttender='$elrttender', elrtswell='$elrtswell', elrtarom='$elrtarom', elrtprom='$elrtprom', ellttender='$ellttender', elltswell='$elltswell', elltarom='$elltarom', elltprom='$elltprom', wrttender='$wrttender', wrtswell='$wrtswell', wrtarom='$wrtarom', wrtprom='$wrtprom', wrlttender='$wrlttender', wrltswell='$wrltswell', wrltarom='$wrltarom', wrltprom='$wrltprom', harttender='$harttender', hartswell='$hartswell', hartarom='$hartarom', hartprom='$hartprom', halttender='$halttender', haltswell='$haltswell', haltarom='$haltarom', haltprom='$haltprom', hiptender='$hiptender', hipswell='$hipswell', hiparom='$hiparom', hipprom='$hipprom', kneetender='$kneetender', kneeswell='$kneeswell', kneearom='$kneearom', kneeprom='$kneeprom', ankletender='$ankletender', ankleswell='$ankleswell', anklearom='$anklearom', ankleprom='$ankleprom' where id = $sid ");
        
        if ($queryinv) {
            $msg = 'Data Updated Successfully';
        } else {
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
                                    <h6 class="mb-0 text-uppercase">Joint Assessment</h6>
                                    <hr>
                                    <span class="text-success text-center"><?php echo $msg;?></span>
                                        <span class="text-danger text-center"><?php echo $errmsg;?></span>
                                    <form class="row g-3 needs-validation" novalidate method="post">
                                        <table class="table-responsive text-center">
                                            <thead>
                                                <tr>
                                                    <th>Joint</th>
                                                    <th>Tenderness</th>
                                                    <th>Swelling</th>
                                                    <th>AROM</th>
                                                    <th>PROM</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                        $fquery = mysqli_query($con, "Select * from tbl_jointassesment where id= $sid");
                                        while ($rows = mysqli_fetch_array($fquery)) {
                                        ?>
                                                    <?php include('component/edit-joint.php') ?>
                                               
                                               <?php } ?>
                                            </tbody>
                                        </table>

                                        <div class="col-12 d-flex justify-content-center">
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