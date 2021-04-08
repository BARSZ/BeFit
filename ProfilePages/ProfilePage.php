<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="../style.css" type="text/css" rel="stylesheet">
    <link href="../profileStyle.css" type="text/css" rel="stylesheet">
    <title>BeFit Fitness & Spa - the best fitness & spa in the Netherlands</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                    <li><a href= "ProfilePage.php">
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
            <p style="color:white">Gender: <span
                    style="color: palegoldenrod;"><?php echo "{$_SESSION['gender'] }"?></span></p>
            <p style="color:white">Username: <span
                    style="color: palegoldenrod;"><?php echo $_SESSION['username'] ?></span></p>
            <p style="color:white">Role: <span
                    style="color: palegoldenrod;"><?php echo $_SESSION['role'] ?></span></p>
            <p style="color:white">Age: <span
                    style="color: palegoldenrod;"><?php
                    //include '../Functions.php';
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

            <!-- Button for showing the edit details pop up form -->
            <div class="container">
                <button id = "editProfileButton" class="btn">Edit Profile</button>
            </div>

            <!-- Edit Details pop up form -->
            <div class="form-popup" id="myForm">
                <form action="ProfilePage.php" class="form-container" method="post">
                    <div class="SpaceBetweenScrollbar">
                        <div class="scrollable">
                            <label class="form-label" for="fname"><b>First name:</b></label>
                            <input class="form-input" type="text" placeholder="Enter first name" name="fname">

                            <label for="lname"><b>Last name:</b></label>
                            <input type="text" placeholder="Enter last name" name="lname">

                            <label for="gender"><b>Choose a gender:</b></label>
                            <div class="radioButton">
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> Female
                            </div>

                            <label for="age"><b>Change Birthdate:</b></label>
                            <br>
                            <input id="today" type="date" name="dateBirth">
                            <br>

                            <label for="psw"><b>Current Password:</b></label>
                            <input type="password" placeholder="Enter Current Password" name="psw" required>

                            <label for="email"><b>New password:</b></label>
                            <input type="password" placeholder="Enter New Password" name="psw1">
                            <label for="psw"><b>Confirm Password:</b></label>
                            <input type="password" placeholder="Enter Current Password" name="psw2">
                        </div>
                    </div>
                    <!-- Buttons in the edit form for confirming or canceling the changes -->
                    <div class="nonScrollable">
                        <button type="submit" id = "btnConfirmEditChanges" name="editDetails" class="btn">Confirm Changes</button>
                        <button type="button" id = "btnCancelEditDetails" class="btn cancel">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="myProfileTitle">
        <h1>Membership Details</h1>
    </div>
    <div class="rowProfile">
        <div class="columnProfile">
            <img src="../images/bench_Vector_white.png" class="profilePicture">
        </div>
        <div class="membershipInfo">
            <!-- Top up credits pop up form -->
            <div class="form-popup" id="topUp">
                <form action="ProfilePage.php" class="form-container" method="post">

                    <label for="newCredits"><b>Top Up Credits:</b></label><br>
                    <label for="newCredits"><b>1</b>$ = <span style="color: gold; font-weight: bold">1</span> BeFit Credit</label>

                    <input type="number" placeholder="Enter desired amount" name="newCredits">
                    <!-- Buttons for confirming or canceling the changes made -->
                    <button type="submit" name = "topUpCredits" class="btn">Top Up Credits</button>
                    <button type="button" id="btnCancelTopUp" class="btn cancel">Close</button>
                </form>
            </div>
            <div class="membershipColumn"><p style="color:white"><b>BeFit Credits:</b><span style="color: gold; font-size: 125% "><?php echo " " .  $_SESSION['credits']?></span></p>
                <!-- Button for opening the top up credits form -->
                <div class="container">
                    <button id = "btnTopUpCredits" class="btn">Top Up Credits</button>
                </div>
            </div>

            <!-- Code for extend membership-->
            <div class="membershipColumn">
                        <p style="color:white"><b>Membership Type:</b><span
                        style="color: gold; font-size: 125% "><?php echo " " . $_SESSION['membershipType']?></span></p>
                        <p style="color:white"><b>Membership Expires:</b><span
                        style="color: palegoldenrod; font-size: 125% "><?php echo " " . $_SESSION['membershipExpires']?></span></p>

                <div class="container">
                    <button id = "btnExtendMembership" class="btn">Extend Membership</button>
                </div>
                <!-- PopUp form for extend membership-->
                <div class="form-popup" id="extendMembership">
                    <form action="ProfilePage.php" class="form-container" method="post">
                        <div class="SpaceBetweenScrollbar">
                            <div class="scrollable">
                                <label class="form-label" for="months"><b><span style="font-size:20px; color: #6f6f6f">Extend Membership</span></b></label>
                                <label class="form-label" for="months"><b>How many months ?</b></label>
                                <input class="form-input" id="addBottomSpace" type="number" placeholder="Enter desired amount" name="months">
                                <p class="paragraphMemb" > 1 Month = </p>
                                <p class="paragraphWithoutClear" id="MembCredits">50</p>
                                <p class="paragraphWithoutClear" >BeFit Credits</p>
                                <p class="paragraphWithoutClear" > 1 Month = 30 days</p>

                                <!--<label for="months"><b>1 </b>Month = <b></b><span style="color: gold;font-weight: bold">50</span></b> BeFit Credits</label>
                                <label for="months"><b>1 </b>Month = <b></b><span style="font-weight: bold">30 </span></b>days</label>-->

                                <label class="form-label" id="addSpace" for="rbMemType"><b>Choose membership type:</b></label>
                                <div class="radioButton">
                                    <input type="radio" id="rbBasic" name="rbMemType" value="Basic" checked="checked"> Basic
                                    <input type="radio" id="rbPremium" name="rbMemType" value="Premium"> Premium
                                </div>
                                <p id="yourChoice"> Your Choice: </p>
                                <p id="chosenMembership">Basic</p>
                                <p class="paragraphWithoutClear"><span style="color: yellow">WARNING</span> - If you change</p>
                                <p class="paragraphWithoutClear">current membership type, </p>
                                <p class="paragraphWithoutClear">new membership will start</p>
                                <p class="paragraphWithoutClear">from today.</p>

                            </div>
                        </div>
                        <!-- Buttons in the edit form for confirming or canceling the changes -->
                        <div class="nonScrollable">
                            <button type="submit" id = "btnConfirmMembershipChanges" name="btnConfirmMembership" class="btn">Confirm Changes</button>
                            <button type="button" id = "btnCancelMembershipChanges" class="btn cancel">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">All rights reserved (c) 2020 George Manev & Vasil Simeonov.</footer>
<script src="../JS%20Files/ClientProfile.js"></script>
</body>
<?php
//function for debugging php code
//include '../Functions.php';
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

//php code for extending membership
if (isset($_POST["btnConfirmMembership"])){
    $GLOBALS["dateFromSession"] = $_SESSION['membershipExpires'];
    $GLOBALS["currentCredits"] = $_SESSION['credits'];
    $currentMembType = $_SESSION['membershipType'];
    $SelectedMembership= $_POST["rbMemType"];
    $GLOBALS["sufficientCredits"] = false;
    $GLOBALS["months"] = $_POST["months"];

    debug_to_console("Button is SET");

    //query for extending the membership or changing the type of membership
    function DoQuery ($dateM,$calculateCredits,$newMembershipType)
    {
        if ($GLOBALS["months"] != "" && $GLOBALS["months"] > 0 && $GLOBALS["sufficientCredits"] == true) {
            $_SESSION["membershipExpires"] = date_format($dateM, 'Y-m-d');
            $_SESSION["credits"] = $calculateCredits;
            $_SESSION["membershipType"] = $newMembershipType;
            $servername = "studmysql01.fhict.local";
            $database = 'dbi426729';
            $username = "dbi426729";
            $password = "open";

            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sqlUpdate = 'UPDATE profiles SET membershipExpires = ? , credits = ? , membershipType = ? WHERE id = ?';
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->execute([$_SESSION["membershipExpires"], $_SESSION["credits"], $_SESSION["membershipType"], $_SESSION["id"]]);
                //refresh the page to update the info
                echo "<meta http-equiv='refresh' content='0'>";
            } catch (PDOException $e) {
                echo "<br>" . $e->getMessage();
            }
            header("location:ProfilePage.php");
            $conn = null;
        } else {
            echo '<script language="javascript">';
            echo 'alert("Please enter a valid number of months")';
            echo '</script>';
        }
    }

    //the function that extends the membership or decides if the type of membership has to be changed
    function Extend ($price,$MembType,$changeMembership)
    {
        if ($changeMembership == false) {
            $dateM = date_create($GLOBALS["dateFromSession"]);
        }
        else{
            $dateM = date_create(date("Y-m-d"));
        }
        $calculateDays = $GLOBALS["months"]*30;
        $calculateCredits = $GLOBALS["currentCredits"] - $GLOBALS["months"]*$price;
        if ($calculateCredits < 0){
            $GLOBALS["sufficientCredits"] = false;
            echo '<script>';
            echo 'alert("You do not have enough credits to extend your membership.")';
            echo '</script>';
        }
        else{
            $GLOBALS["sufficientCredits"] = true;
        }
        date_add($dateM, date_interval_create_from_date_string($calculateDays . " days"));
        echo date_format($dateM, 'Y-m-d');
        DoQuery($dateM,$calculateCredits,$MembType);
    }

    if ($SelectedMembership == "Basic"){
        if ($currentMembType == "Basic") {
            Extend(50,"Basic",false);
        }
        else if ($currentMembType == "Premium") {
            Extend(50,"Basic",true);
        }
    }
    else if ($SelectedMembership == "Premium"){
        if ($currentMembType == "Premium") {
            Extend(100,"Premium",false);
        }
        else if ($currentMembType == "Basic") {
            Extend(100,"Premium",true);
        }
    }

    //PHP code for topUp Credits
}
if (isset($_POST["topUpCredits"])){
    $credits =  $_SESSION["credits"] + $_POST["newCredits"];
    if($credits != ""){
        $_SESSION["credits"] = $credits;
    }
    $servername = "studmysql01.fhict.local";
    $database = 'dbi426729';
    $username = "dbi426729";
    $password = "open";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlUpdate ='UPDATE profiles SET credits = ? WHERE id = ?';
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->execute([$_SESSION["credits"], $_SESSION["id"]]);
        //refresh the page to update the info
        echo "<meta http-equiv='refresh' content='0'>";
    }
    catch(PDOException $e)
    {
        echo "<br>" . $e->getMessage();
    }
    header("location:ProfilePage.php");
    $conn = null;
}
if(isset($_POST["editDetails"])){
    $firstName = $_POST["fname"];
    $lastName = $_POST["lname"];
    $age = $_POST["dateBirth"];
    $currentPass = $_POST["psw"];
    $newPass = $_POST["psw1"];
    $confirmPass = $_POST["psw2"];
    $newGender = $_POST["gender"];
    //checks if the passwords match
    if($currentPass == $_SESSION["pass"]){
        //Checks if the user wants to change his name
        if($firstName != "" && $lastName != ""){
            $_SESSION['fname'] = $firstName;
            $_SESSION['lname'] = $lastName;
        }
        //if the user wants to change his password
        if($newPass != ""){
            if($newPass == $confirmPass){
                $_SESSION["pass"] = $newPass;
            }
        }
        //Checks if the user wants to change his age
        if($age != ""){
            $_SESSION["birthDate"] = $age;
        }
        //Checks if the user wants to change his gender
        if($newGender != ""){
            $_SESSION["gender"] = $newGender;
        }
        $servername = "studmysql01.fhict.local";
        $database = 'dbi426729';
        $username = "dbi426729";
        $password = "open";
        try{

            $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sqlUpdate ='UPDATE users SET pass = ? , birthdate = ? , firstName = ? , lastName = ? , gender = ? WHERE id = ?';
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->execute([$_SESSION["pass"], $_SESSION["birthDate"], $_SESSION["fname"], $_SESSION["lname"], $_SESSION["gender"], $_SESSION["id"]]);
            //refresh info to update the info
            echo "<meta http-equiv='refresh' content='0'>";
        }
        catch(PDOException $e)
        {
            echo "<br>" . $e->getMessage();
        }
        header("location:ProfilePage.php");
        $conn = null;
    }
    else{
        $message = "The password doesn't match the original";
        echo "<script>alert('The password doesn\'t match the original');</script>";
    }

}

function getAge($date) { // Y-m-d format
    return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
}
?>
</html>
<script>
    $("input[name='rbMemType']").click(function() {
        if(document.getElementById("rbBasic").checked == true){
            $("#MembCredits").text('50');
            $("#chosenMembership").text('Basic');
            $("#chosenMembership").css("color", "#999999");
        }
        else{
            $("#MembCredits").text('100');
            $("#chosenMembership").text('Premium');
            $("#chosenMembership").css("color", "Gold");

        }
    });
</script>
