<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make appointment</title>
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
            height: 45px;
            width: 98%;
            padding: 10px 5px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid grey;
        }
    </style>
</head>

<body>
    <?php
    include('server.php');
    include('header.php');
    //auto submit date when date changes
    if (isset($_POST['date_hidden'])) {
        $date = $_POST['date_hidden'];
        $query = "SELECT * FROM calendar_12 WHERE calendar_date='$date';";
        $results = mysqli_query($db, $query);
        $timeslots = array_slice(mysqli_fetch_assoc($results), 1);
        $_SESSION['doctor_id']='12';
        function is_zero($var)
        {
            return $var == '0';
        }
        //only show available timeslots
        $timeslots = array_filter($timeslots, "is_zero");
    }

    ?>
    <h2 style="text-align: center;">Make Appointment With Doctor: </h2>
    <br>
    <br>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/doctor2.jpg" style="width:250px">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <form id="appointment_form" action="server.php" method="post">
                <div class="input-group">
                    <label for="date">Date: </label>
                    <!-- patient can only book start from next day and up to 14 days -->
                    <input type="date" id="date" name="date" value="<?php echo (isset($date)) ? $date : ''; ?>" min="<?php echo date("Y-m-d", strtotime("+1 day")) ?>" max="<?php echo date("Y-m-d", strtotime("+14 day")) ?>" onchange="change_date()" required>
                </div>

                <div class="input-group">
                    <label for="timeslot">Timeslot: </label>
                    <select id="timeslot" name="timeslot" required>
                        <!-- <option value="0">Select Timeslot</option> -->
                        <?php
                        foreach ($timeslots as $timeslot => $boolean) {
                            echo '<option value="' . $timeslot . '">' . $timeslot . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                
                    <label for="description">Description: </label>
                    <input type="text" id="description" name="description" required>
                </div>

                <div style="text-align: right;">
                    <button type="reset" class="btn" style="display: inline-block;background-color:blue"> Clear </button>
                    <button type="submit" name="submit_appointment" class="btn" style="display: inline-block;" > Submit Appointment </button>
              
              </div>
            </form>
        </div>

    </div>
    <!-- hidden form for auto update selected date-->
    <form id="update_date" action="make_appointment_Gina.php" method="post" style="display:none;">
        <input type="date" id="date_hidden" name="date_hidden">
    </form>

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