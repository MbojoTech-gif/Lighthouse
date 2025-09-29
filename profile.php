<?php
session_start();
include "db.php";

// Protect page
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// Fetch admin details
$adminUsername = $_SESSION["admin"];
$stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
$stmt->bind_param("s", $adminUsername);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
$stmt->close();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newUsername = trim($_POST['username']);
    $newPassword = $_POST['password'];

    if (!empty($newPassword)) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE admins SET username=?, password=? WHERE username=?");
        $stmt->bind_param("sss", $newUsername, $hashedPassword, $adminUsername);
    } else {
        $stmt = $conn->prepare("UPDATE admins SET username=? WHERE username=?");
        $stmt->bind_param("ss", $newUsername, $adminUsername);
    }

    if ($stmt->execute()) {
        $_SESSION["admin"] = $newUsername;
        $successMsg = "Profile updated successfully!";
        header("Refresh:0");
    } else {
        $errorMsg = "Error updating profile: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Profile - Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    background: #f4f4f4;
    min-height: 100vh;
}
.sidebar {
    width: 220px;
    background: #01175d;
    color: #fff;
    display: flex;
    flex-direction: column;
    padding: 20px;
}
.sidebar h2 { margin: 0 0 20px; text-align: center; font-size: 20px; border-bottom: 1px solid #444; padding-bottom: 10px; }
.sidebar a { text-decoration: none; color: #fff; padding: 12px; margin: 6px 0; border-radius: 5px; display: block; }
.sidebar a:hover { background: #444; }
.logout { margin-top: auto; }
.logout a { background: crimson; text-align: center; display: block; }
.logout a:hover { background: darkred; }
.main { flex: 1; padding: 30px; overflow-y: auto; width: 100%; box-sizing: border-box; }
.main-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
.main h1 { margin: 0; font-size: 22px; }
.profile-box {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    max-width: 500px;
    margin: 0 auto;
}
.profile-box h2 { text-align: center; margin-bottom: 20px; }
.profile-box form { display: flex; flex-direction: column; gap: 15px; }
.profile-box label { font-weight: bold; }
.profile-box input { padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
.profile-box button { padding: 12px; background: #01175d; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; transition: 0.3s; }
.profile-box button:hover { background: #0226ff; }
.success-msg { color: green; text-align: center; margin-bottom: 15px; }
.error-msg { color: red; text-align: center; margin-bottom: 15px; }
.menu-toggle { display: none; background: #010361; color: #fff; border: none; font-size: 20px; padding: 8px 12px; cursor: pointer; border-radius: 5px; }
@media (max-width: 768px) {
    body { flex-direction: column; }
    .sidebar { position: fixed; top: 0; left: 0; height: 100%; transform: translateX(-100%); z-index: 999; }
    .sidebar.active { transform: translateX(0); }
    .main { padding: 20px; }
    .main-header { flex-direction: row; justify-content: space-between; }
    .menu-toggle { display: block; }
}
</style>
</head>
<body>

<div class="sidebar" id="sidebar">
    <h2>LHM Admin Panel</h2>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="manage_ministries.php">📅 Ministries & Events</a>
    <a href="manage_members.php">👥 Members</a>
    <a href="profile.php">⚙️ Profile</a>
    <div class="logout">
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>

<div class="main">
    <div class="main-header">
        <h1>Edit Profile - <?= htmlspecialchars($adminUsername); ?></h1>
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    </div>

    <div class="profile-box">
        <?php 
        if (isset($successMsg)) echo "<div class='success-msg'>$successMsg</div>";
        if (isset($errorMsg)) echo "<div class='error-msg'>$errorMsg</div>";
        ?>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($admin['username']) ?>" required>

            <label>New Password (leave blank to keep current):</label>
            <input type="password" name="password">

            <button type="submit">Update Profile</button>
        </form>
    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
}
</script>
</body>
</html>
