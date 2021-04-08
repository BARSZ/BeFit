<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <title>BeFit Fitness & Spa - the best fitness & spa in the Netherlands</title>
</head>
<body background ="../images/contactsBackground.jpg">
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
<div class = "logos">
    <p class="textLogos">Contact us anytime!</p>
    <div>
        <a href="https://www.instagram.com/vasilsimeonov3107/">
            <img src="../images/instagramlogo.png" width="200" height="200">
        </a>
        <br>
        <br>
        <a href="https://www.facebook.com/jorojoromanev">
            <img src="../images/facebookModified.png" width="200" height="200">
        </a>
        <br>
        <br>
        <a href="https://mail.google.com/mail/u/1">
        <img src="../images/gmaillogo.png" width="200" height="150">
        </a>
        <br>
        <br>
        <a href="https://www.youtube.com/channel/UCbMI285APuj7jy7xVi0kJaw">
            <img src="../images/youtubeLogo.png" width="200" height="200">
        </a>
        <br>
        <br>
    </div>
</div>
<footer class="footer" style="color: lavenderblush">All rights reserved (c) 2020 George Manev & Vasil Simeonov.</footer>
</body>
</html>