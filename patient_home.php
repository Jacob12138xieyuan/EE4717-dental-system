<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="basic.css">
    <style>
        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            margin-top: -22px;
            padding: 16px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active,
        .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        * {
            box-sizing: border-box;
        }


        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 20px;
        }

        /* Remove extra left and right margins, due to padding in columns */
        .row {
            margin: 0 -5px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            /* this adds the "card" effect */
            text-align: center;
            background-color: #f1f1f1;
        }

        .card p {
            padding: 16px;
        }

        /* Responsive columns - one column layout (vertical) on small screens */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="container">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="images/image1.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="images/image2.jpg" style="width:100%">
            </div>

            <div class="mySlides fade">
                <img src="images/image3.jpg" style="width:100%">
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
        </div>

        <br>
        <h2 style="text-align: center;">Welcome to Doctor Smile Dental!</h2>
        <br>
        <div class="row">
            <div class="column" style="margin-left: 13%;">

                <div class="card">
                    <a href="dental_history.php"><img style="width: 100%;" src="images/history.jpg" alt=""></a>
                    <h3>Our History</h3>
                    <p>Our dental centre was opened in December 2009, at City Square Mall. With a built-in area of approximately 12,000 sq ft, it has 32-treatment rooms. It is fully equipped with the latest in dental technology.</p>
                </div>
            </div>
            <div class="column">

                <div class="card">
                    <a href="dental_services.php"><img style="width: 100%;" src="images/services.jpg" alt=""></a>
                    <h3>Our Services</h3>
                    <p>We provides multidisciplinary specialist care for complex dental conditions. Our services encompass oral and maxillofacial surgery, orthodontics, prosthodontics, endodontics, periodontics, and paediatric dentistry.</p>
                </div>
            </div>
            <div class="column">

                <div class="card">
                    <a href="dental_doctors.php"><img style="width: 100%;" src="images/doctors.jpg" alt=""></a>
                    <h3>Our doctors</h3>
                    <p>To assist and facilitate our dentists in their continuous efforts in keeping abreast with the latest technology and evidence-based practice, by engaging them with workshops, seminars and conferences; and</p>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include('footer.php'); ?>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

</html>