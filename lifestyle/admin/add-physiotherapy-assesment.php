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

        $queryinv = mysqli_query($con, "Insert into tbl_muscle 
    (sfpower, sftone, sfcord, sepower, setone, secord,
     saddpower, saddtone, saddcord, sabdpower, 
     sabdtone, sabdcord, efpower, eftone, efcord, 
     wfpower, wftone, wfcord, wepower, wetone, wecord, 
     hepower, hetone, hecord, hipflexorpower, hipflexortone, 
     hipflexorcord, hipabdpower, hipabdtone, hipabdcord, hipaddpower, 
     hipaddtone, hipaddcord, kepower, ketone, kecord, kfpower, kftone, 
     kfcord, adpower, adtone, adcord, apfpower, apftone, apfcord, 
     eepower, eetone, eecord, admin_name, patient_name, patient_id)
    
    values('$sfpower','$sftone','$sfcord','$sepower','$setone',
    '$secord','$saddpower','$saddtone','$saddcord','$sabdpower',
    '$sabdtone','$sabdcord','$efpower','$eftone','$efcord',
    '$wfpower','$wftone','$wfcord','$wepower','$wetone','$wecord',
    '$hepower','$hetone','$hecord','$hipflexorpower','$hipflexortone',
    '$hipflexorcord','$hipabdpower','$hipabdtone','$hipabdcord','$hipaddpower',
    '$hipaddtone','$hipaddcord','$kepower','$ketone','$kecord','$kfpower',
    '$kftone','$kfcord','$adpower','$adtone','$adcord','$apfpower','$apftone',
    '$apfcord','$eepower','$eetone','$eecord','$admin_name','$username','$sid')");

    
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
                                    <h6 class="mb-0 text-uppercase">PHYSIOTHERAPY ASSESSMENT</h6>
                                    <hr>
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
                                                <tbody>
                                                    <!-- Shoulder Flexor -->
                                                    <tr>
                                                        <td>Shoulder Flexors</td>
                                                        <td>
                                                            <select name="sfpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="sftone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="sfcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Shoulder extensor -->
                                                    <tr>
                                                        <td>Shoulder Extensor</td>
                                                        <td>
                                                            <select name="sepower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="setone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="secord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Shoulder adductors -->
                                                    <tr>
                                                        <td>Shoulder adductors</td>
                                                        <td>
                                                            <select name="saddpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="saddtone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="saddcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Shoulder abductors -->
                                                    <tr>
                                                        <td>Shoulder Abductors</td>
                                                        <td>
                                                            <select name="sabdpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="sabdtone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="sabdcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Elbow Flexors -->
                                                    <tr>
                                                        <td>Elbow Flexors</td>
                                                        <td>
                                                            <select name="efpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="eftone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="efcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Elbow Extensors -->
                                                    <tr>
                                                        <td>Elbow Extensors</td>
                                                        <td>
                                                            <select name="eepower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="eetone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="eecord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Wrist Flexors -->
                                                    <tr>
                                                        <td>Wrist Flexors</td>
                                                        <td>
                                                            <select name="wfpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="wftone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="wfcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Wrist Extension -->
                                                    <tr>
                                                        <td>Wrist Extension</td>
                                                        <td>
                                                            <select name="wepower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="wetone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="wecord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Hip Extensions -->
                                                    <tr>
                                                        <td>Hip Extensions</td>
                                                        <td>
                                                            <select name="hepower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hetone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hecord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Hip Flexors -->
                                                    <tr>
                                                        <td>Hip Flexors</td>
                                                        <td>
                                                            <select name="hipflexorpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hipflexortone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hipflexorcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Hip Abductors -->
                                                    <tr>
                                                        <td>Hip Abductors</td>
                                                        <td>
                                                            <select name="hipabdpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hipabdtone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hipabdcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Hip Adductors -->
                                                    <tr>
                                                        <td>Hip Adductors</td>
                                                        <td>
                                                            <select name="hipaddpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hipaddtone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="hipaddcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Knee Extensor -->
                                                    <tr>
                                                        <td>Knee Extensor</td>
                                                        <td>
                                                            <select name="kepower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="ketone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="kecord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Knee Flexors -->
                                                    <tr>
                                                        <td>Knee Flexors</td>
                                                        <td>
                                                            <select name="kfpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="kftone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="kfcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Ankle Dorsiflexors -->
                                                    <tr>
                                                        <td>Ankle Dorsiflexors</td>
                                                        <td>
                                                            <select name="adpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="adtone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="adcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <!-- Ankle plantar felxor -->
                                                    <tr>
                                                        <td>Ankle plantar felxor</td>
                                                        <td>
                                                            <select name="apfpower" class="form-control"
                                                                id="shoulderflex">
                                                                <option value="">Select power</option>
                                                                <option value="0">0</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="apftone">
                                                                <option value="">Select Tone</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Spasticity">Spasticity </option>
                                                                <option value="Flaccidity">Flaccidity </option>
                                                            </select>

                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="apfcord">
                                                                <option value="">Select Coordination</option>
                                                                <option value="Normal">Normal </option>
                                                                <option value="Abnormal">Abnormal </option>

                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
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