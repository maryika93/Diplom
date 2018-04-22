<?php

function db()
{
    $servername = "localhost";
    $username = "mtipikina";
    $password = "neto1539";
    $dbname = "mtipikina";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    }
    catch(PDOException $e)
    {
        die("Error: " . $e->getMessage());
    }
    return $conn;
}
?>