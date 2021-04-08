<?php
session_start();
$myArr = $_SESSION["namesArray"];

$myJSON = json_encode($myArr);

echo $myJSON;
