<?php
include('layout/config.php');
$id = $_POST['id'];
$query = mysqli_query($con, "delete from tbl_assign_excercise where id = '$id'")

?>