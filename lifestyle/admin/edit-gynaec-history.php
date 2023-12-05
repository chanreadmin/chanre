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
        $mensural_cycle = $_POST['mensural_cycle'];
        $flow = $_POST['flow'];
        $pcos = $_POST['pcos'];
        $pcostreatment = $_POST['pcostreatment'];
        $admin_name = $_SESSION['login'];
        //Fetch User Details
        $queryinv =mysqli_query($con, "update tbl_pgos set mensural_cycle = '$mensural_cycle',
            flow = '$flow', pcos = '$pcos', pcostreatment = '$pcostreatment' where patient_id = '$sid' ");
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
                                    <h6 class="mb-0 text-uppercase">GYANEC HISTORY</h6>
                                    <hr>
                                    <form class="row g-3" method="POST">
                                        <div class="col-12">
                                        <div class="col-6">
                                            <!-- <label for="">Constitutional Manifestations</label> -->
                                            <select name="cm" id="cm" class="form-control" onchange="myFunction()">
                                                <option value="">Select an option</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                        <br>
                                            <table class="text-center">
                                                <tr>
                                                    <td>
                                                        <label for="">Mensural Cycle</label>
                                                    </td>
                                                    <td>
                                                        <select name="mensural_cycle" id="mensural_cycle"
                                                            class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Regular">Regular</option>
                                                            <option value="Irregular">Irregular</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <label for="" class="text-center">Flow</label>
                                                    </td>

                                                    <td>
                                                        <select name="flow" id="flow" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Normal">Normal</option>
                                                            <option value="Heavy">Heavy</option>
                                                            <option value="Scanty">Scanty</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">PCOS</label>
                                                    </td>
                                                    <td>
                                                        <select name="pcos" id="pcos" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td></td>
                                                    <td>
                                                        <input type="text" class="form-control" name="pcostreatment"
                                                            id="pcostreatment" placeholder="Any Treatment">
                                                    </td>
                                                    <td>
                                                        <!--<select name="acurrent_status" id="acurrent_status" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Active">Active</option>
                                                            <option value="Inactive">Inactive</option>
                                                        </select>-->
                                                    </td>
                                                    <!--<td>
                                                        <input type="text" class="form-control" name="aquantity"
                                                            id="aquantity" placeholder="Quantity no/day">
                                                    </td>-->

                                                </tr>
                                            </table>
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
        </div>
        <footer class="footer">
            <div class="footer-text">
                Copyright © 2023. All right reserved.
            </div>
        </footer>
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->
<script>
    function myFunction() {
  var a= document.getElementById('cm').value;
  if(a == 'No'){
    document.getElementById("mensural_cycle").disabled = true;
    document.getElementById("flow").disabled = true;
    document.getElementById("pcos").disabled = true;
    document.getElementById("pcostreatment").disabled = true;
  }
  else{
    document.getElementById("mensural_cycle").disabled = false;
    document.getElementById("flow").disabled = false;
    document.getElementById("pcos").disabled = false;
    document.getElementById("pcostreatment").disabled = false;
  }
  
}
</script>

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