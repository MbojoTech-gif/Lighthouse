<?php
session_start();
include "db.php";

if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($password)){
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE admins SET username='$username', email='$email', password='$hashed_password' WHERE id=$id";
} else {
    $sql = "UPDATE admins SET username='$username', email='$email' WHERE id=$id";
}

if($conn->query($sql) === TRUE){
    $_SESSION["admin"] = $username; // update session username
    header("Location: profile.php");
} else {
    echo "Error updating profile: " . $conn->error;
}
