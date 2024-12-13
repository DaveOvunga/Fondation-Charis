<?php
$host = 'localhost'; // Database host
$dbname = 'medics'; // Database name
$username = 'root'; // Database username
$port = 3307;
$password = 'davedfg';// Database password

header('Content-Type: application/json');

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the JSON data
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['videoUrl'], $data['imageUrl'], $data['title'], $data['description'], $data['category_id'], $data['instructor_id'])) {
        $videoUrl = $data['videoUrl'];
        $imageUrl = $data['imageUrl'];
        $title = $data['title'];
        $description = $data['description'];
        $category = $data['category_id'];
        $instructor = $data['instructor_id'];

        // Prepare SQL to insert data into the database
        $stmt = $pdo->prepare("INSERT INTO courses (title, description, video_url,image_url,instructor_id,category_id) VALUES (:title, :description, :video_url,:image_url, :instructor_id, :category_id)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':video_url', $videoUrl);
        $stmt->bindParam(':image_url', $imageUrl);
        $stmt->bindParam(':instructor_id', $instructor);
        $stmt->bindParam(':category_id', $category);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Video details saved successfully.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Failed to save video information in the database.'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Invalid data provided.'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred: ' . $e->getMessage()
    ]);
}
