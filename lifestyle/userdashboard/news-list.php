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
<head>
<meta charset="UTF-8">
<title>Chanre Care </title> 
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
    <a href="/" class="nav-logo">Chanre Care</a>
  </div>
     <!-- <div class="header-icon-menu">
    <a href="#" data-activates="nav-mobile-account" class="button-collapse" id="button-collapse-account"><i class="fas fa-search"></i></a> -->
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
  <div class="section news">
    <div class="container">
      <div class="row row-title">
        <div class="col s12">
          <div class="section-title">
            <span class="theme-secondary-color">BLOG</span>
          </div>
        </div>
      </div>
      <div class="row" id="posts-container">
        <!-- <div class="col s12">
          <div class="news-content">
            <img src="img/gallery4.jpg" alt="image-news">
            <div class="news-detail">
              <h5 class="news-title"><a href="#">Drink to Your Health: Healthy Drink Every Day</a></h5>
              <div class="date">
                <span><i class="fa fa-calendar"></i> January 28, 2019</span>
              </div>
              <p>
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunt...
              </p>
              <div class="readmore-news">
                <a class="readmore-btn">Read More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="news-content">
            <img src="img/gallery3.jpg" alt="image-news">
            <div class="news-detail">
              <h5 class="news-title"><a href="#">Find Healthcare Facilities Medical Professionals </a></h5>
              <div class="date">
                <span><i class="fa fa-calendar"></i> Maret 12, 2019</span>
              </div>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem ducimus repellendus!
              </p>
              <div class="readmore-news">
                <a class="readmore-btn">Read More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="news-content">
            <img src="img/gallery7.jpg" alt="image-news">
            <div class="news-detail">
              <h5 class="news-title"><a href="#">Sport is a wonderful metaphor for life</a></h5>
              <div class="date">
                <span><i class="fa fa-calendar"></i> January 28, 2019</span>
              </div>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem odio, facere iusto magni sunt...
              </p>
              <div class="readmore-news">
                <a class="readmore-btn">Read More</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="news-content">
            <img src="img/gallery9.jpg" alt="image-news">
            <div class="news-detail">
              <h5 class="news-title"><a href="#">5 reasons why you must consuming boiled ginger</a></h5>
              <div class="date">
                <span><i class="fa fa-calendar"></i> Maret 12, 2019</span>
              </div>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quasi sit aperiam quia volup tatem ducimus repellendus!
              </p>
              <div class="readmore-news">
                <a class="readmore-btn">Read More</a>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col s12">
        <ul class="pagination" id="pagination">
          <li class="disabled">
            <a href="#!"><i class="material-icons">chevron_left</i></a>
          </li>
          <li class="waves-effect">
            <a href="#!"><i class="material-icons">chevron_right</i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->


 
 
<!-- SUBSCRIBE -->

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
<script data-cfasync="false" src="https://uidevr.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery.min.js"></script>
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
    // Function to fetch and display posts
    function fetchPosts(page) {
        fetch(`https://chanrericr.com/blog/api/apipost.php?page=${page}`)
            .then(response => response.json())
            .then(data => {
                displayPosts(data.posts);
                displayPagination(data.currentPage, data.totalPages);
            })
            .catch(error => console.error('Error fetching posts:', error));
    }

    // Function to display posts
    function displayPosts(posts) {
        const postsContainer = document.getElementById('posts-container');
        postsContainer.innerHTML = '';

        posts.forEach(post => {
            const postElement = document.createElement('div');
            postElement.className = 'post';
            postElement.innerHTML = `


            <div class='col s12'>
          <div class='news-content'>
            <img src='https://chanrericr.com/blog/admin/postimages/${post.PostImage}' alt='image-news'>
            <div class='news-detail'>
              <h5 class='news-title'><a href='single-page.php?id=${post.id}'>${post.PostTitle}</a></h5>
              <div class='date'>
                <span><i class='fa fa-calendar'></i> ${post.PostingDate}</span>
              </div>
              <p>
                 
              </p>
              <div class='readmore-news'>
                <a class='readmore-btn' href='single-page.php?id=${post.id}'>Read More</a>
              </div>
            </div>
          </div>
        </div>
               
            `;
            postsContainer.appendChild(postElement);
        });
    }

    // Function to display pagination
    function displayPagination(currentPage, totalPages) {
        const paginationContainer = document.getElementById('pagination');
        paginationContainer.innerHTML = '';

        for (let i = 1; i <= 5; i++) {
            const pageItem = document.createElement('li');
            pageItem.className = 'waves-effect';
            pageItem.textContent = i;
            pageItem.addEventListener('click', () => fetchPosts(i));

            if (i === currentPage) {
                pageItem.style.fontWeight = 'bold';
            }

            paginationContainer.appendChild(pageItem);
        }
    }

    // Fetch posts for the initial page
    fetchPosts(1);
</script>
</body>

</html>
<?php } ?>