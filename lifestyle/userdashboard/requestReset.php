<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'layout/config.php';

if (isset($_POST['submit'])) { 

    $emailTo = $_POST['email']; 
    $mail = new PHPMailer(true);// Passing `true` enables exceptions
    $code = uniqid(true); // true for more uniqueness 
    $query = mysqli_query($con,"INSERT INTO resetpasswords (code, email) VALUES('$code','$emailTo')"); 
    if (!$query) {
       exit('Error'); 
    }
    try {
        //Server settings
        $mail->SMTPDebug = 0;     // Enable verbose debug output, 1 for produciton , 2,3 for debuging in devlopment 
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'webdesigner@chanrejournals.com';        // SMTP username
        $mail->Password = '*meghalaya2';                          // SMTP password
        // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;   // for tls                                 // TCP port to connect to
        $mail->Port = 465;

        //Recipients
        $mail->setFrom('email@gmail.com', 'Password Recovery'); // from who? 
        $mail->addAddress($emailTo, 'Joe User');     // Add a recipient

        $mail->addReplyTo('no-replay@example.com', 'No Replay');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Content
        // this give you the exact link of you site in the right page 
        // if you are in actual web server, instead of http://" . $_SERVER['HTTP_HOST'] write your link 
        

        $url = "https://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']). "/resetPassword.php?code=$code"; 
		$mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Your password reset link';
        $mail->Body    = "<h1> You have requested password reset </h1>
                         Click <a href='$url'>Change Password</a> to do so";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        // to solve a problem 
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );


        $mail->send();
        echo 'Message has been sent';

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    exit(); // to stop user from submitting more than once 
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
        <!-- page main start 
        <div class="page">
            <div class="page-content h-100">
                <div class="background theme-header"><img src="img/city.jpg" alt=""></div>
                <div class="row mx-0 h-100 justify-content-center">
                    <div class="col-10 col-md-6 col-lg-4 my-3 mx-auto text-center align-self-center col-md-offset-4">
                        <a href="/"><img src="img/nopics.jpg" alt="" class="login-logo"></a>
                        <br>
                        <br>
                        <h5 class="text-white mb-4">Reset Password</h5>
                        <div class="login-input-content ">
                            <p class="text-white">Please enter your email address which you have registered with us. We
                                will send you information steps to reset you password.</p>

                        </div>
                        <br>
                        <br>
                        <div class="row no-gutters">
                            <div class="col-12 text-center"><a href="index.php" class="text-white mt-3">Already have
                                    password? Sign in Now!</a></div>
                        </div>
                    </div>
                </div>

                <br>

            </div>

        </div>
-->
        <div id="page-content">
            <div class="register-form">
                <div class="container">
                    <div class="row">
                        <div class="col s12">
                            <div class="section-title">
                                <span class="theme-secondary-color">Reset</span> Password
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <form class="col s12">
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
                        </form>
                    </div> -->
                    <form method="POST" class="col s12">
                        <h6 align="center" class="text-white">Please enter your registered email.</h6>
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            <input type="email" name="email" class="form-control" placeholder="Enter your Email"
                                autocomplete="off">
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" name="submit" class="btn btn-primary btn-round">Submit</button>
                        </div>
                    </form>
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

<!--<form method="POST">
                                <h6 align="center" class="text-white">Please enter your registered email.</h6>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Enter your Email"
                                        autocomplete="off">
                                </div>
                                <div class="form-group" align="center">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-round">Submit</button>
                                </div>
                            </form> -->