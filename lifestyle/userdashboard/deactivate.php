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

  if(isset($_POST['submit'])){
    $reason = $_POST['reason'];
    $status = 0;

    $query = mysqli_query($con, "update tbl_users set reason ='$reason', isUser = '$status' where username = '$username'");
    if($query){
        $msg = "Account deletion request successfully submited.";
    }
    else{
        $error = "Could not accept the request please try again";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Deactivate Account </title>
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

    <style>
    .heading-text {
        text-align: center;
        font-size: 15px;
        color: black;
        margin-left: auto;
        margin-right: auto;
        font-weight: bold;

    }

    .card-body {
        padding: 5px;
        /* color: black; */
        font-family: poppins;
    }

    p {
        /* font-weight: bold; */
        font-famiy: sans-serif;
        margin-top: 50px;
        padding: 5px;
        font-size: 14px;
        color: red;
    }
    </style>
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
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="card">
                            <div class="card-body">
                                <div>
                                    <?php $fquery = mysqli_query($con, "select * from tbl_pgos  where patient_name = '$username'");
                                             while ($rows = mysqli_fetch_array($fquery)) {
                                            ?>
                                    <div>
                                        <label for="" class="heading-text"><strong>Physician's
                                                Instruction</strong></label>
                                        <p><?php echo htmlentities($rows['inspatient'])?></p>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div> -->

                        <div class="card p-2">
                            <div class="card-body">
                                <div>
                                    <h5>Want to delete your Chanre Care account permanently?</h5>
                                    <span class="blue-text"><?php echo $msg;?></span>
                                    <span class="red-text"><?php echo $error;?></span>
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="text" name="reason"
                                                placeholder="Please write a reason for deletion of your account">
                                        </div>

                                        <!-- <div class="form-group">
                                            <input type="text" name="deactivate"
                                                placeholder="Write YES to delete your account">
                                        </div> -->
                                        <button class="waves-effect waves-light btn" type="submit" name="submit">Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <p class=""><strong>Note:</strong> Request for deletion of your account will be
                            processed in 30 days once you click submit button. You can restore your account within 30
                            days by contacting your doctor or
                            instructor.
                        </p>


                    </div>
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