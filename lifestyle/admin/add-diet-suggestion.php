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
        $type = $_POST['type'];
        $diet_id = $_POST['diet_id'];
        $quantity = $_POST['quantity'];
        $admin_name = $_SESSION['login'];
        $asses_date = $_POST['asses_date'];
        $PostDate = date('d/m/Y');
        //Fetch User Details
        $queryinv = mysqli_query($con, "Insert into tbl_assigndiet
        (type, diet_id, quantity, admin_name, patient_name, patient_id)
        values('$type','$diet_id','$quantity','$admin_name','$username','$sid')");
        if ($queryinv) {
            $msg = 'Data is successfuly Added';
        } else {
            $err = 'Data not saved';
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
                                    <h6 class="mb-0 text-uppercase">Suggest Diet </h6>
                                    <span class="text-success"><?php echo $msg;?></span>
                                    <span class="text-danger"><?php echo $err;?></span>
                                    <hr>
                                    <form class="row g-3 needs-validation"  method="post">

                                    <div class="col-md-3">
                                            <label for="validationCustom02" class="form-label">Meal Type</label>
                                            <select class="form-control" name="type">
                                                <option>Choose Meal Type</option>
                                                <option value="Breakfast">Breakfast</option>
                                                <option value="Mid Morning Snacks">Mid Morning Snacks</option>
                                                <option value="Lunch">Lunch</option>
                                                <option value="Mid Evening Snacks">Mid Evening Snacks</option>
                                                <option value="Dinner">Dinner</option>
                                                <option value="Before Bed">Before Bed</option>
                                                
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div> 
                                    <div class="col-md-3">
                                            <label for="validationCustom01" class="form-label">Item</label>
                                            <select class="form-control" name="diet_id">
                                           <option value="">Choose an item</option>
                                           <?php 
                                                $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                while($trows = mysqli_fetch_array($queryfetch))
                                                {
                                                ?>
                                            <option value="<?php echo htmlentities($trows['id'])?>"><?php echo htmlentities($trows['item'])?></option>
                                            <?php } ?>
                                          </select>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label">Quantity</label>
                                            <input class="result form-control" type="text" id="quantity" name="quantity"
                                                placeholder="quantity">
                                        </div>

                                        <div class="col-12 d-flex justify-content-center">
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Type</th>
                                        <th>Item</th>
                                        <th>quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>Breakfast</tr> -->
                                    <?php
                                        $iquery = mysqli_query($con, "SELECT *
                                        FROM tbl_dietlist
                                        INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id where patient_id = $sid");
                                        while ($frows = mysqli_fetch_array($iquery)) {
                                        ?>
                                    <tr class="delete_mem<?php echo htmlentities($frows['id']); ?>">
                                        <td>
                                            <?php echo htmlentities($frows['type']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['item']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($frows['quantity']) ?>
                                        </td>
                                        <td><a class="btn btn-danger" id='<?php echo htmlentities($frows['id'])?>'>Delete</a></td>
                                    </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
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
                    url: "delete_diet.php",
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