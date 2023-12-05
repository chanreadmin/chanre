<?php 


session_start();
include('layout/config.php');
error_reporting(0);
$sid = intval($_GET['pid']);
$query1 = mysqli_query($con, "select * from tbl_users where id = $sid");
    $rows = mysqli_fetch_array($query1);
    $username = $rows['fname'];
    $lname =$rows['lname'];

$queryvisit = mysqli_query($con, "Select * from preliminarytest where patient_id = $sid ORDER BY visit DESC LIMIT 1");
    $row1 = mysqli_fetch_array($queryvisit);
    $newvisit = $row1['visit'] + 1;

// echo "<script>alert('Report is successfuly Added.$newvisit.');</script>";

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  if(isset($_POST['submit']))
  {
    $grbps = $_POST['grbps'];
    $bp = $_POST['bp'];
    $pulse = $_POST['pulse'];
    $spo2 = $_POST['spo2'];
    $pweight = $_POST['weight'];
    $pheight = $_POST['height'];
    $bodyfat = $_POST['bodyfat'];
    $visceralfat = $_POST['visceralfat'];
    $musclefat = $_POST['musclefat'];
    $bodyage = $_POST['bodyage'];
    $rm = $_POST['rm'];
    $bmi = $_POST['bmi'];
    $testdate = $_POST['testdate'];
    $adminName =$_SESSION['login'];

    // Update Date
    
    // $PostDate = date('d/m/Y');
    
    //Fetch User Details
     
    
    // Query to insert the report
    $query2=mysqli_query($con,"insert into preliminarytest (pdate, grbps,bp,pulse,spo2,pweight,pheight,bodyfat,visceralfat,musclefat,
    bodyage,rm,bmi,	patient_name,patient_id,admin_name, visit) 
    values('$testdate','$grbps','$bp','$pulse','$spo2','$pweight','$pheight','$bodyfat','$visceralfat',
    '$musclefat','$bodyage','$rm','$bmi','$username','$sid','$adminName','$newvisit')");


if($query2)
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
                                    <h6 class="mb-0 text-uppercase">Preliminary Test Report</h6>
                                    <hr>
                                    <form class="row g-3" method="POST">
                                        <!-- Patient Name -->
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="<?php echo $username;?>"
                                                disabled>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" value="<?php echo $lname;?>"
                                                disabled>
                                        </div>
                                        <!-- Patient Name -->
                                        <div class="col-6">
                                            <input type="date" class="form-control" name="testdate" required>
                                        </div>

                                        <div class="col-6">
                                            <input type="text" class="form-control" name="grbps" placeholder="GRBS" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="bp" placeholder="BP" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="pulse" placeholder="Pulse" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="spo2" placeholder="spo2" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="weight" placeholder="Weight(in Kg)" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="height" placeholder="Height(ft)" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="bodyfat" placeholder="Body Fat" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="visceralfat" placeholder="Visceral Fat" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="musclefat" placeholder="Muscle Fat" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="bodyage" placeholder="Body Age" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="rm" placeholder="RM" required>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="bmi" placeholder="BMI(Kg/m2)" required>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-rounded" type="submit"
                                                    name="submit">Add
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
                            <h6 class="mb-0">PRELIMINARY TEST</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Add Report</a></li>
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
                                        <th>Date</th>
                                        <th>GRBS</th>
                                        <th>BP</th>
                                        <th>Pulse</th>
                                        <th>SPO2</th>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Body Fat</th>
                                        <th>Visceral Fat</th>
                                        <th>Muscle Fat</th>
                                        <th>Body Age</th>
                                        <th>RM</th>
                                        <th>BMI(kg/m2)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                        $fquery = mysqli_query($con, "Select * from preliminarytest where patient_id= $sid");
                        while($frows=mysqli_fetch_array($fquery))
                        {
                        ?>
                                    <tr>
                                        <td><?php echo htmlentities($frows['visit'])?></td>
                                        <td><?php echo htmlentities($frows['pdate'])?> </td>
                                        <td><?php echo htmlentities($frows['grbps'])?> </td>
                                        <td><?php echo htmlentities($frows['bp'])?> </td>
                                        <td><?php echo htmlentities($frows['pulse'])?> </td>
                                        <td><?php echo htmlentities($frows['spo2'])?> </td>
                                        <td><?php echo htmlentities($frows['pweight'])?> </td>
                                        <td><?php echo htmlentities($frows['pheight'])?> </td>
                                        <td><?php echo htmlentities($frows['bodyfat'])?> </td>
                                        <td><?php echo htmlentities($frows['visceralfat'])?> </td>
                                        <td><?php echo htmlentities($frows['musclefat'])?> </td>
                                        <td><?php echo htmlentities($frows['bodyage'])?> </td>
                                        <td><?php echo htmlentities($frows['rm'])?> </td>
                                        <td><?php echo htmlentities($frows['bmi'])?> </td>
                                        <td>Edit</td>
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