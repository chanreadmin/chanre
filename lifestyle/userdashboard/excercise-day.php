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
    $todate=date("d-m-Y");
  if(isset($_POST['submit'])){
    date_default_timezone_set('Asia/Kolkata');
    $exdate=date("d/m/Y");
    $extime=date("h:i:s");
    $feedback = $_POST['feedback'];
    $compdate1 = date("Y-m-d");
    $compdate2 = $_POST['startdays'];
    $getUser = mysqli_query($con, "select * from tbl_users where username = '$username'");
    while($rows= mysqli_fetch_array($getUser))
    {
        $patient_id = $rows['id'];
    }
    $getexercise = mysqli_query($con,"Select * from excercise_track where exdate = '$exdate' AND patient_name = '$username' LIMIT 1");
    $rowcount=mysqli_num_rows($getexercise);
    
    while($grow = mysqli_fetch_array($getexercise)){
        $tid = $grow['id'];
    }
    
    if($rowcount>0){
        if($compdate1 == $compdate2){
            $addActivity= mysqli_query($con,"update excercise_track set patient_name='$username',patient_id = '$patient_id',
        exdate = '$exdate', extime = '$extime',feedback = '$feedback' where id ='$tid'");
        }
        else
        {
            $uperr = "Oops!! you are missing the date: ".$compdate2.". ";
        }
    }
    else{
        if($compdate1 == $compdate2){
            $addActivity = mysqli_query($con,"INSERT INTO excercise_track (patient_name,patient_id,exdate, extime, feedback) 
   VALUES('$username','$patient_id','$exdate','$extime','$feedback');");
        }
        else
        {
            $uperr = "Oops!! you are missing the date: ".$compdate2.". ";
        }
    }
    if($addActivity)
       {
        $msg = "Your feedback updated";
       }
       else{
        $error = "Your feedback not updated <br>";
       }
  }

  $nid = intval($_GET['did']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Excercise </title>
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
    .wrapper a {
        display: inline-block;
        text-decoration: none;
        padding: 15px;
        background-color: #fff;
        border-radius: 3px;
        text-transform: uppercase;
        color: #585858;
        font-family: 'Roboto', sans-serif;
    }

    .modal {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        /* background: rgba(77, 77, 77, .7); */
        transition: all .4s;
        z-index: 999;
    }

    .modal:target {
        visibility: visible;
        opacity: 1;
    }

    .modal__content {
        position: relative;
        max-height: 100%;
        background: #fff;
        padding: 5px;
    }

    /* .modal__content img {
        height: 80%;
    } */

    .modal__content h6 {
        font-family: times;
        text-align: center;
        padding: 5px;
        font-size: 18px;
    }

    .modal__footer {
        display: flex;
        justify-content: space-around;
    }

    .modal__close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #585858;
        text-decoration: none;
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
                <a href="#" class="nav-logo">Chanre Care</a>
            </div>
            <div class="header-icon-menu">
                <!-- <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i class="fas fa-search"></i></a> -->
            </div>
        </div>
    </header>
    <!-- END HEADER -->
    <!-- SIDE NAV-->
    <nav>
        <?php include('layout/leftnav.php')?>
    </nav>
    <!-- END SIDENAV-->
    <!-- CONTENT -->
    <div id="page-content">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color">Excercise List</span><br><small>
                                <?php 
                                $qd = mysqli_query($con, "select * from tbl_assign_excercise WHERE patient_username = '$username' AND id = '$nid'");
                                while($srows = mysqli_fetch_array($qd)){
                                    $sset1 = $srows['set1'];
                                    $sset2 = $srows['set2'];
                                    $sset3 = $srows['set3'];
                                    $stretchtime1 = $srows['stretchtime1'];
                                    $stretchtime2 = $srows['stretchtime2'];
                                    $stretchtime3 = $srows['stretchtime3'];
                                    $stretchtime4 = $srows['stretchtime4'];
                                    $tdate=date_create($srows['startdays']);
                                           echo date_format($tdate,"d-m-Y");
                                           $startday = $srows['startdays'];
                                }
                                 ?></small>
                        </div>
                        <div>
                            <span class="text-success"><b><?php echo $msg; ?></b> </span>
                            <span class="text-danger"><b><?php echo $error; ?></b> </span>
                            <span class="text-danger"><?php echo $uperr; ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box">
                            <strong>Warm Up</strong> <br>
                            <?php $myquery = mysqli_query($con, "SELECT * FROM tbl_assign_excercise WHERE patient_username = '$username' AND id = '$nid'" );
                                        while ($rows = mysqli_fetch_array($myquery)) {
                                            $result = array($rows['warmup1'],$rows['warmup2'],$rows['warmup3'],$rows['warmup4'] );
                                            for($i=0; $i<= count($result); $i++){
                                                $fetchquery =  mysqli_query($con, "select * from tbl_exerciselist where id = '$result[$i]'");
                                                while($erows = mysqli_fetch_array($fetchquery))
                                                {
                                                    $demo = $erows['demo'];
                                                    $exercisename = $erows['exercisename'];
                                                    $id = $erows['id'];
                                                    echo '<div class="cart-item">
                                                <div class="ci-img">
                                                    <div class="ci-img-product">
                                                        <a href="#demo-modal5'.$id. '"><img src="../admin/postimages/'.$demo.'" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="ci-name">
                                                    <div class="cin-top">
                                                        <div class="cin-title">' .$exercisename. '</div>
                                                        <div class="cin-price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>',
                                            '<div class="wrapper">
                                            </div>
                                            <div id="demo-modal5'.htmlentities($erows['id']).'" class="modal">
                                                <div class="modal__content">
                                                    <h6>' . htmlentities($erows['exercisename']) . '</h6>
                                                    <img src="../admin/postimages/' . htmlentities($erows['demo']) . '" alt="hello">
                                                    <div class="modal__footer">
                                                        <p>1st SET: ' . $sset1 . ' </p>
                                                        <p>2nd SET: ' . $sset2 . ' </p>
                                                        <p>3rd SET: ' . $sset3 . '</p>
                                                    </div>
                                                    <a href="#" class="modal__close">&times;</a>
                                                </div>
                                            </div>';
                                                }
                                            }
                                        ?>
                            <?php } ?>
                            <strong>Main Excerise</strong>

                            <?php $myquery = mysqli_query($con, "SELECT *FROM tbl_assign_excercise WHERE patient_username = '$username' AND id = '$nid'" );

                                        while ($rows = mysqli_fetch_array($myquery)) {
                                            $result = array($rows['mainex1'],$rows['mainex2'],$rows['mainex3'],$rows['mainex4'],$rows['mainex5'] );
                                            for($i=0; $i<= count($result); $i++){
                                                // print_r($result[$i]);
                                                $fetchquery =  mysqli_query($con, "select * from tbl_exerciselist where id = '$result[$i]'");
                                                while($erows = mysqli_fetch_array($fetchquery))
                                                {
                                                    $demo = $erows['demo'];
                                                    $exercisename = $erows['exercisename'];
                                                    $id = $erows['id'];

                                                    echo '<div class="cart-item">
                                                <div class="ci-img">
                                                    <div class="ci-img-product">
                                                        <a href="#demo-modal5'.$id. '"><img src="../admin/postimages/'.$demo.'" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="ci-name">
                                                    <div class="cin-top">
                                                        <div class="cin-title">' .$exercisename. '</div>
                                                        <div class="cin-price">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="clear"></div>
                                            </div>',
                                            
                                            '<div class="wrapper">
                                            </div>
                                            <div id="demo-modal5'.htmlentities($erows['id']).'" class="modal">
                                                <div class="modal__content">
                                                    <h6>' . htmlentities($erows['exercisename']) . '</h6>
                                                    <img src="../admin/postimages/' . htmlentities($erows['demo']) . '" alt="hello">
                                                    <div class="modal__footer">
                                                    <p>1st SET: ' . $sset1 . ' </p>
                                                    <p>2nd SET: ' . $sset2 . ' </p>
                                                    <p>3rd SET: ' . $sset3 . '</p>
                                                    </div>
                                                    <a href="#" class="modal__close">&times;</a>
                                                </div>
                                            </div>'
                                            
                                            ;
                                                }
                                            }
                                        ?>
                            <?php } ?>
                            <strong>Stretching</strong>
                            <?php $myquery = mysqli_query($con, "SELECT *FROM tbl_assign_excercise WHERE patient_username = '$username' AND id = '$nid'" );

                                        while ($rows = mysqli_fetch_array($myquery)) {
                                            $result = array($rows['stretch1'],$rows['stretch2'],$rows['stretch3'],$rows['stretch4'] );
                                            for($i=0; $i<= count($result); $i++){
                                                // print_r($result[$i]);
                                                $fetchquery =  mysqli_query($con, "select * from tbl_exerciselist where id = '$result[$i]'");
                                                while($erows = mysqli_fetch_array($fetchquery))
                                                {
                                                    $demo = $erows['demo'];
                                                    $exercisename = $erows['exercisename'];
                                                    $id = $erows['id'];
                                                    echo '<div class="cart-item">
                                                            <div class="ci-img">
                                                                <div class="ci-img-product">
                                                                    <a href="#demo-modal4'.$id. '"><img src="../admin/postimages/'.$demo.'" alt=""></a>
                                                                </div>
                                                            </div>
                                                            <div class="ci-name">
                                                                <div class="cin-top">
                                                                    <div class="cin-title">' .$exercisename. '</div>
                                                                    <div class="cin-price">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                <div class="clear"></div>
                                            </div>',
                                            
                                            '<div class="wrapper">
                                            </div>
                                            <div id="demo-modal4'.htmlentities($erows['id']).'" class="modal">
                                                <div class="modal__content">
                                                    <h6>' . htmlentities($erows['exercisename']) . '</h6>
                                                    <img src="../admin/postimages/' . htmlentities($erows['demo']) . '" alt="hello">
                                                    <div class="modal__footer">
                                                        <p>1st SET: ' . $stretchtime1 . ' </p>
                                                        <p>2nd SET: ' . $stretchtime2 . ' </p>
                                                        <p>3rd SET: ' . $stretchtime3 . '</p>
                                                    </div>
                                                    <a href="#" class="modal__close">&times;</a>
                                                </div>
                                            </div>'
                                            
                                            ;
                                                }
                                            }
                                        ?>
                            <!-- item-->
                            <!-- <div class="cart-item">
                                <div class="ci-img">
                                    <div class="ci-img-product">
                                        <a href="#demo-modal3<?php echo $eid; ?>"><img
                                                src="../admin/postimages/<?php echo $demo;?>" alt="product"></a>
                                    </div>
                                </div>
                                <div class="ci-name">
                                    <div class="cin-top">
                                        <div class="cin-title"><?php echo $exercisename;?>
                                        </div>
                                        <div class="cin-price">
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div> -->
                            <!-- end item-->
                            <!-- Modal -->
                            <!-- <div class="wrapper">
                            </div>
                            <div id="demo-modal3<?php echo htmlentities($rows['id'])?>" class="modal">
                                <div class="modal__content">
                                    <h5><?php echo htmlentities($rows['exercisename'])?></h5>
                                    <img src="../admin/postimages/<?php echo htmlentities($rows['demo'])?>" alt="hello">
                                    <div class="modal__footer">
                                        <p>1st SET: <?php echo htmlentities($rows['set1'])?> </p>
                                        <p>2nd SET: <?php echo htmlentities($rows['set1'])?> </p>
                                        <p>3rd SET: <?php echo htmlentities($rows['set1'])?></p>
                                    </div>
                                    <a href="#" class="modal__close">&times;</a>
                                </div>
                            </div> -->
                            <!-- Modal -->
                            <?php } ?>
                            <form method="POST">
                                <div class="form-group">
                                    <input type="text" name="startdays" value="<?php echo $startday;?>" required hidden>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="feedback" placeholder="Enter today's feedback">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
    <!-- Script -->
    <!-- <script data-cfasync="false" src="https://uidevr.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"
        integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="lib/slick/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
    let startTime;
    let intervalId;

    function startStopwatch() {
        startTime = Date.now();
        intervalId = setInterval(updateStopwatch, 1000);
    }

    function stopStopwatch() {
        clearInterval(intervalId);
    }

    function updateStopwatch() {
        const elapsedTime = Date.now() - startTime;
        const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
        const minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);
        document.getElementById("stopwatch").value = `${hours.toString().padStart(2, "0")}:${minutes
    .toString()
    .padStart(2, "0")}:${seconds.toString().padStart(2, "0")}`;
        if (hours >= 1 && minutes >= 30) {
            stopStopwatch();
            alert("Stopwatch has been running for 1.5 hours and has stopped.");
        }
    }
    $(document).ready(function() {
        $('#myForm').submit(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'ajax/insertexcercise.php',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data saved successfully.');
                },
                error: function() {
                    alert('Error occurred while saving data.');
                }
            });
        });
    });
    </script>
</body>

</html>
<?php } ?>