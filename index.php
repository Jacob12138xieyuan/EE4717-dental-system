<?php
include('server.php');
if (empty($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first to view this paage";
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employer Leave System</title>
</head>

<body>
    <div class="header">
        <h1>Employer Leave System</h1>
    </div>

    <!-- welcome session  -->
    <div class="content" style="border-radius: 0px 0px 10px 10px;">
        <?php if (isset($_SESSION['success'])) : ?>

            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    //unset($_SESSION['success']);
                    ?>
                </h3>
            </div>

        <?php endif ?>

        <?php if (isset($_SESSION['username'])) : ?>
            <div>
                <p style="float:left">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                <p style="float:right"><a href="index.php?logout='1'" style="color: red;">Log out</a></p>
            </div>
            <br>
            <br>

        <?php endif ?>
    </div>
    <br>
    <br>
</body>

</html>