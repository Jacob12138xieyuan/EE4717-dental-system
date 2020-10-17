<!-- log in page -->

<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link rel="stylesheet" type="text/css" href="basic.css">
    <style>
        .header {
            width: 30%;
            margin: 50px auto 0px;
            color: white;
            background: #5f9ea0;
            text-align: center;
            border: 1px solid #b0c4de;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Log in</h2>
    </div>
    <form action="login.php" method="post">
        <?php include("errors.php") ?>
        <div class="input-group">
            <label for="username">Username: </label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="password">Password: </label>
            <input type="password" name="password">
        </div>

        <div class="input-group">
            <button type="submit" name="login_user" class="btn"> Log in </button>
        </div>


        <p>Not yet a user?<a href="registration.php"><b>Sign up</b></a></p>

    </form>
</body>

</html>