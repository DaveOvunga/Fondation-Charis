<?php
// Database connection
$host = 'localhost';
$dbname = 'medics';
$username = 'root';
$password = 'davedfg';
$port = 3307;

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

// Get course ID from the URL
$courseId = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Fetch the selected course details
$stmt = $conn->prepare("
    SELECT c.course_id, c.title, c.description, c.video_url, c.image_url, u.username AS instructor, ca.name AS category
    FROM Courses c
    JOIN Users u ON c.instructor_id = u.user_id
    JOIN Categories ca ON c.category_id = ca.category_id
    WHERE c.course_id = :courseId
");
$stmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
$stmt->execute();
$course = $stmt->fetch(PDO::FETCH_ASSOC);

// Function to format YouTube URL
function formatYouTubeUrl($url)
{
    preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^&\n]{11})/', $url, $matches);
    return isset($matches[1]) ? 'https://www.youtube.com/embed/' . $matches[1] : $url;
}

// Function to format Vimeo URL
function formatVimeoUrl($url)
{
    preg_match('/(?:https?:\/\/)?(?:www\.)?(?:vimeo\.com\/)([0-9]{1,10})/', $url, $matches);
    return isset($matches[1]) ? 'https://player.vimeo.com/video/' . $matches[1] : $url;
}

// Format the video URL
$videoUrl = $course['video_url'];
if (strpos($videoUrl, 'youtube.com') !== false) {
    $videoUrl = formatYouTubeUrl($videoUrl);
} elseif (strpos($videoUrl, 'vimeo.com') !== false) {
    $videoUrl = formatVimeoUrl($videoUrl);
}

// Fetch related courses from the same category
$relatedStmt = $conn->prepare("
    SELECT c.course_id, c.title, c.image_url
    FROM Courses c
    JOIN Categories ca ON c.category_id = ca.category_id
    WHERE ca.name = :category AND c.course_id != :courseId
    LIMIT 6
");
$relatedStmt->bindParam(':category', $course['category']);
$relatedStmt->bindParam(':courseId', $courseId, PDO::PARAM_INT);
$relatedStmt->execute();
$relatedCourses = $relatedStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <title>Fondation Charis</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="lib/animate/animate.min.css"/>
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <!-- <link rel="icon" type="image/png" href="assets/images/logo.jpg"> -->
        <link rel="icon" type="image/png" href="../assets/img/logo.jpg">
        <link href="css/style.css" rel="stylesheet">
    <style>

        .video-container {
            margin-bottom: 30px;
        }

        .course-details {
            background-color: #ffffff; /* White background for course details */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }

        h2, h4 {
            color: #333; /* Darker text for headings */
        }

        .related-courses {
            margin-top: 40px;
        }

        .card {
            transition: transform 0.3s; /* Smooth scale effect on hover */
        }

        .card:hover {
            transform: scale(1.05); /* Scale effect */
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0; /* Rounded corners for the image */
        }

        .btn-custom {
            background-color: #007bff; /* Button background color */
            color: white; /* Button text color */
        }

        .btn-custom:hover {
            background-color: #0056b3; /* Button hover background color */
        }

        .text-danger {
            margin-top: 20px;
        }

        .course-info {
            margin-top: 20px; /* Spacing between course info */
            font-size: 1.1em; /* Increase font size for better readability */
        }
    </style>
</head>

<body>
<div class="container-fluid topbar px-0 px-lg-4 bg-light py-2 d-none d-lg-block">
            <div class="container">
                <div class="row gx-0 align-items-center">
                    <div class="col-lg-8 text-center text-lg-start mb-lg-0">
                        <div class="d-flex flex-wrap">
                            <div class="border-end border-primary pe-3">
                                <!-- <a href="#" class="text-muted small"><i class="fas fa-map-marker-alt text-primary me-2"></i>Trouver un lieu</a> -->
                            </div>
                            <div class="ps-3">
                                <a href="mailto:example@gmail.com" class="text-muted small"><i class="fas fa-envelope text-primary me-2"></i>fondationcharis@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center text-lg-end">
                        <div class="d-flex justify-content-end">
                            <div class="d-flex border-end border-primary pe-3">
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn p-0 text-primary me-3" href="#"><i class="fab fa-instagram"></i></a>
                                <a class="btn p-0 text-primary me-0" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
            <div class="about-info">
                <nav class="navbar navbar-expand-lg navbar-light"> 
                    <a href="#" class="navbar-brand p-0">
                        <h1 class="text-primary mb-0"><img src="img/logo.jpg" alt="">fondation <span style="color: #b80c31;">charis</span></h1>
                        
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-0 mx-lg-auto">
                            
                            <div class="nav-btn d-flex align-items-center px-3">
                                <a href="Courses.php" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0">Retour</a>
                                <a href="logout.php" class="btn btn rounded-pill py-2 px-4 ms-3 flex-shrink-0" style="background-color: #b80c31; color: white;">Se déconnecter</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->

    <div class="container mt-5">
        <?php if ($course): ?>
            <div class="course-details">
                <h2 class="text-center mb-4"><?= htmlspecialchars($course['title']) ?></h2>
                <div class="video-container">
                    <iframe width="100%" height="400" src="<?= htmlspecialchars($videoUrl) ?>" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <div class="course-info">
                    <p><strong>Instructor:</strong> <?= htmlspecialchars($course['instructor']) ?></p>
                    <p><strong>Category:</strong> <?= htmlspecialchars($course['category']) ?></p>
                </div>
                <p><?= htmlspecialchars($course['description']) ?></p>
            </div>
        <?php else: ?>
            <p class="text-danger">Cours non trouvé.</p>
        <?php endif; ?>

        <div class="related-courses">
            <h4>Related Courses</h4>
            <div class="row">
                <?php foreach ($relatedCourses as $relatedCourse): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="<?= htmlspecialchars($relatedCourse['image_url']) ?>" class="card-img-top"
                                alt="<?= htmlspecialchars($relatedCourse['title']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($relatedCourse['title']) ?></h5>
                                <a href="course_details.php?id=<?= $relatedCourse['course_id'] ?>"
                                    class="btn btn-custom btn-block">View Course</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
