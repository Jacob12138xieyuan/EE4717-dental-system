<!-- header  -->
<div class="header">
    <img src="images/logo.jpg" style="height: 60px; margin-left: 40px">
    <div class="header-right">
        <a style="margin-right: 20px;">Welcome, <strong><?php echo $_SESSION['username']; ?></strong></a>
        <a class="active" href="index.php">Home</a>
        <?php
        $type = $_SESSION['user_type'];
        if ($type == 'patient') {
            echo "<a class='active' href='patient_appointment.php'>My Appointment</a>";
        } else {
            echo "<a class='active' href='doctor_appointment.php'>My Appointment</a>";
        }
        ?>
        <a class="active" href="account.php">My Account</a>
        <a class="logout" href="index.php?logout='1'">Log out</a>
    </div>
</div>
<hr>
<br>