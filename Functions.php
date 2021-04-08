<?php
//USEFUL PHP FUNCTIONS

//Check role for the current user
function CheckRole()
{
    //$redirectLocation = "";
    if($_SESSION['role'] == 'Client'){
        //$redirectLocation = "ProfilePage.php";
        echo "..\ProfilePages\ProfilePage.php";
    }
    else if($_SESSION['role'] == 'Admin'){
        echo "..\ProfilePages\AdminProfile.php";
    }
//header("Location:".$redirectLocation);
}
//Get age for the current user
function getAge($date) { // Y-m-d format
    return intval(substr(date('Ymd') - date('Ymd', strtotime($date)), 0, -4));
}
//function for debugging php code
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
//Code for getting the usernames from the database and putting them into array
function getNames(){
    $namesTwoValues = GetUsernames();
    $namesArray = array();
    //Convert the associative array into indexed array
    for ($i = 0; $i < count($namesTwoValues); $i++){
        $namesArray[$i] = $namesTwoValues[$i][0];
    }
    $_SESSION["namesArray"] = $namesArray;
}
?>
