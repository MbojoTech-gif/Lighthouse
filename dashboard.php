<?php
session_start();

// Protect dashboard: only logged-in admins allowed
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

include "db.php";

// Fetch admin details
$adminUsername = $_SESSION["admin"];
$stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
$stmt->bind_param("s", $adminUsername);
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
$stmt->close();

// Get counts
$memberCount = $conn->query("SELECT COUNT(*) as count FROM members")->fetch_assoc()['count'];
$eventCount = $conn->query("SELECT COUNT(*) as count FROM events")->fetch_assoc()['count'];

// Get recent members (last 5 added)
$recentMembers = $conn->query("SELECT * FROM members ORDER BY id DESC LIMIT 5");

// Get upcoming events (next 5 future events)
$upcomingEvents = $conn->query("SELECT * FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    display: flex;
    height: 100vh;
    overflow: hidden;
    flex-direction: row;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background: #01175dff;
    color: #fff;
    display: flex;
    flex-direction: column;
    padding: 20px;
    transition: transform 0.3s ease;
}
.sidebar h2 { margin: 0 0 20px; text-align: center; font-size: 20px; border-bottom: 1px solid #444; padding-bottom: 10px; }
.sidebar a { text-decoration: none; color: #fff; padding: 12px; margin: 6px 0; border-radius: 5px; display: block; transition: 0.3s; }
.sidebar a:hover { background: #444; }
.logout { margin-top: auto; }
.logout a { background: crimson; text-align: center; display: block; }
.logout a:hover { background: darkred; }

/* Main content */
.main { flex: 1; display: flex; flex-direction: column; padding: 30px; overflow-y: auto; width: 100%; box-sizing: border-box; }
.main-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
.main h1 { margin: 0; font-size: 22px; }

/* Admin card styled like dashboard cards */
.admin-card {
    flex: 1 1 200px;
    background: #000;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: 0.3s;
    margin-bottom: 20px;
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}
.admin-card:hover { background: #011472ff; transform: scale(1.05); }
.admin-card div { display: flex; flex-direction: column; gap: 5px; }

/* Dashboard cards */
.cards { display: flex; gap: 20px; flex-wrap: wrap; margin-top: 20px; }
.card { flex: 1 1 200px; padding: 20px; background: #fff; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 1); text-align: center; transition: 0.3s; text-decoration: none; color: #222; font-weight: bold; }
.card:hover { background: #011472ff; color: #fff; transform: scale(1.05); }

/* Tables */
.table-box { background: #fff; padding: 20px; border-radius: 10px; margin-top: 20px; box-shadow: 0px 4px 8px rgba(0,0,0,0.1); }
.table-box h3 { margin-top: 0; }
table { width: 100%; border-collapse: collapse; }
th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
th { background: #011472ff; color: #fff; }
img { max-width: 50px; border-radius: 5px; }

/* Mobile */
.menu-toggle { display: none; background: #010361ff; color: #fff; border: none; font-size: 20px; padding: 8px 12px; cursor: pointer; border-radius: 5px; }

@media (max-width: 768px) {
    body { flex-direction: column; }
    .sidebar { position: fixed; top: 0; left: 0; height: 100%; transform: translateX(-100%); z-index: 999; }
    .sidebar.active { transform: translateX(0); }
    .main { padding: 20px; }
    .main-header { flex-direction: row; justify-content: space-between; }
    .menu-toggle { display: block; }

    /* Make cards fit nicely on mobile */
    .cards { flex-direction: column; gap: 15px; align-items: center; }
    .card, .admin-card { 
        width: 90%; /* centered and not too wide */
        max-width: 400px; /* limits very wide screens */
        flex: none; /* prevent stretching */
    }
}
</style>
</head>
<body>

<!-- Sidebar -->
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

<!-- Main content -->
<div class="main">
    <div class="main-header">
        <h1>Welcome, <?= htmlspecialchars($adminUsername); ?> 🎉</h1>
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    </div>

    <!-- Admin Card -->
    <a href="profile.php" class="admin-card">
        <div>
            <span>Username: <?= htmlspecialchars($admin['username']); ?></span>
            <span>Email: <?= htmlspecialchars($admin['email'] ?? 'Not set'); ?></span>
        </div>
        <div>
            <span>Edit Profile ⚙️</span>
        </div>
    </a>

    <p>Overview of the platform:</p>

    <div class="cards">
        <a href="manage_ministries.php" class="card">📅 Manage Ministries</a>
        <a href="manage_members.php" class="card">👥 Manage Members (<?= $memberCount ?>)</a>
        <a href="manage_ministries.php" class="card">📅 Total Events (<?= $eventCount ?>)</a>
    </div>

    <!-- Recent Members -->
    <div class="table-box">
        <h3>Recent Members</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Role</th>
                <th>Joined</th>
            </tr>
            <?php while($m = $recentMembers->fetch_assoc()) { ?>
            <tr>
                <td><?= $m['id'] ?></td>
                <td><img src="<?= $m['image'] ?>" alt="photo"></td>
                <td><?= htmlspecialchars($m['name']) ?></td>
                <td><?= htmlspecialchars($m['role']) ?></td>
                <td><?= $m['joined_date'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Upcoming Events -->
    <div class="table-box">
        <h3>Upcoming Events</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Type</th>
                <th>Date</th>
                <th>Image</th>
            </tr>
            <?php while($e = $upcomingEvents->fetch_assoc()) { ?>
            <tr>
                <td><?= $e['id'] ?></td>
                <td><?= htmlspecialchars($e['title']) ?></td>
                <td><?= htmlspecialchars($e['type']) ?></td>
                <td><?= $e['event_date'] ?></td>
                <td><img src="<?= $e['image'] ?>" alt="image"></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
}
</script>
</body>
</html>
