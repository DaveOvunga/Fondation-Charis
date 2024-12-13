<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database connection
$host = 'localhost'; // your database host
$dbname = 'medic'; // your database name
$username = 'root'; // your database username
$port = 3307;
$password = 'davedfg';
function logError($message)
{
    $logFile = 'error_log.txt'; // Change to an absolute path if needed

    // Check if the log file exists, create it if it doesn't
    if (!file_exists($logFile)) {
        $created = file_put_contents($logFile, "Error Log Created on " . date("Y-m-d H:i:s") . PHP_EOL);
        if ($created === false) {
            // Log creation failed
            error_log("Failed to create log file.");
        }
    }

    // Append the error message to the log file
    $result = file_put_contents($logFile, $message . PHP_EOL, FILE_APPEND);
    if ($result === false) {
        // Logging the error message failed
        error_log("Failed to write to log file.");
    }
}
try {
    // Create a new PDO instance
    $db = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Update the modified course information in the database
    // Check if the request is a POST request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get parameters from the POST request
        $courseId = $_POST['id'] ?? null;
        $modifiedTitle = $_POST['title'] ?? null;
        $modifiedDescription = $_POST['description'] ?? null;
        $videoPath = $_POST['videoPath'] ?? null;
        $imagePath = $_POST['imagePath'] ?? null;
        $instructorId = $_POST['instructor_id'] ?? null;
        $categoryId = $_POST['category_id'] ?? null;

        // Check required parameters
        if (is_null($courseId) || is_null($modifiedTitle) || is_null($modifiedDescription)) {
            echo json_encode(['error' => 'Course ID, Title, and Description are required']);
            exit;
        }

        // Prepare the SQL statement
        $stmt = $db->prepare("UPDATE courses SET 
            title = ?, 
            description = ?, 
            video_url = ?, 
            image_url = ?, 
            instructor_id = ?, 
            category_id = ? 
            WHERE course_id = ?");

        // Execute the statement with the provided values
        $stmt->execute([$modifiedTitle, $modifiedDescription, $videoPath, $imagePath, $instructorId, $categoryId, $courseId]);

        // Check if any rows were affected
        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Course updated successfully']);
        } else {
            echo json_encode(['error' => 'No changes made or course not found']);
        }
    }
} catch (PDOException $e) {
    logError("Database error: " . $e->getMessage());
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch (Exception $e) {
    logError("General error: " . $e->getMessage());
    echo json_encode(['error' => 'An unexpected error occurred: ' . $e->getMessage()]);
}
