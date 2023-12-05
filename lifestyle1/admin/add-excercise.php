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
} else{ 
    if (isset($_POST['submit'])) {
        $exercisename = $_POST['exercisename'];
        $category = $_POST['category'];
        $description = $_POST['description'];
        $set1 = $_POST['set1'];
        $set2 = $_POST['set2'];
        $set3 = $_POST['set3'];
        $imgfile=$_FILES["demo"]["name"];
        $extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));
        $allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG",".PNG");
        if(!in_array($extension,$allowed_extensions))
        {
        echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        }
        else
        {
        $imgnewfile=md5($imgfile).$extension;
        move_uploaded_file($_FILES["demo"]["tmp_name"],"postimages/".$imgnewfile);
       //$PostDate = date('d/m/Y');
       //Fetch User Details
        $queryinv = mysqli_query($con, "Insert into tbl_exerciselist(exercisename, category, description, set1, set2, set3, demo)
        values('$exercisename','$category','$description','$set1','$set2','$set3','$imgnewfile')");
        if ($queryinv) 
        {
            echo "<script>alert('Report is successfuly Added');</script>";
        } 
        else 
        {
            echo "<script>alert('Report could not Added');</script>";
        }
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
                                        <div class="col-md-6">
                                            <label for="validationCustom01" class="form-label">Excercise Name</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="exercisename"
                                                placeholder="Excercise Name" required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="validationCustom02" class="form-label">Category</label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="">Choose Categroy</option>
                                                <option value="Upper Limb">Upper Limb</option>
                                                <option value="Lower Limb">Lower Limb</option>
                                                <option value="Abdomen">Abdomen</option>
                                                <option value="Cardio">Cardio</option>
                                                <option value="Free">Free</option>
                                            </select>
                                            <!--<input type="text" class="form-control" name="category" id="category"
                                                placeholder="Category" required>-->
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <!--<input class="result form-control" type="text" id="protien" name="protien"
                                                placeholder="protien">-->
                                                <textarea id="summernote" name="description" class="form-control summernote"></textarea>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Set 1</label>
                                            <input class="result form-control" type="text" id="set1"
                                                name="set1" placeholder="Number of Reps">
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
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Exercise demo</label>
                                            <input class="result form-control" type="file" id="demo" name="demo"
                                                >
                                        </div>
                                        
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
                Copyright © 2023. All right reserved..
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
    <!--<script src="assets/js/jquery.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
</body>

</html>

<?php } ?>