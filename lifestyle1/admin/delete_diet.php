<?php
include('layout/config.php');
$id = $_POST['id'];
$query = mysqli_query($con, "DELETE FROM tbl_assigndiet where id = '$id'");

// $delete_data = "delete from tbl_member where tbl_member_id = '$id' ";
// $con->exec($delete_data);

?>