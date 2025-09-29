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
        $row = $result->fetch_assoc();

        // ✅ save both id and username for consistency
        $_SESSION["admin_id"] = $row["id"];
        $_SESSION["admin_username"] = $row["username"];

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
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- ✅ responsive -->
  <style>
    body { 
      font-family: Arial, sans-serif; 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      height: 100vh; 
      margin: 0;
      background: #f4f4f4;
      padding: 15px; /* ✅ prevent overflow on small screens */
    }
    .login-box { 
      width: 100%;
      max-width: 380px; /* ✅ adapts for mobile */
      padding: 25px; 
      border: 1px solid #ddd; 
      border-radius: 10px; 
      background: #fff; 
      box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
    }
    h2 { 
      text-align: center; 
      margin-bottom: 20px; 
      color: #333;
    }
    input { 
      width: 100%; /* ✅ full width for responsiveness */
      padding: 12px; 
      margin: 8px 0; 
      border-radius: 5px; 
      border: 1px solid #aaa; 
      font-size: 16px;
      box-sizing: border-box;
    }
    button { 
      width: 100%; 
      padding: 12px; 
      background: #222;  /* theme color for button */
      color: #fff; 
      border: none; 
      border-radius: 5px; 
      cursor: pointer; 
      font-size: 16px;
      margin-top: 10px;
    }
    button:hover { 
      background: #444; 
    }
    .error { 
      color: red; 
      margin-top: 10px; 
      text-align: center;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Lighthouse Admin Login</h2>
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
