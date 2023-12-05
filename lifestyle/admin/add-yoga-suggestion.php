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
        $month = $_POST['month'];
        $week = $_POST['week'];
        $days = $_POST['days'];
        $startdays = $_POST['startdays'];
        $warmup1 = $_POST['warmup1'];
        $warmup2 = $_POST['warmup2'];
        $warmup3 = $_POST['warmup3'];
        $warmup4 = $_POST['warmup4'];
        $warmup5 = $_POST['warmup5'];
        $mainex1 =$_POST['mainex1'];
        $mainex2 =$_POST['mainex2'];
        $mainex3 =$_POST['mainex3'];
        $mainex4 =$_POST['mainex4'];
        $mainex5 =$_POST['mainex5'];
        $stretch1 = $_POST['stretch1'];
        $stretch2 = $_POST['stretch2'];
        $stretch3 = $_POST['stretch3'];
        $stretch4 = $_POST['stretch4'];
        $stretchtime1 = $_POST['stretchtime1'];
        $stretchtime2 = $_POST['stretchtime2'];
        $stretchtime3 = $_POST['stretchtime3'];
        $stretchtime4 = $_POST['stretchtime4'];
        $set1 = $_POST['set1'];
        $set2 = $_POST['set2'];
        $set3 = $_POST['set3'];
      /*
        $queryinv = mysqli_query($con, "Insert into tbl_assign_excer
        (month, week, days, startdays, warmup1, warmup2, warmup3, warmup4, warmup5, mainex1,
        mainex2, mainex3, mainex4, mainex5, stretch1, stretch2, stretch3, stretch4, stretchtime1, stretchtime2, stretchtime3, stretchtime4,
        set1, set2, set3, patient_id, patient_username	)
        
        values(
        '$month','$week','$days','$startdays','$warmup1', '$warmup2','$warmup3','$warmup4','$warmup5', '$mainex1',
        '$mainex2','$mainex3','$mainex4','$mainex5','$stretch1','$stretch2','$stretch3','$stretch4','$stretchtime1',
        '$stretchtime2','$stretchtime3','$stretchtime4',
        '$set1','$set2','$set3','$sid','$username')");


$queryinv = mysqli_query($con, "Insert into tbl_assign_excercise(month, week, days, startdays, patient_id, patient_username)
values('$month','$week','$days','$startdays','$sid','$username')");

*/


$queryinv = mysqli_query($con, "Insert into tbl_assign_excercise(month,week,days,startdays,warmup1, warmup2, warmup3, 
warmup4, warmup5, mainex1, mainex2, mainex3, mainex4, mainex5,  stretch1,stretchtime1, 
stretch2,stretchtime2, stretch3,stretchtime3, stretch4,stretchtime4,set1, set2, set3, patient_id, patient_username)
values('$month','$week','$days','$startdays','$warmup1', '$warmup2','$warmup3','$warmup4','$warmup5','$mainex1',
'$mainex2','$mainex3','$mainex4','$mainex5','$stretch1','$stretchtime1','$stretch2','$stretchtime2','$stretch3',
'$stretchtime3','$stretch4','$stretchtime4','$set1','$set2','$set3','$sid','$username')");


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
                                    <form class="row g-3 needs-validation" novalidate method="post"
                                        enctype="multipart/form-data">
                                        <div class="col-md-3 mb-3">
                                            <select class="form-control" name="month">
                                                <option>Choose Month</option>
                                                <option value="1">Month 1</option>
                                                <option value="2">Month 2</option>
                                                <option value="3">Month 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <select class="form-control" name="week">
                                                <option>Choose Week</option>
                                                <option value="1">Week 1</option>
                                                <option value="2">Week 2</option>
                                                <option value="3">Week 3</option>
                                                <option value="4">Week 4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <select class="form-control" name="days">
                                                <option>Choose day</option>
                                                <option value="1">Day 1</option>
                                                <option value="2">Day 2</option>
                                                <option value="3">Day 3</option>
                                                <option value="4">Day 4</option>
                                                <option value="5">Day 5</option>
                                                <option value="6">Day 6</option>
                                                <option value="7">Day 7</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <input type="date" class="form-control" name="startdays">
                                        </div>
                                        <!-- Warmup -->
                                        <div class="col-md-8 mb-8">
                                            <h6>Warm Up</h6>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="warmup1" id="warmup1">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'warmup'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="warmup2" id="warmup2">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'warmup'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="warmup3" id="warmup3">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'warmup'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="warmup4" id="warmup4">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'warmup'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="warmup5" id="warmup5">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'warmup'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- Warmup -->

                                        <!-- Main excercise -->
                                        <div class="col-md-8 mb-8">
                                            <h6>Main Excercise</h6>
                                        </div>


                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="mainex1" id="mainex1">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT *
                                                FROM tbl_exerciselist
                                                WHERE category != 'warmup' AND category != 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="mainex2" id="mainex2">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT *
                                                FROM tbl_exerciselist
                                                WHERE category != 'warmup' AND category != 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>"><?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="mainex3" id="mainex3">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT *
                                                FROM tbl_exerciselist
                                                WHERE category != 'warmup' AND category != 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="mainex4" id="mainex4">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT *
                                                FROM tbl_exerciselist
                                                WHERE category != 'warmup' AND category != 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-8">
                                            <select class="form-control" name="mainex5" id="mainex5">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT *
                                                FROM tbl_exerciselist
                                                WHERE category != 'warmup' AND category != 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <!-- Main Excercise -->


                                        <!-- stretching -->
                                        <div class="col-md-8 mb-8">
                                            <h6>Stretching</h6>
                                        </div>


                                        <div class="col-md-6 mb-6">
                                            <select class="form-control" name="stretch1" id="stretch1">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-6">

                                            <input class="result form-control" type="text" id="stretchtime1"
                                                name="stretchtime1" placeholder="Number of Seconds">
                                        </div>

                                        <div class="col-md-6 mb-6">
                                            <select class="form-control" name="stretch2" id="stretch2">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-6">

                                            <input class="result form-control" type="text" id="stretchtime2"
                                                name="stretchtime2" placeholder="Number of Seconds">
                                        </div>



                                        <div class="col-md-6 mb-6">
                                            <select class="form-control" name="stretch3" id="stretch3">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-6">

                                            <input class="result form-control" type="text" id="stretchtime3"
                                                name="stretchtime3" placeholder="Number of Seconds">
                                        </div>


                                        <div class="col-md-6 mb-6">
                                            <select class="form-control" name="stretch4" id="stretch4">
                                                <option>Choose Excercise</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT * FROM tbl_exerciselist where category = 'Stretching'");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['id'];?>">
                                                    <?php echo $rows['exercisename'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-6">

                                            <input class="result form-control" type="text" id="stretchtime4"
                                                name="stretchtime4" placeholder="Number of Seconds">
                                        </div>
                                        <!-- stretching -->
                                        <!--<div class="col-md-8 mb-8">
                                            <select class="form-control" name="category" id="category">
                                                <option>Choose Category</option>
                                                <?php 
                                                $query = mysqli_query($con, "SELECT DISTINCT category FROM tbl_exerciselist");
                                                while($rows = mysqli_fetch_array($query)){
                                                ?>
                                                <option value="<?php echo $rows['category'];?>">
                                                    <?php echo $rows['category'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>-->

                                        <div class="col-md-8">
                                            <!-- <label for="validationCustom01" class="form-label">Excercise Name</label> -->
                                            <!-- <select class="form-control" id="excercise_id" name="excercise_id">
                                                <option value="text">Choose excercise name</option>
                                                <?php /* $exquery = mysqli_query($con, "Select * from tbl_exerciselist");
                                                while($rows = mysqli_fetch_array($exquery)){
                                                ?>
                                                <option value="<?php echo htmlentities($rows['id'])?>">
                                                    <?php echo htmlentities($rows['exercisename'])?></option>
                                                <?php } */?>
                                            </select> -->
                                            <!--<select class="form-control" id="excercise_id" name="excercise_id">
                                                <option value="">Select excercise</option>
                                            </select>
                                            <div class="valid-feedback">Looks good!</div>-->
                                        </div>

                                        <div class="col-md-12 mb-12">
                                            <!--<label class="form-label">Set 1</label>
                                            <input class="result form-control" type="text" id="set1" name="set1"
                                                placeholder="Number of Reps">-->
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label class="form-label">Set 1</label>
                                            <input class="result form-control" type="text" id="set1" name="set1"
                                                placeholder="Number of Reps">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Set 2</label>
                                            <input class="result form-control" type="text" id="set2" name="set2"
                                                placeholder="Number of Reps">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Set 3</label>
                                            <input class="result form-control" type="text" id="set3" name="set3"
                                                placeholder="Number of Reps">
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
                                                <th>Month</th>
                                                <th>Week</th>
                                                <th>Days</th>
                                                <th>Date</th>
                                                <th>Set 1</th>
                                                <th>Set 2</th>
                                                <th>Set 3</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $query = mysqli_query($con, "SELECT *
                                                FROM tbl_exerciselist
                                                INNER JOIN tbl_assign_excercise ON
                                                tbl_exerciselist.id = tbl_assign_excercise.warmup1  ");
                                                while($rows=mysqli_fetch_array($query)){
                                                    ?>
                                            <tr>
                                                <td><?php echo htmlentities($rows['month']); ?></td>
                                                <td><?php echo htmlentities($rows['week']); ?></td>
                                                <td><?php echo htmlentities($rows['days']); ?></td>
                                                <td><?php echo htmlentities($rows['startdays']); ?></td>
                                                <td><?php echo htmlentities($rows['set1']); ?></td>
                                                <td><?php echo htmlentities($rows['set2']); ?></td>
                                                <td><?php echo htmlentities($rows['set3']); ?></td>
                                                <td><a class="btn btn-danger"
                                                        id='<?php echo htmlentities($rows['id'])?>'>Delete</a></td>
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
        // Country dependent ajax
        $("#category").on("change", function() {
            var categoryname = $(this).val();
            $.ajax({
                url: "action.php",
                type: "POST",
                cache: false,
                data: ({
                    category: categoryname
                }),
                success: function(data) {
                    $("#excercise_id").html(data);
                    // $('#city').html('<option value="">Select city</option>');
                }
            });
        });

        // state dependent ajax
        //   $("#state").on("change", function(){
        //     var stateId = $(this).val();
        //     $.ajax({
        //       url :"action.php",
        //       type:"POST",
        //       cache:false,
        //       data:{stateId:stateId},
        //       success:function(data){
        //         $("#city").html(data);
        //       }
        //     });
        //   });
    });
    </script>
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