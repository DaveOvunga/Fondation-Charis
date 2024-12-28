<?php
// Sample array of courses (this could come from your database)
$courses = [
    [
        'courseName' => 'Course 1',
        'courseNumber' => '001',
        'courseContent' => 'Description for Course 1',
        'videoUrl' => 'https://player.vimeo.com/video/1017735907',
    ],
    [
        'courseName' => 'Course 2',
        'courseNumber' => '002',
        'courseContent' => 'Description for Course 2',
        'videoUrl' => 'https://player.vimeo.com/video/1017735908',
    ],
    // Add more courses as needed
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Player</title>

    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .iframe-container {
            max-width: 100%;
            height: 450px;
            margin: 0 auto;
        }
        #nextButton {
            display: none; /* Initially hide the "Next Video" button */
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Button to start the first course -->
    <div class="container mt-5">
        <button id="startCourseBtn" class="btn btn-primary">Start First Course</button>
    </div>

    <!-- Modal -->
    <div id="courseModal" class="modal fade" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="courseModalLabel" class="modal-title">Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 id="courseName"></h2>
                    <p id="courseDescription"></p>
                    <div class="iframe-container border rounded shadow-sm">
                        <iframe id="courseVideo" class="w-100 rounded" src="" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="nextCourseBtn" class="btn btn-success" style="display:none;">Next Course</button>
                    <button id="closeModalBtn" class="btn btn-secondary">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Vimeo Player API -->
    <script src="https://player.vimeo.com/api/player.js"></script>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fetch courses from PHP and pass them to JavaScript
        const courses = <?php echo json_encode($courses); ?>;

        // Get modal elements
        const modal = new bootstrap.Modal(document.getElementById('courseModal'));
        const courseNameElement = document.getElementById('courseName');
        const courseDescriptionElement = document.getElementById('courseDescription');
        const iframe = document.getElementById('courseVideo');
        const nextButton = document.getElementById('nextCourseBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const startCourseBtn = document.getElementById('startCourseBtn');

        // Initialize course index
        let currentCourseIndex = -1;

        // Function to open the modal and load the course
        function openCourseModal(index) {
            const course = courses[index];
            courseNameElement.textContent = course.courseName;
            courseDescriptionElement.textContent = course.courseContent;
            iframe.src = course.videoUrl;
            currentCourseIndex = index;
            modal.show();

            // Reset and hide the "Next Course" button
            nextButton.style.display = 'none';
            loadVideo();
        }

        // Function to load the Vimeo video and listen for its end
        function loadVideo() {
            const player = new Vimeo.Player(iframe);
            
            // When the video finishes
            player.on('ended', function() {
                nextButton.style.display = 'inline-block'; // Show "Next Course" button
            });
        }

        // Event listener for start button
        startCourseBtn.addEventListener('click', () => {
            openCourseModal(0); // Start with the first course
        });

        // Event listener for next button
        nextButton.addEventListener('click', () => {
            const nextIndex = currentCourseIndex + 1;
            if (nextIndex < courses.length) {
                openCourseModal(nextIndex); // Load the next course
            } else {
                closeModal(); // If no more courses, close the modal
            }
        });

        // Event listener for close button
        closeModalBtn.addEventListener('click', () => {
            closeModal();
        });

        // Function to close the modal and stop the video
        function closeModal() {
            modal.hide();
            iframe.src = ''; // Stop the video when closing the modal
            nextButton.style.display = 'none'; // Hide the "Next" button
        }
    </script>

</body>
</html>
