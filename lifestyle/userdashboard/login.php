<?php 

include('layout/config.php');
session_start();
if(isset($_POST['login']))
{
$user_email=$_POST['user_email'];
$password=$_POST['user_password'];
$myquery=mysqli_query($con,"Select * from tbl_users where (useremail='$user_email' || username='$user_email') AND isUser = 1");

while($rows=mysqli_fetch_array($myquery))
{ 
  if($rows>0)
  {
    $hashpassword=$rows['userpassword'];
    if (password_verify($password, $hashpassword)) {
    $_SESSION['login']=$_POST['user_email'];
    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
  } 
  else {
 echo "<script>alert('Wrong Password');</script>";
 echo "<script > document.location ='login.php'; </script>";
  }
  }
  else{
    echo "<script>alert('User not registered with us');</script>";
    echo "<script > document.location ='login.php'; </script>";
  }
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>LMD</title>
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
    <div class="preloading">
        <div class="wrap-preload">
            <div class="cssload-loader"></div>
        </div>
    </div>
    <!-- END PRELOADING -->
    <!-- HEADER -->
    <header id="header" class="header-innerpage ">
        <div class="nav-wrapper container">
            <div class="header-menu-button">
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
        <ul id="nav-mobile-category" class="side-nav">
            <li class="profile">
                <div class="li-profile-info">
                    <img src="img/profile4.jpg" alt="profile">
                    <h2>John Doe</h2>
                    <div class="emailprofile"><a href="https://uidevr.com/cdn-cgi/l/email-protection"
                            class="__cf_email__"
                            data-cfemail="b6d3dbd7dfdaf6d3dbd7dfda98d5d9db">[email&#160;protected]</a></div>
                    <div class="balance">
                        Balance : <span>$600</span>
                    </div>
                </div>
                <div class="bg-profile-li">
                    <img alt="photo" src="img/bg-profile.jpg">
                </div>
            </li>
            <li>
                <a class="waves-effect waves-blue" href="index.html"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="our-doctors.html"><i class="fas fa-user-md"></i>Our Doctors</a>
            </li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="fas fa-shopping-bag"></i>Shop<span><i class="fas fa-caret-down"></i></span>
                        </div>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a class="waves-effect waves-blue" href="product-list.html"><i
                                            class="fas fa-angle-right"></i>Product List</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="wish-list.html"><i
                                            class="fas fa-angle-right"></i>Wish List</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="product-page.html"><i
                                            class="fas fa-angle-right"></i>Product Page</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="shopping-cart.html"><i
                                            class="fas fa-angle-right"></i>Shopping Cart</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="checkout.html"><i
                                            class="fas fa-angle-right"></i>Checkout</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="far fa-newspaper"></i>News Blog<span><i class="fas fa-caret-down"></i></span>
                        </div>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a class="waves-effect waves-blue" href="news-list.html"><i
                                            class="fas fa-angle-right"></i>News List</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="news-page.html"><i
                                            class="fas fa-angle-right"></i>News Page</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="gallery.html"><i class="fas fa-camera-retro"></i>Gallery</a>
            </li>
            <li>
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-header">
                            <i class="fas fa-columns"></i>Pages <span><i class="fas fa-caret-down"></i></span>
                        </div>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a class="waves-effect waves-blue" href="index.html"><i
                                            class="fas fa-angle-right"></i>Home</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="setting.html"><i
                                            class="fas fa-angle-right"></i>Setting</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="404.html"><i
                                            class="fas fa-angle-right"></i>404</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="login.html"><i
                                            class="fas fa-angle-right"></i>Sign In</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="signup.html"><i
                                            class="fas fa-angle-right"></i>Sign Up</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="single-page.html"><i
                                            class="fas fa-angle-right"></i>Single page</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="news-list.html"><i
                                            class="fas fa-angle-right"></i>News List</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="news-page.html"><i
                                            class="fas fa-angle-right"></i>News Page</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="gallery.html"><i
                                            class="fas fa-angle-right"></i>Gallery</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="product-list.html"><i
                                            class="fas fa-angle-right"></i>Product List</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="wish-list.html"><i
                                            class="fas fa-angle-right"></i>Wish List</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="product-page.html"><i
                                            class="fas fa-angle-right"></i>Product Page</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="shopping-cart.html"><i
                                            class="fas fa-angle-right"></i>Shopping Cart</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="checkout.html"><i
                                            class="fas fa-angle-right"></i>Checkout</a>
                                </li>
                                <li>
                                    <a class="waves-effect waves-blue" href="contact.html"><i
                                            class="fas fa-angle-right"></i>Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="setting.html"><i class="fas fa-cog"></i>Setting</a>
            </li>
            <li>
                <a href="contact.html"><i class="fas fa-envelope"></i>Contact Us</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
            </li>
        </ul>
        <!-- END LEFT SIDENAV-->
        <!-- RIGHT SIDENAV-->
        <ul id="nav-mobile-account" class="side-nav">
            <li class="sidenav-logo">
                Search
            </li>
            <li>
                <div class="search-wrapper ">
                    <input id="search"><i class="material-icons">search</i>
                    <div class="search-results"></div>
                </div>
            </li>
            <li>
                <ul class="sidenav-search-result">
                    <li class="search-result-head"><a href="#">Search result</a></li>
                    <li><a href="#">Info - Healt Care Solution</a></li>
                    <li><a href="#">info - 5 ways to winterproof your skin </a></li>
                    <li><a href="#">info - 4 healthy snacks to keep you full </a></li>
                </ul>
            </li>
            <li>
                <ul class="sidenav-search-result">
                    <li class="search-result-head"><a href="#">Populer tag</a></li>
                    <li>
                        <div class="section populer-search">
                            <div class="list-tag-word">
                                <a class="tag-word">Doctor</a>
                                <a class="tag-word">Medicine</a>
                                <a class="tag-word">Hospital</a>
                                <a class="tag-word">health</a>
                                <a class="tag-word">drink</a>
                                <a class="tag-word">sport</a>
                                <a class="tag-word">Checkup</a>
                            </div>
                        </div>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- END RIGHT SIDENAV-->
    </nav>
    <!-- END SIDENAV-->
    <!-- CONTENT -->
    <div id="page-content">
        <div class="login-form">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color">LOGIN</span> ACCOUNT
                        </div>
                    </div>
                </div>
                <div class="row">
                    <form class="col s12" method="post">
                        <div class="row">
                            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                <input id="username" name="user_email" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                <input id="password" type="password" name="user_password" class="validate">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                                <button class="waves-effect waves-light btn" type="submit" name="login">Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row fp-text">
                    <div class="col s12">
                        <div class="forgot-password-link">
                            <a href="requestReset.php">Forgot Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT-->
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