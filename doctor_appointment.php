<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
    include('server.php');
    include('header.php');
    ?>
    <h2 style="text-align: center;">My Upcoming Appointments</h2>
    <?php
    if (isset($_GET['reschedule'])) {
        $appointment_id = $_GET['reschedule'];
        include('reschedule_form.php');
    }
    ?>
    <br>
    <br>
    <table>
        <tr>
            <th>Patient</th>
            <th>Date</th>
            <th>Timeslot</th>
            <th style='width:50%'>Description</th>
            <th>Reschedule</th>
        </tr>

        <?php
        $user_id = $_SESSION["id"];
        $query = "SELECT * FROM appointments where doctor_id=$user_id ORDER BY appointment_date;";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['patient_id'] . "</td><td>" . $row['appointment_date'] . "</td><td>" . $row['timeslot'] . "</td><td>" . $row['description'] . "</td><td><a onclick=\"return confirm('Are you sure to reschedule?')\" href='doctor_appointment.php?reschedule={$row['appointment_id']}' class='btn' style='background-color: #5f9ea0; text-decoration: none;'>Reschedule</a></td></tr>";  //approve and reject botton
        }
        ?>
    </table>

</body>
<?php include('footer.php'); ?>
<script>
    function change_date() {
        date = document.getElementById("date").value;
        document.getElementById("date_hidden").value = date;
        document.getElementById("update_date").submit();
    }
</script>

</html>