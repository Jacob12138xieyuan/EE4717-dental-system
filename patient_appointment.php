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
    <h2 style="text-align: center;">My Appointments History</h2>
    <br>
    <br>
    <table>
        <tr>
            <th>Doctor</th>
            <th>Date</th>
            <th>Timeslot</th>
            <th style='width:50%'>Description</th>
        </tr>

        <?php
        $user_id = $_SESSION["id"];
        $query = "SELECT * FROM appointments where patient_id=$user_id ORDER BY appointment_date;";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
            echo "<tr><td>" . $row['doctor_id'] . "</td><td>" . $row['appointment_date'] . "</td><td>" . $row['timeslot'] . "</td><td>" . $row['description'] . "</td></tr>";  //approve and reject botton
        }
        ?>
    </table>

</body>
<?php include('footer.php'); ?>

</html>