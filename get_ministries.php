<?php
header('Content-Type: application/json');
include 'db.php';

$events = [];
$sql = "SELECT id, title, type, image, event_date FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            "id" => $row["id"],
            "title" => $row["title"],
            "type" => $row["type"] ?? "Not set",
            "event_date" => $row["event_date"] ?? "Not set",
            "image" => $row["image"]
        ];
    }
}

echo json_encode($events);
