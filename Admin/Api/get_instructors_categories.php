<?php
header('Content-Type: application/json');

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
// Initialize arrays for instructors and categories
$response = [
    'instructors' => [],
    'categories' => []
];

// Fetch instructors
$instructorsQuery = "SELECT user_id, username FROM users WHERE role = 'instructor'";
$instructorsResult = $conn->query($instructorsQuery);
if ($instructorsResult) {
    $response['instructors'] = $instructorsResult->fetch_all(MYSQLI_ASSOC);
}

// Fetch categories
$categoriesQuery = "SELECT category_id, name FROM categories";
$categoriesResult = $conn->query($categoriesQuery);
if ($categoriesResult) {
    $response['categories'] = $categoriesResult->fetch_all(MYSQLI_ASSOC);
}

// Return the response as JSON
echo json_encode($response);

$conn->close();
