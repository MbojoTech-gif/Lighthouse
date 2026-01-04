<?php
// api/get-members.php
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
    
    // Get members from website_members table
    $sql = "SELECT name, role, photo 
            FROM website_members 
            ORDER BY name ASC";
    
    $result = $conn->query($sql);
    
    if ($result) {
        $members = [];
        
        while($row = $result->fetch_assoc()) {
            $name = htmlspecialchars($row['name'] ?? '');
            $role = htmlspecialchars($row['role'] ?? 'Member');
            $photo = $row['photo'] ?? '';
            
            // Build correct image path
            $imagePath = '';
            if (!empty($photo)) {
                // Extract filename from path
                $filename = basename($photo);
                // Photos are at: LIGHTHOUSE/Lhm-Family/assets/uploads/members/
                // So the path should be:
                $imagePath = 'assets/uploads/members/' . $filename;
            } else {
                $imagePath = 'assets/images/placeholder-member.jpg';
            }
            
            $members[] = [
                'name' => $name,
                'role' => $role,
                'image' => $imagePath
            ];
        }
        
        $response = $members;
    } else {
        throw new Exception('Query failed: ' . $conn->error);
    }
    
    $conn->close();
    
} catch(Exception $e) {
    $response = ['error' => $e->getMessage()];
}

echo json_encode($response, JSON_PRETTY_PRINT);
?>