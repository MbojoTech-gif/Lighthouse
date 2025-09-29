<?php
$host = "localhost";
$user = "root";   // default user in XAMPP/WAMP
$pass = "";       // default password is empty in XAMPP
$dbname = "lighthouse_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
