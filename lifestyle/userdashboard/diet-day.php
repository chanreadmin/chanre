<?php 


session_start();
include('layout/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  $username = $_SESSION['login'];
  date_default_timezone_set('Asia/Kolkata');
  $exdate=date("d-m-Y");
  $compdate1=date("Y-m-d");
  if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kolkata');
    $dietdate=date("d-m-Y");
    $extime=date("h:i:s");
    $patient_feedback = $_POST['feedback'];
    $compdate2 = $_POST['startdays'];
    $sid = intval($_GET['did']);
     $fetquery = mysqli_query($con, "Select * from tbl_assigndiet where patient_name = '$username' AND id = '$sid' ");
     while($rowz = mysqli_fetch_array($fetquery)){
        $sdate = $rowz['enddays'];
     }
     if($sdate != 0){
        echo '<script type="text/javascript">alert("Something is wrong");</script>';
     }
     else{
        if($compdate1 == $compdate2){
            $addActivity = mysqli_query($con, "update tbl_assigndiet SET enddays='$dietdate',patient_feedback='$patient_feedback' where patient_name = '$username' AND id = '$sid'");
        if($addActivity){
         $success = "Thanks for submitting";
        }else{
            $suberr = "Something is wrong";
        }
        }
        else{
            $uperr = "Oops!! you are missing the date ".$compdate2.". ";
        }
     }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Diet List </title>
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="HandheldFriendly" content="True">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- CSS  -->
    <link rel="stylesheet" href="lib/font-awesome/web-fonts-with-css/css/fontawesome-all.css">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- materialize icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="lib/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" type="text/css" href="lib/slick/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="lib/slick/slick/slick-theme.css">
    <!-- Magnific Popup core CSS file -->
    <link rel="stylesheet" href="lib/Magnific-Popup-master/dist/magnific-popup.css">
</head>

<body id="homepage">
    <header id="header" class="header-innerpage ">
        <div class="nav-wrapper container">
            <div class="header-menu-button">
                <a href="#" data-activates="nav-mobile-category" class="button-collapse" id="button-collapse-category">
                    <div class="cst-btn-menu">
                        <i class="fas fa-align-left"></i>
                    </div>
                </a>
            </div>
            <div class="header-logo">
                <a href="#" class="nav-logo">ChanRe Care</a>
            </div>
            <div class="header-icon-menu">
                <!-- <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i class="fas fa-search"></i></a> -->
            </div>
        </div>
    </header>
    <nav>
        <!-- LEFT SIDENAV-->
        <?php include('layout/leftnav.php')?>
        <!-- END LEFT SIDENAV-->
    </nav>
    <!-- END SIDENAV-->
    <!-- CONTENT -->
    <div id="page-content">
        <div class="section product-item">
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <!-- <span class="theme-secondary-color"><small>Date: <?php /* echo  $exdate; */ ?></small></span> -->
                        </div>
                        <div class="section-title">
                                <span class="text-success"><?php echo $success; ?></span>
                                <span class="text-danger"><?php echo $suberr; ?></span>
                                <span class="text-danger"><?php echo $uperr; ?></span>
                        </div>
                        <!-- product -->
                        <?php
                        $sid = intval($_GET['did']);
                        $getquery = mysqli_query($con, "select * from tbl_assigndiet where id= '$sid'");
                        while($rows= mysqli_fetch_array($getquery)){

                            $startdays = $rows['startdays'];
                        ?>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Day <?php echo htmlentities($rows['days']);?></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Timing</th>
                                        <th>Food</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>Breakfast</b></td>
                                        <td><?php echo htmlentities($rows['bfitem']);?></td>
                                        <td><?php echo htmlentities($rows['bfquantity']);?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Mid Morning Snacks</b></td>
                                        <td><?php echo htmlentities($rows['mmsitem']);?></td>
                                        <td><?php echo htmlentities($rows['mmsquantity']);?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Lunch</b></td>
                                        <td><?php echo htmlentities($rows['lunchitem']);?></td>
                                        <td><?php echo htmlentities($rows['lunchquantity']);?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Evening Snacks</b></td>
                                        <td><?php echo htmlentities($rows['mesitem']);?></td>
                                        <td><?php echo htmlentities($rows['mesquantity']);?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Dinner</b></td>
                                        <td><?php echo htmlentities($rows['dinner']);?></td>
                                        <td><?php echo htmlentities($rows['dinnerquantity']);?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Before Bed</b></td>
                                        <td><?php echo htmlentities($rows['bbitem']);?></td>
                                        <td><?php echo htmlentities($rows['bbquantity']);?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Instruction:</b></td>
                                        <td colspan="2"><?php echo htmlentities($rows['feedback_text']);?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>
                                
                            </div>
                        </div>
                        <?php } ?>
                        <!-- product -->
                    </div>
                </div>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" name="startdays" value="<?php echo $startdays;?>"
                                    placeholder="Enter today's feedback" required hidden>
                            </div>
                            <div class="form-group">
                                <input type="text" name="feedback" placeholder="Enter today's feedback" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit">Done</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGINATION -->
        <!-- END PAGINATION -->

        <!-- END FOOTER -->
        <!-- Script -->
        <script data-cfasync="false"
            src="https://uidevr.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/materialize.min.js"></script>
        <!-- Owl carousel -->
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <!-- Magnific Popup core JS file -->
        <script src="lib/Magnific-Popup-master/dist/jquery.magnific-popup.js"></script>
        <!-- Slick JS -->
        <script src="lib/slick/slick/slick.min.js"></script>
        <!-- Custom script -->
        <script src="js/custom.js"></script>
</body>

</html>
<?php } ?>