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
        $smoker = $_POST['smoker'];
        $sduration = $_POST['sduration'];
        $scurrent_status = $_POST['scurrent_status'];
        $squantity = $_POST['squantity'];
        $alcoholic = $_POST['alcoholic'];
        $aduration = $_POST['aduration'];
        $acurrent_status = $_POST['acurrent_status'];
        $aquantity = $_POST['aquantity'];
        $sleep = $_POST['sleep'];
        $admin_name = $_SESSION['login'];
        $PostDate = date('d/m/Y');
        //Fetch User Details

        $queryinv = mysqli_query($con, "Insert into tbl_pgos
        (smoker,sduration,scurrent_status,squantity,alcoholic,aduration,acurrent_status,aquantity
        ,sleep,admin_name, patient_name, patient_id)
        
        values('$smoker','$sduration','$scurrent_status','$squantity','$alcoholic','$aduration',
        '$acurrent_status','$aquantity','$sleep','$admin_name','$username','$sid')");
        
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
                                    <h6 class="mb-0 text-uppercase">PERSONAL HISTORY</h6>
                                    <hr>
                                    <form class="row g-3" method="POST">
                                        <div class="col-12">
                                            <?php
                                                $nid = intval($_GET['pid']);
                                                $fquery = mysqli_query($con, "select * from tbl_pgos  where patient_id = $nid");
                                                while ($rows = mysqli_fetch_array($fquery)) {
                                                ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <label for="">Smoking</label>
                                                    </td>
                                                    <td>
                                                        <select name="smoker" id="smoker" class="form-control">
                                                            <option value=" ">Not choosed</option>
                                                            <option value="Yes" <?php if($rows['smoker'] == 'Yes') { ?>
                                                                selected="selected" <?php } ?>>Yes</option>
                                                            <option value="No" <?php if($rows['smoker'] == 'No') { ?>
                                                                selected="selected" <?php } ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sduration"
                                                            id="sduration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <select name="scurrent_status" id="scurrent_status"
                                                            class="form-control">

                                                            <option value=" ">Not choosed</option>
                                                            <option value="Active"
                                                                <?php if($rows['scurrent_status'] == 'Active') { ?>
                                                                selected="selected" <?php } ?>>Active</option>
                                                            <option value="Inactive"
                                                                <?php if($rows['scurrent_status'] == 'Inactive') { ?>
                                                                selected="selected" <?php } ?>>Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="squantity"
                                                            id="squantity" placeholder="Quantity no/day">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Alcoholic</label>
                                                    </td>
                                                    <td>
                                                        <select name="alcoholic" id="alcoholic" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes"
                                                                <?php if($rows['alcoholic'] == 'Yes') { ?>
                                                                selected="selected" <?php } ?>>Yes</option>
                                                            <option value="No" <?php if($rows['alcoholic'] == 'No') { ?>
                                                                selected="selected" <?php } ?>>No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="aduration"
                                                            id="aduration" placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <select name="acurrent_status" id="acurrent_status"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="aquantity"
                                                            id="aquantity" placeholder="Quantity no/day">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Sleep</label>
                                                    </td>
                                                    <td>
                                                        <select name="sleep" id="sleep" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Sound">Sound</option>
                                                            <option value="Disturbed">Disturbed</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <!--<input type="text" class="form-control" name="sduration"
                                                            id="sduration" placeholder="duration (In Months)">-->
                                                    </td>
                                                    <td>
                                                        <!--<select name="scurrent_status" id="scurrent_status" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>-->
                                                    </td>
                                                    <td>
                                                        <!--<input type="text" class="form-control" name="squantity"
                                                            id="squantity" placeholder="Quantity no/day">-->
                                                    </td>
                                                </tr>
                                            </table>
                                            <?php } ?>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" name="submit" class="btn btn-primary btn-rounded">Add Report</button>
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

</body>

</html>

<?php } ?>