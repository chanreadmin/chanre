<?php


session_start();
include('layout/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $grbps = $_POST['grbps'];
        $bp = $_POST['bp'];
        $pulse = $_POST['pulse'];
        $spo2 = $_POST['spo2'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bodyfat = $_POST['bodyfat'];
        $visceralfat = $_POST['visceralfat'];
        $musclefat = $_POST['musclefat'];
        $bodyage = $_POST['bodyage'];
        $rm = $_POST['rm'];
        $bmi = $_POST['bmi'];
    }

    $sid = intval($_GET['pid']);
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
                    <div class="col-xl-8 mx-auto">

                        <div class="card">
                            <div class="card-body d-flex justify-content-center">
                                <div class="border p-3 rounded ">
                                    <a href="data-physiotherapy.php?pid=<?php echo $sid; ?>" class="btn btn-primary btn-sm">Physiotherapy Assessment</a>
                                    <a href="data-diet.php?pid=<?php echo $sid; ?>" class="btn btn-primary btn-sm">Diet Assessment</a>
                                    <a href="data-counselling.php?pid=<?php echo $sid; ?>" class="btn btn-primary btn-sm">Counselling Assessment</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase text-center text-primary">PHYSICIAN ASSESMENT</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- preliminary test -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">PRELIMINARY TEST</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="preliminary.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Visit</th>
                                        <th>Date</th>
                                        <th>GRBS</th>
                                        <th>BP</th>
                                        <th>Pulse</th>
                                        <th>SPO2</th>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Body Fat</th>
                                        <th>Visceral Fat</th>
                                        <th>Muscle Fat</th>
                                        <th>Body Age</th>
                                        <th>RM</th>
                                        <th>BMI(kg/m2)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $fquery = mysqli_query($con, "Select * from preliminarytest where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($fquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['visit']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['pdate']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['grbps']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['bp']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['pulse']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['spo2']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['pweight']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['pheight']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['bodyfat']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['visceralfat']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['musclefat']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['bodyage']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['rm']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['bmi']) ?>
                                        </td>
                                        <td>Edit</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--INVESTIGATIONS -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">INVESTIGATIONS</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="investigation.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Visit</th>
                                        <th>HB</th>
                                        <th>CRP</th>
                                        <th>RBS</th>
                                        <th>HbA1C</th>
                                        <th>Lipid Profile</th>
                                        <th>T3</th>
                                        <th>T4</th>
                                        <th>TSH</th>
                                        <th>LFT</th>
                                        <th>CREATININE</th>
                                        <th>ELECTROLYTES</th>
                                        <th>ECHO</th>
                                        <th>ECG</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $iquery = mysqli_query($con, "Select * from investigation where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($iquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['visit']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($frows['hb']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['crp']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['rbs']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['hba1c']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['lipid_profile']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['t3']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['t4']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['tsh']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['lft']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['creatinine']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['electrolyte']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['echo']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['ecg']) ?>
                                        </td>
                                        <td>View</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- RHEUMATOLOGICAL CONDITIONS -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">RHEUMATOLOGICAL CONDITIONS</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="physician.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>RA</th>
                                        <th>OA</th>
                                        <th>Osteoporosis</th>
                                        <th>PSA</th>
                                        <th>SPA</th>
                                        <th>SLE</th>
                                        <th>Myositis</th>
                                        <th>Scleroderma</th>
                                        <th>Sjogren's syndrome</th>
                                        <th>UCTD</th>
                                        <th>MCTD</th>
                                        <th>GOUT</th>
                                        <th>Vasculitis</th>
                                        <th>Other</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $iquery = mysqli_query($con, "Select * from tbl_rc where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($iquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['ra']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($frows['oa']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['osteoprosis']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['psa']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['spa']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['sle']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['myositis']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['scleroderma']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['sjogren']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['uctd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['mctd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['gout']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['vasculitis']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['rcother']) ?>
                                        </td>
                                        <td><a href="view_rc.php?sid=<?php echo htmlentities($frows['id']) ?>">view</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- METABOLIC DISORDER -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">METABOLIC DISORDER</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-metabolic-disorder.php?pid=<?php echo $sid; ?>">Add Report</a>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>DM</th>
                                        <th>HTN</th>
                                        <th>Hypothyrodism</th>
                                        <th>Hypercholesterolema</th>
                                        <th>Others</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_metabolic where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['dm']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['htn']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['hypothyroidism']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['hypercholestero']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['mbdothers']) ?>
                                        </td>
                                        <td><a
                                                href="metabolic-view.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- CARDIAC INVOLVEMENT -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">CARDIAC INVOLVEMENT</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-physician-data.php?pid=<?php echo $sid; ?>">Add Report</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="edit-cardiac.php?pid=<?php echo $sid; ?>">Edit</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>IHD</th>
                                        <th>Valvular Disease</th>
                                        <th>Heart Failure</th>
                                        <th>Others</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_cardiac where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['ihd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['valv']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['hf']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($frows['cardother']) ?>
                                        </td>
                                        <td><a href="edit-cardiac.php?pid=<?php echo $sid; ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RESPIRATORY INVOLVEMENT -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">RESPIRATORY INVOLVEMENT</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="edit-respiratory.php?pid=<?php echo $sid; ?>">Edit</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>COPD</th>
                                        <th>BA</th>
                                        <th>ILD</th>
                                        <th>TB</th>
                                        <th>Others</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_cardiac where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['copd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['ba']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['ild']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['tb']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['riother']) ?>
                                        </td>
                                        <td><a href="edit-respiratory.php?pid=<?php echo $sid; ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- GIT INVOLVEMENT  -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">GIT INVOLVEMENT</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="edit-git.php?pid=<?php echo $sid; ?>">Edit</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>IBD</th>
                                        <th>IBS</th>
                                        <th>GERD/PUD</th>
                                        <th>Others</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_cardiac where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['ibd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['ibs']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['gerd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['giother']) ?>
                                        </td>

                                        <td><a href="edit-git.php?pid=<?php echo $sid; ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- NEUROLOGICAL INVOLVEMENT -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">NEUROLOGICAL INVOLVEMENT</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="edit-neurological.php?pid=<?php echo $sid; ?>">Edit</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Stroke</th>
                                        <th>Parkinson's</th>
                                        <th>Peripheral Neuropathy</th>
                                        <th>Seziure Disorder Others</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_cardiac where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['stroke']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['parkinson']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['perin']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['sezdis']) ?>
                                        </td>

                                        <td><a
                                                href="edit-neurological.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- RENAL INVOLVEMENT -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">RENAL INVOLVEMENT</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="edit-renal-involvement.php?pid=<?php echo $sid; ?>">Add Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>CKD</th>
                                        <th>Renal Calculi</th>
                                        <th>Others</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_cardiac where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['ckd']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['rcalculi']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['renaloth']) ?>
                                        </td>

                                        <td><a
                                                href="edit-renal-involvement.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- MSK SYMPTOMS -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">MSK SYMPTOMS</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="edit-msk.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Pain</th>
                                        <th>Stiffness</th>
                                        <th>Deformity</th>
                                        <th>Using any mobility aids</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_cardiac where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['pain']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['stiffness']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['deformity']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['mobility']) ?>
                                        </td>
                                        <td><a
                                                href="edit-msk.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- PERSONAL HISTORY -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">PERSONAL HISTORY</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-personal-history.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Smoker</th>
                                        <th>Alcoholic</th>
                                        <th>Sleep</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_pgos where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['smoker']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['alcoholic']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['sleep']) ?>
                                        </td>

                                        <td><a
                                                href="add-personal-history.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- DRUG HISTORY -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">DRUG HISTORY</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="add-drugs.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Drug</th>
                                        <th>Dosage</th>
                                        <th>Duration</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_drugs where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['drug']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['dosage']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['duration']) ?>
                                        </td>

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- GYANEC HISTORY -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">GYANEC HISTORY</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="edit-gynaec-history.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mensural Cycle</th>
                                        <th>Flow</th>
                                        <th>PCOS</th>
                                        <th>PCOS Treatment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_pgos where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['mensural_cycle']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['flow']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['pcos']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['pcostreatment']) ?>
                                        </td>
                                        <td><a
                                                href="edit-gynaec-history.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- OBSTETRIC HISTORY -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">OBSTETRIC HISTORY</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="edit-obsteric-history.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Children</th>
                                        <th>miscariage</th>
                                        <th>Menopause</th>
                                        <th>Menopause Duration</th>
                                        <th>Latrogenic</th>
                                        <th>Hysterectomy</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_pgos where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['children']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['miscariage']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['menopause']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['menopause_duration']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['latrogenic']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['hysterectomy']) ?>
                                        </td>
                                        <td><a
                                                href="edit-obsteric-history.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Systemic Examination -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">SYSTEMIC EXAMINATION</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="edit-systemic-examination.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>CVS</th>
                                        <th>RS</th>
                                        <th>PA</th>
                                        <th>NEURO</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $mquery = mysqli_query($con, "Select * from tbl_pgos where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($mquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['cvsnormal']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['rsnormal']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['panormal']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['neuronormal']) ?>
                                        </td>
                                        <td><a
                                                href="edit-systemic-examination.php?pid=<?php echo htmlentities($frows['patient_id']) ?>">View</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Instruction and summary -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">SUMMARY INSTRUCTION</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="edit-instruction.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                    <!--<li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>-->
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <?php
                                                $nid = intval($_GET['pid']);
                                                $fquery = mysqli_query($con, "select * from tbl_pgos  where patient_id = $nid");
                                                while ($rows = mysqli_fetch_array($fquery)) {
                                                ?>

                            <div class="col-md-6">
                                <h5></h5>
                                <p> <strong>Instruction for Patient :</strong>
                                    <?php echo htmlentities($rows['inspatient']) ?></p>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <h5></h5>
                                <p><strong>Instruction for Physiotherapist
                                        :</strong><?php echo htmlentities($rows['insphysiotherapy']) ?></p>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <h5></h5>
                                <p><strong>Instruction for Dietician
                                        :</strong><?php echo htmlentities($rows['insdiet']) ?></p>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <h5></h5>
                                <p><strong>Instruction for Psychologist
                                        :</strong><?php echo htmlentities($rows['inspsycho']) ?></p>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <div class="col-md-6">
                                <h5></h5>
                                <p><strong>Summary :</strong><?php echo htmlentities($rows['summary']) ?></p>
                                <div class="valid-feedback">Looks good!</div>
                            </div>
                            <?php } ?>
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