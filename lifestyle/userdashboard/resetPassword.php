<?php 
require 'layout/config.php'; 
if (!isset($_GET['code'])) {
	exit("can't find the page"); 
}

$code = $_GET['code']; 
$getCodequery = mysqli_query($con, "SELECT * FROM resetpasswords WHERE code = '$code'"); 
if (mysqli_num_rows($getCodequery) == 0) {
	exit("Can't find the page because not same code"); 
}

// handling the form 
if (isset($_POST['password'])) {
	$pw = $_POST['password']; 
	$pw=password_hash($pw, PASSWORD_DEFAULT); // not the best option but for demo simpilicity
	// $pw = md5($pw); // not the best option but for demo simpilicity
	$row = mysqli_fetch_array($getCodequery); 
	$email = $row['email']; 
	$query = mysqli_query($con, "UPDATE tbl_users SET userpassword = '$pw' WHERE useremail = '$email'");

	if ($query) {
	 	$query = mysqli_query($con, "DELETE FROM resetpasswords WHERE code ='$code'"); 
	 	exit('Password updated'); 
        	
 	 }else {
 	 	exit('Something went wrong :('); 	
 	 } 	 
}


?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no, viewport-fit=cover">

    <link rel="apple-touch-icon" href="img/f7-icon-square.html">
    <link rel="icon" href="img/f7-icon.html">
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

    <title>Forgot Password</title>

</head>

<body class="color-theme-blue">
    <div class="loader justify-content-center ">
        <div class="maxui-roller align-self-center">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div class="wrapper">
        <!-- page main start -->
        <div id="page-content">
            <div class="register-form">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="section-title">
                                <span class="theme-secondary-color">PASSWORD</span> RESET
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <form class="col s12">
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                    <input id="username" type="text" class="validate">
                                    <label for="username">Select a Username</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                    <input id="email" type="email" class="validate">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                    <input id="password" type="password" class="validate">
                                    <label for="password">Enter a Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                    <input id="repassword" type="password" class="validate">
                                    <label for="repassword">Confirm Password</label>
                                </div>
                            </div>
                            <div class="row row-forgot">
                                <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                                    <a class="forgotr" href="login.html">Already registered? Sign in here</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                                    <input class="waves-effect waves-light btn" value="SIGN UP NOW" type="submit">
                                </div>
                            </div>
                        </form> -->

                        <!-- <h5 class="text-white mb-4">Reset Password</h5> -->
                        <div class="login-input-content ">

                            <form method="post" class="col s12">
                                <h6 align="center" class="text-danger">Please enter your new password</h6>
                                <div class="row">
                                    <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="New password">
                                    </div>
                                </div>

                                <div class="form-group" align="center">
                                    <input type="submit" name="submit" value="Update password">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page main ends -->

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

<!--


<h5 class="text-white mb-4">Reset Password</h5>
                        <div class="login-input-content ">

                            <form method="post">
                                <h6 align="center" class="text-danger">Please enter your registered email.</h6>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control"
                                        placeholder="New password">
                                </div>
                                <div class="form-group" align="center">
                                    <input type="submit" name="submit" value="Update password">
                                </div>


                            </form>
                        </div>
 -->