<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle image upload
    if (isset($_FILES["imageFile"])) {
        $imageFile = $_FILES["imageFile"];
        $imageFileName = $imageFile["name"];
        $imageFileTmpPath = $imageFile["tmp_name"];
        $imageFileTargetPath = "../images/" . basename($imageFileName); // Adjust the target image folder path

        if (move_uploaded_file($imageFileTmpPath, $imageFileTargetPath)) {
            echo "Image uploaded successfully. Image path: " . $imageFileTargetPath;
        } else {
            echo "Error uploading the image.";
            echo "<script>console.log('Error uploading the image.');</script>";
        }
    }
    // If neither file is uploaded
    if (!isset($_FILES["imageFile"]) && !isset($_FILES["videoFile"])) {
        echo "No files received.";
        echo "<script>console.log('No files received.');</script>";
    }
}
