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
        
        $inspatient = $_POST['inspatient'];
        $insphysiotherapy = $_POST['insphysiotherapy'];
        $insdiet = $_POST['insdiet'];
        $inspsycho = $_POST['inspsycho'];
        $summary = $_POST['summary'];
        
        $updateQuery = mysqli_query($con, "update tbl_pgos set inspatient = '$inspatient',
            insphysiotherapy = '$insphysiotherapy', insdiet = '$insdiet', inspsycho = '$inspsycho', summary = '$summary' where patient_id = '$sid' ");
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
                    <div class="col-xl-12 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase">Summary & Instruction</h6>
                                    <hr>
                                    <span class="text-success text-center"><?php echo $msg;?></span>
                                    <span class="text-danger text-center"><?php echo $errmsg;?></span>
                                    <form class="row g-3" method="POST">


                                        <div class="col-md-12">
                                            <?php
                                                $nid = intval($_GET['pid']);
                                                $fquery = mysqli_query($con, "select * from tbl_pgos  where patient_id = $nid");
                                                while ($rows = mysqli_fetch_array($fquery)) {
                                                ?>

                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Instruction for Patient</label>
                                                 <textarea class="form-control" name="inspatient"><?php echo htmlentities($rows['inspatient']) ?></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom02" class="form-label">Instruction for Physiotherapist</label>
                                                <textarea class="form-control" name="insphysiotherapy" ><?php echo htmlentities($rows['insphysiotherapy']) ?></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom01" class="form-label">Instruction for Dietician</label>
                                                 <textarea class="form-control" name="insdiet"><?php echo htmlentities($rows['insdiet']) ?></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom02" class="form-label">Instruction for Psychologist</label>
                                                <textarea class="form-control" name="inspsycho"><?php echo htmlentities($rows['inspsycho']) ?></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationCustom02" class="form-label">Summary</label>
                                                <textarea class="form-control" name="summary"><?php echo htmlentities($rows['summary']) ?></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                            </div>
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