<form id="appointment_form" action="server.php" method="post">
    <div class="input-group">
        <label for="date">Date: </label>
        <input type="date" id="date" name="date" value="<?php echo (isset($date)) ? $date : ''; ?>" min="<?php echo date("Y-m-d", strtotime("+1 day")) ?>" max="<?php echo date("Y-m-d", strtotime("+14 day")) ?>" onchange="change_date()" required>
    </div>

    <div class="input-group">
        <label for="timeslot">Timeslot: </label>
        <select id="timeslot" name="timeslot" required>
            <option value="0">Select Timeslot</option>
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
        <button type="submit" name="submit_appointment" class="btn" style="display: inline-block;"> Submit Appointment </button>
    </div>
</form>