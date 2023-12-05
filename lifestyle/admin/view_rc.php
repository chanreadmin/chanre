<?php 


session_start();
include('layout/config.php');
error_reporting(0);

/*get username*/
$sid = intval($_GET['pid']);
$query1 = mysqli_query($con, "select * from tbl_users where id = $sid");
    $rows = mysqli_fetch_array($query1);
    $username = $rows['fname'];
    $lname =$rows['lname'];
    $queryvisit = mysqli_query($con, "Select * from investigation where patient_id = $sid ORDER BY visit DESC LIMIT 1");
    $row1 = mysqli_fetch_array($queryvisit);
    // $newvisit = $row1['visit'] + 1;
/*get username*/

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  if(isset($_POST['submit']))
  {
  
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
        <?php include('layout/sidemenu.php');?>
        <!--end sidebar -->
        <!--start top header-->
        <?php include('layout/topheader.php');?>
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
                                    <h6 class="mb-0 text-uppercase">Rheumatological Conditions</h6>
                                    <hr>
                                    <form class="row g-3" method="POST">
                                        <div class="col-6">
                                            <!-- <label for="">Constitutional Manifestations</label> -->
                                            <!-- <select name="cm" id="cm" class="form-control">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select> -->
                                        </div>
                                        <div class="col-6">
                                            <!-- <input type="text" class="form-control" name="crp" placeholder="crp"> -->
                                        </div>
                                        <div class="col-3">
                                        </div>
                                        <div class="col-12">
                                            <?php 
                                            $pid = intval($_GET['sid']);
                                            $fquery = mysqli_query($con,"select * from tbl_rc where id=$pid");
                                                while($rows = mysqli_fetch_array($fquery))
                                                {
                                            ?>
                                            <table>
                                                <tr>
                                                    <th scope="col">Disease</th>
                                                    <th scope="col">Diagnosed</th>
                                                    <th scope="col">Duration(In Months)</th>
                                                    <th scope="col">Treatment</th>
                                                </tr>
                                                <tr>
                                                    <td><label for="">RA</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['ra'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['ra_duration'])?>" disabled></td>
                                                    <td><input class="form-control" type="text" value="<?php echo htmlentities($rows['ra_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">RA</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['oa'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['oa_duration'])?>" disabled></td>
                                                    <td><input class="form-control" type="text" value="<?php echo htmlentities($rows['oa_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">Osteoporosis</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['osteoprosis'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['osteoprosis_duration'])?>" disabled></td>
                                                    <td><input class="form-control" type="text" value="<?php echo htmlentities($rows['osteoprosis_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">PSA</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['psa'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['psa_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['psa_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">SPA</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['spa'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['spa_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['spa_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">SLE</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['sle'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['sle_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['sle_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">Myositis</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['myositis'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['myositis_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['myositis_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">Scleroderma</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['scleroderma'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['scleroderma_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['scleroderma_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">Sjogren's Syndrome</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['sjogren'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['sjogren_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['sjogren_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">UCTD</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['uctd'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['uctd_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['uctd_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">MCTD</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['mctd'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['mctd_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['mctd_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">GOUT</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['gout'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['gout_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['gout_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">Vasculitis</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['vasculitis'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['vasculitis_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['vasculitis_treatment'])?>" disabled></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="">Others</label></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['rcother'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['rcother_duration'])?>" disabled></td>
                                                    <td> <input class="form-control" type="text" value="<?php echo htmlentities($rows['rcother_treatment'])?>" disabled></td>
                                                </tr>
                                            </table>
                                            <?php } ?>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <!-- <button type="submit" name="submit"
                                                    class="btn btn-primary btn-rounded">Add
                                                    Report</button> -->
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