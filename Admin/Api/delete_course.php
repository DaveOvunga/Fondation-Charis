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

// Check if the ID is provided
if (isset($_GET['id'])) {
    $courseId = intval($_GET['id']); // Sanitize the input

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM courses WHERE course_id = ?");
    $stmt->bind_param("i", $courseId);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Course deleted successfully']);
    } else {
        echo json_encode(['error' => 'Error deleting course: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['error' => 'No course ID provided']);
}

$conn->close();
