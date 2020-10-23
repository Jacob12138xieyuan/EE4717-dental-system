<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's appointments</title>
    <link rel="stylesheet" type="text/css" href="basic.css">
    <style>
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
    //if patient reschedule appoinment, include the form
    if (isset($_GET['reschedule'])) {
        $appointment_id = $_GET['reschedule'];
        include('reschedule_form.php');
    }
    ?>
    <br>
    <br>
    <table>
        <tr>
            <th>Patient ID</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Timeslot</th>
            <th style='width:50%'>Description</th>
            <th>Reschedule</th>
        </tr>

        <?php
        //table show all patient appointments
        $user_id = $_SESSION["id"];
        $query = "SELECT users.id, users.username, appointments.appointment_id, appointments.appointment_date, appointments.timeslot, appointments.description
        FROM appointments
        INNER JOIN users ON appointments.patient_id=users.id WHERE appointments.doctor_id = {$user_id} ORDER BY appointment_date;";
        // $query = "SELECT * FROM appointments where doctor_id=$user_id ORDER BY appointment_date;";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><td>" . $row['appointment_date'] . "</td><td>" . $row['timeslot'] . "</td><td>" . $row['description'] . "</td><td><a onclick=\"return confirm('Are you sure to reschedule?')\" href='doctor_appointment.php?reschedule={$row['appointment_id']}' class='btn' style='background-color: #5f9ea0; text-decoration: none;'>Reschedule</a></td></tr>";  //approve and reject botton
        }
        ?>
    </table>

</body>
<?php include('footer.php'); ?>
<script>
    //used by reschedule_form.php
    function change_date() {
        date = document.getElementById("date").value;
        document.getElementById("date_hidden").value = date;
        document.getElementById("update_date").submit();
    }
</script>

</html>