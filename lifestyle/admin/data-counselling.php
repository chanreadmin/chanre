<?php
session_start();
include('layout/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $grbps = $_POST['grbps'];
        $bp = $_POST['bp'];
        $pulse = $_POST['pulse'];
        $spo2 = $_POST['spo2'];
        $weight = $_POST['weight'];
        $height = $_POST['height'];
        $bodyfat = $_POST['bodyfat'];
        $visceralfat = $_POST['visceralfat'];
        $musclefat = $_POST['musclefat'];
        $bodyage = $_POST['bodyage'];
        $rm = $_POST['rm'];
        $bmi = $_POST['bmi'];
    }
    $sid = intval($_GET['pid']);
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
                                    <a href="data-diet.php?pid=<?php echo $sid; ?>" class="btn btn-primary btn-sm">Diet
                                        Assessment</a>
                                    <a href="singlepatient.php?pid=<?php echo $sid; ?>"
                                        class="btn btn-primary btn-sm">Physician Assessment</a>
                                    <a href="data-yoga.php?pid=<?php echo $sid; ?>" class="btn btn-primary btn-sm">Yoga
                                        Assessment</a>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-3 rounded">
                                    <h6 class="mb-0 text-uppercase text-center text-primary">COUNSELLING ASSESMENT</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- preliminary test -->
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">PRELIMINARY TEST</h6>
                            <div class="fs-5 ms-auto dropdown">
                                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer"
                                    data-bs-toggle="dropdown"><i class="bi bi-plus-square-fill"></i></div>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="add-counselling.php?pid=<?php echo $sid; ?>">Add
                                            Report</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php 
                        $query1 = mysqli_query($con,"SELECT * FROM tbl_counselling where patient_id =$sid LIMIT 1");
                        while($rows = mysqli_fetch_array($query1)){
                        ?>
                        <form class="row g-3 needs-validation" novalidate method="post">
                            <div class="col-6">
                            </div>
                            <table>
                                <tr>
                                    <td>Have you ever been diagnosed with a mental health illness such as anxiety
                                        depression, bulimia etc</td>
                                    <td>
                                        <select class="form-control" name="mhi" id="mhi">
                                            <option>Choose an option</option>
                                            <option value="Yes" <?php if($rows['mhi'] == 'Yes') { ?> selected="selected"
                                                <?php } ?>>Yes</option>
                                            <option value="No" <?php if($rows['mhi'] == 'No') { ?> selected="selected"
                                                <?php } ?>>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>If yes, please list diagnosis and treatment such as medicines</td>
                                    <td><textarea class="form-control" name="mhi_diagnosis"
                                            id="mhi_diagnosis"><?php echo htmlentities($rows['mhi_diagnosis']);?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Are you currently being seen for mental health treatment?</td>
                                    <td>
                                        <select class="form-control" name="mht" id="mht">
                                            <option>Choose an option</option>
                                            <option value="Yes" <?php if($rows['mht'] == 'Yes') { ?> selected="selected"
                                                <?php } ?>>Yes</option>
                                            <option value="No" <?php if($rows['mht'] == 'No') { ?> selected="selected"
                                                <?php } ?>>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>If yes, is weight management a focus of your treatment? </td>
                                    <td><select class="form-control" name="mht_weight" id="mht_weight">
                                            <option>Choose an option</option>
                                            <option value="Yes" <?php if($rows['mht_weight'] == 'Yes') { ?>
                                                selected="selected" <?php } ?>>Yes</option>
                                            <option value="No" <?php if($rows['mht_weight'] == 'No') { ?>
                                                selected="selected" <?php } ?>>No</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Do you believe that your weight issues are connected to your emotional health?
                                    </td>
                                    <td>
                                        <select class="form-control" name="weh" id="weh">
                                            <option>Choose an option</option>
                                            <option value="Yes" <?php if($rows['weh'] == 'Yes') { ?> selected="selected"
                                                <?php } ?>>Yes</option>
                                            <option value="No" <?php if($rows['weh'] == 'No') { ?> selected="selected"
                                                <?php } ?>>No</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>If yes, how so</td>
                                    <td><input type="text" class="form-control" name="weh_reason" id="weh_reason"
                                            value="<?php echo htmlentities($rows['weh_reason']);?>"></td>
                                </tr>
                                <tr>
                                    <td>Do the weight scales have a great power over you? Can they change your mood?
                                    </td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['wsgp']);?>" name="wsgp" id="wsgp">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Do you crave specific foods?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['csf']);?>" name="csf" id="csf"></td>
                                </tr>
                                <tr>
                                    <td>Is it difficult for you to stop eating especially sweet things?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['sweet_thing']);?>" name="sweet_thing"
                                            id="sweet_thing">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Do you have problems controlling the amount of certain types of foods you eat?
                                    </td>
                                    <td><input type="text" class="form-control" name="controlling_food"
                                            id="controlling_food"
                                            value="<?php echo htmlentities($rows['controlling_food']);?>"></td>
                                </tr>
                                <tr>
                                    <td>Do you eat when you are stressed, angry or bored?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['stressed']);?>" name="stressed"
                                            id="stressed"></td>
                                </tr>
                                <tr>
                                    <td>Doyou eat more of your favorite food and with less control when you are alone?
                                    </td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['favorite_food']);?>"
                                            name="favorite_food" id="favorite_food">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Do you feel guilty when you eat foods like sweets or snacks ?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['feel_guilty']);?>" name="feel_guilty"
                                            id="feel_guilty">
                                    </td>
                                </tr>
                                <tr>
                                    <td>When you overeat while on a diet, do you give up and start eating without
                                        control, particularly the food you think is fattening ?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['fattening']);?>" name="fattening"
                                            id="fattening"></td>
                                </tr>
                                <tr>
                                    <td>How often do you feel that food controls you rather than controlling food?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['food_controls']);?>"
                                            name="food_controls" id="food_controls">
                                    </td>
                                </tr>
                                <tr>
                                    <td>What time do you go to bed every night and wake up every morning? </td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['bed_time']);?>" name="bed_time"
                                            id="bed_time"></td>
                                </tr>
                                <tr>
                                    <td>How many hours do you sleep on an average night?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['sleephours']);?>" name="sleephours"
                                            id="sleephours"></td>
                                </tr>
                                <tr>
                                    <td>Do you have difficulty falling asleep once in bed? </td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['difficulty_sleep']);?>"
                                            name="difficulty_sleep" id="difficulty_sleep"></td>
                                </tr>
                                <tr>
                                    <td>How many times do you wake up each night?</td>
                                    <td><input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['wakup_night']);?>" name="wakup_night"
                                            id="wakup_night">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Do you feel refreshed upon waking in the morning?</td>
                                    <td>
                                        <select class="form-control" name="refreshed" id="refreshed">
                                            <option>Choose an option</option>
                                            <option value="Yes" <?php if($rows['refreshed'] == 'Yes') { ?>
                                                selected="selected" <?php } ?>>Yes</option>
                                            <option value="No" <?php if($rows['refreshed'] == 'No') { ?>
                                                selected="selected" <?php } ?>>No</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>How often do you fee; sleepy during the day?</td>
                                    <td>
                                        <select class="form-control" name="sleepy_day" id="sleepy_day">
                                            <option>Choose an option</option>
                                            <option value="Never">Never</option>
                                            <option value="Rarely">Rarely</option>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Do you make yourself Sick (induce vomiting) because you feel uncomfortably full?
                                    </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['uncomfortably_full']);?>"
                                            name="uncomfortably_full" id="uncomfortably_full">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Do you worry you have lost Control over how much you eat?</td>
                                    <td>
                                        <input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['lost_control_over']);?>"
                                            name="lost_control_over" id="lost_control_over">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Have you recently lost more than One stone 6.35 kg in a 3 month period? </td>
                                    <td>
                                        <input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['lost_stone']);?>" name="lost_stone"
                                            id="lost_stone">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Do you believe yourself to be Fat when others say you are too thin?</td>
                                    <td>
                                        <input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['fat']);?>" name="fat" id="fat">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Would you say that Food dominates your life?</td>
                                    <td>
                                        <input type="text" class="form-control"
                                            value="<?php echo htmlentities($rows['food_dominates']);?>"
                                            name="food_dominates" id="food_dominates">
                                    </td>
                                </tr>
                            </table>

                            <div class="col-12 d-flex justify-content-center">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                </div>
                <!--INVESTIGATIONS -->


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