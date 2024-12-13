<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Static Navigation - SB Admin</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-pagination/1.4.0/jquery.pagination.min.js"></script>
    <style>
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
            max-width: 150px;
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
            max-width: 300px;
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
            <h1 class="mt-4 text-light">Cours</h1>
            <ol class="breadcrumb mb-4" style="background-color: rgba(255, 255, 255, 0.1); border-radius: 5px;">
                <li class="breadcrumb-item"><a href="index.html" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active text-light">Cours</li>
            </ol>

            <!-- Button to Open Modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#courseModal" style="border-radius: 20px; padding: 10px 20px;">
                Ajouter un Cours
            </button>

            <div class="container-fluid">
                <h1 class="mt-4 text-light">Cours ajouté(s)</h1>

                <div class="table-responsive">
                    <table class="table table-hover table-dark" style="border-radius: 10px; overflow: hidden;">
                        <thead style="background-color: rgba(0, 123, 255, 0.6); color: white;">
                            <tr>
                                <th>Titre</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="courseTableBody">
                            <!-- Example Data -->
                            <tr>
                                <td>Apprendre Python</td>
                                <td><span class="badge bg-success">Publié</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-light">Modifier</button>
                                    <button class="btn btn-sm btn-danger">Supprimer</button>
                                </td>
                            </tr>
                            <!-- Add other rows dynamically with JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="height: 6vh"></div>
        </div>
    </main>
</div>

<!-- Custom CSS -->
<style>
    body {
        background-color: #1C1C1C;
    }

    .breadcrumb a {
        text-decoration: none;
    }

    .btn-primary {
        background-color: #007BFF;
        border: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .table th, .table td {
        padding: 15px;
    }

    .badge {
        font-size: 14px;
        padding: 6px 12px;
        border-radius: 12px;
    }

    .badge.bg-success {
        background-color: #28a745;
    }

    .table thead {
        font-size: 16px;
    }

    .btn-sm {
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
    }
</style>

    </div>
    <!-- Modal -->
<div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="courseModalLabel">Ajouter un Cours</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body bg-dark text-light">
                <form id="courseForm" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Titre :</label>
                        <input type="text" class="form-control" name="title" id="title" required placeholder="Entrez le titre du cours" style="border-radius: 5px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" name="description" id="description" required placeholder="Entrez la description du cours" rows="3" style="border-radius: 5px;"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="videoFile" class="form-label">Fichier Vidéo :</label>
                        <input type="file" name='file1' class="form-control" id="videoFile" accept="video/*" required style="border-radius: 5px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="imageFile" class="form-label">Fichier Image :</label>
                        <input type="file" class="form-control" id="imageFile" accept="image/*" required style="border-radius: 5px;">
                    </div>
                    <div class="form-group mb-3">
                        <label for="instructorId" class="form-label">Instructeur :</label>
                        <select class="form-control" id="instructorId" required style="border-radius: 5px;">
                            <option value="" disabled selected>Sélectionnez un Instructeur</option>
                            <!-- Populate options dynamically -->
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoryId" class="form-label">Catégorie :</label>
                        <select class="form-control" id="categoryId" required style="border-radius: 5px;">
                            <option value="" disabled selected>Sélectionnez une Catégorie</option>
                            <!-- Populate options dynamically -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3" style="border-radius: 5px;">Enregistrer le Cours</button>
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

    /* File inputs styling */
    input[type="file"] {
        background-color: #2b2b2b;
        color: #ffffff;
        padding: 8px;
    }

    /* Label styling */
    .form-label {
        color: #adb5bd;
    }

    /* Custom scrollbar for the modal body (optional) */
    .modal-body::-webkit-scrollbar {
        width: 8px;
    }

    .modal-body::-webkit-scrollbar-thumb {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 10px;
    }
</style>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
    <script>
        function handleFileUpload(fileInputId, folder) {
            var fileInput = document.getElementById(fileInputId);
            var file = fileInput.files[0];
            var filePath;

            if (file) {
                var fileName = file.name;
                console.log(fileName);
                var formData = new FormData();
                formData.append(fileInputId, file);

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

        document.addEventListener('DOMContentLoaded', function() {
            // Fetch and populate instructors and categories
            fetch('../Api/get_instructors_categories.php') // Replace with your combined API endpoint
                .then(response => response.json())
                .then(data => {
                    // Populate instructors
                    const instructorSelect = document.getElementById('instructorId');
                    data.instructors.forEach(instructor => {
                        const option = document.createElement('option');
                        option.value = instructor.user_id; // Assuming 'user_id' is the instructor ID
                        option.textContent = instructor.username; // Assuming 'username' is the instructor's name
                        instructorSelect.appendChild(option);
                    });

                    // Populate categories
                    const categorySelect = document.getElementById('categoryId');
                    data.categories.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.category_id; // Assuming 'category_id' is the category ID
                        option.textContent = category.name; // Assuming 'name' is the category name
                        categorySelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        });
        $(document).ready(function() {

            $('#courseForm').on('submit', function(e) {
                e.preventDefault();
                var imagePath = handleFileUpload('imageFile', 'images');
                // var title = $('#title').val();
                // console.log(title);
                //var description = $('#description').val();
                var instructor_id = $('#instructorId').val();
                var category_id = $('#categoryId').val();

                // Add a new row to the table for this upload

                const formData = new FormData(document.getElementById('courseForm'));
                const title = formData.get('title');
                console.log(title);
                const description = formData.get('description');
                console.log(description);

                const newRow = document.createElement('tr');
                newRow.innerHTML = `<td>${title}</td><td>Uploading...</td><td></td>`;
                document.querySelector('#courseTableBody').appendChild(newRow);

                $('#yCourseModal').modal('hide');
                // Show loading indicator
                Swal.fire({
                    title: 'Uploading...',
                    text: 'Please wait while your video uploads.',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });


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
                            saveVideoDetails(data.videoUrl, imagePath, title, description, category_id, instructor_id, newRow);
                        } else {
                            newRow.cells[1].innerText = 'Error';
                            newRow.cells[2].innerHTML = '<button class="btn btn-warning btn-sm" onclick="retryUpload(this)">Retry</button>';
                        }

                        Swal.fire({
                            title: data.success ? 'Success!' : 'Error!',
                            text: data.message,
                            icon: data.success ? 'success' : 'error',
                            confirmButtonText: 'OK'
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.close();
                        newRow.cells[1].innerText = 'Error';
                        newRow.cells[2].innerHTML = '<button class="btn btn-warning btn-sm" onclick="retryUpload(this)">Retry</button>';
                        Swal.fire({
                            title: 'Error!',
                            text: 'Upload failed.',
                            icon: 'error',
                            confirmButtonText: 'Try Again'
                        });
                    });
            });
        });

        function saveVideoDetails(videoUrl, imageUrl, title, description, category_id, instructor_id, newRow) {
            const data = {
                videoUrl,
                imageUrl,
                title,
                description,
                category_id,
                instructor_id
            };
            console.log(data);

            fetch('../Api/add_Course.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        newRow.cells[1].innerText = 'Uploaded';
                        newRow.cells[2].innerHTML = '<button class="btn btn-danger btn-sm" onclick="removeRow(this)">Remove</button>';
                    } else {
                        newRow.cells[1].innerText = 'Error';
                        newRow.cells[2].innerHTML = '<button class="btn btn-warning btn-sm" onclick="retryUpload(this)">Retry</button>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    newRow.cells[1].innerText = 'Error';
                    newRow.cells[2].innerHTML = '<button class="btn btn-warning btn-sm" onclick="retryUpload(this)">Retry</button>';
                });
        }
    </script>
</body>

</html>