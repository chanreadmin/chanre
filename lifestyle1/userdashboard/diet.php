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
    <!-- BEGIN PRELOADING -->

    <!-- END PRELOADING -->
    <!-- HEADER -->
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
    <!-- END HEADER -->
    <!-- SIDE NAV-->
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
                            <span class="theme-secondary-color"><small>Date: <?php echo $exdate;?></small></span>
                        </div>

                        <div class="section-title">
                            <span class="theme-secondary-color"></span> Breakfast
                        </div>
                    </div>
                </div>
                <div class="row row-no-margin">
                    <!-- Product item-->
                    <?php $query = mysqli_query($con, "Select tbl_dietlist.id, tbl_dietlist.item, tbl_assigndiet.quantity, 
                                        tbl_assigndiet.diet_id,tbl_assigndiet.type from tbl_dietlist INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id  AND tbl_assigndiet.type = 'Breakfast' where tbl_assigndiet.patient_name = '$username'  ");
        while($rows = mysqli_fetch_array($query))
        {
        ?>
                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">

                                    <h5><a href="#"><?php echo htmlentities($rows['item']);?></a></h5>
                                    <div class="price">
                                        <span>Quantity <?php echo htmlentities($rows['quantity']);?></span>
                                    </div>
                                    <br>
                                </div>
                                <div class="bp-bottom">
                                    <a href="diet-details.php?did=<?php echo htmlentities($rows['diet_id']);?>"
                                        class="btn button-add-cart">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color"></span> Mid Morning Snacks
                        </div>
                    </div>
                </div>
                <div class="row row-no-margin">
                    <!-- Product item-->
                    <?php $query = mysqli_query($con, "Select tbl_dietlist.id, tbl_dietlist.item, tbl_assigndiet.quantity, 
                                        tbl_assigndiet.diet_id,tbl_assigndiet.type from tbl_dietlist INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id  AND tbl_assigndiet.type = 'Mid Morning Snacks' where tbl_assigndiet.patient_name = '$username' ");
        while($rows = mysqli_fetch_array($query))
        {
        ?>
                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">

                                    <h5><a href="#"><?php echo htmlentities($rows['item']);?></a></h5>
                                    <div class="price">
                                        <span>Quantity <?php echo htmlentities($rows['quantity']);?></span>
                                    </div>
                                    <br>
                                </div>
                                <div class="bp-bottom">
                                    <a href="diet-details.php?did=<?php echo htmlentities($rows['diet_id']);?>"
                                        class="btn button-add-cart">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color"></span> Lunch
                        </div>
                    </div>
                </div>
                <div class="row row-no-margin">
                    <!-- Product item-->
                    <?php $query = mysqli_query($con, "Select tbl_dietlist.id, tbl_dietlist.item, tbl_assigndiet.quantity, 
                                        tbl_assigndiet.diet_id,tbl_assigndiet.type from tbl_dietlist INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id  AND tbl_assigndiet.type = 'Lunch' where tbl_assigndiet.patient_name = '$username' ");
        while($rows = mysqli_fetch_array($query))
        {
        ?>
                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">

                                    <h5><a href="#"><?php echo htmlentities($rows['item']);?></a></h5>
                                    <div class="price">
                                        <span>Quantity <?php echo htmlentities($rows['quantity']);?></span>
                                    </div>
                                    <br>
                                </div>
                                <div class="bp-bottom">
                                    <a href="diet-details.php?did=<?php echo htmlentities($rows['diet_id']);?>"
                                        class="btn button-add-cart">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color"></span> Mid Evening Snacks
                        </div>
                    </div>
                </div>
                <div class="row row-no-margin">
                    <!-- Product item-->
                    <?php $query = mysqli_query($con, "Select tbl_dietlist.id, tbl_dietlist.item, tbl_assigndiet.quantity, 
                                        tbl_assigndiet.diet_id,tbl_assigndiet.type from tbl_dietlist INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id  AND tbl_assigndiet.type = 'Mid Evening Snacks' where tbl_assigndiet.patient_name = '$username' ");
        while($rows = mysqli_fetch_array($query))
        {
        ?>
                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">

                                    <h5><a href="#"><?php echo htmlentities($rows['item']);?></a></h5>
                                    <div class="price">
                                        <span>Quantity <?php echo htmlentities($rows['quantity']);?></span>
                                    </div>
                                    <br>
                                </div>
                                <div class="bp-bottom">
                                    <a href="diet-details.php?did=<?php echo htmlentities($rows['diet_id']);?>"
                                        class="btn button-add-cart">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color"></span> Dinner
                        </div>
                    </div>
                </div>
                <div class="row row-no-margin">
                    <!-- Product item-->
                    <?php $query = mysqli_query($con, "Select tbl_dietlist.id, tbl_dietlist.item, tbl_assigndiet.quantity, 
                                        tbl_assigndiet.diet_id,tbl_assigndiet.type from tbl_dietlist INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id  AND tbl_assigndiet.type = 'Dinner' where tbl_assigndiet.patient_name = '$username' ");
        while($rows = mysqli_fetch_array($query))
        {
        ?>
                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">

                                    <h5><a href="#"><?php echo htmlentities($rows['item']);?></a></h5>
                                    <div class="price">
                                        <span>Quantity <?php echo htmlentities($rows['quantity']);?></span>
                                    </div>
                                    <br>
                                </div>
                                <div class="bp-bottom">
                                    <a href="diet-details.php?did=<?php echo htmlentities($rows['diet_id']);?>"
                                        class="btn button-add-cart">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color"></span>Before Bed
                        </div>
                    </div>
                </div>
                <div class="row row-no-margin">
                    <!-- Product item-->
                    <?php $query = mysqli_query($con, "Select tbl_dietlist.id, tbl_dietlist.item, tbl_assigndiet.quantity, 
                                        tbl_assigndiet.diet_id,tbl_assigndiet.type from tbl_dietlist INNER JOIN tbl_assigndiet
                                        ON tbl_dietlist.id = tbl_assigndiet.diet_id  AND tbl_assigndiet.type = 'Before Bed' where tbl_assigndiet.patient_name = '$username' ");
        while($rows = mysqli_fetch_array($query))
        {
        ?>
                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">

                                    <h5><a href="#"><?php echo htmlentities($rows['item']);?></a></h5>
                                    <div class="price">
                                        <span>Quantity <?php echo htmlentities($rows['quantity']);?></span>
                                    </div>
                                    <br>
                                </div>
                                <div class="bp-bottom">
                                    <a href="diet-details.php?did=<?php echo htmlentities($rows['diet_id']);?>"
                                        class="btn button-add-cart">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" name="feedback" placeholder="Enter today's feedback">
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