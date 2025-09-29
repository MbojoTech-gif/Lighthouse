<?php
header("Content-Type: application/json");
include "db.php"; // database connection

$sql = "SELECT id, name, role, image FROM members ORDER BY id DESC";
$result = $conn->query($sql);

$members = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $members[] = $row;
    }
}

echo json_encode($members);
$conn->close();
?>
