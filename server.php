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
$db = mysqli_connect('localhost', 'root', '', 'f35ee') or die("could not connect to db");
// $db = mysqli_connect('localhost', 'f35ee', 'f35ee', 'f35ee') or die("could not connect to db");

//register new users
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
        array_push($errors, "Password is required");
    }
    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$/", $password1)) {
        array_push($errors, "Password should include at least 1 uppercase, 1 lowercase and 1 number");
    }
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
            if ($_SESSION['user_type'] == 'doctor') {
                $_SESSION['doctor_id'] = $id;
            }
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
    session_unset();
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
    // $to = 'f35ee@localhost';
    // $subject = 'dental appointment';
    // $massage = ' Your have made an appointment';
    // $headers = 'From: f35ee@localhost' . "\r\n" .
    //     'Reply-To:f35ee@localhost' . "\r\n" .
    //     'X-Mailer: PHP/' . phpversion();
    // mail($to, $subject, $massage, $headers, '-f35ee@localhost');
    // echo ("mail send to:" . $to);

    $doctor_id = $_SESSION['doctor_id'];
    $patient_id = $_SESSION['id'];
    //insert new appointment
    $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, timeslot, description) VALUES ($patient_id, $doctor_id,'$date', '$timeslot','$description');";
    mysqli_query($db, $query);
    //update doctor calendar
    $query = "UPDATE `calendar_{$doctor_id}` SET `$timeslot`='1' WHERE `calendar_date` = '$date';";
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
        $old_doctor_id = $appointment["doctor_id"];
    }
    //update appintment information
    $query = "UPDATE appointments SET `appointment_date`='$new_date', `timeslot`='$new_timeslot' WHERE appointment_id=$appointment_id;";
    mysqli_query($db, $query);
    //update doctor calendar information
    $query = "UPDATE `calendar_{$old_doctor_id}` SET `$new_timeslot`='1' WHERE `calendar_date` = '$new_date';";
    mysqli_query($db, $query);
    $query = "UPDATE `calendar_{$old_doctor_id}` SET `$old_timeslot`='0' WHERE `calendar_date` = '$old_date';";
    mysqli_query($db, $query);

    //redirect user
    if ($_SESSION["user_type"] == "doctor") {
        header('location: doctor_appointment.php');
    } else {
        header('location: patient_appointment.php');
    }
}

//patient cancel an appointment
if (isset($_GET['cancel'])) {
    $appointment_id = $_GET['cancel'];
    //get old appointment date and timeslot
    $query = "SELECT * FROM appointments WHERE appointment_id=$appointment_id;";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $appointment = mysqli_fetch_assoc($results);
        $old_date = $appointment["appointment_date"];
        $old_timeslot = $appointment["timeslot"];
        $old_doctor_id = $appointment["doctor_id"];
    }
    $query = "UPDATE `calendar_{$old_doctor_id}` SET `$old_timeslot`='0' WHERE `calendar_date` = '$old_date';";
    mysqli_query($db, $query);
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

//toggle availability
if (isset($_GET['toggle'])) {

    //get date and timeslot
    $doctor_id = $_SESSION["id"];
    $date = $_SESSION["date"];
    $timeslot = $_GET['toggle'];
    //update doctor calendar information
    $query = "SELECT * FROM `calendar_{$doctor_id}` WHERE `calendar_date` = '$date';";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $status = mysqli_fetch_assoc($results)["$timeslot"];
        if ($status == '2') {
            $_SESSION["$timeslot"] = 0;
        } else if ($status == '0') {
            $_SESSION["$timeslot"] = 2;
        } else if ($status == '1') {
            header('location: index.php');
        }
    }
    if ($status == '2') {
        $query = "UPDATE `calendar_{$doctor_id}` SET `$timeslot`='0' WHERE `calendar_date` = '$date';";
    } else if ($status == '0') {
        $query = "UPDATE `calendar_{$doctor_id}` SET `$timeslot`='2' WHERE `calendar_date` = '$date';";
    }
    mysqli_query($db, $query);
    var_dump($errors);
    //redirect user
    header('location: index.php');
}
