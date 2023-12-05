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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $useremail = $_POST['useremail'];
    $mobile = $_POST['mobile'];
    $useraddress = $_POST['useraddress'];
    $imgfile=$_FILES["profilePic"]["name"];

    if($imgfile=''){
        $extension = substr($imgfile, strlen($imgfile)-4, strlen($imgfile));
    $allowed_extensions = array(".jpg",".jpeg",".png",".gif",".JPG",".PNG");
    if(!in_array($extension, $allowed_extensions))
        {
        echo "<script>alert('Invalid format. Only jpg/ jpeg/ png /gif format allowed');</script>";
        }
        else
        {
       
        $queryinv = mysqli_query($con, "UPDATE tbl_users SET fname = '$fname', lname= '$lname', useremail = '$useremail', mobile ='$mobile', 
        useraddress = '$useraddress' WHERE username= '$username'");
        
        
        if ($queryinv) 
        {
            echo "<script>alert('Your profile is successfuly Updated');</script>";
        } 
        else 
        {
            echo "<script>alert('Report could not Added');</script>";
        }
    }
    }
    else{
        $imgnewfile=md5($imgfile).$extension;
        move_uploaded_file($_FILES["profilePic"]["tmp_name"],"postimages/".$imgnewfile);
        $queryinv = mysqli_query($con, "UPDATE tbl_users SET fname = '$fname', lname= '$lname', useremail = '$useremail', mobile ='$mobile', 
        useraddress = '$useraddress', profilePic = '$imgnewfile' WHERE username= '$username'");
        
        
        if ($queryinv) 
        {
            echo "<script>alert('Report is successfuly Added');</script>";
        } 
        else 
        {
            echo "<script>alert('Report could not Added');</script>";
        }
    }


/*
    if (!in_array($extension, $allowed_extensions)) {
        echo "<script>alert('Invalid format. Only jpg/jpeg/png/gif format allowed');</script>";
    } else {
        $imgnewfile = md5($imgfile) . "." . $extension;
        move_uploaded_file($_FILES["profilePic"]["tmp_name"], "postimages/" . $imgnewfile);
        $queryinv = mysqli_query($con, "UPDATE tbl_users SET fname = '$fname', lname = '$lname', useremail = '$useremail', mobile = '$mobile', useraddress = '$useraddress', profilePic = '$imgnewfile' WHERE username = '$username'");

        if ($queryinv) {
            echo "<script>alert('Your profile is successfully updated');</script>";
        } else {
            echo "<script>alert('Report could not be added');</script>";
        }
    }
} else {
    $queryinv = mysqli_query($con, "UPDATE tbl_users SET fname = '$fname', lname = '$lname', useremail = '$useremail', mobile = '$mobile', useraddress = '$useraddress' WHERE username = '$username'");

    if ($queryinv) {
        echo "<script>alert('Your profile is successfully updated');</script>";
    } else {
        echo "<script>alert('Report could not be added');</script>";
    }
    */

  }
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <title>Asiapp - Shop & Medical Mobile Template </title>
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
        .setting-photo img{
            border-radius: 50%;
        }
    </style>
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
                <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i
                        class="fas fa-search"></i></a>
            </div>



        </div>
    </header>
    <!-- END HEADER -->
    <!-- SIDE NAV-->
    <nav>

        <!-- LEFT SIDENAV-->
        <?php include('layout/leftnav.php');?>
        <!-- END LEFT SIDENAV-->
        <!-- RIGHT SIDENAV-->
        <?php include('layout/rightnav.php');?>
        <!-- END RIGHT SIDENAV-->

    </nav>
    <!-- END SIDENAV-->


    <!-- CONTENT -->
    <div id="page-content">
        <div class="setting-page">
            <div class="container">
                <div class="row ">
                    <div class="col s12 m12 l12 ">
                        <div class="section-title">
                            <span class="theme-secondary-color">Profile</span> 
                        </div>
                    </div>
                </div>
                <br>
                <?php $fetchProfie = mysqli_query($con, "SELECT * from tbl_users where username = '$username'");
                while($prows = mysqli_fetch_array($fetchProfie))
                {
                ?>
                <form method="post" enctype="multipart/form-data"  >
                    <div class="row">
                        <div class="col s12 m12 l12 ">

                            <div class="setting-photo">
                                <img alt="avatar" src="postimages/<?php echo htmlentities($prows['profilePic']);?>">
                            </div>
                            <div class="sphoto-text">Photo ( 130 x 130 )</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field col s12 m12 l12 no-margin-top">
                            <div class="btn">
                                <span>Choose File</span>
                                <input type="file" name="profilePic" multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input name="profilePic" class="file-path validate" type="text" placeholder="Upload image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 ">
                            <input id="user-firstname" type="text" class="validate" name="fname"
                                value="<?php echo htmlentities($prows['fname']); ?>">
                            <label for="user-firstname">First Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 ">
                            <input id="user-lastname" type="text" class="validate" name="lname"
                                value="<?php echo htmlentities($prows['lname']); ?>">
                            <label for="user-lastname">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 ">
                            <input value="<?php echo htmlentities($prows['useremail']); ?>" name="useremail"
                                id="user-email" type="email" class="validate">
                            <label for="user-email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 ">
                            <input name="mobile" value="<?php echo htmlentities($prows['mobile']); ?>" id="user-phone"
                                type="tel" class="validate">
                            <label for="user-phone">Phone</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12 l12 ">
                            <textarea id="user-address" class="materialize-textarea"
                                name="useraddress"><?php echo htmlentities($prows['useraddress']); ?></textarea>
                            <label for="user-address">Address</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                                <input class="waves-effect waves-light btn" value="SUBMIT" type="submit" name="submit">
                            </div>
                        </div>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->



    <!-- SUBSCRIBE -->
    <!-- <div class="section subscribe">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="section-title">SUBSCRIBE</div>
                    <p class="center">Get healthy news and solutions every day</p>
                    <div class="mail-subscribe-box">
                        <input class="form-control" name="user-email" placeholder="Enter email address" value=""
                            type="email">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-subscribe">
            <img src="img/bg-profile.jpg">
        </div>
    </div> -->
    <!-- END SUBSCRIBE -->
    <!-- FOOTER  -->
    <!-- <footer id="footer">
        <div class="container">
            <div class="row row-footer-icon">
                <div class="col s12">
                    <div class="footer-sosmed-icon ">
                        <div class="wrap-circle-sosmed ">
                            <a href="#">
                                <div class="circle-sosmed">
                                    <i class="fab fa-instagram"></i>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-circle-sosmed ">
                            <a href="#">
                                <div class="circle-sosmed">
                                    <i class="fab fa-linkedin-in"></i>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-circle-sosmed ">
                            <a href="#">
                                <div class="circle-sosmed">
                                    <i class="fab fa-twitter"></i>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-circle-sosmed ">
                            <a href="#">
                                <div class="circle-sosmed">
                                    <i class="fab fa-facebook-f"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row copyright">
                2019 <span>Asiapp</span>, All rights reserved.
            </div>
        </div>
    </footer> -->
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

<!-- Mirrored from uidevr.com/tf/asiapp/setting.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Mar 2023 07:00:15 GMT -->

</html>
<?php  }?>