<?php
header('Content-Type: application/json');
include 'db.php';

// Fetch only events
$events = [];
$result = $conn->query("SELECT * FROM events ORDER BY event_date ASC");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $events[] = [
            "title" => $row["title"],
            "image" => $row["image"]
        ];
    }
}

// Return events as JSON
echo json_encode($events);
