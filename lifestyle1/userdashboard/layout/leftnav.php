<ul id="nav-mobile-category" class="side-nav">
    <li class="profile">
        <div class="li-profile-info">
            <img src="img/profile4.jpg" alt="profile">
            <h2><?php echo $_SESSION['login'];?></h2>
            <div class="balance">
            </div>
        </div>
        <div class="bg-profile-li">
            <img alt="photo" src="img/bg-profile.jpg">
        </div>
    </li>
    <li>
        <a class="waves-effect waves-blue" href="index.php"><i class="fas fa-home"></i>Home</a>
    </li>
    <li>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
</ul>