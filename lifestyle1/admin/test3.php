<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Simple Age Calculator in PHP</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1 class="page-header text-center">Simple Age Calculator</h1>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
			<?php
$dob='25-08-2023';
$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
$age = $diff->format(' %m Months, %d Days');
echo $age;
?>
            </div>
        </div>
    </div>
</body>

</html>