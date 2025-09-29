<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
include "db.php";

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $res = $conn->query("SELECT image FROM members WHERE id=$id");
    $row = $res->fetch_assoc();
    if(!empty($row['image']) && file_exists($row['image'])) unlink($row['image']);
    $conn->query("DELETE FROM members WHERE id=$id");
    header("Location: manage_members.php");
    exit();
}

// Handle add
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $role = $conn->real_escape_string($_POST['role']);
    $bio = $conn->real_escape_string($_POST['bio'] ?? '');
    $facebook = $conn->real_escape_string($_POST['facebook'] ?? '');
    $instagram = $conn->real_escape_string($_POST['instagram'] ?? '');
    $twitter = $conn->real_escape_string($_POST['twitter'] ?? '');
    $joined_date = $conn->real_escape_string($_POST['joined_date']);

    $image = '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image = 'uploads/members_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $conn->query("INSERT INTO members (name, role, bio, facebook, instagram, twitter, joined_date, image) 
                  VALUES ('$name','$role','$bio','$facebook','$instagram','$twitter','$joined_date','$image')");
    header("Location: manage_members.php");
    exit();
}

// Handle edit fetch
$editData = null;
if(isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $res = $conn->query("SELECT * FROM members WHERE id=$id LIMIT 1");
    $editData = $res->fetch_assoc();
}

// Handle update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $role = $conn->real_escape_string($_POST['role']);
    $bio = $conn->real_escape_string($_POST['bio'] ?? '');
    $facebook = $conn->real_escape_string($_POST['facebook'] ?? '');
    $instagram = $conn->real_escape_string($_POST['instagram'] ?? '');
    $twitter = $conn->real_escape_string($_POST['twitter'] ?? '');
    $joined_date = $conn->real_escape_string($_POST['joined_date']);

    $image = $_POST['old_image'] ?? '';
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        if(!empty($image) && file_exists($image)) unlink($image);
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image = 'uploads/members_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $conn->query("UPDATE members SET 
        name='$name', role='$role', bio='$bio', facebook='$facebook', 
        instagram='$instagram', twitter='$twitter', joined_date='$joined_date', image='$image' 
        WHERE id=$id");
    header("Location: manage_members.php");
    exit();
}

// Get all members
$result = $conn->query("SELECT * FROM members ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Members</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    min-height: 100vh;
    background: #f4f4f4;
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
.sidebar h2 { margin:0 0 20px;text-align:center;font-size:20px;border-bottom:1px solid #444;padding-bottom:10px; }
.sidebar a { text-decoration:none;color:#fff;padding:12px;margin:6px 0;border-radius:5px;display:block;transition:0.3s; }
.sidebar a:hover { background:#444; }
.logout { margin-top:auto; }
.logout a { background:crimson;text-align:center;display:block; }
.logout a:hover { background:darkred; }

/* Main content */
.main { flex:1;padding:30px;overflow-y:auto;width:100%;box-sizing:border-box; }
.main-header { display:flex;align-items:center;justify-content:space-between;margin-bottom:20px; }
.main h1 { margin:0;font-size:22px; }

/* Table & Form */
.table-container { width:100%; background:#fff; border-radius:6px; box-shadow:0 2px 6px rgba(0,0,0,0.1); margin-bottom:20px; }
table { width:100%; border-collapse:collapse; }
th, td { border:1px solid #ddd; padding:10px; text-align:left; }
th { background:#011472ff; color:#fff; }
img { max-width:100px; border-radius:6px; }

.btn { padding:6px 12px; border-radius:4px; text-decoration:none; color:#fff; font-size:14px; margin:2px; display:inline-block; }
.btn-add { background:#28a745; }
.btn-edit { background:#007bff; }
.btn-delete { background:#dc3545; }

.form-box { background:#fff; padding:20px; border-radius:10px; box-shadow:0 2px 6px rgba(0,0,0,0.2); max-width:500px; margin-bottom:30px; }
input,textarea,select { width:100%; padding:10px; margin:8px 0; border:1px solid #ccc; border-radius:5px; }
button { padding:10px 15px; border:none; border-radius:5px; cursor:pointer; }

.menu-toggle { display:none; background:#010361ff; color:#fff; border:none; font-size:20px; padding:8px 12px; cursor:pointer; border-radius:5px; }

/* Mobile Cards */
.member-card { display:none; background:#fff; margin-bottom:15px; padding:15px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
.member-card img { max-width:100%; border-radius:6px; margin-bottom:10px; }
.member-card h3 { margin:0 0 8px; font-size:18px; }
.member-card p { margin:4px 0; }

@media(max-width:768px) {
    body { flex-direction: column; }
    .sidebar { position:fixed; top:0; left:0; height:100%; transform:translateX(-100%); z-index:999; }
    .sidebar.active { transform:translateX(0); }
    .main { padding:20px; }
    .main-header { flex-direction:row; justify-content:space-between; }
    .menu-toggle { display:block; }
    .table-container { display:none; }
    .member-card { display:block; }
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
        <h1>Manage Members</h1>
        <button class="menu-toggle" onclick="toggleSidebar()">☰</button>
    </div>

    <!-- Desktop Table -->
    <div class="table-container">
    <table>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Role</th>
    <th>Joined</th>
    <th>Photo</th>
    <th>Action</th>
    </tr>
    <?php while($row=$result->fetch_assoc()){ ?>
    <tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= htmlspecialchars($row['role']) ?></td>
    <td><?= $row['joined_date'] ?></td>
    <td><img src="<?= $row['image'] ?>" alt="photo"></td>
    <td>
        <a href="?edit=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
        <a href="?delete=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
    </td>
    </tr>
    <?php } ?>
    </table>
    </div>

    <!-- Mobile Cards -->
    <?php $result->data_seek(0); while($row=$result->fetch_assoc()){ ?>
    <div class="member-card">
        <img src="<?= $row['image'] ?>" alt="photo">
        <h3><?= htmlspecialchars($row['name']) ?></h3>
        <p><strong>Role:</strong> <?= htmlspecialchars($row['role']) ?></p>
        <p><strong>Joined:</strong> <?= $row['joined_date'] ?></p>
        <p><strong>Bio:</strong> <?= htmlspecialchars($row['bio']) ?></p>
        <p><strong>Facebook:</strong> <?= htmlspecialchars($row['facebook']) ?></p>
        <p><strong>Instagram:</strong> <?= htmlspecialchars($row['instagram']) ?></p>
        <p><strong>Twitter:</strong> <?= htmlspecialchars($row['twitter']) ?></p>
        <div>
            <a href="?edit=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
            <a href="?delete=<?= $row['id'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
        </div>
    </div>
    <?php } ?>

    <!-- Add / Edit Form -->
    <div class="form-box">
    <?php if($editData){ ?>
        <h3>Edit Member</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $editData['id'] ?>">
            <input type="hidden" name="old_image" value="<?= $editData['image'] ?>">
            <label>Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($editData['name']) ?>" required>
            <label>Role:</label>
            <input type="text" name="role" value="<?= htmlspecialchars($editData['role']) ?>" required>
            <label>Joined Date:</label>
            <input type="date" name="joined_date" value="<?= $editData['joined_date'] ?>" required>
            <label>Bio:</label>
            <textarea name="bio"><?= htmlspecialchars($editData['bio']) ?></textarea>
            <label>Facebook:</label>
            <input type="text" name="facebook" value="<?= htmlspecialchars($editData['facebook']) ?>">
            <label>Instagram:</label>
            <input type="text" name="instagram" value="<?= htmlspecialchars($editData['instagram']) ?>">
            <label>Twitter:</label>
            <input type="text" name="twitter" value="<?= htmlspecialchars($editData['twitter']) ?>">
            <label>Photo:</label>
            <input type="file" name="image" accept="image/*">
            <?php if(!empty($editData['image'])): ?><img src="<?= $editData['image'] ?>" style="max-width:80px;margin-top:5px;"><?php endif; ?>
            <button type="submit" name="update" class="btn btn-edit">Update</button>
        </form>
    <?php } else { ?>
        <h3>Add New Member</h3>
        <form method="POST" enctype="multipart/form-data">
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Role:</label>
            <input type="text" name="role" required>
            <label>Joined Date:</label>
            <input type="date" name="joined_date" required>
            <label>Bio:</label>
            <textarea name="bio"></textarea>
            <label>Facebook:</label>
            <input type="text" name="facebook">
            <label>Instagram:</label>
            <input type="text" name="instagram">
            <label>Twitter:</label>
            <input type="text" name="twitter">
            <label>Photo:</label>
            <input type="file" name="image" accept="image/*" required>
            <button type="submit" name="add" class="btn btn-add">Add Member</button>
        </form>
    <?php } ?>
    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("active");
}
</script>
</body>
</html>
