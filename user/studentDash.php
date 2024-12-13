<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'medic');

// Check if the user is logged in and is a student
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
//     header("Location: login.php");
//     exit();
// }

// // Fetch recordings from the database
// $result = $conn->query("SELECT * FROM recordings");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Fondation Charis</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    
</head>

<style>
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

       

        /* .container {
            display: flex;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        } */

        /* .sidebar {
            width: 220px;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            border-radius: 8px;
            margin-right: 20px;
        } */
/* 
        .sidebar h3 {
            margin-top: 0;
            font-size: 20px;
            color: #333;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            text-decoration: none;
            color: #333;
            margin: 8px 0;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #f0f0f0;
        }

        .main-content {
            flex: 1;
        } */

        .video-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }

        .video-item {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .video-item:hover {
            transform: scale(1.03);
        }

        .video-thumbnail {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .video-title {
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
            color: #333;
        }

        .video-link {
            display: block;
            padding: 10px;
            text-align: center;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
            transition: background 0.3s;
        }

        .video-link:hover {
            background: #218838;
        }

        .video-player {
            margin: 20px 0;
            text-align: center;
        }

        iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .video-description {
            margin-top: 10px;
            font-size: 14px;
            color: #555;
            text-align: left;
        }
    </style>

<body class="sb-nav-fixed">

    <!-- <header>
        <h1>Bienvenue dans votre Espace Étudiant</h1>
    </header> -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark " style="background-color: #2C3E50;">
            <!-- Navbar Brand avec l'image à gauche -->
            <a class="navbar-brand ps-3 d-flex align-items-center" href="index.html">
                <img src="img/logo.jpg" alt="Sales Management Logo" class="img-fluid" style="max-width: 50px; border-radius: 20px;">
            </a>
        
            <!-- Sidebar Toggle -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
        
            <!-- Barre de recherche -->
            <!-- <form class="d-flex me-3" style="flex-grow: 1;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
                       style="border-radius: 25px; background-color: #333; color: white; border: 1px solid #444; width: 100%; max-width: 300px;">
                <button class="btn btn-outline-light" type="submit">Search</button>=
            </form> -->
        
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

    <div class="container">
        <!-- <div class="sidebar">
            <h3>Menu</h3>
            <a href="#">Mon Profil</a>
            <a href="#">Mes Cours</a>
            <a href="#">Historique des Vidéos</a>
            <a href="#">Déconnexion</a>
        </div> -->
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
                            <a class="nav-link" href="#" style="color: #BDC3C7;">Mon profil
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="#" style="color: #BDC3C7;">Mes cours
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="#" style="color: #BDC3C7;">Historique des vidéo
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                            </a>
                            <a class="nav-link" href="#" style="color: #BDC3C7;">Déconnexion
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-right"></i></div>
                            </a>
            
                        </div>
                    </div>
            
                    <div class="sb-sidenav-footer" style="background-color: #34495E; padding: 20px; text-align: center;">
                        <div class="small" style="color: #BDC3C7;">Logged in as:</div>
                        <span style="color: #fff;">User</span>
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

        <div class="main-content">
            <h2>Liste des Vidéos</h2>
            <div class="video-player">
                <h3>Lecteur Vidéo</h3>
                <iframe id="videoFrame" src="" allowfullscreen></iframe>
                <div class="video-description" id="videoDescription">Sélectionnez une vidéo pour commencer.</div>
            </div>
            <div class="video-gallery">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="video-item">
                        <img src="<?php echo $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>"
                            class="video-thumbnail">
                        <div class="video-title"><?php echo $row['title']; ?></div>
                        <a href="#"
                            onclick="changeVideo('<?php echo $row['url']; ?>', '<?php echo addslashes($row['description']); ?>'); return false;"
                            class="video-link">Regarder</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script>
        function changeVideo(url, description) {
            const videoFrame = document.getElementById('videoFrame');
            if (url.includes("youtube.com")) {
                const videoId = url.split("v=")[1].split("&")[0];
                videoFrame.src = `https://www.youtube.com/embed/${videoId}`;
            } else if (url.includes("vimeo.com")) {
                const videoId = url.split("/").pop();
                videoFrame.src = `https://player.vimeo.com/video/${videoId}`;
            } else {
                videoFrame.src = url;
            }
            document.getElementById('videoDescription').innerText = description || 'Aucune description disponible.';
        }
    </script>

</body>

</html>