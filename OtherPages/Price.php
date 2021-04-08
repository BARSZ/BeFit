<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>BeFit Fitness & Spa - the best fitness & spa in the Netherlands</title>
</head>
<body background="../images/contactsBackground.jpg">
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
                            Profile: <?php echo "{$_SESSION['fname'] }  {$_SESSION['lname']}"?>
                        </a>
                    </li>
                    <li><a href="../Logout.php">Log Out</a></li>
                </ul>
            </nav>
        </a>
    </div>
</header>
<div class="columns">
    <ul class="price">
        <li class="header">Basic membership</li>
        <li class="grey">50 € / per month</li>
        <li>You can workout 3 times per week</li>
        <li>3 workouts with a Personal trainer</li>
        <li>5 Spa treatments</li>
        <li>Free mineral water and towel</li>
        <li class="grey"><a href="Contacts.php" class="button">Sign Up</a></li>
    </ul>
    <br>
    <ul class="price">
        <li class="header">Premium membership *BEST DEAL*</li>
        <li class="grey">$ 100 € / per month</li>
        <li>You can workout 7 times per week</li>
        <li>10 workouts with a Personal trainer</li>
        <li>15 Spa treatments</li>
        <li>Free mineral water, towel and a protein bar</li>
        <li class="grey"><a href="Contacts.php" class="button">Sign Up</a></li>
    </ul>
</div>
<footer class="footer" style="color: lavenderblush">All rights reserved (c) 2020 George Manev & Vasil Simeonov.</footer>
</body>
</html>