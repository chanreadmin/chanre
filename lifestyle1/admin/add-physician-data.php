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
        $ckd=$_POST['ckd'];
        $ckd_duration = $_POST['ckd_duration'];
        $ckd_treatment = $_POST['ckd_treatment'];
        $rcalculi=$_POST['rcalculi'];
        $rcalculi_duration=$_POST['rcalculi_duration'];
        $rcalculi_treatment=$_POST['rcalculi_treatment'];
        $renaloth = $_POST['renaloth'];
        $renaloth_duration = $_POST['renaloth_duration'];
        $renaloth_treatment = $_POST['renaloth_treatment'];
        $pain = $_POST['pain'];
        $pain_duration = $_POST['pain_duration'];
        $pain_treatment = $_POST['pain_treatment'];
        $stiffness = $_POST['stiffness'];
        $stiffness_duration = $_POST['stiffness_duration'];
        $stiffness_treatment = $_POST['stiffness_treatment'];
        $deformity = $_POST['deformity'];
        $deformity_duration = $_POST['deformity_duration'];
        $deformity_treatment = $_POST['deformity_treatment'];
        $mobility = $_POST['mobility'];
        $mobility_duration = $_POST['mobility_duration'];
        $mobility_treatment = $_POST['mobility_treatment'];
        $admin_name = $_SESSION['login'];
        $PostDate = date('d/m/Y');
        //Fetch User Details

        $queryinv = mysqli_query($con, "Insert into tbl_cardiac 
        (ihd,ihd_duration,ihd_treatment,valv,valv_duration,valv_treatment,hf,
        hf_duration,hf_treatment,cardother, cardother_duration, cardother_treatment, 
        copd, copd_duration, copd_treatment, ba, ba_duration, ba_treatment, ild, 
        ild_duration, ild_treatment, tb, tb_duration, tb_treatment, riother, 
        riother_duration, riother_treatment, ibd, ibd_duration, ibd_treatment, ibs, 
        ibs_duration, ibs_treatment, gerd, gerd_duration, gerd_treatment, giother, 
        giother_duration, giother_treatment, stroke, stroke_duration, stroke_treatment, 
        parkinson, parkinson_duration, parkinson_treatment, perin, perin_duration, 
        perin_treatment, sezdis, sezdis_duration, sezdis_treatment, ckd, ckd_duration, 
        ckd_treatment, rcalculi, rcalculi_duration, rcalculi_treatment, renaloth, 
        renaloth_duration, renaloth_treatment, pain, pain_duration, pain_treatment, 
        stiffness, stiffness_duration, stiffness_treatment, deformity, deformity_duration, 
        deformity_treatment, mobility, mobility_duration, mobility_treatment, 
        admin_name, patient_name, patient_id)
        
        values('$ihd','$ihd_duration','$ihd_treatment','$valv','$valv_duration',
        '$valv_treatment','$hf','$hf_duration','$hf_treatment','$cardother',
        '$cardother_duration','$cardother_treatment','$copd','$copd_duration',
        '$copd_treatment','$ba','$ba_duration','$ba_treatment','$ild','$ild_duration',
        '$ild_treatment','$tb','$tb_duration','$tb_treatment','$riother','$riother_duration',
        '$riother_treatment','$ibd','$ibd_duration','$ibd_treatment','$ibs','$ibs_duration',
        '$ibs_treatment','$gerd','$gerd_duration','$gerd_treatment','$giother',
        '$giother_duration','$giother_treatment','$stroke','$stroke_duration',
        '$stroke_treatment','$parkinson','$parkinson_duration','$parkinson_treatment',
        '$perin','$perin_duration','$perin_treatment','$sezdis','$sezdis_duration',
        '$sezdis_treatment','$ckd','$ckd_duration','$ckd_treatment','$rcalculi',
        '$rcalculi_duration','$rcalculi_treatment','$renaloth','$renaloth_duration',
        '$renaloth_treatment','$pain','$pain_duration','$pain_treatment','$stiffness',
        '$stiffness_duration','$stiffness_treatment','$deformity','$deformity_duration',
        '$deformity_treatment','$mobility','$mobility_duration','$mobility_treatment',
        '$admin_name','$username','$sid')");
        
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
                                    <h6 class="mb-0 text-uppercase">Cardiac Involvement</h6>
                                    <hr>
                                    <form class="row g-3" method="POST">
                                        <div class="col-6">
                                            <select name="ci" id="ci" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">IHD</label>
                                                    </td>
                                                    <td>
                                                        <select name="ihd" id="ihd" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ihd_duration"
                                                            id="ihd_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ihd_treatment"
                                                            id="ihd_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Valvular Disease</label>
                                                    </td>
                                                    <td>
                                                        <select name="valv" id="valv" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="valv_duration"
                                                            id="valv_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="valv_treatment"
                                                            id="valv_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Heart Failure</label>
                                                    </td>
                                                    <td>
                                                        <select name="hf" id="hf"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="hf_duration" id="hf_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="hf_treatment"
                                                            id="hf_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Others</label>
                                                    </td>
                                                    <td>
                                                        <select name="cardother" id="cardother"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="cardother_duration"
                                                            id="cardother_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="cardother_treatment"
                                                            id="cardother_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        <hr>
                                        <h6 class="mb-0 text-uppercase">Respiratory Involvement</h6>
                                        <hr>
                                        <div class="col-6">
                                            <select name="ri" id="ri" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">COPD</label>
                                                    </td>
                                                    <td>
                                                        <select name="copd" id="copd" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="copd_duration"
                                                            id="copd_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="copd_treatment"
                                                            id="copd_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">BA</label>
                                                    </td>
                                                    <td>
                                                        <select name="ba" id="ba" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ba_duration"
                                                            id="ba_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ba_treatment"
                                                            id="ba_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">ILD</label>
                                                    </td>
                                                    <td>
                                                        <select name="ild" id="ild"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="ild_duration" id="ild_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="ild_treatment"
                                                            id="ild_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">TB</label>
                                                    </td>
                                                    <td>
                                                        <select name="tb" id="tb"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="tb_duration"
                                                            id="tb_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="tb_treatment"
                                                            id="tb_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Others</label>
                                                    </td>
                                                    <td>
                                                        <select name="riother" id="riother"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="riother_duration"
                                                            id="riother_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="riother_treatment"
                                                            id="riother_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>


                                        <hr>
                                        <h6 class="mb-0 text-uppercase">GIT Involvement</h6>
                                        <hr>
                                        <div class="col-6">
                                            <select name="git" id="git" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">IBD</label>
                                                    </td>
                                                    <td>
                                                        <select name="ibd" id="ibd" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ibd_duration"
                                                            id="ibd_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ibd_treatment"
                                                            id="ibd_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">IBS</label>
                                                    </td>
                                                    <td>
                                                        <select name="ibs" id="ibs" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ibs_duration"
                                                            id="ibs_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ibs_treatment"
                                                            id="ibs_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">GERD/PUD</label>
                                                    </td>
                                                    <td>
                                                        <select name="gerd" id="gerd"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="gerd_duration" id="gerd_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="gerd_treatment"
                                                            id="gerd_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Others</label>
                                                    </td>
                                                    <td>
                                                        <select name="giother" id="giother"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="giother_duration"
                                                            id="giother_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="giother_treatment"
                                                            id="giother_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                        <hr>
                                        <h6 class="mb-0 text-uppercase">Neurological Involvement</h6>
                                        <hr>
                                        <div class="col-6">
                                            <select name="ni" id="ni" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">Stroke</label>
                                                    </td>
                                                    <td>
                                                        <select name="stroke" id="stroke" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="stroke_duration"
                                                            id="stroke_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="stroke_treatment"
                                                            id="stroke_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Parkinson's</label>
                                                    </td>
                                                    <td>
                                                        <select name="parkinson" id="parkinson" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="parkinson_duration"
                                                            id="parkinson_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="parkinson_treatment"
                                                            id="parkinson_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Peripheral Neuropathy</label>
                                                    </td>
                                                    <td>
                                                        <select name="perin" id="perin"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="perin_duration" id="perin_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="perin_treatment"
                                                            id="perin_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Seziure Disorder Others</label>
                                                    </td>
                                                    <td>
                                                        <select name="sezdis" id="sezdis"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="sezdis_duration"
                                                            id="sezdis_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="sezdis_treatment"
                                                            id="sezdis_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>

                                        <hr>
                                        <h6 class="mb-0 text-uppercase">Renal Involvement</h6>
                                        <hr>
                                        <div class="col-6">
                                            <select name="renal" id="renal" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">CKD</label>
                                                    </td>
                                                    <td>
                                                        <select name="ckd" id="ckd" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ckd_duration"
                                                            id="ckd_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ckd_treatment"
                                                            id="ckd_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Renal Calculi</label>
                                                    </td>
                                                    <td>
                                                        <select name="rcalculi" id="rcalculi" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="rcalculi_duration"
                                                            id="rcalculi_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="rcalculi_treatment"
                                                            id="rcalculi_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Others</label>
                                                    </td>
                                                    <td>
                                                        <select name="renaloth" id="renaloth"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="renaloth_duration" id="renaloth_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="renaloth_treatment"
                                                            id="renaloth_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                        <hr>
                                        <h6 class="mb-0 text-uppercase">MSK Symptoms</h6>
                                        <hr>
                                        <div class="col-6">
                                            <select name="msk" id="msk" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-12">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">Pain</label>
                                                    </td>
                                                    <td>
                                                        <select name="pain" id="pain" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="pain_duration"
                                                            id="pain_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="pain_treatment"
                                                            id="pain_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Stiffness</label>
                                                    </td>
                                                    <td>
                                                        <select name="stiffness" id="stiffness" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="stiffness_duration"
                                                            id="stiffness_duration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="stiffness_treatment"
                                                            id="stiffness_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Deformity</label>
                                                    </td>
                                                    <td>
                                                        <select name="deformity" id="deformity"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="deformity_duration" id="deformity_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="deformity_treatment"
                                                            id="deformity_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Using any mobility aids</label>
                                                    </td>
                                                    <td>
                                                        <select name="mobility" id="mobility"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="mobility_duration"
                                                            id="mobility_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="mobility_treatment"
                                                            id="mobility_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>


                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="submit"
                                                    class="btn btn-primary btn-rounded">Add
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
    
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

    <script>
    
$(document).ready(function(){
  $("#ci").change(function(){
    // var disabled = false;
    $("#ihd").attr("disabled", '');
    $("#ihd_duration").attr("disabled", '');
    $("#ihd_treatment").attr("disabled", '');
    $("#valv").attr("disabled", '');
    $("#valv_duration").attr("disabled", '');
    $("#valv_treatment").attr("disabled", '');
    $("#hf").attr("disabled", '');
    $("#hf_duration").attr("disabled", '');
    $("#hf_treatment").attr("disabled", '');
    $("#cardother").attr("disabled", '');
    $("#cardother_duration").attr("disabled", '');
    $("#cardother_treatment").attr("disabled", '');
  });



//   $("#ci").click(function(){
//     $("#ihd").show();
//   });
});

    </script>
</body>

</html>

<?php } ?>