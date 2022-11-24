<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "learnpdo";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // set the PDO error mode to exception
    echo "Connected Successfully";
} catch (PDOexeption $e) {
    echo "connection failed" .$e->getMessage();
}
?>
