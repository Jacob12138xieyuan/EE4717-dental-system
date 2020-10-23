<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Our doctors</title>
    <?php
    session_start();
    include('header.php');
    ?>
    <link rel="stylesheet" type="text/css" href="basic.css">
    <style>
        .row {
            text-align: center;
            display: flex;
            margin-bottom: 50px;
        }

        .column {
            flex: 50%;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Our Doctors</h2>
    <br>
    <br>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/doctor1.jpg" style="width:200px ;border-radius: 50%;">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <h3 style="text-align: left;">Dr. Jeremy</h3>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <br>
            <a href="make_appointment.php?doctor_id=1" class="btn" style="float: right;">Make an Appointment</a>
        </div>

    </div>

    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/doctor2.jpg" style="width:200px ;border-radius: 50%;">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <h3 style="text-align: left;">Dr. Gina</h3>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <br>
            <a href="make_appointment.php?doctor_id=2" class="btn" style="float: right;">Make an Appointment</a>
        </div>
    </div>
</body>
<?php include('footer.php'); ?>

</html>