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

<div class="dropdown open">
    <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        id="triggerId"
        data-bs-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
    >
        Dropdown Button
    </button>
    <div class="dropdown-menu" aria-labelledby="triggerId">
        <button class="dropdown-item" href="#">Action</button>
        <button class="dropdown-item disabled" href="#">
            Disabled action
        </button>
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
