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
        $activity= $_POST['activity'];
        $bmi= $_POST['bmi'];
        $ibw= $_POST['ibw'];
        $eat_outside= $_POST['eat_outside'];
        $pfeo= $_POST['pfeo'];
        $cdiet= $_POST['cdiet'];
        $dietpref= $_POST['dietpref'];
        $allergic= $_POST['allergic'];
        $gutissue= $_POST['gutissue'];
        $alcohol= $_POST['alcohol'];
        $alcotime= $_POST['alcotime'];
        $alcoquantity= $_POST['alcoquantity'];
        $alco_beverage= $_POST['alco_beverage'];
        $snacksbeverage= $_POST['snacksbeverage'];
        $fd = $_POST['fd'];
        $bftiming= $_POST['bftiming'];
        $bfmenu= $_POST['bfmenu'];
        $bfquantity= $_POST['bfquantity'];
        $mmsnacks= $_POST['mmsnacks'];
        $mmsnacksmenu= $_POST['mmsnacksmenu'];
        $mmsnacksquantity= $_POST['mmsnacksquantity'];
        $lunch= $_POST['lunch'];
        $lunch_menu= $_POST['lunch_menu'];
        $lunch_quantity= $_POST['lunch_quantity'];
        $me_timing= $_POST['me_timing'];
        $memenu= $_POST['memenu'];
        $mequantity= $_POST['mequantity'];
        $dinner= $_POST['dinner'];
        $dinner_menu= $_POST['dinner_menu'];
        $dinner_quatinty= $_POST['dinner_quatinty'];
        $before_bed= $_POST['before_bed'];
        $bbmenu= $_POST['bbmenu'];
        $bbquantity= $_POST['bbquantity'];
        $admin_name = $_SESSION['login'];
        $asses_date = $_POST['asses_date'];
        $fd = $_POST['fd'];
        $PostDate = date('d/m/Y');
        //Fetch User Details
        $queryinv = mysqli_query($con, "Insert into tbl_diet 
        ( activity, bmi, ibw, eat_outside, pfeo, cdiet, dietpref, allergic, gutissue, alcohol, alcotime, alcoquantity, alco_beverage, snacksbeverage,fd, bftiming, bfmenu, bfquantity, mmsnacks, mmsnacksmenu, mmsnacksquantity, lunch, lunch_menu, lunch_quantity, me_timing, memenu, mequantity, dinner, dinner_menu, dinner_quatinty, before_bed, bbmenu, bbquantity, admin_name, patient_name, patient_id)
        values('$activity','$bmi','$ibw','$eat_outside','$pfeo','$cdiet','$dietpref','$allergic','$gutissue','$alcohol','$alcotime','$alcoquantity','$alco_beverage','$snacksbeverage','$fd','$bftiming','$bfmenu','$bfquantity','$mmsnacks','$mmsnacksmenu','$mmsnacksquantity','$lunch','$lunch_menu','$lunch_quantity','$me_timing','$memenu','$mequantity','$dinner','$dinner_menu','$dinner_quatinty','$before_bed','$bbmenu','$bbquantity','$admin_name','$username','$sid')");
        if ($queryinv) {
            echo "<script>alert('Report is successfuly Added');</script>";
        } else {
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
                                    <h6 class="mb-0 text-uppercase">Dietary Assessment</h6>
                                    <hr>
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
                                                        <option value="Not Active">Not Active</option>
                                                        <option value="Somewhat Active">Somewhat Active</option>
                                                        <option value="Highly Active">Highly Active</option>
                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>BMI</td>
                                                <td>
                                                    <input type="text" name="bmi" class="form-control"
                                                        placeholder="Enter BMI">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Ideal Body Mass(IBW)</td>
                                                <td>
                                                    <input type="text" name="ibw" class="form-control"
                                                        placeholder="Enter Ideal Body Mass">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>How frequently do you eat outside?</td>
                                                <td>
                                                    <select class="form-control" name="eat_outside" id="eat_outside">
                                                        <option value="">Choose an option</option>
                                                        <option value="Occasionally">Occasionally</option>
                                                        <option value="Weekly Twice">Weekly Twice</option>
                                                        <option value="Everyday">Everyday</option>
                                                        <option value="Always Prefer Homemade food">Always Prefer
                                                            Homemade food</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Type of food prefer outside?</td>
                                                <td>
                                                    <select class="form-control" name="pfeo" id="pfeo">
                                                        <option value="">Choose an option</option>
                                                        <option value="North Indian">North Indian</option>
                                                        <option value="South Indian">South Indian</option>
                                                        <option value="Continental">Continental</option>
                                                        <option value="Fast food">Fast food</option>
                                                        <option value="Street food">Street food</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Following any diet?</td>
                                                <td>
                                                    <input type="text" name="cdiet" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Diet Preference</td>
                                                <td>
                                                    <select class="form-control" name="dietpref" id="dietpref">
                                                        <option value="">Choose an option</option>
                                                        <option value="Vegetarian">Vegetarian</option>
                                                        <option value="Ova Vegetarian">Ova Vegetarian</option>
                                                        <option value="Non-vegetarian">Non-vegetarian</option>
                                                        <option value="Vegan">Vegan</option>
                                                        <option value="Jain">Jain</option>
                                                        <option value="Other">other</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Are you allergic to any of the following?</td>
                                                <td>
                                                    <select class="form-control" name="allergic" id="allergic">
                                                        <option value="">Choose an option</option>
                                                        <option value="Milk">Milk</option>
                                                        <option value="Egg">Egg</option>
                                                        <option value="Fish">Fish</option>
                                                        <option value="Shelfish">Shelfish</option>
                                                        <option value="Tree Nuts">Tree Nuts</option>
                                                        <option value="Wheat">Wheat</option>
                                                        <option value="Ground nuts">Ground nuts</option>
                                                        <option value="Soyabean">Soyabean</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Any gut issues before/after meal</td>
                                                <td>
                                                    <select class="form-control" name="gutissue" id="gutissue">
                                                        <option value="">Choose an option</option>
                                                        <option value="Heartburn">Heartburn</option>
                                                        <option value="Bloating">Bloating</option>
                                                        <option value="Flatulence">Flatulence</option>
                                                        <option value="Loose stools">Loose stools</option>
                                                        <option value="Stomach Pain">Stomach Pain</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Do you consume alcohol?</td>
                                                <td>
                                                    <select class="form-control" name="alcohol" id="alcohol" onchange="myFunction()">
                                                        <option value="">Choose an option</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>How often do you have alcoholic drinks?</td>
                                                <td>
                                                    <select class="form-control" name="alcotime" id="alcotime">
                                                        <option value="">Choose an option</option>
                                                        <option value="Never">Never</option>
                                                        <option value="Monthly  or less">Monthly or less</option>
                                                        <option value="2-4 times in a week">2-4 times in a week</option>

                                                        <option value="4 or more times">4 or more times</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>How many drinks you have on a typical day?</td>
                                                <td>
                                                    <select class="form-control" name="alcoquantity" id="alcoquantity">
                                                        <option value="">Choose an option</option>
                                                        <option value="1 or 2">1 or 2</option>
                                                        <option value="3 or 4">3 or 4</option>
                                                        <option value="5 or 6">5 or 6</option>
                                                        <option value="7 or 9">7 or 9</option>
                                                        <option value="10 or more">10 or more</option>
                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Which type of alcoholic beverages do you prefer?</td>
                                                <td>
                                                    <select class="form-control" name="alco_beverage"
                                                        id="alco_beverage">

                                                        <option value="">Choose an option</option>
                                                        <option value="Beer">Beer</option>
                                                        <option value="Wine">Wine</option>

                                                        <option value="Hardwine">Hard wine</option>
                                                    </select>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td>which type of snacks you prefer with alcoholic beverages?</td>
                                                <td>
                                                    <input type="text" name="snacksbeverage" id="snacksbeverage" class="form-control">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Food dislikes?</td>
                                                <td>
                                                    <input type="text" name="fd" id="fd" class="form-control">
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
                                                <td><input type="text" name="bftiming" class="form-control"></td>
                                                <td><textarea name="bfmenu" class="form-control"></textarea></td>
                                                <td><textarea name="bfquantity" class="form-control"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Mid Morning Snacks</td>
                                                <td><input type="text" name="mmsnacks" class="form-control"></td>
                                                <td><textarea name="mmsnacksmenu" class="form-control"></textarea></td>
                                                <td><textarea name="mmsnacksquantity" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Lunch</td>
                                                <td><input type="text" name="lunch" class="form-control"></td>
                                                <td><textarea name="lunch_menu" class="form-control"></textarea></td>
                                                <td><textarea name="lunch_quantity" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Mid Evening Snacks</td>
                                                <td><input type="text" name="me_timing" class="form-control"></td>
                                                <td><textarea name="memenu" class="form-control"></textarea></td>
                                                <td><textarea name="mequantity" class="form-control"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>Dinner</td>
                                                <td><input type="text" name="dinner" class="form-control"></td>
                                                <td><textarea name="dinner_menu" class="form-control"></textarea></td>
                                                <td><textarea name="dinner_quatinty" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Before Bed</td>
                                                <td><input type="text" name="before_bed" class="form-control"></td>
                                                <td><textarea name="bbmenu" class="form-control"></textarea></td>
                                                <td><textarea name="bbquantity" class="form-control"></textarea></td>
                                            </tr>
                                        </table>

                                        <div class="col-12 d-flex justify-content-center">
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

    <script>
    function myFunction() {
        var a = document.getElementById('alcohol').value;
        if (a == 'No') {
            document.getElementById("alcotime").disabled = true;
            document.getElementById("alcoquantity").disabled = true;
            document.getElementById("alco_beverage").disabled = true;
            document.getElementById("snacksbeverage").disabled = true;
           
        } else {
            document.getElementById("alcotime").disabled = false;
            document.getElementById("alcoquantity").disabled = false;
            document.getElementById("alco_beverage").disabled = false;
            document.getElementById("snacksbeverage").disabled = false;
        }

    }
    </script>
</body>

</html>
<?php } ?>