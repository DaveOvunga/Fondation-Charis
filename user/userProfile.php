<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); // Ensure you start the session

// Database connection
$host = 'localhost';
$dbname = 'medic';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Assuming user ID is stored in the session after login
$userId = $_SESSION['user_id'] ?? 0;

// Fetch user details
$stmt = $conn->prepare("
    SELECT username, email FROM Users WHERE user_id = :userId
");
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Fetch enrolled courses
$coursesStmt = $conn->prepare("
    SELECT c.course_id, c.title FROM Enrollment e
    JOIN Courses c ON e.course_id = c.course_id
    WHERE e.user_id = :userId
");
$coursesStmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$coursesStmt->execute();
$courses = $coursesStmt->fetchAll(PDO::FETCH_ASSOC);
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
        
    </head>

<body>
    <!-- <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">E-Learning</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./courses.php"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./userProfile.php"><i class="fas fa-user"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->
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
                                <a href="../E-learning/index.html" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0">Retour</a>
                                <a href="logout.php" class="btn btn rounded-pill py-2 px-4 ms-3 flex-shrink-0" style="background-color: #b80c31; color: white;">Se déconnecter</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->


    <div class="container mt-5">
        <h2 class="text-center mb-4">Profile</h2>

        <?php if ($user): ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($user['username']) ?></h5>
                    <p class="card-text"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                    <a href="edit_profile.php" class="btn btn-warning">Edit Profile</a>
                </div>
            </div>

            <h4>Enrolled Courses</h4>
            <ul class="list-group mb-4">
                <?php if ($courses): ?>
                    <?php foreach ($courses as $course): ?>
                        <li class="list-group-item">
                            <a href="course_details.php?id=<?= $course['course_id'] ?>">
                                <?= htmlspecialchars($course['title']) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="list-group-item">No enrolled courses.</li>
                <?php endif; ?>
            </ul>
        <?php else: ?>
            <p class="text-danger">User not found.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>