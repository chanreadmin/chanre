<ul id="nav-mobile-category" class="side-nav">
    <li class="profile">
        <div class="li-profile-info">
            <?php 
            $name = $_SESSION['login'];
            $query = mysqli_query($con, "Select * from tbl_users where username = '$name'");
            while($rows = mysqli_fetch_array($query)){
            ?>
            <img src="postimages/<?php echo htmlentities($rows['profilePic']);?>" alt="profile">
            <h2><?php echo $rows['fname'].' '.$rows['lname'];?></h2>
            <?php } ?>
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
        <a class="waves-effect waves-blue" href="diet.php"><i class="fas fa-chevron-circle-right"></i>Diet</a>
    </li>
    <li>
        <a class="waves-effect waves-blue" href="setting.php"><i class="fas fa-chevron-circle-right"></i>Profile</a>
    </li>
    <li>
        <a class="waves-effect waves-blue" href="deactivate.php"><i class="fas fa-chevron-circle-right"></i>Delete
            Account</a>
    </li>
    <li>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
    </li>
</ul>