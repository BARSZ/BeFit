<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>BeFit Fitness & Spa - the best fitness & spa in the Netherlands</title>
</head>
<body background="../images/logInBackground.jpg">
<header>
    <div class="menu">
        <a href="HomePage.php"><img src="../images/mainLogoWhite.png" alt="logo" class="logo">
            <nav>
                <ul>
                    <li><a href="HomePage.php">Home</a></li>
                    <li><a href="Gallery.php">Gallery</a></li>
                    <li><a href="Price.php">Prices</a></li>
                    <li><a href="Contacts.php">Contacts</a></li>
                    <li><a href= <?php
                        include '..\Functions.php';
                        CheckRole();
                        ?>>
                            Profile: <?php echo "{$_SESSION['fname'] }  {$_SESSION['lname']}"?>
                        </a>
                    </li>
                    <li><a href="../Logout.php">Log Out</a></li>
                </ul>
            </nav>
        </a>
    </div>
</header>
<div class="galleryBody">
    <div class="pictureTitle">
        <h1>Power zone</h1>
    </div>
    <div class="row">
        <div class="column">
            <img src="../images/gymBenchesImg.jpg" class="galleryPicture">
        </div>
        <div class="pictureInfo">
            <p style="color:white">It is equipped with the latest
            generation of the best brands in the
            world of Life Fitness, TechnoGym
            and ActiveGym.</p>
        </div>
    </div>
    <div class="row">
        <div class="column">
            <img src="../images/gymDumbellsImg.jpg" class="galleryPicture">
        </div>
        <div class="pictureInfo">
            <p style="color:white;">More than 40
            machines are from the Limited
            Selection range, known for their
            comfortable ergonomic bio seats
                and highly functional design.</p>
        </div>
    </div>
    <div class="pictureTitle">
        <h1>Spa</h1>
    </div>
    <div class="row">
        <div class="column">
            <img src="../images/spaImage.jpg" class="galleryPicture">
        </div>
        <div class="pictureInfo">
            <p style="color:white">Renew your body and mind
            at our Spa. The BeFit Fitness
            spas are the best equipped
            and spacious in the country.
            Here you will enjoy a wide range
            of state-of-the-art facilities,
            relaxation areas and spa
            treatments that will alleviate
            fatigue and refresh
            every cell in your body.</p>
        </div>
    </div>
</div>
<footer class="footer">All rights reserved (c) 2020 George Manev & Vasil Simeonov.</footer>
</body>
</html>

