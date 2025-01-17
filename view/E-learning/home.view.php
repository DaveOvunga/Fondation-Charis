<?php 
    use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<?php View::render('component/head'); ?>

<style>
    /* HERO SECTION */

.hero {
    /* background-image: url('<?=APP_URL?>/img/pattern.jpg'); */
    background-size: cover;
    background-position: center;
    height: 50vh;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative; /* Ensure positioning for the overlay */

}
/* Styles pour la carte */
.course-card .card {
    min-height: 500px; /* Hauteur minimale de la carte */
    transition: transform 0.3s ease;
}

.course-card .card:hover {
    transform: translateY(-5px);
}

/* Style pour le conteneur d'image */
.course-card .image-container {
    height: 250px; /* Hauteur fixe pour l'image */
    overflow: hidden;
}

.course-card .card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Styles pour le contenu */
.course-card .card-body {
    padding: 1.5rem;
}

.course-card .card-title {
    font-size: 1.25rem;
    line-height: 1.4;
}

.course-card .card-text {
    font-size: 0.95rem;
    line-height: 1.6;
}

/* Badge style */
.course-card .badge {
    font-size: 0.8rem;
    padding: 0.5em 1em;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .course-card .card {
        min-height: 450px;
    }
    
    .course-card .image-container {
        height: 200px;
    }
}
</style>
</head>
<body >
        
    <?php View::render('component/sidebar');?>

    <div class="content" id="content">

        <?php View::render('component/header');?>

        <!-- <div class="hero mb-5"> -->
            <!-- <div class="overlay"></div>  -->
            
            <!-- <div class="container py-5"> -->
    <!-- <div class="row justify-content-center text-center">
        <div class="col-lg-8">
            <div class="animate__animated animate__fadeIn">
                <h2 class="display-4 fw-bold mb-3">
                    Bienvenue 
                    <span class="text-primary animate__animated animate__bounceIn animate__delay-1s">
                        <?=$_SESSION['user'] ?>
                    </span>
                </h2>
                <p class="lead text-muted mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                    Continue tes formations là où tu les as laissées.
                </p>
                <div class="d-flex justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-1s">
                    
                </div>
            </div>
        </div>
    </div> -->
<!-- </div> -->
        <!-- </div> -->

        <div class="container px-lg-5 indexZ">

            <div class="allFormation px-lg-1 mb-5" >
                <div class=" text-white mb-3">
                    <h5 style="font-weight: bold; font-size: 25px; margin-top: 2%;">Cours suivis</h5>
                </div>

                <!-- Your begin course List -->
                <div class="row" id="courseList">                    
                
                    <?php if (isset($data['enrolled']) && $data['enrolled'] ):?>
                        <?php foreach ($data['enrolled'] as $course): ?>
                            <div class="col-md-4 mb-4 course-card">
                                <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                                <div class="card shadow-lg border-0 bg-dark" style="margin-top: 10px;">
                                    <!-- Image Container -->
                                    <div class="image-container">
                                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" 
                                            class="card-img-top" 
                                            alt="Digital Marketing Course">
                                    </div>
            
                                    <!-- Content Container -->
                                    <div class="card-body bg-success bg-opacity-25 rounded-bottom">
                                        <span class="badge bg-primary mb-2">
                                            <?php echo htmlspecialchars($course['category_name']); ?>
                                        </span>
                                        <h5 class="card-title text-white mb-3" 
                                            title="<?php echo htmlspecialchars($course['course_name']); ?>">
                                            <?php echo htmlspecialchars($course['course_name']); ?>
                                        </h5>
                                        <p class="card-text text-white mb-3" 
                                        title="<?php echo htmlspecialchars($course['description']); ?>">
                                            <?php echo htmlspecialchars($course['description']); ?>
                                        </p>
                                    </div>
                                </div>                                 
                                </a>
                            </div>

                            <!-- deuxieme card -->
                            <div class="col-md-4 mb-4 course-card">
                                <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                                <div class="card shadow-lg border-0 bg-dark" style="margin-top: 10px;">
                                    <!-- Image Container -->
                                    <div class="image-container">
                                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" 
                                            class="card-img-top" 
                                            alt="Digital Marketing Course">
                                    </div>
            
                                    <!-- Content Container -->
                                    <div class="card-body bg-success bg-opacity-25 rounded-bottom">
                                        <span class="badge bg-primary mb-2">
                                            <?php echo htmlspecialchars($course['category_name']); ?>
                                        </span>
                                        <h5 class="card-title text-white mb-3" 
                                            title="<?php echo htmlspecialchars($course['course_name']); ?>">
                                            <?php echo htmlspecialchars($course['course_name']); ?>
                                        </h5>
                                        <p class="card-text text-white mb-3" 
                                        title="<?php echo htmlspecialchars($course['description']); ?>">
                                            <?php echo htmlspecialchars($course['description']); ?>
                                        </p>
                                    </div>
                                </div>                                 
                                </a>
                            </div>

                            <!-- troisieme card -->
                            <div class="col-md-4 mb-4 course-card">
                                <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                                <div class="card shadow-lg border-0 bg-dark" style="margin-top: 10px;">
                                    <!-- Image Container -->
                                    <div class="image-container">
                                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" 
                                            class="card-img-top" 
                                            alt="Digital Marketing Course">
                                    </div>
            
                                    <!-- Content Container -->
                                    <div class="card-body bg-success bg-opacity-25 rounded-bottom">
                                        <span class="badge bg-primary mb-2">
                                            <?php echo htmlspecialchars($course['category_name']); ?>
                                        </span>
                                        <h5 class="card-title text-white mb-3" 
                                            title="<?php echo htmlspecialchars($course['course_name']); ?>">
                                            <?php echo htmlspecialchars($course['course_name']); ?>
                                        </h5>
                                        <p class="card-text text-white mb-3" 
                                        title="<?php echo htmlspecialchars($course['description']); ?>">
                                            <?php echo htmlspecialchars($course['description']); ?>
                                        </p>
                                    </div>
                                </div>                                 
                                </a>
                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <h6 style="font-weight: bold; font-size: 25px; margin-top: 2%;">Pas de formation commencer</h6>
                    <?php endif;?>
                    
                    
                </div>
            </div>

            
            <div class="allFormation px-lg-1 border-top pt-3">
                <div class=" text-white mb-3">
                    <h5 style="font-weight: bold; font-size: 25px; margin-top: 2%;">Formations disponibles</h5>
                </div>

                <!-- Course Cards List -->
                <div class="row pt-md-4" id="courseList">                    

                <?php foreach ($data['not_enrolled'] as $course): ?>
                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0 bg-dark bg-opacity-10">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-secondary bg-gradiant rounded-bottom border-0">
                                    <!-- <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                    <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                    <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0 bg-dark bg-opacity-10">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-secondary bg-gradiant rounded-bottom border-0">
                                    <!-- <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                    <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                    <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0 bg-dark bg-opacity-10">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-secondary bg-gradiant rounded-bottom border-0">
                                    <!-- <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                    <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                    <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>



                    
                    
                </div>


                <div class="row pt-md-4" id="courseList">                    

                <?php foreach ($data['not_enrolled'] as $course): ?>
                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0 bg-dark bg-opacity-10">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-secondary bg-gradiant rounded-bottom border-0">
                                    <!-- <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                    <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                    <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0 bg-dark bg-opacity-10">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-secondary bg-gradiant rounded-bottom border-0">
                                    <!-- <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                    <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                    <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/E-learning/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0 bg-dark bg-opacity-10">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-secondary bg-gradiant rounded-bottom border-0">
                                    <!-- <span class="badge bg-primary mb-2"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                    <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                    <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                <?php endforeach; ?>



                    
                    
                </div>
            </div>


        </div>


    </div>

    <?php View::render('component/js'); ?>
    
</body>
</html>