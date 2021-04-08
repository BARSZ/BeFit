<?php session_start(); ?>
<head>
    <link rel="stylesheet" type="text/css" href="logInStyle.css">
</head>
<body>
<form method="post">
    <div class="container2">
        <label for="email"><b>E-Mail:</b></label>
        <br>
        <input type="text" placeholder="Email" name="email" required>
        <br>
        <label for="fname"><b>First Name:</b></label>
        <br>
        <input type="text" placeholder="First name" name="fname" required>
        <br>
        <label for="lname"><b>Last Name:</b></label>
        <br>
        <input type="text" placeholder="First name" name="lname" required>
        <br>
        <label for="uname"><b>Username:</b></label>
        <br>
        <input type="text" placeholder="Username" name="uname" required>
        <br>
        <label for="psw"><b>Password:</b></label>
        <br>
        <input type="password" placeholder="Password" name="psw" required>
        <br>
        <label for="psw2"><b>Confirm Password :</b></label>
        <br>
        <input type="password" placeholder="Confirm Password" name="psw2" required>
        <br>
        <label for="dateBirth"><b>Birthday:</b></label>
        <br>
        <input id = "today" type="date" name="dateBirth">
        <br>
        <label for ="gender"><b>Choose a gender:</b></label>
        <br>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female
        <br>
        <label>
            <a href="index.php" >Already have an account? </a>
        </label>
        <br>
        <button type="submit" name="Register">Register</button>
        
    </div>
    <div class="container2" style="backface-visibility: visible">
        
    </div>
    </form>
<script>
    let today = new Date().toISOString().substr(0, 10);
    document.querySelector("#today").value = today;
</script>
</body>
    <?php
    if(isset($_POST['Register'])){
        $_SESSION["logged_in"] = false;
        include 'ServerSettings.php';

        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$queryfname = $_POST['fname'];
$queryflame = $_POST['lname'];
$queryusername = $_POST["uname"];
$querypassword = $_POST["psw"];
$querypassword2 = $_POST["psw2"];
$querybirthDate = $_POST["dateBirth"];
$querygender = $_POST["gender"];
$querymail = $_POST["email"];


if ($querypassword != $querypassword2)
{
    $message = "Passwords do not match";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
}
$sql ='SELECT * FROM users WHERE username = :username';
$stmt = $conn->prepare($sql);
$stmt->execute(
	[
		':username'=> $queryusername,
	]
);
while ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $dbusername = $user['username'];
}

$sqll ='SELECT * FROM users WHERE `e-mail` = :email';
$stmtt = $conn->prepare($sqll);
$stmtt->execute(
	[
		':email'=> $querymail,
	]
);
while ($user = $stmtt->fetch(PDO::FETCH_ASSOC)){

    echo $dbemail = $user['Email'];
}



while ($user = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $dbusername = $user['username'];
    echo $dbemail = $user['e-mail'];
}

if (!filter_var($querymail,FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid E-mail";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
if(strcasecmp($dbusername, $queryusername) == 0)
{
    $message = "Username already exists";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
}
if(strcasecmp($dbemail, $querymail) == 0)
{
    $message = "E-mail is already in use";
    echo "<script type='text/javascript'>alert('$message');</script>";
    die();
    
}
$sql ="INSERT INTO users (`username`,`pass`,`e-mail`,`birthDate`,`gender`,`firstName`,`lastName`) 
VALUES('$queryusername','$querypassword','$querymail','$querybirthDate','$querygender','$queryfname','$queryflame')";
$stmtt = $conn->prepare($sql);
$stmtt->execute();
$sql ="INSERT INTO profiles (`role`,`credits`,`membershipExpires`) 
VALUES('Client', 50 , '2021/04/08')";
        $stmtt = $conn->prepare($sql);
        $stmtt->execute();

$message = "Account created successfully!";
echo "<script type='text/javascript'>alert('$message');</script>";
sleep(2);
header('Location:index.php');
$conn = null;
    }
?>
