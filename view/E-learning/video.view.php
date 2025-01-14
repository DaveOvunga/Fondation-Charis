<?php 
    use App\Core\View;
    use App\Core\Helper;
?>
<!DOCTYPE html>
<html lang="en">

<?php View::render('component/head'); ?>
</head>
<body class="bg-dark">
        
    <?php View::render('component/sidebar');?>

    <div class="content" id="content">
        <?php View::render('component/header');?>
        
        <div class="container-fluid px-lg-5 indexZ mt-4">

            <div class="allFormation mb-4">
                <!-- Course Cards List -->
                <div class="row justify-content-center" id="courseList">                    
                    <!-- Course Cards -->
                    <div class="card container-fluid border-white bg-dark text-white shadow-lg px-0 col-lg-9">
                        <div class="mt-3 px-4">
                            <div>
                                <nav aria-label="breadcrumb ">
                                    <ol class="breadcrumb p-0 bg-dark">
                                        <li class="breadcrumb-item"><a href="<?=APP_URL?>/E-learning">Accueil</a></li>
                                        <li class="breadcrumb-item"><a href="<?php echo APP_URL.'/E-learning/course/'. htmlspecialchars(base64_encode($data['course_id']))?>"><?php echo htmlspecialchars($data['course_name']); ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Video</li>
                                    </ol>
                                </nav>
                            </div>
                            <h3>Chapitre <?php echo htmlspecialchars($data['chapter_number']).". ".htmlspecialchars($data['chapter_name']); ?></h3>
                            <hr class="bg-white">
                        </div>
                        <div class="card-body p-0">
                            <div class="iframe-container border-0">
                                <iframe class="border-0 bg-info rounded-bottom" id="vimeo-iframe" src="https://player.vimeo.com/video/<?= basename(htmlspecialchars($data['video_url'])) ?>" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="mb-4">
                <div class="row justify-content-center">
                    <div class="card container-fluid border-white bg-dark text-white shadow-lg px-0 py-3 col-lg-8 col-md-8">
                        <div class="d-flex justify-content-evenly">
                            <button class="btn btn-primary btn-sm px-lg-3 py-lg-2 " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-book pe-lg-1 pe-md-2" aria-hidden="true"></i> Cours</button>
                            <!-- <a class="btn btn-primary btn-sm px-lg-3 py-lg-2 disabled" role="button" aria-disabled="true"><i class="fa-solid fa-circle-question pe-lg-1 pe-md-2"></i> Quiz</a> -->
                            <?php if ($data['next_chapter_id']): ?>
                                <a class="btn btn-primary btn-sm px-lg-3 py-lg-2 disabled" role="button" id="nextChapBtn">Next Lesson <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Chapitre <?php echo htmlspecialchars($data['chapter_number']).". ".htmlspecialchars($data['chapter_name']); ?></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-0">
            <?= Helper::generateChapterCard($data['content']) ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <?php View::render('component/js'); ?>
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