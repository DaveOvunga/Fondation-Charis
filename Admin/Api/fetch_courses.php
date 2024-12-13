<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost'; // Remplacez par votre hôte
$username = 'root'; // Remplacez par votre utilisateur
$password = 'davedfg'; // Remplacez par votre mot de passe
$dbname = 'medics'; // Remplacez par votre base de données
$port = 3307; // Remplacez par votre port

$conn = new mysqli($host, $username, $password, $dbname, $port);

// Vérifiez la connexion
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// Updated SQL query to fetch the last 10 created courses
$sql = "
SELECT 
    c.course_id,
    c.title, 
    u.username AS instructor_name, 
    cat.name AS category_name, 
    c.image_url, 
    c.video_url, 
    c.created_at 
FROM 
    courses c
JOIN 
    users u ON c.instructor_id = u.user_id AND u.role = 'instructor'
JOIN 
    categories cat ON c.category_id = cat.category_id
ORDER BY 
    c.created_at DESC
";

$result = $conn->query($sql);

$courses = array();

// Check if the query was successful
if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
    // Return the courses as a JSON response
    echo json_encode($courses);
} else {
    // Handle query error
    echo json_encode(['error' => 'Query failed: ' . $conn->error]);
}

$conn->close();
