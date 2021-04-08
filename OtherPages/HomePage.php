<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>BeFit Fitness & Spa - the best fitness & spa in the Netherlands</title>
</head>

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
                ?>
                >
                Profile: <?php
                    echo "{$_SESSION['fname'] }  {$_SESSION['lname']}"
                    ?>
                </a>
            </li>
            <li><a href="../Logout.php">Log Out</a></li>
        </ul>
        </nav>
        </a>
    </div>
</header>
<body>
<img class="homeImage" src="../images/HomeBackground.jpg">
<div class="homeContent">
    <h1>BeFit Fitness & Spa</h1>
    <p>BeFit Fitness & Spa is the largest<br> and most successful chain of fitness clubs in the Netherlands.<br> With its 5 consecutive annual Best Fitness Club honors,<br> 10 ultra modern locations, over 2 highly trained coaches<br> and tens of thousands of club members,<br> BeFit Fitness & Spa is a definite leader in the fitness and wellness industry.<br>
        But let's leave the numbers further and tell you what BeFit Fitness & Spa really is.</p>
</div>
<footer class="footer">All rights reserved (c) 2020 George Manev & Vasil Simeonov.</footer>
</body>
</html>