<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Our services</title>
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
    <h2 style="text-align: center;">Our Services</h2>
    <br>
    <br>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/medication.png" style="width:400px ;border-radius: 80%;">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <br>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        
        </div>

    </div>

    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/risk.png" style="width:400px ;border-radius: 100%;">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <br>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
        </div>
    </div>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/screening.png" style="width:400px ;border-radius: 80%;">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <br>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <br>
        </div>

    </div>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/appointment.png" style="width:400px ;border-radius: 80%;">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <br>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
            <br>
        </div>

    </div>
</body>
<?php include('footer.php'); ?>

</html>