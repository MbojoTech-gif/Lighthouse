<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE username = ? AND password = MD5(?) LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $_SESSION["admin"] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <style>
    body { 
      font-family: Arial, sans-serif; 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      height: 100vh; 
      margin: 0;
      background: #0e013dff; /* plain background */
    }
    .login-box { 
      width: 320px; 
      padding: 25px; 
      border: 1px solid #ddd; 
      border-radius: 10px; 
      background: #fff; 
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 1);
    }
    h2 { 
      text-align: center; 
      margin-bottom: 20px; 
      color: #333;
    }
    input { 
      width: 93%; 
      padding: 10px; 
      margin: 8px 0; 
      border-radius: 5px; 
      border: 1px solid #aaa; 
      font-size: 14px;
    }
    button { 
      width: 100%; 
      padding: 10px; 
      background: #060150ff;  /* theme color for button */
      color: #fff; 
      border: none; 
      border-radius: 5px; 
      cursor: pointer; 
      font-size: 16px;
    }
    button:hover { 
      background: #d10000ff; 
    }
    .error { 
      color: red; 
      margin-top: 10px; 
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Admin Login</h2>
    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
    <?php if ($error): ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
  </div>
</body>
</html>
