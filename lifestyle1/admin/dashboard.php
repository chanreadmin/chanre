<?php 


session_start();
include('layout/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
  
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
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

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

    <title>Assestment Book</title>
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        <?php include('layout/sidemenu.php');?>
        <!--end sidebar -->

      


        <?php include('layout/topheader.php');?>
        <!--end top header-->


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
            <!-- start page content-->
            <div class="page-content">

              


                <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="fs-5">
                                        <ion-icon name="person-add-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p class="mb-0">Users</p>
                                    </div>
                                    <div class="fs-5 ms-auto">
                                        <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h5 class="mb-0">1,037</h5>
                                    </div>
                                    <div class="ms-auto" id="chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="fs-5">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p class="mb-0">Visits</p>
                                    </div>
                                    <div class="fs-5 ms-auto">
                                        <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h5 class="mb-0">23,758</h5>
                                    </div>
                                    <div class="ms-auto" id="chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="fs-5">
                                        <ion-icon name="chatbox-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p class="mb-0">Comments</p>
                                    </div>
                                    <div class="fs-5 ms-auto">
                                        <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h5 class="mb-0">1,139</h5>
                                    </div>
                                    <div class="ms-auto" id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2">
                                    <div class="fs-5">
                                        <ion-icon name="mail-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p class="mb-0">Messages</p>
                                    </div>
                                    <div class="fs-5 ms-auto">
                                        <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-3">
                                    <div>
                                        <h5 class="mb-0">1,037</h5>
                                    </div>
                                    <div class="ms-auto" id="chart4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->


                <div class="row">
                    <!-- <div class="col-12 col-lg-8 col-xl-8 d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="mb-0">Statistics</h6>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center font-13 gap-2">
                                            <span class="border px-1 rounded cursor-pointer"><i
                                                    class="bx bxs-circle me-1 text-primary"></i>Downloads</span>
                                            <span class="border px-1 rounded cursor-pointer"><i
                                                    class="bx bxs-circle me-1 text-success"></i>Earnings</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-container1">
                                    <canvas id="chart5"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="col-12 col-lg-4 col-xl-4 d-flex">
                        <div class="card radius-10 overflow-hidden w-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="mb-0">Top Categories</h6>
                                    <div class="dropdown options ms-auto">
                                        <div class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                                            <ion-icon name="ellipsis-horizontal-sharp"></ion-icon>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="chart-container6">
                                    <div class="piechart-legend">
                                        <h2 class="mb-1">85</h2>
                                        <h6 class="mb-0">Total</h6>
                                    </div>
                                    <canvas id="chart6"></canvas>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-top">
                                    Clothing
                                    <span class="badge bg-tiffany rounded-pill">55</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Electronics
                                    <span class="badge bg-success rounded-pill">20</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Furniture
                                    <span class="badge bg-warning rounded-pill">10</span>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
       
            </div>
            <!-- end page content-->
        </div>
        <!--end page content wrapper-->


        <!--start footer-->
        <!-- <footer class="footer">
            <div class="footer-text">
                Copyright © 2023. All right reserved.
            </div>
        </footer> -->
        <!--end footer-->


        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>
        <!--End Back To Top Button-->

        <!--start switcher-->
        <div class="switcher-body">
            <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">
                <ion-icon name="color-palette-sharp" class="me-0"></ion-icon>
            </button>
            <div class="offcanvas offcanvas-end shadow border-start-0 p-2" data-bs-scroll="true"
                data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Theme Customizer</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <h6 class="mb-0">Theme Variation</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                            value="option1">
                        <label class="form-check-label" for="LightTheme">Light</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                            value="option2">
                        <label class="form-check-label" for="DarkTheme">Dark</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDark"
                            value="option3" checked>
                        <label class="form-check-label" for="SemiDark">Semi Dark</label>
                    </div>
                    <hr />
                    <h6 class="mb-0">Header Colors</h6>
                    <hr />
                    <div class="header-colors-indigators">
                        <div class="row row-cols-auto g-3">
                            <div class="col">
                                <div class="indigator headercolor1" id="headercolor1"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor2" id="headercolor2"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor3" id="headercolor3"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor4" id="headercolor4"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor5" id="headercolor5"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor6" id="headercolor6"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor7" id="headercolor7"></div>
                            </div>
                            <div class="col">
                                <div class="indigator headercolor8" id="headercolor8"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--end switcher-->


        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

    </div>
    <!--end wrapper-->


    <!-- JS Files-->
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/chart.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
</body>

</html>

<?php } ?>