<!-- Handle most backend request -->
<?php
session_start();

//initialising variables
$username = "";
$email = "";
$password1 = "";
$password2 = "";
$password = "";

$errors = array();

//connect to db
$db = mysqli_connect('localhost', 'root', '', 'dental') or die("could not connect to db");

//register new users
//$_POST['username'], $_POST['email'], $_POST['username'], $_POST['username']
if (isset($_POST['register_user'])) {
    //get data from register form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);

    //form validation
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password1)) {
        array_push($errors, "password is required");
    };
    if ($password1 != $password2) {
        array_push($errors, "Passwords do not match");
    }

    //check if existing user
    $user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";

    $results = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($results);

    if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if ($user['email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    //register if no errors
    if (count($errors) == 0) {
        $password = md5($password1); //this will encrypt the password
        $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        mysqli_query($db, $query);

        header('location: index.php');
    }
}



//login user
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password';";
        $results = mysqli_query($db, $query);

        //if username and password matches
        if (mysqli_num_rows($results) == 1) {
            $user = mysqli_fetch_assoc($results);
            $id = $user['id'];
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['user_type'] = $user['type'];
            $_SESSION['profile_image'] = $user['profile_image'];
            $_SESSION['success'] = "Logged in successfully";
            header("location: index.php");
        } else {
            array_push($errors, "Wrong username/password");
        }
    }
}

//user logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    header('location: login.php');
}

//update user account information
if (isset($_POST['submit_update'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $address = mysqli_real_escape_string($db, $_POST['address']);

    $query = "UPDATE users SET username='$username', email='$email', phone='$phone', gender='$gender', address='$address' WHERE id={$_SESSION['id']}";
    mysqli_query($db, $query);
}

//patient submit appointment with some doctor
if (isset($_POST['submit_appointment'])) {
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $timeslot = mysqli_real_escape_string($db, $_POST['timeslot']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $patient_id = $_SESSION['id'];
    //insert new appointment
    $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, timeslot, description) VALUES ($patient_id, 6,'$date', '$timeslot','$description');";
    mysqli_query($db, $query);
    //update doctor calendar
    $query = "UPDATE `calendar_6` SET `$timeslot`='1' WHERE `calendar_date` = '$date';";
    mysqli_query($db, $query);
    header('location: patient_appointment.php');
}

//patient and doctor can reschedule one appointment
if (isset($_POST['reschedule_appointment'])) {
    $new_date = mysqli_real_escape_string($db, $_POST['date']);
    $new_timeslot = mysqli_real_escape_string($db, $_POST['timeslot']);
    $appointment_id = mysqli_real_escape_string($db, $_POST['appointment_id']);
    //get old appointment date and timeslot
    $query = "SELECT * FROM appointments WHERE appointment_id=$appointment_id;";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $appointment = mysqli_fetch_assoc($results);
        $old_date = $appointment["appointment_date"];
        $old_timeslot = $appointment["timeslot"];
    }
    //update appintment information
    $query = "UPDATE appointments SET `appointment_date`='$new_date', `timeslot`='$new_timeslot' WHERE appointment_id=$appointment_id;";
    mysqli_query($db, $query);
    //update doctor calendar information
    $query = "UPDATE `calendar_6` SET `$new_timeslot`='1' WHERE `calendar_date` = '$new_date';";
    mysqli_query($db, $query);
    $query = "UPDATE `calendar_6` SET `$old_timeslot`='0' WHERE `calendar_date` = '$old_date';";
    mysqli_query($db, $query);
    //redirect user
    if ($_SESSION["type"] == "doctor") {
        header('location: doctor_appointment.php');
    } else {
        header('location: patient_appointment.php');
    }
}

//patient cancel an appointment
if (isset($_GET['cancel'])) {
    $appointment_id = $_GET['cancel'];
    $query = "DELETE FROM appointments WHERE appointment_id = $appointment_id;";
    mysqli_query($db, $query);
    header('location: patient_appointment.php');
}

if (isset($_POST['upload_image'])) {


    $target_dir = "profile_images/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $id = $_SESSION["id"];
    $name = $id . '.' . $imageFileType;
    // Valid file extensions
    $extensions_arr = array("jpg");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {

        // Insert record
        $query = "UPDATE `users` SET `profile_image`='1' WHERE `id` = $id;";
        mysqli_query($db, $query);

        // Upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name);
        $_SESSION["profile_image"] = '1';
        header('location: account.php');
    }
}
// //user submit new leave request
// if (isset($_POST['apply'])) {
//     //get holidays array
//     $query = "SELECT holiday_date FROM holidays ORDER BY holiday_date;";
//     $results = mysqli_query($db, $query);
//     $holidays = array();
//     while ($row = mysqli_fetch_array($results)) {   //Creates a loop to loop through results
//         $holidays[] = $row['holiday_date'];
//     }

//     //get form data
//     $start_date = $_POST['start_date']; //'09/14/2020'
//     $start_date_array = explode("/", $start_date);
//     $start_date = $start_date_array[2] . "-" . $start_date_array[0] . "-" . $start_date_array[1]; //'2020-09-14'

//     $end_date = $_POST['end_date'];
//     $end_date_array = explode("/", $end_date);
//     $end_date = $end_date_array[2] . "-" . $end_date_array[0] . "-" . $end_date_array[1];

//     //add one day since include the last day
//     $end_date_ = date("Y-m-d", strtotime("$end_date +1 day"));
//     $note = $_POST['note'];
//     if (isset($_POST['half_begin'])) {
//         $half_begin = 1;
//     }
//     if (isset($_POST['half_end'])) {
//         $half_end = 1;
//     }
//     //calculate taken leave days
//     $date1 = strtotime($start_date);
//     $date2 = strtotime($end_date_);
//     $days = ($date2 - $date1) / 60 / 60 / 24; //total days include holidays and weekends
//     //if first day half day and first day is not holiday
//     if ($half_begin && !(date('N', strtotime($start_date)) >= 6 || in_array($start_date, $holidays))) {
//         $days -= 0.5;
//     };
//     //if last day half day and last day is not holiday
//     if ($half_end && !(date('N', strtotime($end_date)) >= 6 || in_array($end_date, $holidays))) {
//         $days -= 0.5;
//     };

//     $start_date_ = new DateTime($start_date);
//     $end_date_ = new DateTime($end_date_);

//     //iterrate every day to check if it is holiday or weekends
//     $interval = DateInterval::createFromDateString('1 day');
//     $period = new DatePeriod($start_date_, $interval, $end_date_);

//     //if it is holiday or weekends
//     foreach ($period as $d) {
//         //echo $d->format("l Y-m-d\n");
//         if (date('N', strtotime($d->format("Y-m-d"))) >= 6 || in_array($d->format("Y-m-d"), $holidays)) {
//             $days -= 1;
//         }
//     }

//     $id = $_SESSION['id'];

//     //date validation
//     if ($start_date > $end_date) {
//         array_push($errors, " EndDate should be greater than StartDate ");
//     }
//     if (count($errors) == 0) {
//         $username = $_SESSION['username'];
//         $query = "INSERT INTO leaves (id, username, start_date, end_date, note, half_begin, half_end, days) VALUES ('$id', '$username','$start_date', '$end_date', '$note', '$half_begin', '$half_end', '$days');";

//         mysqli_query($db, $query);

//         //substract days from left leave days 
//         $query = "UPDATE users SET annual_leave=annual_leave - {$days} WHERE username='{$username}'";
//         mysqli_query($db, $query);

//         header('location: leave_list.php');
//     }
// }

// //user cancel request
// if (isset($_GET['cancel'])) {
//     $leave_id = $_GET['cancel'];
//     $query = "SELECT * FROM leaves WHERE leave_id=$leave_id;";
//     $results = mysqli_query($db, $query);
//     $leave = mysqli_fetch_assoc($results);
//     //if user cancel request already approved by admin
//     if ($leave['status'] == 'approved') {
//         echo "yes";
//         date_default_timezone_set('Australia/Melbourne');
//         $today_date = date('Y-m-d', time());
//         //user cancel request after start date, cancelling needs to be approved
//         if ($today_date >= $leave['start_date']) {
//             $query = "UPDATE leaves SET status='cancelling', admin_active=1 WHERE leave_id='$leave_id'";
//             mysqli_query($db, $query);
//             echo '<script>alert("Cancel successfully! Waiting for approval again.")</script>';
//             header('location: leave_list.php');
//         }
//         //user cancel request before start date
//         else {
//             $query = "UPDATE leaves SET status='cancelled', admin_active=0 WHERE leave_id='$leave_id'";
//             mysqli_query($db, $query);
//             echo '<script>alert("Cancel successfully!")</script>';

//             //add days back to left days 
//             $query = "SELECT * FROM leaves WHERE leave_id='$leave_id'";
//             $results = mysqli_query($db, $query);
//             $leave = mysqli_fetch_assoc($results);
//             $query = "UPDATE users SET annual_leave=annual_leave + {$leave['days']} WHERE username='{$leave['username']}'";
//             mysqli_query($db, $query);

//             header('location: leave_list.php');
//         }
//     }
//     //if user cancel before approve, set status cancelled
//     else if ($leave['status'] == 'created') {
//         $query = "UPDATE leaves SET status='cancelled', admin_active=0 WHERE leave_id='$leave_id'";
//         mysqli_query($db, $query);

//         //add days back to left leave days 
//         $query = "SELECT * FROM leaves WHERE leave_id='$leave_id'";
//         $results = mysqli_query($db, $query);
//         $leave = mysqli_fetch_assoc($results);
//         $query = "UPDATE users SET annual_leave=annual_leave + {$leave['days']} WHERE username='{$leave['username']}'";
//         mysqli_query($db, $query);
//         $_SESSION['annual_leave'] += $leave['days'];
//         header('location: leave_list.php');
//     } else {
//         header('location: leave_list.php');
//     }
// }

// //admin approve new request
// if (isset($_GET['approve'])) {
//     $leave_id = $_GET['approve'];
//     $query = "UPDATE leaves SET status='approved', admin_active=0 WHERE leave_id='$leave_id'";
//     mysqli_query($db, $query);
//     header('location: admin_leave_list.php');
// }

// //admin approve cancelling after start day
// if (isset($_GET['approve_cancel'])) {
//     $leave_id = $_GET['approve_cancel'];
//     $query = "UPDATE leaves SET status='cancelled', admin_active=0 WHERE leave_id='$leave_id'";
//     mysqli_query($db, $query);
//     echo '<script>alert("Approve cancelling successfully!")</script>';

//     //add days back to left days 
//     $query = "SELECT * FROM leaves WHERE leave_id='$leave_id'";
//     $results = mysqli_query($db, $query);
//     $leave = mysqli_fetch_assoc($results);
//     $query = "UPDATE users SET annual_leave=annual_leave + {$leave['days']} WHERE username='{$leave['username']}'";
//     mysqli_query($db, $query);
//     $_SESSION['annual_leave'] += $leave['days'];
//     header('location: admin_leave_list.php');
// }

// //admin reject new request
// if (isset($_GET['reject'])) {
//     $leave_id = $_GET['reject'];
//     $query = "UPDATE leaves SET status='rejected', admin_active=0 WHERE leave_id='$leave_id'";
//     mysqli_query($db, $query);
//     echo '<script>alert("You reject this request!")</script>';
//     header('location: admin_leave_list.php');
// }

// //admin add holiday
// if (isset($_POST['add_holiday'])) {
//     $holiday_name = mysqli_real_escape_string($db, $_POST['holiday_name']);
//     $holiday_date = mysqli_real_escape_string($db, $_POST['holiday_date']);
//     $day = date('l', strtotime($holiday_date));

//     if (empty($holiday_name)) {
//         array_push($errors, "Holiday name is required");
//     }
//     if (empty($holiday_name)) {
//         array_push($errors, "Holiday date is required");
//     }

//     if (count($errors) == 0) {
//         $query = "INSERT INTO holidays (holiday_name, holiday_date, day) VALUES ('$holiday_name','$holiday_date', '$day');";
//         mysqli_query($db, $query);
//         echo '<script>alert("Add holiday successfully!")</script>';
//         header('location: holidays.php');
//     }
// }

// //admin delete holiday
// if (isset($_GET['delete_holiday'])) {
//     $holiday_id = $_GET['delete_holiday'];
//     $query = "DELETE FROM holidays WHERE holiday_id = $holiday_id";
//     mysqli_query($db, $query);
//     header('location: holidays.php');
// }

// //admin delete leave year
// if (isset($_GET['delete_leave_year'])) {
//     $year = $_GET['delete_leave_year'];
//     $query = "DELETE FROM leave_year WHERE year = $year";
//     mysqli_query($db, $query);
//     header('location: set_leave_days.php');
// }

// //admin add/edit leave year
// if (isset($_POST['add_leave_year'])) {
//     $year = mysqli_real_escape_string($db, $_POST['year']);
//     $annual_leave = mysqli_real_escape_string($db, $_POST['annual_leave']);
//     $medical_leave = mysqli_real_escape_string($db, $_POST['medical_leave']);

//     $query = "INSERT INTO leave_year (year, annual_leave, medical_leave) VALUES ('$year','$annual_leave', '$medical_leave') 
//     ON DUPLICATE KEY UPDATE year=$year, annual_leave=$annual_leave, medical_leave=$medical_leave;";
//     mysqli_query($db, $query);
//     header('location: set_leave_days.php');
// }

// 
?>