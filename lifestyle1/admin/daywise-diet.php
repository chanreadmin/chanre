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
        $days = $_POST['days'];
        $bfitem = $_POST['bfitem'];
        $bfquantity = $_POST['bfquantity'];
        $mmsitem = $_POST['mmsitem'];
        $mmsquantity = $_POST['mmsquantity'];
        $lunchitem = $_POST['lunchitem'];
        $lunchquantity = $_POST['lunchquantity'];
        $mesitem = $_POST['mesitem'];
        $mesquantity = $_POST['mesquantity'];
        $dinner = $_POST['dinner'];
        $dinnerquantity = $_POST['dinnerquantity'];
        $bbitem = $_POST['bbitem'];
        $bbquantity = $_POST['bbquantity'];
        $feedback_text = $_POST['feedback_text'];

        $admin_name = $_SESSION['login'];
        $asses_date = $_POST['asses_date'];
        $PostDate = date('d/m/Y');
        //Fetch User Details
        $queryinv = mysqli_query($con, "Insert into tbl_assigndiet
        (days, bfitem, bfquantity, mmsitem, mmsquantity, lunchitem, lunchquantity, 
        mesitem,mesquantity,dinner,dinnerquantity, bbitem, bbquantity, admin_name, patient_name, patient_id, feedback_text)
        values('$days','$bfitem','$bfquantity','$mmsitem','$mmsquantity','$lunchitem',
        '$lunchquantity','$mesitem','$mesquantity','$dinner','$dinnerquantity','$bbitem','$bbquantity','$admin_name','$username','$sid','$feedback_text')");
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
    <style>
        table{
            overflow: scroll;
        }
    </style>
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
                                    <form class="row g-3 needs-validation" method="post">
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
                                                <option value="8">Day 8</option>
                                                <option value="9">Day 9</option>
                                                <option value="10">Day 10</option>
                                                <option value="11">Day 11</option>
                                                <option value="12">Day 12</option>
                                                <option value="13">Day 13</option>
                                                <option value="14">Day 14</option>
                                                <option value="15">Day 15</option>
                                                <option value="16">Day 16</option>
                                                <option value="17">Day 17</option>
                                                <option value="18">Day 18</option>
                                                <option value="19">Day 19</option>
                                                <option value="20">Day 20</option>
                                            </select>
                                        </div>


                                        <table>
                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Breakfast</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="bfitem">
                                                        <option value="">Choose an item</option>
                                                        <?php 
                                                            $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                            while($trows = mysqli_fetch_array($queryfetch))
                                                            {
                                                        ?>
                                                        <option value="<?php echo htmlentities($trows['item'])?>">
                                                            <?php echo htmlentities($trows['item'])?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="result form-control" type="text" id="bfquantity"
                                                        name="bfquantity" placeholder="quantity">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Mid Morning
                                                        Snacks</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="mmsitem">
                                                        <option value="">Choose an item</option>
                                                        <?php 
                                                            $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                            while($trows = mysqli_fetch_array($queryfetch))
                                                            {
                                                        ?>
                                                        <option value="<?php echo htmlentities($trows['item'])?>">
                                                            <?php echo htmlentities($trows['item'])?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="result form-control" type="text" id="mmsquantity"
                                                        name="mmsquantity" placeholder="quantity">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Lunch</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="lunchitem">
                                                        <option value="">Choose an item</option>
                                                        <?php 
                                                            $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                            while($trows = mysqli_fetch_array($queryfetch))
                                                            {
                                                        ?>
                                                        <option value="<?php echo htmlentities($trows['item'])?>">
                                                            <?php echo htmlentities($trows['item'])?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="result form-control" type="text" id="lunchquantity"
                                                        name="lunchquantity" placeholder="quantity">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Mid Evening
                                                        Snacks</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="mesitem">
                                                        <option value="">Choose an item</option>
                                                        <?php 
                                                            $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                            while($trows = mysqli_fetch_array($queryfetch))
                                                            {
                                                        ?>
                                                        <option value="<?php echo htmlentities($trows['item'])?>">
                                                            <?php echo htmlentities($trows['item'])?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="result form-control" type="text" id="mesquantity"
                                                        name="mesquantity" placeholder="quantity">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Dinner</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="dinner">
                                                        <option value="">Choose an item</option>
                                                        <?php 
                                                            $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                            while($trows = mysqli_fetch_array($queryfetch))
                                                            {
                                                        ?>
                                                        <option value="<?php echo htmlentities($trows['item'])?>">
                                                            <?php echo htmlentities($trows['item'])?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="result form-control" type="text" id="dinnerquantity"
                                                        name="dinnerquantity" placeholder="quantity">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Before
                                                        Bed</label>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="bbitem">
                                                        <option value="">Choose an item</option>
                                                        <?php 
                                                            $queryfetch = mysqli_query($con, "SELECT * from tbl_dietlist");
                                                            while($trows = mysqli_fetch_array($queryfetch))
                                                            {
                                                        ?>
                                                        <option value="<?php echo htmlentities($trows['item'])?>">
                                                            <?php echo htmlentities($trows['item'])?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input class="result form-control" type="text" id="bbquantity"
                                                        name="bbquantity" placeholder="quantity">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <label for="validationCustom02" class="form-label">Instruction</label>
                                                </td>
                                                <td>
                                                        <textarea row="5" class="result form-control" name="feedback_text"></textarea>
                                                </td>
                                                <td>
                                                    <!-- <input class="result form-control" type="text" id="bbquantity"
                                                        name="bbquantity" placeholder="quantity"> -->
                                                </td>
                                            </tr>
                                        </table>
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
                                            <th>Day</th>
                                            <th>Breakfast</th>
                                            <th>quantity</th>
                                            <th>Mid Morning</th>
                                            <th>quantity</th>
                                            <th>Lunch</th>
                                            <th>quantity</th>
                                            <th>Evening Snacks</th>
                                            <th>quantity</th>
                                            <th>Dinner</th>
                                            <th>quantity</th>
                                            <th>Before Bed</th>
                                            <th>quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>Breakfast</tr> -->
                                        <?php
                                        // $iquery = mysqli_query($con, "SELECT *
                                        // FROM tbl_dietlist
                                        // INNER JOIN tbl_assigndiet
                                        // ON tbl_dietlist.id = tbl_assigndiet.bfitem where patient_id = $sid");

                                        $iquery = mysqli_query($con, "SELECT *
                                        FROM tbl_assigndiet
                                        where patient_id = $sid");
                                        while ($frows = mysqli_fetch_array($iquery)) {
                                        ?>
                                        <tr class="delete_mem<?php echo htmlentities($frows['id']); ?>">
                                            <td>
                                                <?php echo htmlentities($frows['days']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['bfitem']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['bfquantity']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['mmsitem']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['mmsquantity']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['lunchitem']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['lunchquantity']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['mesitem']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['mesquantity']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['dinner']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['dinnerquantity']) ?>
                                            </td>

                                            <td>
                                                <?php echo htmlentities($frows['bbitem']) ?>
                                            </td>
                                            <td>
                                                <?php echo htmlentities($frows['bbquantity']) ?>
                                            </td>

                                            
                                            <td><a class="btn btn-danger"
                                                    id='<?php echo htmlentities($frows['id'])?>'>Delete</a></td>
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