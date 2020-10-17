<?php
include('server.php');
if (empty($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first to view this paage";
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Smile Dental Clinic</title>
    <link rel="stylesheet" type="text/css" href="basic.css">
</head>

<body>

    <!-- header  -->
    <div class="header">
        <img src="images/logo.jpg" style="height: 50px; margin-left: 40px">
        <div class="header-right">
            <a style="color: white;">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></a>
            <a class="active" href="">My Appointment</a>
            <a class="active" style="margin-left: 15px;" href="">My Account</a>
            <a class="logout" href="index.php?logout='1'">Log out</a>
        </div>
    </div>
    <br>

    <!-- home page -->
    <?php
    $type = $_SESSION['user_type'];
    if ($type == 'patient') {
        include('patient_home.php');
    }
    ?>
    <br>
    <br>

</body>

</html>