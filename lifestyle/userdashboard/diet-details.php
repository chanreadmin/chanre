<?php 
session_start();
include('layout/config.php');
error_reporting(0);

$diet_no = intval($_GET['did']);
if(strlen($_SESSION['login'])==0)
  { 
header('location:login.php');
}
else{
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chanre Care</title>
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
    <!-- <div class="preloading">
        <div class="wrap-preload">
            <div class="cssload-loader"></div>
        </div>
    </div> -->
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
                <a href="#" class="nav-logo">Chanre Care</a>
            </div>
            <div class="header-icon-menu">
            </div>
        </div>
    </header>
    <!-- END HEADER -->
    <!-- SIDE NAV-->
    <nav>
        <!-- LEFT SIDENAV-->
        <?php include('layout/leftnav.php');?>
        <!-- END LEFT SIDENAV-->
    </nav>
    <!-- END SIDENAV-->
    <!-- CONTENT -->
    <div id="page-content" class="product-page">
        <br>
        <?php
        $food = $_GET['name'];
        
        $iquery = mysqli_query($con, "SELECT * from tbl_dietlist WHERE item = '$food' ");
             while ($frows = mysqli_fetch_array($iquery)) {
          ?>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="name-price">
                        <div class="pg-product-name"><?php echo htmlentities($frows['item']);?></div>

                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="qty-total-price">
            <div class="container">
                <div class="row">
                    <table>
                        <tr>
                            <td>Calories</td>
                            <td><?php echo htmlentities($frows['calories']);?>Kcal</td>
                        </tr>
                        <tr>
                            <td>Protein</td>
                            <td><?php echo htmlentities($frows['protien']);?>g</td>
                        </tr>
                        <tr>
                            <td>Carbohydrate</td>
                            <td><?php echo htmlentities($frows['carbohydrate']);?>g</td>
                        </tr>
                        <tr>
                            <td>Fat</td>
                            <td><?php echo htmlentities($frows['fat']);?>g</td>
                        </tr>
                        <tr>
                            <td>Fibre</td>
                            <td><?php echo htmlentities($frows['fibre']);?>g</td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- END CONTENT -->
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