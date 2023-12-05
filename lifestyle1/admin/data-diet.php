<?php


session_start();
include('layout/config.php');
error_reporting(0);

$sid = intval($_GET['pid']);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
        $did=intval($_GET['nid']);
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
                            <div class="card-body d-flex justify-content-center">
                                <div class="border p-3 rounded ">
                                    <a href="data-physiotherapy.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Physiotherapy Assessment</a>
                                    <a href="singlepatient.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Physician Assessment</a>
                                    <a href="data-counselling.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Counselling Assessment</a>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase text-center text-primary">DIET ASSESMENT</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- preliminary test -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Diet Assestment</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class=""
                                    data-bs-toggle="dropdown"><a class=""
                                            href="add-diet-assesment.php?pid=<?php echo $sid; ?>"><i class="bi bi-plus-square-fill"></i></a></div>
                                <!-- <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="add-diet-assesment.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                    <li><a class="dropdown-item" href="edit-diet.php?pid=<?php echo $sid; ?>">Edit
                                            Diet</a></li>

                                </ul> -->
                            </div>
                        </div>
                        <div class=" mt-2">
                            <?php 
                        $fetchQuery = mysqli_query($con,"Select * from tbl_diet where patient_id = $sid");
                        while($rows = mysqli_fetch_array($fetchQuery))
                        {
                        ?>
                            <form class="row g-3 needs-validation" novalidate method="post">
                                <div class="col-6">
                                    <!--<label>Date</label>-->
                                    <!--<input type="date" name="asses_date" value="" class="form-control">-->
                                </div>
                                <table>
                                    <tr>
                                        <td>Activity Level</td>
                                        <td>
                                            <select class="form-control" name="activity" id="activity">
                                                <option value="">Choose an option</option>
                                                <option value="Not Active"
                                                    <?php if($rows['activity'] == 'Not Active') { ?> selected="selected"
                                                    <?php } ?>>Not Active</option>
                                                <option value="Somewhat Active"
                                                    <?php if($rows['activity'] == 'Somewhat Active') { ?>
                                                    selected="selected" <?php } ?>>Somewhat Active</option>
                                                <option value="Highly Active"
                                                    <?php if($rows['activity'] == 'Highly Active') { ?>
                                                    selected="selected" <?php } ?>>Highly Active</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>BMI</td>
                                        <td>
                                            <input type="text" name="bmi"
                                                value="<?php echo htmlentities($rows['bmi']);?>" class="form-control"
                                                placeholder="Enter BMI">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Ideal Body Mass(IBW)</td>
                                        <td>
                                            <input type="text" name="ibw"
                                                value="<?php echo htmlentities($rows['ibw']);?>" class="form-control"
                                                placeholder="Enter Ideal Body Mass">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>How frequently do you eat outside?</td>
                                        <td>
                                            <select class="form-control" name="eat_outside" id="eat_outside">
                                                <option value="">Choose an option</option>
                                                <option value="Occasionally"
                                                    <?php if($rows['eat_outside'] == 'Occasionally') { ?>
                                                    selected="selected" <?php } ?>>Occasionally</option>
                                                <option value="Weekly Twice"
                                                    <?php if($rows['eat_outside'] == 'Weekly Twice') { ?>
                                                    selected="selected" <?php } ?>>Weekly Twice</option>
                                                <option value="Everyday"
                                                    <?php if($rows['eat_outside'] == 'Everyday') { ?>
                                                    selected="selected" <?php } ?>>Everyday</option>
                                                <option value="Always Prefer Homemade food"
                                                    <?php if($rows['eat_outside'] == 'Always Prefer Homemade food') { ?>
                                                    selected="selected" <?php } ?>>Always Prefer
                                                    Homemade food</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Type of food prefer outside?</td>
                                        <td>
                                            <select class="form-control" name="pfeo" id="pfeo">
                                                <option value="">Choose an option</option>
                                                <option value="North Indian"
                                                    <?php if($rows['pfeo'] == 'North Indian') { ?> selected="selected"
                                                    <?php } ?>>North Indian</option>
                                                <option value="South Indian"
                                                    <?php if($rows['pfeo'] == 'South Indian') { ?> selected="selected"
                                                    <?php } ?>>South Indian</option>
                                                <option value="Continental"
                                                    <?php if($rows['pfeo'] == 'Continental') { ?> selected="selected"
                                                    <?php } ?>>Continental</option>
                                                <option value="Fast food" <?php if($rows['pfeo'] == 'Fast food') { ?>
                                                    selected="selected" <?php } ?>>Fast food</option>
                                                <option value="Street food"
                                                    <?php if($rows['pfeo'] == 'Street food') { ?> selected="selected"
                                                    <?php } ?>>Street food</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Following any diet?</td>
                                        <td>
                                            <input type="text" value="<?php echo htmlentities($rows['cdiet']);?>"
                                                name="cdiet" class="form-control">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Diet Preference</td>
                                        <td>
                                            <select class="form-control" name="dietpref" id="dietpref">
                                                <option value="">Choose an option</option>
                                                <option value="Vegetarian"
                                                    <?php if($rows['dietpref'] == 'Vegetarian') { ?> selected="selected"
                                                    <?php } ?>>Vegetarian</option>
                                                <option value="Ova Vegetarian"
                                                    <?php if($rows['dietpref'] == 'Ova Vegetarian') { ?>
                                                    selected="selected" <?php } ?>>Ova Vegetarian</option>
                                                <option value="Non-vegetarian"
                                                    <?php if($rows['dietpref'] == 'Non-vegetarian') { ?>
                                                    selected="selected" <?php } ?>>Non-vegetarian</option>
                                                <option value="Vegan" <?php if($rows['dietpref'] == 'Vegan') { ?>
                                                    selected="selected" <?php } ?>>Vegan</option>
                                                <option value="Jain" <?php if($rows['dietpref'] == 'Jain') { ?>
                                                    selected="selected" <?php } ?>>Jain</option>
                                                <option value="Other" <?php if($rows['dietpref'] == 'Other') { ?>
                                                    selected="selected" <?php } ?>>other</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Are you allergic to any of the following?</td>
                                        <td>
                                            <select class="form-control" name="allergic" id="allergic">
                                                <option value="">Choose an option</option>
                                                <option value="Milk" <?php if($rows['allergic'] == 'Milk') { ?>
                                                    selected="selected" <?php } ?>>Milk</option>
                                                <option value="Egg" <?php if($rows['allergic'] == 'Egg') { ?>
                                                    selected="selected" <?php } ?>>Egg</option>
                                                <option value="Fish" <?php if($rows['allergic'] == 'Fish') { ?>
                                                    selected="selected" <?php } ?>>Fish</option>
                                                <option value="Shelfish" <?php if($rows['allergic'] == 'Shelfish') { ?>
                                                    selected="selected" <?php } ?>>Shelfish</option>
                                                <option value="Tree Nuts"
                                                    <?php if($rows['allergic'] == 'Tree Nuts') { ?> selected="selected"
                                                    <?php } ?>>Tree Nuts</option>
                                                <option value="Wheat" <?php if($rows['allergic'] == 'Wheat') { ?>
                                                    selected="selected" <?php } ?>>Wheat</option>
                                                <option value="Ground nuts"
                                                    <?php if($rows['allergic'] == 'Ground nuts') { ?>
                                                    selected="selected" <?php } ?>>Ground nuts</option>
                                                <option value="Soyabean" <?php if($rows['allergic'] == 'Soyabean') { ?>
                                                    selected="selected" <?php } ?>>Soyabean</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Any gut issues before/after meal</td>
                                        <td>
                                            <select class="form-control" name="gutissue" id="gutissue">
                                                <option value="">Choose an option</option>
                                                <option value="Heartburn"
                                                    <?php if($rows['gutissue'] == 'Heartburn') { ?> selected="selected"
                                                    <?php } ?>>Heartburn</option>
                                                <option value="Bloating" <?php if($rows['gutissue'] == 'Bloating') { ?>
                                                    selected="selected" <?php } ?>>Bloating</option>
                                                <option value="Flatulence"
                                                    <?php if($rows['gutissue'] == 'Flatulence') { ?> selected="selected"
                                                    <?php } ?>>Flatulence</option>
                                                <option value="Loose stools"
                                                    <?php if($rows['gutissue'] == 'Loose stools') { ?>
                                                    selected="selected" <?php } ?>>Loose stools</option>
                                                <option value="Stomach Pain"
                                                    <?php if($rows['gutissue'] == 'Stomach Pain') { ?>
                                                    selected="selected" <?php } ?>>Stomach Pain</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Do you consume alcohol?</td>
                                        <td>
                                            <select class="form-control" name="alcohol" id="alcohol">
                                                <option value="">Choose an option</option>
                                                <option value="Yes" <?php if($rows['alcohol'] == 'Yes') { ?>
                                                    selected="selected" <?php } ?>>Yes</option>
                                                <option value="No" <?php if($rows['alcohol'] == 'No') { ?>
                                                    selected="selected" <?php } ?>>No</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>How often do you have alcoholic drinks?</td>
                                        <td>
                                            <select class="form-control" name="alcotime" id="alcotime">
                                                <option value="">Choose an option</option>
                                                <option value="Never" <?php if($rows['alcotime'] == 'Never') { ?>
                                                    selected="selected" <?php } ?>>Never</option>
                                                <option value="Monthly  or less"
                                                    <?php if($rows['alcotime'] == 'Monthly  or less') { ?>
                                                    selected="selected" <?php } ?>>Monthly or less</option>
                                                <option value="2-4 times in a week"
                                                    <?php if($rows['alcotime'] == '2-4 times in a week') { ?>
                                                    selected="selected" <?php } ?>>2-4 times in a week</option>

                                                <option value="4 or more times"
                                                    <?php if($rows['alcotime'] == '4 or more times') { ?>
                                                    selected="selected" <?php } ?>>4 or more times</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>How many drinks you have on a typical day?</td>
                                        <td>
                                            <select class="form-control" name="alcoquantity" id="alcoquantity">
                                                <option value="">Choose an option</option>
                                                <option value="1 or 2" <?php if($rows['alcoquantity'] == '1 or 2') { ?>
                                                    selected="selected" <?php } ?>>1 or 2</option>
                                                <option value="3 or 4" <?php if($rows['alcoquantity'] == '3 or 4') { ?>
                                                    selected="selected" <?php } ?>>3 or 4</option>
                                                <option value="5 or 6" <?php if($rows['alcoquantity'] == '5 or 6') { ?>
                                                    selected="selected" <?php } ?>>5 or 6</option>
                                                <option value="7 or 9" <?php if($rows['alcoquantity'] == '7 or 9') { ?>
                                                    selected="selected" <?php } ?>>7 or 9</option>
                                                <option value="10 or more"
                                                    <?php if($rows['alcoquantity'] == '10 or more') { ?>
                                                    selected="selected" <?php } ?>>10 or more</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Which type of alcoholic beverages do you prefer?</td>
                                        <td>
                                            <select class="form-control" name="alco_beverage" id="alco_beverage">

                                                <option value="">Choose an option</option>
                                                <option value="Beer" <?php if($rows['alco_beverage'] == 'Beer') { ?>
                                                    selected="selected" <?php } ?>>Beer</option>
                                                <option value="Wine" <?php if($rows['alco_beverage'] == 'Wine') { ?>
                                                    selected="selected" <?php } ?>>Wine</option>
                                                <option value="Hardwine"
                                                    <?php if($rows['alco_beverage'] == 'Hardwine') { ?>
                                                    selected="selected" <?php } ?>>Hard wine</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>which type of snacks you prefer with alcoholic beverages?</td>
                                        <td>
                                            <input type="text" name="snacksbeverage"
                                                value="<?php echo htmlentities($rows['snacksbeverage']);?>"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Food dislike?</td>
                                        <td>
                                            <input type="text" name="fd"
                                                value="<?php echo htmlentities($rows['fd']);?>"
                                                class="form-control">
                                        </td>
                                    </tr>
                                </table>
                                <table>
                                    <tr class="text-center">
                                        <th></th>
                                        <th>Timing</th>
                                        <th>Menu</th>
                                        <th>Quantity</th>
                                    </tr>
                                    <tr>
                                        <td>Breakfast</td>
                                        <td><input type="text" value="<?php echo htmlentities($rows['bftiming']);?>"
                                                name="bftiming" class="form-control"></td>
                                        <td><textarea name="bfmenu"
                                                class="form-control"><?php echo htmlentities($rows['bfmenu']);?></textarea>
                                        </td>
                                        <td><textarea name="bfquantity"
                                                class="form-control"><?php echo htmlentities($rows['bfquantity']);?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mid Morning Snacks</td>
                                        <td><input type="text" name="mmsnacks"
                                                value="<?php echo htmlentities($rows['mmsnacks']);?>"
                                                class="form-control"></td>
                                        <td><textarea name="mmsnacksmenu"
                                                class="form-control"><?php echo htmlentities($rows['mmsnacksmenu']);?></textarea>
                                        </td>
                                        <td><textarea name="mmsnacksquantity"
                                                class="form-control"><?php echo htmlentities($rows['mmsnacksquantity']);?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lunch</td>
                                        <td><input type="text" name="lunch"
                                                value="<?php echo htmlentities($rows['lunch']);?>" class="form-control">
                                        </td>
                                        <td><textarea name="lunch_menu"
                                                class="form-control"><?php echo htmlentities($rows['lunch_menu']);?></textarea>
                                        </td>
                                        <td><textarea name="lunch_quantity"
                                                class="form-control"><?php echo htmlentities($rows['lunch_quantity']);?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mid Evening Snacks</td>
                                        <td><input type="text" name="me_timing"
                                                value="<?php echo htmlentities($rows['me_timing']);?>"
                                                class="form-control"></td>
                                        <td><textarea name="memenu"
                                                class="form-control"><?php echo htmlentities($rows['memenu']);?></textarea>
                                        </td>
                                        <td><textarea name="mequantity"
                                                class="form-control"><?php echo htmlentities($rows['mequantity']);?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dinner</td>
                                        <td><input type="text" name="dinner"
                                                value="<?php echo htmlentities($rows['dinner']);?>"
                                                class="form-control"></td>
                                        <td><textarea name="dinner_menu"
                                                class="form-control"><?php echo htmlentities($rows['dinner_menu']);?></textarea>
                                        </td>
                                        <td><textarea name="dinner_quatinty"
                                                class="form-control"><?php echo htmlentities($rows['dinner_quatinty']);?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Before Bed</td>
                                        <td><input type="text" name="before_bed"
                                                value="<?php echo htmlentities($rows['before_bed']);?>"
                                                class="form-control"></td>
                                        <td><textarea name="bbmenu"
                                                class="form-control"><?php echo htmlentities($rows['bbmenu']);?></textarea>
                                        </td>
                                        <td><textarea name="bbquantity"
                                                class="form-control"><?php echo htmlentities($rows['bbquantity']);?></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <div class="col-12 d-flex justify-content-center">
                                    <!--<button class="btn btn-primary" type="submit" name="submit">Submit</button>-->
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">SUGGESTED DIET</h6>
                            <div class="fs-5 ms-auto">
                                <div class=""><a class=""
                                            href="daywise-diet.php?pid=<?php echo $sid; ?>"><i class="bi bi-plus-square-fill"></i></a></div>
                                <!-- <ul class="dropdown-menu">
                                    <li>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn-danger').click(function() {
            var id = $(this).attr("id");
            if (confirm(`Are you sure you want to delete?`)) {
                $.ajax({
                    type: "POST",
                    url: "delete_diet.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                        // alert(`Data deleted successfully? ${id}`)
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