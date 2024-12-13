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

$courseId = intval($_GET['courseId']); // Sanitize input

$courseQuery = "SELECT title, description, category_id, instructor_id,video_url,image_url FROM courses WHERE course_id = ?";
$stmt = $conn->prepare($courseQuery);
$stmt->bind_param("i", $courseId);
$stmt->execute();
$courseResult = $stmt->get_result();

if ($courseResult->num_rows > 0) {
    $course = $courseResult->fetch_assoc();
    // Initialize arrays for instructors and categories
    $course['instructors'] = [];
    $course['categories'] = [];
    // Fetch instructors
    $instructorsQuery = "SELECT user_id, username FROM users where role = 'instructor'";
    $instructors = $conn->query($instructorsQuery)->fetch_all(MYSQLI_ASSOC);

    // Fetch categories
    $categoriesQuery = "SELECT category_id, name FROM categories";
    $categories = $conn->query($categoriesQuery)->fetch_all(MYSQLI_ASSOC);

    $course['instructors'] = $instructors;
    $course['categories'] = $categories;

    echo json_encode($course);
} else {
    echo json_encode(["error" => "Course not found."]);
}

$stmt->close();
$conn->close();
