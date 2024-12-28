<?php 
    use App\Core\View;
?>
<!DOCTYPE html>
<html lang="en">

<?php View::render('component/head'); ?>

<style>
    /* HERO SECTION */
.hero {
    background-image: url('<?=APP_URL?>/img/pattern.jpg');
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
</style>
</head>
<body class="bg-dark bg-gradient">
        
    <?php View::render('component/sidebar');?>

    <div class="content" id="content">

        <?php View::render('component/header');?>

        <div class="hero mb-5">
            <div class="overlay"></div> <!-- Black overlay -->
            
            <div class="container px-lg-2 align-items-center">
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
                
                    <?php if (isset($data['enrolled']) && $data['enrolled'] ):?>
                        <?php foreach ($data['enrolled'] as $course): ?>
                            <div class="col-md-4 mb-4 course-card">
                                <a href="<?php echo APP_URL.'/formation/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
                                    <div class="card h-100 shadow-lg border-0 bg-dark ">
                                        <img src="<?php echo htmlspecialchars($course['image_url']); ?>" class="card-img-top" alt="Digital Marketing Course">
                                        <div class="card-body bg-success bg-opacity-25 rounded-bottom">
                                            <!-- <span class="badge badge-primary"><?php echo htmlspecialchars($course['category_name']); ?></span> -->
                                            <h5 class="card-title text-white" title="<?php echo htmlspecialchars($course['course_name']); ?>"><?php echo htmlspecialchars($course['course_name']); ?></h5>
                                            <p class="card-text text-white" title="<?php echo htmlspecialchars($course['description']); ?>"><?php echo htmlspecialchars($course['description']); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h6 class="px-5 text-white pt-3">Pas de formation commencer</h6>
                    <?php endif;?>
                    
                    
                </div>
            </div>

            
            <div class="allFormation px-lg-1 border-top pt-3">
                <div class=" text-white mb-3">
                    <h5>Formations disponibles</h5>
                </div>

                <!-- Course Cards List -->
                <div class="row pt-md-4" id="courseList">                    

                <?php foreach ($data['not_enrolled'] as $course): ?>
                    <div class="col-md-4 mb-4 course-card">
                        <a href="<?php echo APP_URL.'/formation/course/' . htmlspecialchars(base64_encode($course['id'])); ?>" class="text-decoration-none">
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