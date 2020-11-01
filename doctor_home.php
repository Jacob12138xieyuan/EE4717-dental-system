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

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            margin: auto;
        }

        th,
        td {
            padding: 15px;
        }

        form {
            width: 50%;
            margin: 0px auto;
            padding: 20px;
            border: 1px solid #b0c4de;
            background: white;
            border-radius: 10px;
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

    <h2 style="text-align: center">Change your availability</h2>
    <form action="" method="post">
        <div class="input-group">
            <label for="date">Date: </label>
            <input type="date" id="date" name="date" value="<?php echo (isset($date)) ? $date : ''; ?>" min="<?php echo date("Y-m-d", strtotime("+1 day")) ?>" onchange="change_date()" required>
        </div>
    </form>
    <!-- hidden form for auto update selected date-->

    <form id='update_date' action='' method='post' style='display:none;'>
        <input type="date" id="date_hidden" name="date_hidden">
    </form>
    <br>
    <br>
    <table>
        <tr>
            <th>9:00-10:00</th>
            <th>10:00-11:00</th>
            <th>11:00-12:00</th>
            <th>14:00-15:00</th>
            <th>15:00-16:00</th>
            <th>16:00-17:00</th>
        </tr>
        <?php

        if (isset($_POST['date_hidden'])) {
            $date = $_POST['date_hidden'];
            $_SESSION["date"] = $date;
            $doctor_id = $_SESSION["id"];
            $query = "SELECT * FROM calendar_{$doctor_id} WHERE calendar_date='$date';";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
                $_SESSION['9:00-10:00'] = $row['9:00-10:00'];
                $_SESSION['10:00-11:00'] = $row['10:00-11:00'];
                $_SESSION['11:00-12:00'] = $row['11:00-12:00'];
                $_SESSION['14:00-15:00'] = $row['14:00-15:00'];
                $_SESSION['15:00-16:00'] = $row['15:00-16:00'];
                $_SESSION['16:00-17:00'] = $row['16:00-17:00'];
                echo "<tr><td>" . $row['9:00-10:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=9:00-10:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $row['10:00-11:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=10:00-11:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $row['11:00-12:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=11:00-12:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $row['14:00-15:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=14:00-15:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $row['15:00-16:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=15:00-16:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $row['16:00-17:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=16:00-17:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td></tr>";  //approve and reject botton
                echo "<script>document.getElementById('date').value = " . "'{$_SESSION['date']}'" . ";</script>";
            }
        } else if (isset($_SESSION['date'])) {
            echo "<tr><td>" . $_SESSION['9:00-10:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=9:00-10:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $_SESSION['10:00-11:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=10:00-11:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $_SESSION['11:00-12:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=11:00-12:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $_SESSION['14:00-15:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=14:00-15:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $_SESSION['15:00-16:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=15:00-16:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td><td>" . $_SESSION['16:00-17:00'] . "<a onclick=\"return confirm('Are you sure to toggle?')\" href='server.php?toggle=16:00-17:00' class='btn' style='background-color: #5f9ea0; text-decoration: none; margin-left:10px'>Toggle</a>" . "</td></tr>";  //approve and reject botton
            echo "<script>document.getElementById('date').value = " . "'{$_SESSION['date']}'" . ";</script>";
        }

        ?>
    </table>

    <script>
        function change_date() {
            date = document.getElementById("date").value;
            document.getElementById("date_hidden").value = date;
            document.getElementById("update_date").submit();
        }
    </script>
</body>
<?php include('footer.php'); ?>

</html>