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

        }

        th,
        td {
            padding: 15px;
        }

        form {
            width: 100%;
            margin: 0px auto;
            padding: 20px;
            border: 1px solid #b0c4de;
            background: white;
            border-radius: 10px;
        }

        select {
            padding-top: 20px;
            padding-bottom: 20px;
            height: 40px;
            width: 97%;
            padding: 10px 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid grey;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('header.php');
    ?>
    <h2 style="text-align: center;">Make Appointment With Doctor: </h2>
    <br>
    <br>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/doctor1.jpg" style="width:250px">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <form id="update_form" action="" method="POST">
                <div class="input-group">
                    <label for="date">Date: </label>
                    <input type="date" name="date">
                </div>
                <div class="input-group">
                    <label for="timeslot">Timeslot: </label>
                    <select id="timeslot" name="timeslot">
                        <option value="0">Select Timeslot</option>
                        <option value="1">Volvo</option>
                        <option value="2">Saab</option>
                        <option value="3">Fiat</option>
                        <option value="4">Audi</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="description">Description: </label>
                    <input type="text" name="description">
                </div>

                <div style="text-align: right;">
                    <button type="reset" class="btn" style="display: inline-block;background-color:blue"> Clear </button>
                    <button type="submit" name="submit_appoinment" class="btn" style="display: inline-block;"> Submit Appointment </button>
                </div>


            </form>
        </div>

    </div>

</body>
<?php include('footer.php'); ?>
<script>
    function update_account() {
        x = document.getElementById("update_form");
        if (x.style.display === "none") {
            x.style.display = "block";
        }
    }

    function cancel_update() {
        x = document.getElementById("update_form");
        if (x.style.display === "block") {
            x.style.display = "none";
        }
    }
</script>

</html>