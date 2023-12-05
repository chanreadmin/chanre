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
   $ra = $_POST['ra'];
   $ra_duration = $_POST['ra_duration'];
   $ra_treatment = $_POST['ra_treatment'];
   $oa = $_POST['oa'];
   $oa_duration = $_POST['oa_duration'];
   $oa_treatment = $_POST['oa_treatment'];
   $osteoprosis = $_POST['osteoprosis'];
   $osteoprosis_duration = $_POST['osteoprosis_duration'];
   $osteoprosis_treatment = $_POST['osteoprosis_treatment'];
   $psa = $_POST['psa'];
   $psa_duration = $_POST['psa_duration'];
   $psa_treatment = $_POST['psa_treatment'];
   $spa = $_POST['spa'];
   $spa_duration = $_POST['spa_duration'];
   $spa_treatment = $_POST['spa_treatment'];
   $sle = $_POST['sle'];
   $sle_duration = $_POST['sle_duration'];
   $sle_treatment = $_POST['sle_treatment'];
   $myositis = $_POST['myositis'];
   $myositis_duration = $_POST['myositis_duration'];
   $myositis_treatment = $_POST['myositis_treatment'];
   $scleroderma=$_POST['scleroderma'];
   $scleroderma_duration=$_POST['scleroderma_duration'];
   $scleroderma_treatment = $_POST['scleroderma_treatment'];
   $sjogren = $_POST['sjogren'];
   $sjogren_duration = $_POST['sjogren_duration'];
   $sjogren_treatment = $_POST['sjogren_treatment'];
   $uctd = $_POST['uctd'];
   $uctd_duration = $_POST['uctd_duration'];
   $uctd_treatment = $_POST['uctd_treatment'];
   $mctd = $_POST['mctd'];
   $mctd_duration = $_POST['mctd_duration'];
   $mctd_treatment = $_POST['mctd_treatment'];
   $gout = $_POST['gout'];
   $gout_duration = $_POST['gout_duration'];
   $gout_treatment = $_POST['gout_treatment'];
   $vasculitis = $_POST['vasculitis'];
   $vasculitis_duration = $_POST['vasculitis_duration'];
   $vasculitis_treatment = $_POST['vasculitis_treatment'];
   $rcother = $_POST['rcother'];
   $rcother_duration = $_POST['rcother_duration'];
   $rcother_treatment = $_POST['rcother_treatment'];
    $admin_name =$_SESSION['login'];
    $PostDate = date('d/m/Y');
    //Fetch User Details
    
    $queryinv = mysqli_query($con,"Insert into tbl_rc 
    (ra, ra_duration, ra_treatment, oa, oa_duration, oa_treatment, 
    osteoprosis, osteoprosis_duration, osteoprosis_treatment, psa,
    psa_duration, psa_treatment, spa, spa_duration, spa_treatment, 
    sle, sle_duration, sle_treatment, myositis, myositis_duration, 
    myositis_treatment, scleroderma, scleroderma_duration, scleroderma_treatment, 
    sjogren, sjogren_duration, sjogren_treatment, uctd, uctd_duration, uctd_treatment, 
    mctd, mctd_duration, mctd_treatment, gout, gout_duration, gout_treatment, 
    vasculitis, vasculitis_duration, vasculitis_treatment, rcother, 
    rcother_duration, rcother_treatment, admin_name, patient_name, 
    patient_id)
    
    values('$ra','$ra_duration','$ra_treatment','$oa','$oa_duration',
    '$oa_treatment','$osteoprosis','$osteoprosis_duration',
    '$osteoprosis_treatment','$psa','$psa_duration','$psa_treatment',
    '$spa','$spa_duration','$spa_treatment','$sle','$sle_duration',
    '$sle_treatment','$myositis','$myositis_duration','$myositis_treatment',
    '$scleroderma','$scleroderma_duration','$scleroderma_treatment',
    '$sjogren','$sjogren_duration','$sjogren_treatment','$uctd',
    '$uctd_duration','$uctd_treatment','$mctd','$mctd_duration',
    '$mctd_treatment','$gout','$gout_duration','$gout_treatment',
    '$vasculitis','$vasculitis_duration','$vasculitis_treatment',
    '$rcother','$rcother_duration','$rcother_treatment','$admin_name',
    '$username','$sid')");
    if($queryinv)
    {
        echo "<script>alert('Report is successfuly Added');</script>";
    }
    else{
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
                                            <select name="cm" id="cm" class="form-control">
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
                                                        <label for="">RA</label>
                                                    </td>
                                                    <td>
                                                        <select name="ra" id="ra" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ra_duration" id="ra_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="ra_treatment" id="ra_treatment" placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">OA</label>
                                                    </td>
                                                    <td>
                                                        <select name="oa" id="oa" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="oa_duration" id="oa_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="oa_treatment" id="oa_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Osteoprosis</label>
                                                    </td>
                                                    <td>
                                                        <select name="osteoprosis" id="osteoprosis" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="osteoprosis_duration" id="osteoprosis_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="osteoprosis_treatment" id="osteoprosis_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">PSA</label>
                                                    </td>
                                                    <td>
                                                        <select name="psa" id="psa" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="psa_duration" id="psa_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="psa_treatment" id="psa_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">SPA</label>
                                                    </td>
                                                    <td>
                                                        <select name="spa" id="spa" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="spa_duration" id="spa_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="spa_treatment" id="spa_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">SLE</label>
                                                    </td>
                                                    <td>
                                                        <select name="sle" id="sle" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sle_duration" id="sle"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sle_treatment" id="sle_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Myositis</label>
                                                    </td>
                                                    <td>
                                                        <select name="myositis" id="myositis" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="myositis_duration" id="myositis_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="myositis_treatment" id="myositis_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Scleroderma</label>
                                                    </td>
                                                    <td>
                                                        <select name="scleroderma" id="scleroderma" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="scleroderma_duration" id="scleroderma_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="scleroderma_treatment" id="scleroderma_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Sjogren's syndrome</label>
                                                    </td>
                                                    <td>
                                                        <select name="sjogren" id="sjogren" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sjogren_duration" id="sjogren_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="sjogren_treatment" id="sjogren_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">UCTD</label>
                                                    </td>
                                                    <td>
                                                        <select name="uctd" id="uctd" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="uctd_duration" id="uctd_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="uctd_treatment" id="uctd_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">MCTD</label>
                                                    </td>
                                                    <td>
                                                        <select name="mctd" id="mctd" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="mctd_duration" id="mctd_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="mctd_treatment" id="mctd_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">GOUT</label>
                                                    </td>
                                                    <td>
                                                        <select name="gout" id="gout" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="gout_duration" id="gout_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="gout_treatment" id="gout_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Vasculitis</label>
                                                    </td>
                                                    <td>
                                                        <select name="vasculitis" id="vasculitis" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="vasculitis_duration" id="vasculitis_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="vasculitis_treatment" id="vasculitis_treatment"
                                                            placeholder="Treatment">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="">Others</label>
                                                    </td>
                                                    <td>
                                                        <select name="rcother" id="rcother" class="form-control">
                                                            <option value="">Select an option</option>
                                                            <option value="Yes">Yes</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="rcother_duration" id="rcother_duration"
                                                            placeholder="duration (In Months)">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="rcother_treatment" id="rcother_treatment"
                                                            placeholder="Treatment">
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

                                    <?php 
                        $iquery = mysqli_query($con, "Select * from tbl_rc where patient_id= $sid");
                        while($frows=mysqli_fetch_array($iquery))
                        {
                        ?>
                                    <tr>
                                        <td><?php echo htmlentities($frows['ra'])?></td>
                                        <td><?php echo htmlentities($frows['ra_duration'])?></td>
                                        <td><?php echo htmlentities($frows['ra_treatment'])?></td>
                                        <td><?php echo htmlentities($frows['rbs'])?></td>
                                        <td><?php echo htmlentities($frows['hba1c'])?></td>
                                        <td><?php echo htmlentities($frows['lipid_profile'])?></td>
                                        <td><?php echo htmlentities($frows['t3'])?></td>
                                        <td><?php echo htmlentities($frows['t4'])?></td>
                                        <td><?php echo htmlentities($frows['tsh'])?></td>
                                        <td><?php echo htmlentities($frows['lft'])?></td>
                                        <td><?php echo htmlentities($frows['creatinine'])?></td>
                                        <td><?php echo htmlentities($frows['electrolyte'])?></td>
                                        <td><?php echo htmlentities($frows['echo'])?></td>
                                        <td><?php echo htmlentities($frows['ecg'])?></td>
                                        <td>View</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->

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