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
</head>

<body id="homepage">

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
                <!-- <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i
                        class="fas fa-search"></i></a> -->
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


    <!-- CONTENT -->
    <div id="page-content">
        <div class="container">
            <div class="row">
                <div class="col s12" id="posts-container">
                    <!-- <br>
                    
                    <br> -->
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->



    <!-- SUBSCRIBE -->

    <!-- END SUBSCRIBE -->
    <!-- FOOTER  -->
    <footer id="footer">
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
                Copyright @ 2023, All rights reserved.
            </div>
        </div>
    </footer>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentUrl = window.location.href;

        // Create a URL object from the URL string
        const url = new URL(currentUrl);

        // Get the value of the 'id' parameter
        const idParam = url.searchParams.get('id');




        const postId = idParam;
        const apiUrl = `https://chanrericr.com/blog/api/get_single_post.php?id=${postId}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                const postsContainer = document.getElementById('posts-container');

                if (data.length != 0) {
                    const post = data;
                    console.log(data)
                    const postHTML = `<h5> ${post.PostTitle}</h5>
                    <br>
                    <img src='https://chanrericr.com/blog/admin/postimages/${post.PostImage}' alt='Hello' />
                    <br>
                    <br><div>${post.PostDetails}</div>`;
                    postsContainer.innerHTML = postHTML;
                } else {
                    // console.log(data)
                    postsContainer.innerHTML = '<p>No post found.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching post:', error);
            });
    });
    </script>
</body>

</html>
<?php } ?>