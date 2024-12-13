<?php
// Database connection
$host = 'localhost';
$dbname = 'medics';
$username = 'root';
$password = 'davedfg';
$port = 3307;

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

// Pagination settings
$limit = 6; // Number of courses per page
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch courses with categories and images from the database
$stmt = $conn->prepare("
    SELECT c.course_id, c.title, c.description, c.video_url, c.image_url, u.username AS instructor, ca.name AS category
    FROM Courses c
    JOIN Users u ON c.instructor_id = u.user_id
    JOIN Categories ca ON c.category_id = ca.category_id
    LIMIT :limit OFFSET :offset
");
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Count total courses for pagination
$totalStmt = $conn->query("SELECT COUNT(*) FROM Courses");
$totalCourses = $totalStmt->fetchColumn();
$totalPages = ceil($totalCourses / $limit);
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

        <div class="container mt-4">
    <h2 class="text-center mb-4">Cours Disponible</h2>
    <div class="row">
        <?php foreach ($courses as $course): ?>
            <div class="col-md-4 mb-4">
                <div class="card course-card shadow-sm border-light">
                    <img src="<?= htmlspecialchars($course['image_url']) ?>" class="card-img-top rounded" alt="<?= htmlspecialchars($course['title']) ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><?= htmlspecialchars($course['title']) ?></h5>
                        <p class="card-text description"><?= htmlspecialchars($course['description']) ?></p>
                        <div class="mb-3">
                            <p class="card-text"><strong>Instructor:</strong> <?= htmlspecialchars($course['instructor']) ?></p>
                            <p class="card-text"><strong>Category:</strong> <?= htmlspecialchars($course['category']) ?></p>
                        </div>
                        <div class="btn-container">
                            <a href="CourseDetails.php?id=<?= $course['course_id'] ?>" class="btn btn-primary btn-block">View Course</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>



        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i === $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>