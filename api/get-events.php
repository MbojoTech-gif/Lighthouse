<?php
// api/get-events.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Database connection
$host = '127.0.0.1:3306';
$dbname = 'lhm-family';
$username = 'root';
$password = '';

$response = [];

try {
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception('Database connection failed: ' . $conn->connect_error);
    }
    
    $conn->set_charset("utf8mb4");
    
    // Get events from the new events_projects table - remove status from SELECT
    $sql = "SELECT title, date 
            FROM events_projects 
            ORDER BY date ASC";
    
    $result = $conn->query($sql);
    
    if ($result) {
        $events = [];
        
        while($row = $result->fetch_assoc()) {
            // Format the date for display
            $formatted_date = '';
            if (!empty($row['date'])) {
                $date_obj = new DateTime($row['date']);
                $formatted_date = $date_obj->format('M j, Y');
            }
            
            $events[] = [
                'title' => htmlspecialchars($row['title'] ?? ''),
                'event_date' => $row['date'] ?? '', // Original date format
                'display_date' => $formatted_date  // Formatted date for display
                // Removed 'status' field
            ];
        }
        
        $response = $events;
    } else {
        throw new Exception('Query failed: ' . $conn->error);
    }
    
    $conn->close();
    
} catch(Exception $e) {
    $response = ['error' => $e->getMessage()];
}

echo json_encode($response);
?>