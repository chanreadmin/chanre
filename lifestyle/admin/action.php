<?php 


include('layout/config.php');



   $ename = $_POST['category'];
	// Fetch state name base on country id
	$query = "SELECT * FROM tbl_exerciselist where category = '$ename' ";
	$result = $con->query($query);

	if ($result->num_rows > 0) {
		echo '<option value="">Choose '.$ename.' excercise</option>'; 
		while ($row = $result->fetch_assoc()) {
			echo '<option value="'.$row['id'].'">'.$row['exercisename'].'</option>'; 
		}
	} else {
		echo '<option value="">Excercise not available</option>'; 
	}

?>