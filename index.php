<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style.css'>
    <title>PHP Vimeo Integration [File upload via Form]</title>
</head>

<body>
    <div class='upload-container'>
        <br><br>
        <div class='upload'>
            <div class='text'>
                <h4>Choose a video to upload on Vimeo</h4>
            </div>
            <div class='form'>
                <form action='./upload.php' method='post' enctype="multipart/form-data">
                    <input type='file' name='file1' accept="video/*">
                    <input type='text' name='vidtitle' placeholder='Enter video title'>
                    <input type='text' name='viddesc' placeholder='Enter video description'>
                    <button type='submit' name='upload-btn'>Upload</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>