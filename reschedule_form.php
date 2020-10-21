<style>
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
<?php

if (isset($_POST['date_hidden'])) {
    $date = $_POST['date_hidden'];
    $query = "SELECT * FROM calendar_6 WHERE calendar_date='$date';";
    $results = mysqli_query($db, $query);
    $timeslots = array_slice(mysqli_fetch_assoc($results), 1);
    function is_zero($var)
    {
        return $var == '0';
    }
    $timeslots = array_filter($timeslots, "is_zero");
}
?>
<form action="" method="post">
    <div class="input-group">
        <label for="date">Date: </label>
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
    <input id="appointment_id" name="appointment_id" type="text" style="display: none;">
    <!-- access appointment id -->
    <?php echo "<script>document.getElementById('appointment_id').value = " . $_GET["reschedule"] . ";</script>" ?>

    <div style="text-align: right;">
        <button type="reset" class="btn" style="display: inline-block;background-color:blue"> Clear </button>
        <button type="submit" name="reschedule_appointment" class="btn" style="display: inline-block;"> Submit Appointment </button>
    </div>
</form>
<!-- hidden form for auto update date-->
<form id="update_date" action="" method="post" style="display:none;">
    <input type="date" id="date_hidden" name="date_hidden">
</form>