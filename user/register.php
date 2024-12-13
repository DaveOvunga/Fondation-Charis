<?php
session_start();

// Database connection
$host = 'localhost';
$dbname = 'medic';
$username = 'root';
$password = '';

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Check if email already exists
    $stmt = $conn->prepare("SELECT COUNT(*) FROM Users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailExists = $stmt->fetchColumn();

    if ($emailExists) {
        // Email already exists in the database
        $error = "Cet email est déjà utilisé.";
    } else {
        // Insert new user into database
        $stmt = $conn->prepare("INSERT INTO Users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            // Registration successful
            $success = "Inscription réussie. Vous pouvez maintenant vous connecter.";

            // Optionally, redirect to login page
            // header("Location: login.php");
            // exit;
        } else {
            $error = "Une erreur est survenue lors de l'inscription.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
        <title>LifeSure - Life Insurance Website Template</title>
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
        <link rel="icon" type="image/png" href="../assets/img/logo.jpg">
        <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Topbar Start -->
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
                            <!-- <div class="dropdown ms-3">
                                <a href="#" class="dropdown-toggle text-dark" data-bs-toggle="dropdown"><small><i class="fas fa-globe-europe text-primary me-2"></i> Français</small></a>
                                <div class="dropdown-menu rounded">
                                    <a href="#" class="dropdown-item">Anglais</a>
                                    <a href="#" class="dropdown-item">Bengali</a>
                                    <a href="#" class="dropdown-item">Français</a>
                                    <a href="#" class="dropdown-item">Espagnol</a>
                                    <a href="#" class="dropdown-item">Arabe</a>
                                </div>
                            </div> -->
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
                        <div class="navbar-nav mx-0 mx-lg">
                            <div class="nav-btn d-flex align-items-center px-3">
                                <a href="../E-learning/index.html" class="btn btn-primary rounded-pill py-2 px-4 ms-3 flex-shrink-0">Retour</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar & Hero End -->
    <div class="login-container">
        <!-- <h2 class="login-heading">Login</h2> -->
        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <!-- <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                    required>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Login</button>
            <div class="text-center">
                <a href="#" class="text-white">Forgot password?</a>
            </div>
        </form> -->
        <div class="container-fluid contact bg-light py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="text-center">
                    <h4 class="text-primary">Inscrivez-vous</h4>
                    <p class="mb-4">Créez un compte pour accéder à vos services.</p>
                </div>
                <form method="POST" action="register.php">
                    <div class="row g-3">
                        <!-- Username input -->
                        <div class="col-lg-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="username" name="username" placeholder="Nom d'utilisateur" required>
                                <label for="username">Nom d'utilisateur</label>
                            </div>
                        </div>
                        <!-- Email input -->
                        <div class="col-lg-12">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0" id="email" name="email" placeholder="Votre email" required>
                                <label for="email">Votre email</label>
                            </div>
                        </div>
                        <!-- Password input -->
                        <div class="col-lg-12">
                            <div class="form-floating">
                                <input type="password" class="form-control border-0" id="password" name="password" placeholder="Mot de passe" required>
                                <label for="password">Mot de passe</label>
                            </div>
                        </div>
                        <!-- Submit button -->
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">S'inscrire</button>
                        </div>
                    </div>
                </form>
                <!-- Login link -->
                <div class="mt-3 text-center">
                    <a href="login.php" class="text-primary">Vous avez déjà un compte ? Connectez-vous ici</a>
                </div>
            </div>
        </div>
    </div>
</div>



    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
