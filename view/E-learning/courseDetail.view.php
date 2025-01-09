<?php 
    use App\Core\View;
    use App\Core\Helper;
?>
<!DOCTYPE html>
<html lang="en">

    <?php View::render('component/head'); ?>
    <style>
        .hero {
            background-image: url('<?=APP_URL?>/img/pattern.jpg');
            background-size: cover;
            background-position: center;
            height: 70vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative; /* Ensure positioning for the overlay */

        }
        .card-title {
            text-overflow: ellipsis;
            display: -webkit-box; /* For Safari */
            -webkit-box-orient: vertical;
            line-clamp: 2; /* Standard property (not widely supported) */
            max-height: 3em; /* Adjust height for 2 lines */
            overflow: none;
            white-space: normal; /* Allow wrapping */
        }

        .card-text {
            display: -webkit-box; /* For Safari */
            -webkit-box-orient: vertical;
            overflow: none;
            text-overflow: none;
            white-space: normal; /* Allow wrapping */
            max-height: 3em; /* Adjust height for 2 lines (assuming line height is 1.5em) */
        }

        .card-title {
            max-width: 100%;
            margin-bottom: 0.5rem;
        }

        .card-text {
            flex-grow: 1;
            margin-bottom: 1rem;
        }
    </style>

<body class="bg-dark">
        
    <?php View::render('component/sidebar');?>

    <div class="content" id="content">

        <?php View::render('component/header');?>

        <div class="hero mb-3">
            <div class="overlay"></div> <!-- Black overlay -->
            
            <div class="container px-lg-3 align-items-center">
                <div class="hero-text px-lg-5">

                    <h2 class="col-md-9 pb-3"><?php echo htmlspecialchars($data['courseDetail']['course_name']); ?></h2>

                    <div class="col-md-9"><p><?php echo htmlspecialchars($data['courseDetail']['descriptioncourte']); ?></p></div>
                    
                    <div class="d-flex">
                    <h6><span class="badge border rounded-pill p-2"><i class="fa fa-book pe-2" aria-hidden="true"></i><?php echo htmlspecialchars($data['courseDetail']['nbreChapitre']); ?> chapitres</span></h6>
                    </div>
                    
                    <div class="mt-3">
                        <a href="<?php echo APP_URL.'/E-learning/course/'. htmlspecialchars(Helper::encodeIds($data['courseDetail']['id'],$data['listChapitre'][0]['id']))?>/video" class="btn btn-primary begin-course-btn rounded-pill px-4 align-items-center fw-bold">
                            <?php if($data['courseDetail']['enrolled']): ?>
                                Continue <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            <?php else: ?>
                                Commercer</a>
                            <?php endif; ?>
                        </a>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="container px-lg-3 indexZ">

            <div class="px-lg-5 mb-4">
                <!-- Course Cards List -->
                <div class="row justify-content-center px-3" id="courseList">                    
                    <!-- Course Cards -->
                    <div class="card border-white bg-dark text-white shadow-lg mt-3">
                        <div class="card-body">
                            <h5 class="px-md-3 px-0 pb-lg-2">Les prérequis pour suivre cette formation</h5>

                            <?= Helper::prerequiseCard($data['courseDetail']['prerequis']) ?>
                        </div>
                    </div>

                    <div class="card border-white bg-dark text-white shadow-lg mt-5">
                        <div class="card-body">
                            <h5 class="px-md-3 px-0 pb-lg-2">Qu'est-ce que je vais découvrir ?</h5>

                            <?= Helper::objectiveCard($data['courseDetail']['objectif']) ?>
                        </div>
                    </div>

                    <div class="card border-white bg-dark text-white shadow-lg mt-5">
                        <div class="card-body">
                            <h5 class="px-md-3 px-0 pb-lg-2">Description</h5>

                            <p class="px-md-3 px-0 pb-lg-2"><?= htmlspecialchars($data['courseDetail']['description']); ?></p>
                        </div>
                    </div>

                    <div class="card border-white bg-dark text-white shadow-lg mt-5">
                        <div class="card-body">
                            <h5 class="px-md-3 px-0 pb-lg-2">Plan de la formation</h5>

                            <?php if (isset($data['listChapitre'])&& $data['listChapitre']):?>
                                <ul class="list-group">
                                    <?php foreach ($data['listChapitre'] as $chapitre): ?>
                                        <li class='list-group-item border-white rounded-0 bg-dark text-white px-0 px-md-3'>
                                            <i class='fas fa-chevron-right pe-2 text-primary'></i>
                                            <strong><?php echo 'Chapitre '.$chapitre['chapter_number'].' : '.$chapitre['name'] ?></strong>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <h6 class="px-5 text-white pt-3">Pas de formation commencer</h6>
                            <?php endif;?>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </div>

    <?php View::render('component/js'); ?>
</body>
</html>