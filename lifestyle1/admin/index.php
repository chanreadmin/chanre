<?php 

include('layout/config.php');
session_start();
if(isset($_POST['login']))
{
$user_email=$_POST['user_email'];
$password=$_POST['user_password'];
$myquery=mysqli_query($con,"Select * from tbl_doctors where (user_email='$user_email' || user_name='$user_email')");
while($rows=mysqli_fetch_array($myquery))
{ 
  if($rows>0)
  {
    $hashpassword=$rows['user_password'];
    if (password_verify($password, $hashpassword)) {
$_SESSION['login']=$_POST['user_email'];
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else {
echo "<script>alert('Wrong Password');</script>";
// echo "<script>myalert()</script>";

 echo "<script > document.location ='index.php'; </script>";
  }
  }
  else{
    echo "<script>alert('User not registered with us');</script>";
    echo "<script > document.location ='index.php'; </script>";
  }
}
}

?>
<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>

    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <title>LMD</title>
</head>

<body>

    <div class="login-bg-overlay au-sign-in-basic"></div>
    <!--start wrapper-->
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
                <div class="container-fluid">
                    <a href="javascript:;">LMD
                        <!-- <img src="assets/images/logo-icon-3.png" alt="" /> -->
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3 login-menu-2">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Instructions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:;">Contact</a>
                            </li>
                        </ul>
                        <!-- <form class="d-flex">
              <a href="javascript:;" class="btn btn-sm btn-primary px-4 radius-30">Buy Now</a>
            </form> -->
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                    <div class="card radius-10">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h4>Sign In</h4>
                                <p>Sign In to your account</p>
                            </div>
                            <form class="form-body row g-3" method="post">
                                <div class="col-12 col-lg-12">
                                    <!-- <div class="d-grid gap-2">
                    <a href="javascript:;" class="btn border border-2 border-primary"><img
                        src="assets/images/icons/google.png" width="20" alt=""><span class="ms-3 fw-500">Sign in with
                        Google</span></a>
                    <a href="javascript:;" class="btn border border-2 border-dark"><img
                        src="assets/images/icons/apple-black-logo.png" width="20" alt=""><span class="ms-3 fw-500">Sign
                        in with Apple</span></a>
                  </div> -->
                                </div>
                                <div class="col-12 col-lg-12">
                                    <!-- <div class="position-relative border-bottom my-3">
                    <div class="position-absolute seperator-2 translate-middle-y">OR</div>
                  </div> -->
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="inputEmail"
                                        placeholder="User name" name="user_email">
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="user_password" id="inputPassword"
                                        placeholder="Your password">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckRemember">
                                        <label class="form-check-label" for="flexSwitchCheckRemember">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 text-end">
                                    <a href="authentication-reset-password-basic.html">Forgot Password?</a>
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary" name="login" id="login">Sign In</button>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-12 text-center">
                                    <p class="mb-0">Don't have an account? <a
                                            href="authentication-sign-up-basic.html">Sign up</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="my-5">
            <div class="container">
                <div class="d-flex align-items-center gap-4 fs-5 justify-content-center social-login-footer">
                    <a href="javascript:;">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-github"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="javascript:;">
                        <ion-icon name="logo-pinterest"></ion-icon>
                    </a>
                </div>
                <div class="text-center">
                    <p class="my-4">Copyright © 2022</p>
                </div>
            </div>
        </footer>
    </div>
    <!--end wrapper-->



    <script src="assets/js/bootstrap.bundle.min.js"></script>

</body>


</html>