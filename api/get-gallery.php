<?php
// api/get-gallery.php
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
    
    // Get gallery photos from gallery_photos table
    $sql = "SELECT filename, uploaded_at 
            FROM gallery_photos 
            ORDER BY uploaded_at DESC";
    
    $result = $conn->query($sql);
    
    if ($result) {
        $photos = [];
        
        while($row = $result->fetch_assoc()) {
            $filename = $row['filename'] ?? '';
            $uploaded_at = $row['uploaded_at'] ?? '';
            
            // Build correct image path
            $imagePath = '';
            if (!empty($filename)) {
                // Extract filename from database field
                $clean_filename = basename($filename);
                // Photos are at: LIGHTHOUSE/Lhm-Family/assets/uploads/gallery/
                // So the path should be:
                $imagePath = 'assets/uploads/gallery/' . $clean_filename;
            } else {
                // Skip if no filename
                continue;
            }
            
            // Format date
            $formatted_date = '';
            if (!empty($uploaded_at)) {
                $date = new DateTime($uploaded_at);
                $formatted_date = $date->format('M d, Y');
            }
            
            $photos[] = [
                'image' => $imagePath,
                'uploaded_at' => $formatted_date,
                'timestamp' => $uploaded_at
            ];
        }
        
        $response = $photos;
    } else {
        throw new Exception('Query failed: ' . $conn->error);
    }
    
    $conn->close();
    
} catch(Exception $e) {
    $response = ['error' => $e->getMessage()];
}

echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>