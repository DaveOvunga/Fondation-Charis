<?php
require('../vendor/autoload.php');
require_once('../config/config.php');
ini_set('memory_limit', '512M'); // Increase memory limit for large uploads
set_time_limit(120); // Increase max execution time

use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;

header('Content-Type: application/json'); // Ensure JSON content type

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_FILES['file1']['name']) || empty($_POST['title']) || empty($_POST['description'])) {
        echo json_encode(['success' => false, 'message' => 'Please fill in all fields and select a file.']);
        exit;
    }

    if ($_FILES['file1']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'File upload error: ' . $_FILES['file1']['error']]);
        exit;
    }

    $client = new Vimeo($clientId, $clientSecret, $accessToken);
    $file = $_FILES['file1']['tmp_name'];
    $title = $_POST['title'];
    $desc = $_POST['description'];

    try {
        $uri = $client->upload($file, [
            "name" => $title,
            "description" => $desc,
            "chunk_size" => 5242880 // 5MB chunks
        ]);

        $videoUrl = $client->request($uri)['body']['link']; // Get the video URL
        $response = $client->request($uri . '?fields=transcode.status');

        if (isset($response['body']['transcode']['status'])) {
            $status = $response['body']['transcode']['status'];
            if ($status === 'complete') {
                echo json_encode(['success' => true, 'videoUrl' => $videoUrl, 'message' => 'Video uploaded successfully.']);
            } elseif ($status === 'in_progress') {
                echo json_encode(['success' => true, 'videoUrl' => $videoUrl, 'message' => 'Video is still processing. Please check back later.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Your video encountered an error during transcoding.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Unexpected response structure.']);
        }
    } catch (VimeoUploadException $e) {
        echo json_encode(['success' => false, 'message' => 'Upload error: ' . $e->getMessage()]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'An error occurred: ' . $e->getMessage()]);
    }
}
