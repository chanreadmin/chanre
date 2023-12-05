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
                                    <a href="singlepatient.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Physician Assessment</a>
                                    <a href="data-diet.php?pid=<?php echo $sid; ?>" class="btn btn-primary btn-sm">Diet
                                        Assessment</a>
                                    <a href="data-counselling.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Counselling Assessment</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase text-center text-primary">PHYSIOTHERAPY ASSESMENT
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- preliminary test -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">INFORMATION OF MUSCLE GROUP</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-physiotherapy-assesment.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                    <li><a class="dropdown-item"
                                            href="edit-muscle-group.php?pid=<?php echo $sid; ?>">Edit</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Muscle</th>
                                        <th>Power</th>
                                        <th>Tone</th>
                                        <th>Coordination</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $fquery = mysqli_query($con, "Select * from tbl_muscle where patient_id= $sid");
                                        while ($rows = mysqli_fetch_array($fquery)) {
                                        ?>
                                    <?php include('component/edit-physiotherapy-data.php'); ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--MEASUREMENTS -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">MEASUREMENTS</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-physio-measurement.php?pid=<?php echo $sid; ?>">Add
                                            Report</a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Mid Arm</th>
                                        <th>Mid Forearm</th>
                                        <th>Chest</th>
                                        <th>Abdomen</th>
                                        <th>Waist</th>
                                        <th>Mid Thigh</th>
                                        <th>Mid Calf</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $iquery = mysqli_query($con, "Select * from tbl_measurements where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($iquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['mdate']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($frows['midarm']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['midforearm']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['chest']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['abdomen']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['waist']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['midthigh']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['midcalf']) ?>
                                        </td>

                                        <td><a
                                                href="edit-physio-measurements.php?pid=<?php echo htmlentities($frows['id']) ?>">Edit</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- JOINT ASSESSMENT -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">JOINT ASSESSMENT</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-joint-assesment.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Cervical</th>
                                        <th>Shoulder</th>
                                        <th>Elbow</th>
                                        <th>Wrist</th>
                                        <th>Hand</th>
                                        <th>Hip</th>
                                        <th>Knee</th>
                                        <th>Ankle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $iquery = mysqli_query($con, "Select * from tbl_jointassesment where patient_id= $sid");
                                        while ($frows = mysqli_fetch_array($iquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['asses_date']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($frows['cetender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['shrttender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['elrttender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['ellttender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['wrttender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['wrlttender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['harttender']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['halttender']) ?>
                                        </td>
                                      
                                        <td><a href="edit-joint-assestment.php?pid=<?php echo htmlentities($frows['id']) ?>">View & Edit</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                 <!-- Add Excercise -->
                 <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">EXCERCISE</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-excercise-suggestion.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Excercise Name</th>
                                        <th>Description</th>
                                        <th>Set 1</th>
                                        <th>Set 2</th>
                                        <th>Set 3</th>
                                        <th>Demo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tquery = mysqli_query($con, "Select tbl_assign_excercise.id,
                                        tbl_exerciselist.exercisename, tbl_exerciselist.description,tbl_exerciselist.demo,tbl_assign_excercise.set1,
                                        tbl_assign_excercise.set2, tbl_assign_excercise.set3, tbl_assign_excercise.patient_username	 from tbl_exerciselist INNER JOIN tbl_assign_excercise

                                        ON tbl_exerciselist.id = tbl_assign_excercise.excercise_id where tbl_assign_excercise.patient_id = '$sid' ");
                                        while ($trows = mysqli_fetch_array($tquery)) {
                                        ?>
                                    <tr  class="delete_mem<?php echo htmlentities($trows['id'])?>">
                                        <td>
                                            <?php echo htmlentities($trows['exercisename']) ?>
                                        </td>

                                        <td>
                                            <?php echo $trows['description']; ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['set1']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['set2']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['set3']) ?>
                                        </td>
                                        <td>
                                            <img src="postimages/<?php echo htmlentities($trows['demo']) ?>" alt="" width="50" height="50">
                                        </td>
                                      
                                        
                                      
                                        <td><a class="btn btn-danger" id='<?php echo htmlentities($trows['id']) ?>'>Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Feedback</h6>
                            <div class="fs-5 ms-auto dropdown">
                                
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>feedback</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $exquery = mysqli_query($con, "Select * from excercise_track Where patient_id = '$sid' ");
                                        while ($trows = mysqli_fetch_array($exquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($trows['patient_name']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($trows['exdate']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['extime']) ?>
                                        </td>
                         
                                        <td>
                                        <?php echo htmlentities($trows['feedback']) ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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
    <!-- <script type="module" src="../../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script> -->
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this Member?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_excercise.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>
</body>

</html>

<?php } ?>