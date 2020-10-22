<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php
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
    <h2 style="text-align: center;">Hello Doctor</h2>
    <br>
    <br>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <?php if ($_SESSION["profile_image"] == '0') {
                echo "<img src='images/patient.png' style='width:250px'>";
            } else {
                echo "<img src='profile_images/" . $_SESSION["id"] . ".jpg' style='width:250px;border-radius: 50%'>";
            }
            ?>

        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <h3 style="text-align: left;">Dr. <?php echo $_SESSION["username"] ?></h3>
            <br>
            <p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>

    </div>

</body>
<?php include('footer.php'); ?>

</html>