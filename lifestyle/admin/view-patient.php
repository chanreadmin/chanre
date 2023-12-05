<?php 
session_start();
include('layout/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
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
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
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
    <title>LMD</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start sidebar -->
        <?php include('layout/sidemenu.php')?>
        <!--end sidebar -->
        <!--start top header-->
        <?php include('layout/topheader.php')?>
        <!--end top header-->
        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                <h6 class="mb-0 text-uppercase">Patient Table</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Occuption</th>
                                        <th>Mobile</th>
                                        <th>Subscription</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $query1 = mysqli_query($con, "select * from tbl_users");
                   while ($rows = mysqli_fetch_array($query1))
                   {
                   ?>
                                    <tr>
                                        <td><?php echo htmlentities($rows['fname']); ?></td>
                                        <td><?php echo htmlentities($rows['lname']); ?></td>
                                        <td><?php echo htmlentities($rows['occupation']); ?></td>
                                        <td><?php echo htmlentities($rows['mobile']); ?></td>
                                        <td><?php echo htmlentities($rows['subtime']); ?></td>
                                        <td><a href="singlepatient.php?pid=<?php echo htmlentities($rows['id']); ?>"
                                                class="btn btn-outline-success  radius-30">View</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Occuption</th>
                                        <th>Mobile</th>
                                        <th>Subscription</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page content-->
        </div>
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->
        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->
    </div>
    <!--end wrapper-->
    <!-- JS Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- <script type="module" src="../../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script> -->
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/js/table-datatable.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
</body>

</html>
<?php } ?>