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
    $newvisit = $row1['visit'] + 1;
/*get username*/

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  if(isset($_POST['submit']))
  {
    
    $hb = $_POST['hb'];
    $crp=$_POST['crp'];
    $rbs=$_POST['rbs'];
    $hba1c=$_POST['hba1c'];
    $lipid_profile=$_POST['lipid_profile'];
    $t3=$_POST['t3'];
    $t4=$_POST['t4'];
    $tsh=$_POST['tsh'];
    $lft=$_POST['lft'];
    $creatinine=$_POST['creatinine'];
    $electrolyte = $_POST['electrolyte'];
    $echo=$_POST['echo'];
    $ecg=$_POST['ecg'];
    $xray=$_POST['xray'];
    $tmt=$_POST['tmt'];
    $other=$_POST['other'];

    $adminName =$_SESSION['login'];
    $PostDate = date('d/m/Y');
    //Fetch User Details
    
    $queryinv = mysqli_query($con,"Insert into investigation 
    (hb,crp,rbs,hba1c, lipid_profile, t3, t4, tsh, lft, creatinine,electrolyte, 
    echo, ecg, xray, tmt, other, adminName, visit,patient_name, patient_id)
    values('$hb','$crp','$rbs','$hba1c','$lipid_profile', '$t3', '$t4', '$tsh','$lft','$creatinine','$electrolyte',
    '$echo', '$ecg','$xray','$tmt','$other','$adminName','$newvisit','$username','$sid')
    ");
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
                    <div class="col-xl-8 mx-auto">

                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase">Investigstion Test Report</h6>
                                    <hr>
                                    <form class="row g-3" method="POST">
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="hb" placeholder="hb">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="crp" placeholder="crp">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="rbs" placeholder="rbs">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="hba1c" placeholder="hba1c">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="lipid_profile"
                                                placeholder="Lipid profile">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="t3" placeholder="T3">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="t4" placeholder="T4">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="tsh" placeholder="TSH">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="lft" placeholder="LFT">
                                        </div>

                                        <div class="col-6">
                                            <input type="text" class="form-control" name="creatinine"
                                                placeholder="Creatinine">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="electrolyte"
                                                placeholder="Electrolyte">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="echo" placeholder="echo">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="ecg" placeholder="ECG">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="xray" placeholder="X-ray">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="tmt" placeholder="TMT">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="other"
                                                placeholder="Others(If any..)">
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
                        while($frows=mysqli_fetch_array($iquery))
                        {
                        ?>
                                    <tr>
                                        <td><?php echo htmlentities($frows['visit'])?></td>
                                        <td><?php echo htmlentities($frows['hb'])?></td>
                                        <td><?php echo htmlentities($frows['crp'])?></td>
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