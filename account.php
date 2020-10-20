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
    session_start();
    include('header.php');
    ?>
    <h2 style="text-align: center;">My Account Information</h2>
    <br>
    <br>
    <div class="row">
        <div class="column" style="margin: 0 0 0 15%;">
            <img src="images/patient.png" style="width:250px">
        </div>
        <div class="column" style="margin: 0 20% 0 0;">
            <table>
                <tr>
                    <td>
                        <h3>Username</h3>
                    </td>
                    <td>
                        <?php echo $_SESSION['username']; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Email</h3>
                    </td>
                    <td>
                        Jacob_Xie@gmail.com
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Phone</h3>
                    </td>
                    <td>
                        8888-8888
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Gender</h3>
                    </td>
                    <td>
                        Male
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>Address</h3>
                    </td>
                    <td>
                        Regent Height 01-03
                    </td>
                </tr>

            </table>
            <br>
            <button id="update_account" class="btn" onclick="update_account()">Update Information</button>
        </div>

    </div>
    <br>
    <br>
    <form id="update_form" style="display: none;" action="" method="POST">
        <div class="input-group">
            <label for="username">Username: </label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label for="email">Email: </label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label for="phone">Phone: </label>
            <input type="text" name="phone">
        </div>
        <div class="input-group">
            <label for="gender">Gender: </label>
            <input type="text" name="gender">
        </div>
        <div class="input-group">
            <label for="address">Address: </label>
            <input type="text" name="address">
        </div>

        <div style="text-align: right;">
            <button name="cancel_update" class="btn" style="display: inline-block;background-color:red" onclick="cancel_update()"> Cancel </button>
            <button type="submit" name="submit_update" class="btn" style="display: inline-block;"> Submit </button>
            <!-- <button  class="btn" style="display: inline-block;margin-left:55%"> Submit </button>
            <button type="submit" name="submit_update" class="btn" style="display: inline-block;margin-left:85%"> Submit </button> -->
        </div>


    </form>
    <br>
    <br>

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