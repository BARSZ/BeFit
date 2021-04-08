<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="logInStyle.css">
</head>
<body>
<img class="logo" src="images/mainLogoWhite.png">
<h1>Sign In</h1>
<form method="post">
    <div class="container2">
        <div class="textbox1">
            <label for="uname"><b>Username:</b></label>
            <input type="text" placeholder="Username" name="uname" required>
            <br>
            </div>
        <div class="textbox1">
            <label for="psw"><b>Password :</b></label>
            <input type="password" placeholder="Password" name="psw" required>
            <br>
            </div>
        <div class="buttonSubmit">
            <button type="submit" name="login_user">Login</button>
        </div>
        <div class="donthaveacc">
            <label>
                <a href="Register.php" >Don't have an account? </a>
            </label>
            <br>
        </div>
    </div>
    <div class="container2" style="backface-visibility: visible">
        
    </div>
    </form>
</body>
</html>
    <?php

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: OtherPages/HomePage.php");
     }

if(isset($_POST['login_user'])){
    $_SESSION["logged_in"] = false;
include 'ServerSettings.php';

    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$queryusername = $_POST["uname"];
$querypassword = $_POST["psw"];
$sql ='SELECT * FROM users WHERE username = :username AND pass= :pword';
$stmt = $conn->prepare($sql);
$stmt->execute(
	[
		':username'=> $queryusername,
		':pword' => $querypassword
	]
);
$result = $stmt->fetch();
if($stmt->rowCount() > 0)
{
$_SESSION["loggedin"] = true;
$sql2 ='SELECT * FROM users WHERE username = :username';
$stmt2 = $conn->prepare($sql2);
$stmt2->execute(
	[
		':username'=> $queryusername,
    ]
);
$resultt = $stmt2->fetch();
$_SESSION['id'] = $result["id"];
$_SESSION['pass'] = $result["pass"];
$_SESSION['fname'] = $resultt["firstName"];
$_SESSION['lname'] = $resultt["lastName"];
$_SESSION['username'] = $resultt["username"];
$_SESSION['birthDate'] = $result["birthdate"];
$_SESSION['gender'] = $resultt["gender"];
$_SESSION['email'] = $resultt["e-mail"];

$personid = $_SESSION['id'];

$sql3 ='SELECT * FROM profiles WHERE id = :personid';
$stmt3 = $conn->prepare($sql3);
$stmt3->execute(
    [
        ':personid'=> $personid,
    ]
);
$resultProfiles = $stmt3->fetch();

$_SESSION['role'] = $resultProfiles["role"];
$_SESSION['membershipExpires'] = $resultProfiles["membershipExpires"];
$_SESSION['credits'] = $resultProfiles["credits"];
$_SESSION['membershipType'] = $resultProfiles["membershipType"];

header('Location:OtherPages/HomePage.php');
}
else{

    $message = "You have entered the wrong password";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
$conn = null;

    }
?>
