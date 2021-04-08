<?php

function GetUsernames()
{
    $servername = "studmysql01.fhict.local";
    $database = 'dbi426729';
    $username = "dbi426729";
    $password = "open";
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT username FROM users';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();

    return $data;
}

function DeleteUser($NameOfUser){
    try{
        $servername = "studmysql01.fhict.local";
        $database = 'dbi426729';
        $username = "dbi426729";
        $password = "open";
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $queryusername = $NameOfUser;
        $sql ='SELECT id FROM users WHERE username = :username';
        $stmt = $conn->prepare($sql);
        $stmt->execute(
            [
                ':username'=> $queryusername
            ]
        );
        $result = $stmt->fetch();
        $GLOBALS["idToDelete"] = $result[0];
        //return $result[0];
    }
    catch(PDOException $e)
    {
        echo "<br>" . $e->getMessage();
    }
    $conn = null;

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlUpdate ='DELETE FROM users WHERE id = ?';
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->execute([$GLOBALS["idToDelete"]]);
    }
    catch(PDOException $e)
    {
        echo "<br>" . $e->getMessage();
    }
    $conn = null;

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlUpdate ='DELETE FROM profiles WHERE id = ?';
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->execute([$GLOBALS["idToDelete"]]);
    }
    catch(PDOException $e)
    {
        echo "<br>" . $e->getMessage();
    }
    $conn = null;
    header("location:AdminProfile.php");
}
?>