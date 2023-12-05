<?php 


session_start();
include('layout/config.php');
error_reporting(0);

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
    <title>ChanRe Care</title>
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
    
    <header id="header">
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
        <!-- RIGHT SIDENAV-->
        <!-- END RIGHT SIDENAV-->
    </nav>
    <!-- END SIDENAV-->
    <!-- MAIN SLIDER -->
    <div class="main-slider" data-indicators="true">
        <div class="carousel carousel-slider " data-indicators="true">
            <a class="carousel-item"><img src="img/slide.jpg" alt="slider"></a>
            <a class="carousel-item"><img src="img/slide2.jpg" alt="slider"></a>
            <a class="carousel-item"><img src="img/slide.jpg" alt="slider"></a>
        </div>
    </div>
    <!-- END MAIN SLIDER -->
    <!-- CATEGORY -->
    <div class="section home-category">
        <div class="container">
            <div class="row icon-service">
                <div class="col s4 m4 l2"><a class="icon-content">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <a href="excercise.php"><img src="img/excercise.png" alt="category"></a>
                                    <h5>Excercise</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s4 m4 l2"><a class="icon-content">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <a href="diet.php"><img src="img/diet.png" alt="category"></a>
                                    <h5>Diet</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s4 m4 l2"><a class="icon-content">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <a href="physician.php"><img src="img/doctor.png" alt="category"></a>

                                    <h5>Physician</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s4 m4 l2"><a class="icon-content">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="img/store.png" alt="category">
                                    <h5>Find<br>Medicine</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s4 m4 l2"><a class="icon-content">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="img/medical-report.png" alt="category">
                                    <h5>Medical<br>Records</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col s4 m4 l2"><a class="icon-content">
                        <div class="content fadetransition">
                            <div class="in-content">
                                <div class="in-in-content">
                                    <img src="img/stethoscope.png" alt="category">
                                    <h5>Health<br>Information</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END CATEGORY -->
    <!-- PROMO -->
    <div class="section promo">
        <div class="container">
            <div class="col s12">
                <img src="img/promo.jpg" alt="promo">
            </div>
        </div>
    </div>
    <!-- END PROMO -->
    <!-- NEWS -->
    <div class="section list-news">
        <div class="container">
            <div class="row row-title">
                <div class="col s12">
                    <div class="section-title">
                        <span class="theme-secondary-color">HEALTH</span> INFORMATION
                    </div>
                </div>
            </div>
            <div class="row row-list-news">
                <div class="col s12">

                    <!-- News item-->
                    <div class="news-item">
                        <div class="news-tem-image">
                            <img src="img/news1.jpg">
                        </div>
                        <div class="news-item-info">
                            <div class="list-news-title">
                                Benefits of ginger drink
                            </div>
                            <!-- Consectetur adipiscing elit, ut labore et dolore magna aliqua...
                            <a href="news-page.html" class="readmore">Read More</a> -->
                        </div>
                    </div>
                    <!-- End news item-->
                    <!-- News item-->
                    <div class="news-item">
                        <div class="news-tem-image">
                            <img src="img/news2.jpg">
                        </div>
                        <div class="news-item-info">
                            <div class="list-news-title">
                                How to maintain body endurance
                            </div>
                            <!-- sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...
                            <a href="news-page.html" class="readmore">Read More</a> -->
                        </div>
                    </div>
                    <!-- End news item-->
                    <!-- News item-->
                    <div class="news-item">
                        <div class="news-tem-image">
                            <img src="img/news3.jpg">
                        </div>
                        <div class="news-item-info">
                            <div class="list-news-title">
                                How Do You Treat a Cold or the Flu?
                            </div>
                            <!-- Excepteur sint occaecat cupidatat non proident, sunt in culpa qui...
                            <a href="news-page.html" class="readmore">Read More</a> -->
                        </div>
                    </div>
                    <!-- End news item-->
                    <div class="more-news-list">
                        <a class="more-btn" href="#">See More News &gt;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- END NEWS -->
    <!-- FEATURED PRODUCT -->

    <!-- END FEATURED PRODUCT -->


    <!-- TESTIMONIAL  -->

    <!-- END TESTIMONIAL  -->
    <!-- SUBSCRIBE -->

    <!-- END SUBSCRIBE -->
    <!-- FOOTER  -->

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