<?php 
    use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">

<?php View::render('component/head'); ?>
    
</head>
<body class="bg-dark">
        
    <?php View::render('component/sidebar');?>

    <div class="content" id="content">

        <?php View::render('component/header');?>

        <div class="hero mb-5">
            <div class="overlay"></div> <!-- Black overlay -->
            
            <div class="container px-lg-5 align-items-center">
                <div class="hero-text px-lg-5">
                    <h2>Bienvenue <span class="text-primary"><?=$_SESSION['user'] ?></span></h2>
                    <h5>Continue tes formations là où tu les as laissées.</h5>
                </div>
            </div>
        </div>

        <div class="container px-lg-5 indexZ">

            <div class="allFormation px-lg-1 mb-5">
                <div class=" text-white mb-3">
                    <h5>Vos formations en cours</h5>
                </div>

                <!-- Your begin course List -->
                <div class="row" id="courseList">                    
                
                    <?php if ($data['enrolled']):?>
                        <?php foreach ($data['enrolled'] as $course): ?>
                            <div class="col-md-4 mb-4 course-card">
                                <a href="<?php echo APP_URL.'/course/' . htmlspecialchars(base64_encode($course['courses_details_id'])); ?>" class="text-decoration-none">
                                    <div class="card h-100 shadow-lg border-0">
                                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                        <div class="card-body bg-dark">
                                            <span class="badge badge-primary"><?php echo htmlspecialchars($course['category_name']); ?></span>
                                            <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                            <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h6 class="px-5">Pas de formation commencer</h6>
                    <?php endif;?>
                    
                    
                </div>
            </div>

            
            <div class="allFormation px-lg-1">
                <div class=" text-white mb-3">
                    <h5>Formations disponibles</h5>
                </div>

                <!-- Course Cards List -->
                <div class="row" id="courseList">                    

                <?php foreach ($data['not_enrolled'] as $course): ?>
                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/course/' . htmlspecialchars(base64_encode($course['courses_details_id'])); ?>" class="text-decoration-none">
                            <div class="card h-100 shadow-lg border-0">
                                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                <div class="card-body bg-dark">
                                    <span class="badge badge-primary"><?php echo htmlspecialchars($course['category_name']); ?></span>
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