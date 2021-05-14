<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <link href="../profileStyle.css" type="text/css" rel="stylesheet">
    <title>BeFit Fitness & Spa - the best fitness & spa in the Netherlands</title>
</head>
<body background="../images/logInBackground.jpg">
<header>
    <div class="menu">
        <a href="../OtherPages/HomePage.php"><img src="../images/mainLogoWhite.png" alt="logo" class="logo">
            <nav>
                <ul>
                    <li><a href="../OtherPages/HomePage.php">Home</a></li>
                    <li><a href="../OtherPages/Gallery.php">Gallery</a></li>
                    <li><a href="../OtherPages/Price.php">Prices</a></li>
                    <li><a href="../OtherPages/Contacts.php">Contacts</a></li>
                    <li><a href= "AdminProfile.php">
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
    <div class="myProfileTitle">
        <h1>My Profile</h1>
    </div>
    <div class="rowProfile">
        <div class="columnProfile">
            <img src="../images/muscules-nobg.png" class="profilePicture">
        </div>
        <div class="profileInfo">
            <p style="color:white">Full Name: <span
                    style="color: palegoldenrod;"><?php echo "{$_SESSION['fname'] }  {$_SESSION['lname']}"?></span></p>
            <p style="color:white">Username: <span
                    style="color: palegoldenrod;"><?php echo $_SESSION['username'] ?></span></p>
            <p style="color:white">Role: <span
                    style="color: palegoldenrod;"><?php echo $_SESSION['role'] ?></span></p>
            <p style="color:white">Age: <span
                    style="color: palegoldenrod;"><?php
                   // include '..\Functions.php';
                    if(getAge($_SESSION['birthDate']) > 0){
                        echo getAge($_SESSION['birthDate']);
                    }else{
                        echo 1;
                    }
                    ?></span></p>
            <p style="color:white">E-Mail: <span
                    style="color: palegoldenrod;"><?php echo $_SESSION['email']?></span></p>
            <p style="color:white">Member since: <span
                    style="color: palegoldenrod;">01-09-2019</span></p>
        </div>

    </div>
    <div class="myProfileTitle">
        <h1>Delete Users</h1>
    </div>
    <div class="rowProfile">
        <div class="membershipInfo">
            <div class="membershipColumn">
                <form name ="lbUserList" Method="post" action="AdminProfile.php">
                    <p> Select a user from the listbox that you want to delete:</p>
                    <select name="taskOption" size="5" id="listbox">
                    <!-- Usernames will be here -->
                    </select>
                    <div class="container">
                        <button type="submit" class="btn" id = "deleteUser" name="buttonDelete">Delete User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer class="footer">All rights reserved (c) 2020 Vasil Simeonov.</footer>

<script src="../JS%20Files/AdminProfile.js"></script>
</body>
<?php
function getAge($date) { // Y-m-d format
    return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
}
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

//Code for getting the usernames from the database and putting them into array
include 'QueryUsers.php';
function getNames(){
    $namesTwoValues = GetUsernames();
    $namesArray = array();

    //Convert the associative array into indexed array
    for ($i = 0; $i < count($namesTwoValues); $i++){
        $namesArray[$i] = $namesTwoValues[$i][0];
    }
    $_SESSION["namesArray"] = $namesArray;
}
getNames();

//Code for deleting USER
if (isset($_POST["buttonDelete"])) {
    $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
    if ($option) {
        DeleteUser($_POST['taskOption']);
    } else {
        echo "<script type='text/javascript'>alert('Please choose a user from the list');</script>";
        exit;
    }
}
?>
</html>

