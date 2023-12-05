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

    <style>
        ..modal{
            background-color: black;
        }
    .modal-body img {
        width: 100%;
    }
    .modal-container{
        display: flex;justify-content: space-around;flex-wrap: wrap;
    }
    .modal-container>div{
        margin: 5px;
        font-size: 15px;
        font-family: poppins;
        
    }
    /*.modal-footer>p{
        float: left;
    }*/
    </style>
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

                        <!--<div class="card">
                            <div class="card-body d-flex justify-content-center">
                                <div class="border p-3 rounded ">
                                    <a href="data-physiotherapy.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Physiotherapy Assessment</a>
                                    <a href="singlepatient.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Physician Assessment</a>
                                    <a href="data-counselling.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Counselling Assessment</a>
                                </div>
                            </div>
                        </div>-->

                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase text-center text-primary">Exercise</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- preliminary test -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Exercise Chart</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="add-excercise.php">Add
                                            Exercise</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Exercise</th>
                                        <th>Category</th>
                                        <th>SET 1</th>
                                        <th>SET 2</th>
                                        <th>SET 3</th>
                                        <th>Demo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $fquery = mysqli_query($con, "Select * from tbl_exerciselist");
                                        while ($frows = mysqli_fetch_array($fquery)) {
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo htmlentities($frows['exercisename']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['category']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['set1']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['set2']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['set3']) ?>
                                        </td>
                                        <td>
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#exampleVerticallycenteredModal<?php echo htmlentities($frows['id']) ?>"><img
                                                    height="30" width="30"
                                                    src="postimages/<?php echo htmlentities($frows['demo'])  ?>"></button>
                                        </td>


                                        <td><a
                                                href="edit-excercise.php?pid=<?php echo htmlentities($frows['id']) ?>">Edit</a>
                                        </td>
                                    </tr>


                                    <!--Vertically Centered-->
                                    <!-- Modal -->
                                    <div class="modal fade"
                                        id="exampleVerticallycenteredModal<?php echo htmlentities($frows['id']) ?>"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        <?php echo htmlentities($frows['exercisename']) ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="postimages/<?php echo htmlentities($frows['demo'])  ?>">
                                                    <div class="modal-container">
                                                        <div><strong>First Set:</strong> <?php echo htmlentities($frows['set1']) ?> Reps</div>
                                                        <div><strong>Second Set:</strong> <?php echo htmlentities($frows['set2']) ?> Reps</div>
                                                        <div><strong>Third Set:</strong> <?php echo htmlentities($frows['set3']) ?> Reps</div>
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        
                                                        <p><?php 
																$pt=$frows['description']; echo  (substr($pt,0));

														?></p>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save changes</button>-->
                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </div>

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