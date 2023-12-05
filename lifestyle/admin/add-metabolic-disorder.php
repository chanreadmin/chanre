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
        $dm = $_POST['dm'];
        $dm_duration = $_POST['dm_duration'];
        $dm_treatment=$_POST['dm_treatment'];
        $htn=$_POST['htn'];
        $htn_duration=$_POST['htn_duration'];
        $htn_treatment=$_POST['htn_treatment'];
        $hypothyroidism=$_POST['hypothyroidism'];
        $hypothyroidism_duration=$_POST['hypothyroidism_duration'];
        $hypothyroidism_treatment=$_POST['hypothyroidism_treatment'];
        $hypercholestero=$_POST['hypercholestero'];
        $hypercholestero_duration=$_POST['hypercholestero_duration'];
        $hypercholestero_treatment=$_POST['hypercholestero_treatment'];
        $mbdothers=$_POST['mbdothers'];
        $mbdothers_duration=$_POST['mbdothers_duration'];
        $mbdother_treatment=$_POST['mbdother_treatment'];
        $admin_name = $_SESSION['login'];
        $PostDate = date('d/m/Y');
        //Fetch User Details

        $queryinv = mysqli_query($con, "Insert into tbl_metabolic 
    (dm,dm_duration,dm_treatment,htn,htn_duration,htn_treatment,hypothyroidism, hypothyroidism_duration, hypothyroidism_treatment, hypercholestero, hypercholestero_duration, hypercholestero_treatment,mbdothers, mbdothers_duration,mbdother_treatment, admin_name, patient_name, patient_id)
    
    values('$dm','$dm_duration','$dm_treatment','$htn','$htn_duration','$htn_treatment',
    '$hypothyroidism','$hypothyroidism_duration','$hypothyroidism_treatment','$hypercholestero'
    ,'$hypercholestero_duration','$hypothyroidism_treatment','$mbdothers','$mbdothers_duration','$mbdother_treatment','$admin_name','$username','$sid')");
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
                                        <h6 class="mb-0 text-uppercase">Metabolic Disorder</h6>
                                        <hr>
                                        <form class="row g-3" method="POST">
                                            <div class="col-6">
                                                <select name="cm" id="cm" class="form-control" onchange="myFunction()">
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
                                                            <label for="">DM</label>
                                                        </td>
                                                        <td>
                                                            <select name="dm" id="dm" class="form-control">
                                                                <option value="">Select an option</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="dm_duration" id="dm_duration" placeholder="duration (In Months)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="dm_treatment" id="dm_treatment" placeholder="Treatment">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="">HTN</label>
                                                        </td>
                                                        <td>
                                                            <select name="htn" id="htn" class="form-control">
                                                                <option value="">Select an option</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="htn_duration" id="htn_duration" placeholder="duration (In Months)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="htn_treatment" id="htn_treatment" placeholder="Treatment">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="">Hypothyroidism</label>
                                                        </td>
                                                        <td>
                                                            <select name="hypothyroidism" id="hypothyroidism" class="form-control">
                                                                <option value="">Select an option</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="hypothyroidism_duration" id="hypothyroidism_duration" placeholder="duration (In Months)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="hypothyroidism_treatment" id="hypothyroidism_treatment" placeholder="Treatment">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="">Hypercholestero</label>
                                                        </td>
                                                        <td>
                                                            <select name="hypercholestero" id="hypercholestero" class="form-control">
                                                                <option value="">Select an option</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="hypercholestero_duration" id="hypercholestero_duration" placeholder="duration (In Months)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="hypercholestero_treatment" id="hypercholestero_treatment" placeholder="Treatment">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label for="">Others</label>
                                                        </td>
                                                        <td>
                                                            <select name="mbdothers" id="mbdothers" class="form-control">
                                                                <option value="">Select an option</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="mbdothers_duration" id="mbdothers_duration" placeholder="duration (In Months)">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="mbdother_treatment" id="mbdother_treatment" placeholder="Treatment">
                                                        </td>
                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" name="submit" class="btn btn-primary btn-rounded">Add
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

        <script>
function myFunction() {
  var a= document.getElementById('cm').value;
  if(a == 'No'){
    document.getElementById("dm").disabled = true;
    document.getElementById("dm_duration").disabled = true;
    document.getElementById("dm_treatment").disabled = true;
    document.getElementById("htn").disabled = true;
    document.getElementById("htn_duration").disabled = true;
    document.getElementById("htn_treatment").disabled = true;
    document.getElementById("hypothyroidism").disabled = true;
    document.getElementById("hypothyroidism_duration").disabled = true;
    document.getElementById("hypothyroidism_treatment").disabled = true;
    document.getElementById("hypercholestero").disabled = true;
    document.getElementById("hypercholestero_duration").disabled = true;
    document.getElementById("hypercholestero_treatment").disabled = true;
    document.getElementById("mbdothers").disabled = true;
    document.getElementById("mbdothers_duration").disabled = true;
    document.getElementById("mbdother_treatment").disabled = true;
  }
  else{
    document.getElementById("dm").disabled = false;
    document.getElementById("dm_duration").disabled = false;
    document.getElementById("dm_treatment").disabled = false;
    document.getElementById("htn").disabled = false;
    document.getElementById("htn_duration").disabled = false;
    document.getElementById("htn_treatment").disabled = false;
    document.getElementById("hypothyroidism").disabled = false;
    document.getElementById("hypothyroidism_duration").disabled = false;
    document.getElementById("hypothyroidism_treatment").disabled = false;
    document.getElementById("hypercholestero").disabled = false;
    document.getElementById("hypercholestero_duration").disabled = false;
    document.getElementById("hypercholestero_treatment").disabled = false;
    document.getElementById("mbdothers").disabled = false;
    document.getElementById("mbdothers_duration").disabled = false;
    document.getElementById("mbdother_treatment").disabled = false;
  }
  
}
    
</script>



    </body>

    </html>

<?php } ?>