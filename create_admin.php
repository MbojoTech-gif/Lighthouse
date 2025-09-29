<?php
include "db.php"; // your database connection

$username = "admin";
$password = "admin123"; // your desired password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);
$stmt->execute();

echo "Admin added successfully!";
?>
