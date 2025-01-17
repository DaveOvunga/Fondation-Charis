<?php 
    use App\Core\View;
    use App\Core\Helper;
?>
<!DOCTYPE html>
<html lang="en">

<?php View::render('component/head'); ?>
</head>
<style>
    /* Styles pour le design */
.breadcrumb-item a {
    color: var(--bs-primary);
}

.breadcrumb-item.active {
    color: var(--bs-secondary);
}

.progress {
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

.progress-bar {
    border-radius: 10px;
}

.home-icon, .trophy-icon {
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.play-button {
    cursor: pointer;
    transition: transform 0.3s ease;
}

.play-button:hover {
    transform: scale(1.1);
}

.video-section {
    transition: transform 0.3s ease;
}

.video-section:hover {
    transform: translateY(-5px);
}

/* Animation pour la barre de progression */
@keyframes progressAnimation {
    0% { width: 0; }
    100% { width: 4%; }
}

.progress-bar {
    animation: progressAnimation 1.5s ease-out;
}
</style>
<body>
        
    <?php View::render('component/sidebar');?>

    <div class="content" id="content">
        <?php View::render('component/header');?>
        
        <div class="container-fluid px-lg-5 indexZ mt-4">
    <!-- Breadcrumb et titre -->
    <div class="mb-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="<?=APP_URL?>/E-learning" class="text-decoration-none">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Cours</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($data['course_name']); ?></li>
            </ol>
        </nav>

        <h1 class="display-4 fw-bold mb-4"><?php echo htmlspecialchars($data['course_name']); ?></h1>
        
        <!-- Métadonnées du cours -->
        <div class="d-flex gap-4 mb-4">
            <div class="d-flex align-items-center">
                <i class="far fa-clock me-2"></i>
                <span>2 heures</span>
            </div>
            <div class="d-flex align-items-center">
                <i class="fas fa-signal me-2"></i>
                <span>Facile</span>
            </div>
            <div class="d-flex align-items-center ms-auto">
                <span>Mis à jour le 13/08/2024</span>
            </div>
        </div>

        <!-- Barre de progression -->
        <div class="progress-container d-flex align-items-center gap-3">
            <div class="home-icon rounded-circle bg-secondary p-3">
                <i class="fas fa-home text-white"></i>
            </div>
            
            <div class="progress flex-grow-1" style="height: 8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 4%"></div>
            </div>
            
            <div class="trophy-icon rounded-circle bg-secondary p-3">
                <i class="fas fa-trophy text-white"></i>
            </div>
        </div>
    </div>

    <!-- Section vidéo -->
    <div class="row flex-column flex-md-row"> <!-- Changed row behavior -->
    <!-- Contenu vidéo (Section du haut sur mobile) -->
    <div class="col-md-8 order-1"> <!-- Added order-1 -->
        <div class="card-body p-0">
            <div class="iframe-container border-0 mb-3">
                <iframe 
                    class="border-0 rounded-3 w-100" 
                    id="vimeo-iframe" 
                    src="https://player.vimeo.com/video/<?= basename(htmlspecialchars($data['video_url'])) ?>" 
                    allowfullscreen
                    style="aspect-ratio: 16/9;">
                </iframe>
            </div>
        </div>
        <div class="" style="text-align: justify;">
            <h1 class="title fs-5" id="" style="font-weight: bold;">Chapitre <?php  echo htmlspecialchars($data['chapter_number']).". ".htmlspecialchars($data['chapter_name']); ?></h1>
        </div>
        <div class="body pt-0">
            <?= Helper::generateChapterCard($data['content']) ?>
        </div>

    <?php View::render('component/js'); ?>
                            <?php if ($data['next_chapter_id']): ?>
                                <a class="btn btn-primary  px-lg-3 py-lg-2 disabled" role="button" id="nextChapBtn">Next Lesson <i class="fa fa-arrow-right" aria-hidden="true" style="width: 100px;"></i></a>
                            <?php endif ?>
    </div>
    <div class="space" style="margin-bottom: 10%;">
        
    </div>

    <!-- Table des matières (En dessous sur mobile, à gauche sur desktop) -->
    <div class="col-md-4 order-2 mt-3 mt-md-0">
    <div class="course-sidebar bg-light rounded-3 p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Table des matières</h5>
        </div>
        
        <!-- Liste des chapitres -->
        <div class="chapter-list">
            <!-- PARTIE 1: Introduction -->
            <div class="chapter-section mb-4">
                <div class="chapter-header text-primary mb-2">
                    <strong>PARTIE 1</strong>
                    <div class="small text-muted">Introduction aux plaies</div>
                </div>
                <div class="chapter-items">
                    <div class="chapter-item d-flex align-items-center py-2 completed">
                        <div class="status-icon me-2">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div class="chapter-title">Définition et classification des plaies</div>
                    </div>

                    <div class="chapter-item d-flex align-items-center py-2 completed">
                        <div class="status-icon me-2">
                            <i class="fas fa-check-circle text-success"></i>
                        </div>
                        <div class="chapter-title">Processus de cicatrisation</div>
                    </div>
                </div>
            </div>

            <!-- PARTIE 2: Évaluation -->
            <div class="chapter-section mb-4">
                <div class="chapter-header text-primary mb-2">
                    <strong>PARTIE 2</strong>
                    <div class="small text-muted">Évaluation des plaies</div>
                </div>
                <div class="chapter-items">
                    <div class="chapter-item d-flex align-items-center py-2 active">
                        <div class="status-icon me-2">
                            <i class="fas fa-play-circle text-white"></i>
                        </div>
                        <div class="chapter-title">Méthodes d'évaluation clinique</div>
                    </div>

                    <div class="chapter-item d-flex align-items-center py-2">
                        <div class="status-icon me-2">
                            <i class="far fa-circle text-muted"></i>
                        </div>
                        <div class="chapter-title">Documentation et suivi des plaies</div>
                    </div>
                </div>
            </div>

            <!-- PARTIE 3: Traitement -->
            <div class="chapter-section mb-4">
                <div class="chapter-header text-muted mb-2">
                    <strong>PARTIE 3</strong>
                    <div class="small">Traitement des plaies</div>
                </div>
                <div class="chapter-items">
                    <div class="chapter-item d-flex align-items-center py-2">
                        <div class="status-icon me-2">
                            <i class="far fa-circle text-muted"></i>
                        </div>
                        <div class="chapter-title">Nettoyage et débridement</div>
                    </div>

                    <div class="chapter-item d-flex align-items-center py-2">
                        <div class="status-icon me-2">
                            <i class="far fa-circle text-muted"></i>
                        </div>
                        <div class="chapter-title">Pansements et bandages</div>
                    </div>
                </div>
            </div>

            <!-- PARTIE 4: Cas spéciaux -->
            <div class="chapter-section">
                <div class="chapter-header text-muted mb-2">
                    <strong>PARTIE 4</strong>
                    <div class="small">Cas particuliers</div>
                </div>
                <div class="chapter-items">
                    <div class="chapter-item d-flex align-items-center py-2">
                        <div class="status-icon me-2">
                            <i class="far fa-circle text-muted"></i>
                        </div>
                        <div class="chapter-title">Plaies chroniques</div>
                    </div>

                    <div class="chapter-item d-flex align-items-center py-2">
                        <div class="status-icon me-2">
                            <i class="far fa-circle text-muted"></i>
                        </div>
                        <div class="chapter-title">Plaies infectées</div>
                    </div>

                    <div class="chapter-item d-flex align-items-center py-2">
                        <div class="status-icon me-2">
                            <i class="far fa-circle text-muted"></i>
                        </div>
                        <div class="chapter-title">Cas cliniques pratiques</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
        
       




<style>
.course-sidebar {
    border: 1px solid rgba(0,0,0,0.1);
    background-color: #f8f9fa;
    
}

@media (min-width: 768px) {
    .course-sidebar {
        height: calc(100vh - 100px);
        overflow-y: auto;
        position: sticky;
        top: 20px;
    }
}

.chapter-item {
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.9rem;
}

.chapter-item:hover {
    background-color: rgba(0, 0, 0, 0.05);
}

.chapter-item.active {
    background-color: #198754; /* Bootstrap success color */
    color: white;
}

.chapter-item.completed {
    color: #198754;
}

.chapter-item.completed:hover {
    background-color: rgba(25, 135, 84, 0.1);
}

.status-icon {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chapter-title {
    line-height: 1.4;
}

.chapter-header {
    font-size: 0.9rem;
    padding: 8px 12px;
    border-bottom: 1px solid rgba(0,0,0,0.1);
}

/* Responsive */
@media (max-width: 767px) {
    .course-sidebar {
        max-height: 400px;
        overflow-y: auto;
    }
    
    .chapter-title {
        font-size: 1rem;
    }
}
</style>
</div>

<style>
/* Styles pour la sidebar et la liste des chapitres */
.course-sidebar {
    border: 1px solid rgba(0,0,0,0.1);
}

@media (min-width: 768px) {
    .course-sidebar {
        height: calc(100vh - 100px);
        overflow-y: auto;
        position: sticky;
        top: 20px;
    }
}

.chapter-item {
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.2s ease;
}

.chapter-item:hover {
    background-color: rgba(0, 0, 0, 0.05);
}

.chapter-item.active {
    background-color: var(--bs-primary);
    color: white;
}

.chapter-item.active .status-icon {
    color: white !important;
}

.status-icon {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.chapter-title {
    font-size: 0.9rem;
    line-height: 1.4;
}

/* Styles pour la vidéo */
.iframe-container {
    background: #000;
    border-radius: 8px;
    overflow: hidden;
}

/* Responsive adjustments */
@media (max-width: 767px) {
    .course-sidebar {
        max-height: 400px; /* Hauteur maximale sur mobile */
        overflow-y: auto;
    }
    
    .chapter-title {
        font-size: 1rem; /* Texte légèrement plus grand sur mobile */
    }
}
</style>
</div>

    

    
    
    
    <!-- Vimeo Player API -->
    <script src="https://player.vimeo.com/api/player.js"></script>

    <script>
        // Grab the iframe element and create a Vimeo player instance
        var iframe = document.querySelector('#vimeo-iframe');
        var player = new Vimeo.Player(iframe);
        var nextChapterBtn = document.querySelector('#nextChapBtn');


        // When the video ends, show the "Next Video" button
        player.on('ended', function() {
            console.log("Chapter is Finish bruh");
            // Select the specific anchor element by its id or select all anchors with the class 'disabled'
            var button = document.getElementById('nextChapBtn');

            // Remove the 'disabled' class
            if (button) {
            button.classList.remove('disabled');
            }
            else{
                console.log("not find lol");
            }
        });

        // Next video button click handler
        function nextVideo() {
            
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#nextChapBtn').on('click', function(event) { 
                event.preventDefault(); // Prevent default form submission

                $.ajax({
                    url: '<?php echo APP_URL?>/E-learning/chaptercomplete', 
                    type: 'POST',
                    data: {
                        course: "<?php echo htmlspecialchars(base64_encode($data['chapter_id']))?>" // Ensure the value is properly quoted
                    },
                    success: function(response) {
                        // $('#responseMessage').html('<div class="alert">' + response.message + '</div>');
                        if (response.success && response.redirect) {
                            console.log(response);
                            // Redirect to the login page after a short delay or immediately
                            setTimeout(function() {
                                window.location.href = "<?php echo APP_URL?>/E-learning/course/<?php echo Helper::encodeIds($data['course_id'],$data['next_chapter_id']) ?>/video" // Redirect to the login page
                            }, 2000); // Optional delay of 2 seconds
                        }else {
                            console.log("error bruh");
                            console.log(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#responseMessage').html('<div class="alert alert-danger">An error occurred</div>');
                        console.error("Error fetching data: " + error);
                        console.error('Response Text:', xhr.responseText); // Log the response text for debugging
                    }
                });
            });
        });
    </script>
</body>
</html>