<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Fondation Charis</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <!-- Include SweetAlert2 CSS
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    Include SweetAlert2 JS
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-pagination/1.4.0/jquery.pagination.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-pagination/1.4.0/jquery.pagination.min.js"></script>
    <script src="https://player.vimeo.com/api/player.js"></script>
    <style>
        .custom-file-upload {
            display: inline-block;
            padding: 10px;
            cursor: pointer;
            border: 1px solid #007bff;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            transition: background-color 0.3s, transform 0.2s;
            text-align: center;
            width: 100%;
        }

        .custom-file-upload:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }

        input[type="file"] {
            display: none;
        }

        .preview {
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 360px;
        }

        video,
        #updateCourseModal img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }

        .flex-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .flex-item {
            flex: 1 1 30%;
            margin: 10px;
        }

        .form-group {
            width: 100%;
        }

        .table-responsive {
            overflow-x: auto;
            /* Enable horizontal scrolling */
        }

        .truncate {
            white-space: nowrap;
            /* Prevent line breaks */
            overflow: hidden;
            /* Hide overflow */
            text-overflow: ellipsis;
            /* Show ellipsis */
            max-width: 100px;
            /* Set a maximum width */
            position: relative;
            /* For tooltip positioning */
        }

        .truncate:hover::after {
            content: attr(data-full);
            /* Show full text */
            position: absolute;
            /* Position tooltip */
            left: 0;
            top: 100%;
            /* Below the text */
            background-color: #fff;
            /* Tooltip background */
            border: 1px solid #ccc;
            /* Tooltip border */
            padding: 5px;
            white-space: normal;
            /* Allow line breaks in tooltip */
            z-index: 100;
            /* Ensure tooltip is above other elements */
            max-width: 200px;
            /* Optional: Set max width for tooltip */
        }
        body {
                   font-family: 'Arial', sans-serif;
                   background-color: black;
                   color: #ffffff;
               }
               .card {
            margin-bottom: 1rem;
            background-color: white;
            border: none;
        }  
    </style>
</head>


<body>
<nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color: #2C3E50;">
            <!-- Navbar Brand avec l'image à gauche -->
            <a class="navbar-brand ps-3 d-flex align-items-center" href="index.html">
                <img src="img/logo.jpg" alt="Sales Management Logo" class="img-fluid" style="max-width: 50px; border-radius: 20px;">
            </a>
        
            <!-- Sidebar Toggle -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
        
            <!-- Navbar -->
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #2C3E50; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading text-uppercase" style="color: #ECF0F1; letter-spacing: 1px;">Fondation Charis</div>
                            <a class="nav-link " href="index.html" style="color: #fff;">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <span>Dashboard</span>
                            </a>
            
                            <div class="sb-sidenav-menu-heading text-uppercase" style="color: #ECF0F1; letter-spacing: 1px;">Interface</div>
                            
                            <!-- Pages Menu with Collapse -->
                            <a class="nav-link" href="./CoursesPage.php" style="color: #BDC3C7;">Ajouter un Cours
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="./AllCourses.php" style="color: #BDC3C7;">Liste de Cours
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                            </a>
            
                            <!-- <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth" style="color: #ECF0F1;">
                                        Cours
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
            
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="./CoursesPage.php" style="color: #BDC3C7;">Ajouter un Cours</a>
                                            <a class="nav-link" href="./AllCourses.php" style="color: #BDC3C7;">Liste de Cours</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> -->
                        </div>
                    </div>
            
                    <div class="sb-sidenav-footer" style="background-color: #34495E; padding: 20px; text-align: center;">
                        <div class="small" style="color: #BDC3C7;">Logged in as:</div>
                        <span style="color: #fff;">Admin</span>
                    </div>
                </nav>
            </div>
            
            <style>
                .nav-link {
                    position: relative;
                    padding: 10px 15px;
                    border-radius: 8px;
                    transition: background-color 0.3s ease, box-shadow 0.3s ease;
                }
            
                .nav-link:hover {
                    background-color: #16A085;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                }
            
                .nav-link.active {
                    background-color: #1ABC9C;
                    color: #fff;
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
                }
            
                .nav-link.active .sb-nav-link-icon i {
                    color: #fff;
                }
            
                .sb-sidenav-collapse-arrow i {
                    transition: transform 0.3s ease;
                }
            
                .nav-link.collapsed[aria-expanded="true"] .sb-sidenav-collapse-arrow i {
                    transform: rotate(90deg);
                }
            
                .sb-sidenav-footer {
                    font-size: 14px;
                }
            </style>
        <div id="layoutSidenav_content">
        <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4 text-white">Cours</h1>
        <ol class="breadcrumb mb-4 bg-dark text-white">
            <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none text-primary">Dashboard</a></li>
            <li class="breadcrumb-item active text-light">Liste de Cours</li>
        </ol>

        <div class="container-fluid bg-dark p-4 rounded">
            <h2 class="text-white">Liste des Cours</h2>
            <div class="table-responsive">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Instructeur</th>
                            <th>Catégorie</th>
                            <th>Image URL</th>
                            <th>Vidéo URL</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="courseTableBody">
                        <!-- Les lignes des cours seront insérées ici -->
                    </tbody>
                </table>
            </div>

            <nav aria-label="Pagination des cours" class="mt-4">
                <ul class="pagination justify-content-center bg-dark" id="pagination">
                    <!-- Les éléments de pagination seront insérés ici -->
                </ul>
            </nav>
        </div>
    </div>
</main>

<!-- Custom CSS -->
<style>
    /* Breadcrumb style */
    .breadcrumb {
        background-color: #1f1f1f;
        border-radius: 5px;
        padding: 10px;
    }

    /* Table styles */
    .table-dark {
        color: #f8f9fa;
        border-radius: 5px;
    }

    .table-dark th, .table-dark td {
        padding: 15px;
    }

    /* Add hover effect to table rows */
    .table-hover tbody tr:hover {
        background-color: #343a40;
        cursor: pointer;
    }

    /* Table headers styling */
    .table-dark thead th {
        background-color: #343a40;
        border-bottom: 2px solid #007BFF;
        text-align: center;
    }

    /* Pagination */
    .pagination {
        padding: 0.75rem;
    }

    .pagination .page-link {
        background-color: #2b2b2b;
        color: #fff;
        border: 1px solid #007BFF;
        border-radius: 5px;
    }

    .pagination .page-link:hover {
        background-color: #007BFF;
        border-color: #0056b3;
        color: white;
    }

    .pagination .active .page-link {
        background-color: #007BFF;
        border-color: #0056b3;
    }

    /* Main container styling */
    .container-fluid {
        background-color: #1f1f1f;
        border-radius: 10px;
        padding: 20px;
    }

    /* H1 Heading */
    h1 {
        font-weight: bold;
    }

    /* Breadcrumb and main heading */
    h2 {
        font-size: 1.75rem;
        margin-bottom: 20px;
    }
</style>

            
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="updateCourseModal" tabindex="-1" role="dialog" aria-labelledby="updateCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="updateCourseModalLabel">Mettre à jour les informations du cours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body bg-dark text-light">
                <form id="updateCourseForm" enctype="multipart/form-data">
                    <div class="form-row mb-3">
                        <div class="flex-container">
                            <div class="flex-item">
                                <div class="form-group">
                                    <label for="title" class="form-label">Titre :</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Entrez le titre du cours" required style="border-radius: 5px;">
                                </div>
                            </div>
                            <div class="flex-item">
                                <div class="form-group">
                                    <label for="category" class="form-label">Catégorie :</label>
                                    <select class="form-control" id="category" required style="border-radius: 5px;">
                                        <option value="">Sélectionnez une catégorie</option>
                                        <option value="programming">Programmation</option>
                                        <option value="design">Design</option>
                                        <option value="marketing">Marketing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex-item">
                                <div class="form-group">
                                    <label for="instructor" class="form-label">Instructeur :</label>
                                    <select class="form-control" id="instructor" required style="border-radius: 5px;">
                                        <option value="">Sélectionnez un instructeur</option>
                                        <option value="instructor1">Instructeur 1</option>
                                        <option value="instructor2">Instructeur 2</option>
                                        <option value="instructor3">Instructeur 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" name="description" id="description" rows="4" placeholder="Entrez la description du cours" required style="border-radius: 5px;"></textarea>
                    </div>
                            <div class=" flex-item">
                                <div class="form-group">
                                    <label for="image-file">Upload Image</label>
                                    <div class="custom-file-upload" onclick="document.getElementById('image-file').click();">
                                        Choose Image
                                    </div>
                                    <input type="file" class="form-control-file" id="image-file" accept="image/*" onchange="previewImage()">
                                    <div class="preview" id="image-preview" style="display:block;">
                                        <h5>Image Preview:</h5>
                                        <img id="image" src="" alt="Image Preview">
                                    </div>
                                </div>
                            </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3" style="border-radius: 5px;">Mettre à jour le cours</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for the modal -->
<style>
    /* Modal Header */
    .modal-header {
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Input fields */
    .form-control {
        background-color: #2b2b2b;
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 12px;
    }

    .form-control:focus {
        background-color: #2b2b2b;
        color: #ffffff;
        border-color: #007BFF;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.4);
    }

    /* Modal Body */
    .modal-body {
        padding: 20px;
        background-color: #1f1f1f;
    }

    /* Button primary */
    .btn-primary {
        background-color: #007BFF;
        border: none;
        padding: 10px;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Label styling */
    .form-label {
        color: #adb5bd;
    }

    /* Flex container */
    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    .flex-item {
        flex: 1;
        margin-right: 10px; /* Add some space between flex items */
    }

    .flex-item:last-child {
        margin-right: 0; /* Remove margin from the last item */
    }
</style>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>

    <script>
        function deleteCourse(courseId) {
            // Show SweetAlert confirmation dialog
            swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Make a fetch request to delete the course
                    fetch(`../Api/delete_course.php?id=${courseId}`, {
                            method: 'DELETE'
                        })
                        .then(response => {
                            if (response.ok) {
                                Swal.fire(
                                    'Deleted!',
                                    'Course deleted successfully.',
                                    'success'
                                );
                                LoadCourseTable(); // Reload the table or refresh the page
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Error deleting course.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'An error occurred while deleting.',
                                'error'
                            );
                        });
                }
            });
        }

        let currentPage = 1;
        const rowsPerPage = 10; // Number of rows per page
        let coursesData = []; // Array to store the fetched courses

        function LoadCourseTable() {
            $.ajax({
                url: '../Api/fetch_courses.php', // Adjust to your endpoint for fetching courses
                type: 'GET',
                dataType: 'json', // Expect JSON response
                success: function(courses) {
                    if (Array.isArray(courses)) {
                        coursesData = courses; // Store the fetched data
                        displayCourses(currentPage);
                        setupPagination();
                    } else {
                        console.error("Expected an array of courses but received:", courses);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Invalid course data received.'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching course data: ", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Could not fetch course data. Please try again later.'
                    });
                }
            });
        }

        function displayCourses(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;
            const paginatedCourses = coursesData.slice(start, end);

            let tableRows = '';
            paginatedCourses.forEach((course, index) => {
                tableRows += `
            <tr>
                <td>${start + index + 1}</td> <!-- Index Column -->
                <td class="truncate" data-full="${course.title}">${course.title}</td>
                <td class="truncate" data-full="${course.instructor_name}">${course.instructor_name}</td>
                <td class="truncate" data-full="${course.category_name}">${course.category_name}</td>
                <td><img src="${course.image_url}" alt="Course Image" width="100"></td>
                <td><a href="${course.video_url}" target="_blank">Watch Video</a></td>
                <td>${course.created_at}</td>
                <td>
                    <button type="button" class="openModal btn btn-warning" data-id='${course.course_id}'>Update</button>
                    <button onclick="deleteCourse(${course.course_id})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        `;
            });

            $('#courseTableBody').html(tableRows); // Update the table body
        }

        function setupPagination() {
            const pagination = $('#pagination');
            pagination.empty(); // Clear previous pagination

            const pageCount = Math.ceil(coursesData.length / rowsPerPage);
            for (let i = 1; i <= pageCount; i++) {
                const li = $(`<li class="page-item"><a class="page-link" href="#">${i}</a></li>`);
                li.on('click', (e) => {
                    e.preventDefault();
                    currentPage = i;
                    displayCourses(currentPage);
                    highlightActivePage();
                });
                pagination.append(li);
            }
            highlightActivePage();
        }

        function highlightActivePage() {
            $('#pagination .page-item').removeClass('active');
            $('#pagination .page-item').eq(currentPage - 1).addClass('active');
        }

        // Call LoadCourseTable to fetch and display data on page load
        LoadCourseTable();

        $(document).ready(function() {
            // Initialize the Vimeo player


            // Close the modal when the close button is clicked
            $('#closeModal').click(function() {
                // Clear all input fields
                $('#updateCourseForm')[0].reset();
                const iframe = document.getElementById('video');
                const player = new Vimeo.Player(iframe);
                // Stop the video if it's playing
                player.pause().then(function() {
                    player.setCurrentTime(0); // Reset video to start
                }).catch(function(error) {
                    console.error('Error pausing or resetting the video:', error);
                });

                // Clear video and image previews
                $('#video').attr('src', '');
                $('#image').attr('src', '');
                // $('#video-preview').hide();
                // $('#image-preview').hide();

                $('#updateCourseModal').modal('hide');
            });
        });
    </script>

    <script>
        function previewVideo() {
            const file = document.getElementById('video-file').files[0];
            const video = document.getElementById('video');
            const preview = document.getElementById('video-preview');
            const videoId = video.src.split('/').pop();

            console.log(video.src);
            console.log("test");

        }

        function previewImage() {
            const file = document.getElementById('image-file').files[0];
            const img = document.getElementById('image');
            const preview = document.getElementById('image-preview');

            const reader = new FileReader();
            reader.onloadend = function() {
                img.src = reader.result;
            }
            if (file) {
                reader.readAsDataURL(file);
                preview.style.display = 'block';
            } else {
                img.src = "";
                preview.style.display = 'none';
            }
        }
    </script>


    <script>
        var courseId;
        var oldVideoUrl;

        // Function to handle file uploads
        function handleFileUpload(fileInputId, folder) {
            var fileInput = document.getElementById(fileInputId);
            var file = fileInput.files[0];
            var filePath;

            if (file) {
                var fileName = file.name;
                console.log(fileName);
                var formData = new FormData();
                formData.append("imageFile", file);

                fetch('../uploadFiles.php', {
                    method: 'POST',
                    body: formData
                });

                filePath = `http://localhost/VIMEOUPLOAD/${folder}/` + fileName; // Construct the file path
            } else {
                var imgElement = document.getElementById(fileInputId.replace('-file', ''));
                filePath = imgElement.src; // Use existing path
            }

            return filePath;
        }


        $(document).ready(function() {
            // When the modal opens
            $(document).on('click', '.openModal', function() {
                courseId = $(this).data('id');
                console.log("Modal trigger clicked");
                console.log(courseId);
                fetchCourseData(courseId);

                $('#updateCourseModal').modal({
                    backdrop: 'static', // Prevent closing on backdrop click
                    keyboard: false // Disable closing with Esc key
                });
                $('#updateCourseModal').modal('show');
            });

            // Function to fetch course data
            function fetchCourseData(courseId) {
                $.ajax({
                    url: '../Api/fetch_course.php',
                    type: 'GET',
                    data: {
                        courseId: courseId
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log("Raw response:", data);
                        var course = typeof data === "string" ? JSON.parse(data) : data;

                        // Populate form fields
                        $('#courseId').val(course.id);
                        $('#title').val(course.title);
                        $('#description').val(course.description);
                        $('#category').empty();
                        $('#instructor').empty();

                        console.log("url vid:", course.video_url);

                        const videoId = course.video_url.split('/').pop();
                        var vimeo = `https://player.vimeo.com/video/${videoId}`;
                        console.log("url vid:", vimeo);

                        $('#video').attr('src', vimeo);



                        oldVideoUrl = course.video_url;

                        $('#image').attr('src', course.image_url);

                        // Populate categories dropdown
                        $.each(course.categories, function(i, category) {
                            var selected = category.id == course.category_id ? 'selected' : '';
                            $('#category').append(new Option(category.name, category.category_id, false, selected));
                        });

                        // Populate instructors dropdown
                        $.each(course.instructors, function(i, instructor) {
                            var selected = instructor.id == course.instructor_id ? 'selected' : '';
                            $('#instructor').append(new Option(instructor.username, instructor.user_id, false, selected));
                        });
                    },
                    error: function() {
                        alert("Error fetching course data.");
                    }
                });
            }

            // Handle form submission
            $('#updateCourseForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission

                const formData = new FormData(document.getElementById('updateCourseForm'));

                var fileInput = document.getElementById("video-file");
                var file = fileInput.files[0];
                var filePath;
                var imagePath = handleFileUpload('image-file', 'images');

                if (file) {
                    var fileName = file.name;
                    console.log(fileName);

                    const title = formData.get('title');
                    console.log(title);
                    const description = formData.get('description');
                    console.log(description);

                    var instructor_id = $('#instructor').val();
                    var category_id = $('#category').val();


                    fetch('../../Api/uploadVideo.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            Swal.close();
                            if (data.success) {
                                // Save video details to database
                                UpdateVideoDetails(courseId, data.videoUrl, title, description, imagePath, instructor_id, category_id);
                            } else {
                                Swal.fire({
                                    title: data.success ? 'Success!' : 'Error!',
                                    text: data.message,
                                    icon: data.success ? 'success' : 'error',
                                    confirmButtonText: 'OK'
                                });
                                return;
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Upload failed.',
                                icon: 'error',
                                confirmButtonText: 'Try Again'
                            });
                        });
                } else {
                    const title = formData.get('title');
                    console.log(title);
                    const description = formData.get('description');
                    console.log(description);

                    var instructor_id = $('#instructor').val();
                    var category_id = $('#category').val();

                    var imagePath = handleFileUpload('image-file', 'images');
                    var videoPath = oldVideoUrl;

                    $.ajax({
                        url: '../Api/update_course.php',
                        type: 'POST',
                        data: {
                            id: courseId,
                            videoPath: videoPath,
                            imagePath: imagePath,
                            title: title,
                            description: description,
                            instructor_id: instructor_id,
                            category_id: category_id
                        },
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                text: 'Course updated successfully!',
                                icon: 'success'
                            });
                            LoadCourseTable();
                            $('#updateCourseModal').modal('hide'); // Close the modal
                        },
                        error: function(xhr) {
                            console.log(xhr.error);
                            Swal.fire({
                                title: 'Error',
                                text: 'An error occurred while updating the course.',
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });

        function UpdateVideoDetails(id, videoPath, title, description, imagePath, instructor_id, category_id) {

            $.ajax({
                url: '../Api/update_course.php',
                type: 'POST',
                data: {
                    id: id,
                    videoPath: videoPath,
                    imagePath: imagePath,
                    title: title,
                    description: description,
                    instructor_id: instructor_id,
                    category_id: category_id
                },
                success: function(response) {
                    $('#updateCourseModal').modal('hide'); // Close the modal
                    Swal.fire({
                        title: 'Success',
                        text: 'Course updated successfully!',
                        icon: 'success'
                    });
                    LoadCourseTable();
                },
                error: function(xhr) {
                    console.log(xhr.error);
                    $('#updateCourseModal').modal('hide'); // Close the modal
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred while updating the course.',
                        icon: 'error'
                    });
                }
            });
        }
    </script>
</body>

</html>