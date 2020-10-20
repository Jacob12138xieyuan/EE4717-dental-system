<!DOCTYPE html>
<html>

<head>
    <?php
    session_start();
    include('header.php');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="basic.css">
    <style>
        * {
            box-sizing: border-box;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        /* The actual timeline (the vertical ruler) */
        .timeline::after {
            content: '';
            position: absolute;
            width: 3px;
            background-color: #5f9ea0;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        /* Container around content */
        .container {
            padding: 10px 40px;
            position: relative;
            width: 50%;
        }

        /* The circles on the timeline */
        .container::after {
            content: '';
            position: absolute;
            width: 22px;
            height: 22px;
            right: -13px;
            background-color: white;
            border: 4px solid #FF9F55;
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        /* Place the container to the left */
        .left {
            left: 0;
        }

        /* Place the container to the right */
        .right {
            left: 50%;
        }

        /* Add arrows to the left container (pointing right) */
        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent #5f9ea0;
        }

        /* Add arrows to the right container (pointing left) */
        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent #5f9ea0 transparent transparent;
        }

        /* Fix the circle for containers on the right side */
        .right::after {
            left: -16px;
        }

        /* The actual content */
        .event {
            padding: 10px 20px;
            background-color: #5f9ea0;
            position: relative;
            border-radius: 6px;
        }

        /* Media queries - Responsive timeline on screens less than 600px wide */
        @media screen and (max-width: 600px) {

            /* Place the timelime to the left */
            .timeline::after {
                left: 31px;
            }

            /* Full-width containers */
            .container {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            /* Make sure that all arrows are pointing leftwards */
            .container::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;

            }

            /* Make sure all circles are at the same spot */
            .left::after,
            .right::after {
                left: 15px;
            }

            /* Make all right containers behave like the left ones */
            .right {
                left: 0%;
            }
        }
    </style>
</head>

<body>
    <br>
    <h2 style="text-align: center;">Our History</h2>
    <br>
    <div class="timeline">
        <div class="container left">
            <div class="event">
                <h2>2017</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci.</p>
            </div>
        </div>
        <div class="container right">
            <div class="event">
                <h2>2014</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci.</p>
            </div>
        </div>
        <div class="container left">
            <div class="event">
                <h2>2009</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci.</p>
            </div>
        </div>
        <div class="container right">
            <div class="event">
                <h2>2007</h2>
                <p>Lorem ipsum dolor sit amet, quo ei simul congue exerci.</p>
            </div>
        </div>
    </div>
    <br>
    <br>

</body>
<?php include('footer.php'); ?>

</html>