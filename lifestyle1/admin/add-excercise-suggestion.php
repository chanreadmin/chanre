<?php


session_start();
include('layout/config.php');
error_reporting(0);

/*get username*/
$sid = intval($_GET['pid']);
$query1 = mysqli_query($con, "select * from tbl_users where id = $sid");
$rows = mysqli_fetch_array($query1);
$username = $rows['username'];
$lname = $rows['lname'];
$queryvisit = mysqli_query($con, "Select * from investigation where patient_id = $sid ORDER BY visit DESC LIMIT 1");
$row1 = mysqli_fetch_array($queryvisit);
// $newvisit = $row1['visit'] + 1;
/*get username*/

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else{ 
    if (isset($_POST['submit'])) {
        $excercise_id = $_POST['excercise_id'];
        $set1 = $_POST['set1'];
        $set2 = $_POST['set2'];
        $set3 = $_POST['set3'];
      
        $queryinv = mysqli_query($con, "Insert into tbl_assign_excercise
        (excercise_id, set1, set2, set3,patient_id,patient_username	)
        values('$excercise_id','$set1','$set2','$set3','$sid','$username')");
        if ($queryinv) 
        {
            echo "<script>alert('successfuly Added ');</script>";
        } 
        else 
        {
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
                                    <h6 class="mb-0 text-uppercase">Add Excercise</h6>
                                    <hr>
                                    <form class="row g-3 needs-validation" novalidate method="post" enctype="multipart/form-data" >
                                        <div class="col-md-10">
                                            <label for="validationCustom01" class="form-label">Excercise Name</label>

                                            <select class="form-control" id="excercise_id" name="excercise_id">
                                                <option value="text">Choose excercise name</option>
                                                <?php $exquery = mysqli_query($con, "Select * from tbl_exerciselist");
                                                while($rows = mysqli_fetch_array($exquery)){
                                                ?>
                                                <option value="<?php echo htmlentities($rows['id'])?>"><?php echo htmlentities($rows['exercisename'])?></option>
                                                <?php } ?>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                     
                                       
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Set 1</label>
                                            <input class="result form-control" type="text" id="set1" name="set1" placeholder="Number of Reps">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Set 2</label>
                                            <input class="result form-control" type="text" id="set2" name="set2" placeholder="Number of Reps"
                                                >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Set 3</label>
                                            <input class="result form-control" type="text" id="set3" name="set3" placeholder="Number of Reps"
                                                >
                                        </div>
                                      
                                        
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">EXCERCISE</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-excercise-suggestion.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="table-responsive mt-2">
                            <table class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Excercise Name</th>
                                        <th>Description</th>
                                        <th>Set 1</th>
                                        <th>Set 2</th>
                                        <th>Set 3</th>
                                        <th>Demo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $tquery = mysqli_query($con, "Select tbl_assign_excercise.id,
                                        tbl_exerciselist.exercisename, tbl_exerciselist.description,tbl_exerciselist.demo,tbl_assign_excercise.set1,
                                        tbl_assign_excercise.set2, tbl_assign_excercise.set3, tbl_assign_excercise.patient_username	 from tbl_exerciselist INNER JOIN tbl_assign_excercise

                                        ON tbl_exerciselist.id = tbl_assign_excercise.excercise_id where tbl_assign_excercise.patient_id = '$sid' ");
                                        while ($trows = mysqli_fetch_array($tquery)) {
                                        ?>
                                    <tr class="delete_mem<?php echo htmlentities($trows['id'])?>">
                                        <td>
                                            <?php echo htmlentities($trows['exercisename']) ?>
                                        </td>

                                        <td>
                                            <?php echo htmlentities($trows['description']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['set1']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['set2']) ?>
                                        </td>
                                        <td>
                                            <?php echo htmlentities($trows['set3']) ?>
                                        </td>
                                        <td>
                                            <img src="postimages/<?php echo htmlentities($trows['demo']) ?>" alt="" width="50" height="50">
                                        </td>
                                      
                                        
                                      
                                        <td><a class="btn btn-danger" id='<?php echo htmlentities($trows['id'])?>'>Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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

    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this Member?")) {
                $.ajax({
                    type: "POST",
                    url: "delete_excercise.php",
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