<?php 


session_start();
include('layout/config.php');
error_reporting(0);
$username = $_SESSION['login'];
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
 
  date_default_timezone_set('Asia/Kolkata');
  $exdate=date("d-m-Y");
  if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kolkata');
    $dietdate=date("d/m/Y");
    $extime=date("h:i:s");
    $feedback = $_POST['feedback'];
    $getUser = mysqli_query($con, "select * from tbl_users where username = '$username'");
    while($rows= mysqli_fetch_array($getUser))
    {
        $patient_id = $rows['id'];
    }
    $getDiet = mysqli_query($con,"Select * from diet_track where dietdate = '$dietdate' AND patient_name = '$username' ");
    $rowcount=mysqli_num_rows($getDiet);
    if($rowcount>0){
        $addActivity= mysqli_query($con,"update diet_track set patient_name='$username',patient_id = '$patient_id',
        dietdate = '$dietdate'");
    }else{
        $addActivity = mysqli_query($con,"INSERT INTO diet_track (patient_name,patient_id,dietdate, feedback) 
   VALUES('$username','$patient_id','$dietdate','$feedback');");
    }

   

   if($addActivity){
    echo '<script type="text/javascript">alert("Thank you");</script>';
   }else{
    echo '<script type="text/javascript">alert("Something is wrong");</script>';
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
            </div>
        </div>
    </header>
    <nav>
        <?php include('layout/leftnav.php')?>
    </nav>
    <div id="page-content">
        <div class="section product-item">
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <!-- <span class="theme-secondary-color"><small>Date: <?php echo $exdate;?></small></span> <br> -->
                            <span>Excercise</span>
                        </div>
                        <?php $getquery = mysqli_query($con, "SELECT DISTINCT startdays,id,days,month,week from tbl_assign_excercise where patient_username ='$username'");
                        while($rows= mysqli_fetch_array($getquery)){
                        ?>
                        <a href="excercise-day.php?did=<?php echo htmlentities($rows['id']);?>">
                            <div>
                                <div class="col s4 m4 l3 col-produc">
                                    <div class="box-product">
                                        <div class="bp-top">
                                            <div class="item-info">M: <?php echo htmlentities($rows['month']);?> - W:
                                                <?php echo htmlentities($rows['week']);?></div>
                                            <div class="item-info">Day: <?php echo htmlentities($rows['days']);?></div>
                                            <div>
                                                <small><?php  
                                            $tdate=date_create($rows['startdays']);
                                            echo date_format($tdate,"d-m-Y");
                                            ?></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       
                    </div>
                </div>
            </div>
        </div>
        
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