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
        $asses_date = $_POST['asses_date'];
        $PostDate = date('d/m/Y');
        //Fetch User Details
        $queryinv = mysqli_query($con, "Insert into tbl_jointassesment 
        (cetender, ceswell, cearom, ceprom, shrttender, shrtswell, shrtarom, shrtprom, shlttender, shltsell, shltarom, shltprom, elrttender, elrtswell, elrtarom, elrtprom, ellttender, elltswell, elltarom, elltprom, wrttender, wrtswell, wrtarom, wrtprom, wrlttender, wrltswell, wrltarom, wrltprom, harttender, hartswell, hartarom, hartprom, halttender, haltswell, haltarom, haltprom, hiptender, hipswell, hiparom, hipprom, kneetender, kneeswell, kneearom, kneeprom, ankletender, ankleswell, anklearom, ankleprom, admin_name, patient_name, patient_id, asses_date)
        values('$cetender','$ceswell','$cearom','$ceprom','$shrttender','$shrtswell','$shrtarom','$shrtprom','$shlttender','$shltsell','$shltarom','$shltprom','$elrttender','$elrtswell','$elrtarom','$elrtprom','$ellttender','$elltswell','$elltarom','$elltprom','$wrttender','$wrtswell','$wrtarom','$wrtprom','$wrlttender','$wrltswell','$wrltarom','$wrltprom','$harttender','$hartswell','$hartarom','$hartprom','$halttender','$haltswell','$haltarom','$haltprom','$hiptender','$hipswell','$hiparom','$hipprom','$kneetender','$kneeswell','$kneearom','$kneeprom','$ankletender','$ankleswell','$anklearom','$ankleprom','$admin_name','$username','$sid','$asses_date')");
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
                                    <h6 class="mb-0 text-uppercase">Joint Assessment</h6>
                                    <hr>
                                    <form class="row g-3 needs-validation" novalidate method="post">
                                        <div class="col-6">
                                            <!--<label>Date</label>-->
                                            <input type="date" name="asses_date" value="" class="form-control">
                                        </div>
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
                                                <tr>
                                                    <td>CERVICAL</td>
                                                    <td>
                                                        <select name="cetender" id="cetender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="ceswell" id="ceswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="cearom" class="form-control" value="">
                                                    </td>
                                                    <td><input type="text" name="ceprom" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>SHOULDER RIGHT</td>
                                                    <td>
                                                        <select name="shrttender" id="shrttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="shrtswell" id="shrtswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="shrtarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="shrtprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>SHOULDER LEFT</td>
                                                    <td>
                                                        <select name="shlttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="shltsell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="shltarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="shltprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>ELBOW RIGHT</td>
                                                    <td>
                                                        <select name="elrttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="elrtswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="elrtarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="elrtprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>ELBOW LEFT</td>
                                                    <td>
                                                        <select name="ellttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="elltswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="elltarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="elltprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>WRIST RIGHT</td>
                                                    <td>
                                                        <select name="wrttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="wrtswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="wrtarom" class="form-control" value="">
                                                    </td>
                                                    <td><input type="text" name="wrtprom" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>WRIST LEFT</td>
                                                    <td>
                                                        <select name="wrlttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="wrltswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="wrltarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="wrltprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>RIGHT HAND</td>
                                                    <td>
                                                        <select name="harttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="hartswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="hartarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="hartprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>HAND LEFT</td>
                                                    <td>
                                                        <select name="halttender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="haltswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="haltarom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="haltprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>HIP</td>
                                                    <td>
                                                        <select name="hiptender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="hipswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="hiparom" class="form-control" value="">
                                                    </td>
                                                    <td><input type="text" name="hipprom" class="form-control" value="">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>KNEE</td>
                                                    <td>
                                                        <select name="kneetender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="kneeswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="kneearom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="kneeprom" class="form-control"
                                                            value=""></td>
                                                </tr>
                                                <tr>
                                                    <td>ANKLE</td>
                                                    <td>
                                                        <select name="ankletender" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select name="ankleswell" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="anklearom" class="form-control"
                                                            value=""></td>
                                                    <td><input type="text" name="ankleprom" class="form-control"
                                                            value=""></td>
                                                </tr>
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