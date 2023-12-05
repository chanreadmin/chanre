<?php 
session_start();
include('layout/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  if(isset($_POST['submit']))
  {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $dob = $_POST['dob'];
      $mobile = $_POST['mobile'];
      $username = $_POST['username'];
      $userpassword = $_POST['userpassword'];
      $useremail=$_POST['useremail'];
      $useraddress = $_POST['useraddress'];
      $occupation = $_POST['occupation'];
      $subscriptions = $_POST['subscriptions'];
      $adminname = $_SESSION['login']; 
      $isUser = 1;

    $cdate = date('Y-m-d');
    $newdate = date('Y-m-d', strtotime($cdate. ' + '.$subscriptions.' days'));
    
    $options = array('cost' => 12,);
	$hashedpass=password_hash($userpassword, PASSWORD_BCRYPT, $options);

      $query = mysqli_query($con, "INSERT INTO tbl_users (fname, lname, dob, mobile, username,
      userpassword, useremail, useraddress, occupation, registrar, isUser, subscriptions,subtime )
      values('$fname','$lname','$dob','$mobile','$username','$hashedpass',
      '$useremail','$useraddress','$occupation','$adminname', '$isUser','$subscriptions','$newdate')
      ");

if($query){
    $msg = 'Data Saved Successfully';
}
else
{
    $errmsg = 'Something is wrong!!';
}
  }
?>
<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!--plugins-->
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.time.css" rel="stylesheet" />
    <link href="assets/plugins/datetimepicker/css/classic.date.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />
    <title>Add Patient</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start sidebar -->
        <?php include('layout/sidemenu.php');?>
        <!--end sidebar -->
        <?php include('layout/topheader.php');?>
        <!--start top header-->
        <!--end top header-->
        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <h6 class="mb-0 text-uppercase">Add Patient</h6>
                        <hr />
                        
                       
                        <div class="card">
                            <div class="card-body">
                                <div class="p-4 border rounded">
                                    <span class="text-success text-center"><?php echo $msg;?></span>
                                    <span class="text-danger text-center"><?php echo $errmsg;?></span>
                                    <form class="row g-3 needs-validation" novalidate method="post">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label">First name</label>
                                            <input type="text" class="form-control" id="validationCustom01" name="fname"
                                                required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label">Last name</label>
                                            <input type="text" class="form-control" name="lname" id="validationCustom02"
                                                required>
                                            <div class="valid-feedback">Looks good!</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input class="result form-control" type="text" id="date" name="dob"
                                                placeholder="Date of Birth...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Mobile No</label>
                                            <input type="text" class="form-control" name="mobile"
                                                id="validationCustom03" required>
                                            <div class="invalid-feedback">Please provide a valid Mobile No.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustomUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation"> <span class="input-group-text"
                                                    id="inputGroupPrepend">@</span>
                                                <input type="text" class="form-control" name="username"
                                                    id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                                                    required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="userpassword" required>
                                            <div class="invalid-feedback">Please provide a valid Password.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="useremail" required>
                                            <div class="invalid-feedback">Please provide a valid Email.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="useraddress" required>
                                            <div class="invalid-feedback">Please provide a valid Address.</div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Ocupation</label>
                                            <input type="text" class="form-control" id="validationCustom03"
                                                name="occupation" required>
                                            <div class="invalid-feedback">Please provide a valid Password.</div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="validationCustom03" class="form-label">Subscription</label>
                                            <!-- <input type="text" class="form-control" id="validationCustom03"
                                                name="occupation" required> -->
                                            <select class="form-control" name="subscriptions">
                                                <option value="">Choose the plan</option>
                                                <option value="30">1 month</option>
                                                <option value="90">3 months</option>
                                                <option value="180">6 months</option>
                                                <option value="365">12 months</option>
                                            </select>
                                            <div class="invalid-feedback">Please provide a valid Password.</div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
            <!-- end page content-->
        </div>
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->
    </div>
    <!--end wrapper-->
    <!-- JS Files-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script type="module" src="../../../../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script> -->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!--plugins-->
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/datetimepicker/js/legacy.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.time.js"></script>
    <script src="assets/plugins/datetimepicker/js/picker.date.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js"></script>
    <script src="assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js"></script>
    <script src="assets/js/form-date-time-pickes.js"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php } ?>