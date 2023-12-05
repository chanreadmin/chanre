<?php
// connect to the database
include('../layout/config.php')

// validate the incoming data
$patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
$duration = mysqli_real_escape_string($conn, $_POST['duration']);

// insert the data into the database table
$sql = "INSERT INTO excercise_track (patient_name,duration) VALUES ('$patient_name', '$duration')";
$result = mysqli_query($con, $sql);

if ($result) {
  echo 'Data saved successfully.';
} else {
  echo 'Error occurred while saving data.';
}

// close the database connection
mysqli_close($con);
?>
