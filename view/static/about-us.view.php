<?php 
    use App\Core\View;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php View::render('component/headStatic'); ?>
        <style>
        /* Hover effect for counter cards */
        .counter-card:hover {
            background-color: #b80c31;
            color: white;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        </style>
    </head>
    <body>
        <!-- Start Navbar Area --> 
        <div class="navbar-area nav-bg-1">
            <div class="mobile-responsive-nav">
                <div class="container">
                    <div class="mobile-responsive-menu">
                        <div class="logo">
                            <a href="index.html">
                                <img src="assets/images/logo.jpg" class="main-logo" alt="logo" style="width: 50px;">
                                <img src="assets/images/white-logo.jpg" class="white-logo" alt="logo" style="width: 50px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="desktop-nav">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/logo.jpg" class="main-logo" alt="logo" style="width: 80px;">
                            <img src="assets/images/white-logo.jpg" class="white-logo" alt="logo" style="width: 80px;">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="<?= APP_URL ?>/" class="nav-link">
                                        Accueil            
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= APP_URL ?>/about-us" class="nav-link active">A propos</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Services            
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index-2.html" class="nav-link">Accès aux Soins de Santé</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-3.html" class="nav-link">Agro-Pastoral & Pisciculture</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="404.html" class="nav-link">Orphelinat et Education</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="404.html" class="nav-link">Consultation à distance</a>
                                        </li>
                                    </ul>
                                    
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Espace Membre
                                    </a>
                                
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link dropdown-toggle">
                                                Utilisateurs
                                            </a>
                                
                                            <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a href="<?= APP_URL ?>/login" class="nav-link">Se Connecter</a>
                                                </li>
                                
                                                <li class="nav-item">
                                                    <a href="<?= APP_URL ?>/register" class="nav-link">S'inscrire</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="<?= APP_URL ?>/formation" class="nav-link">Formations</a>
                                </li>
                            </ul>

                            <div class="others-options">
                                <ul>
                                    <li>
                                        <div class="call-now">
                                            <i class="flaticon-phone-call-1"></i>
                                            <p>Appelez-Nous</p>
                                            <a href="tel:021-6523-3652">( +243 808 877 110)</a>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="appoinment.html" class="default-btn btn">Ecrivez-nous</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options justify-content-center d-flex align-items-center">
                                <div class="others-options">
                                    <ul>
                                        <li>
                                            <div class="call-now">
                                                <i class="flaticon-phone-call-1"></i>
                                                <p>Appelez maintenant</p>
                                                <a href="tel:( +243 808 877 110)
                                                ">( +243 808 877 110)
                                                </a>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="appoinment.html" class="default-btn btn">Prendre un Rendez-Vous</a>
                                        </li>
                                    </ul>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar Area -->

        <!--Start Page Banner-->
        <div class="page-banner bg-1 ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="page-banner-content text-center">
                            <h1>A propos de nous</h1>
                            <ul class="list-unstyled d-flex gap-2">
                                <li><a href="<?= APP_URL ?>/">Accueil</a></li>
                                <li><a href="<?= APP_URL ?>/">A propos</a></li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Page Header-->

        <!--Start About area-->
        <div class="about-area">
            <div class="container">
                <div class="border-top ptb-100">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img mr-20" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                                <img src="assets/images/apropos.jpg" alt="Image">
                                <div class="experience">
                                    <p>30 ANS D'EXPÉRIENCE AU SERVICE DE LA COMMUNAUTÉ</p>
                                    <div class="icon">
                                        <i class="flaticon-expert"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content pl-20" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                                <div class="about-title">
                                    <span>À propos</span>
                                    <h2>Un engagement global pour le bien-être et le développement durable</h2>
                                    <p style="text-align: justify;">Depuis plus de trois décennies, nous œuvrons pour améliorer la qualité de vie de nos communautés à travers un accès facilité aux soins de santé, des initiatives durables en agro-pastoral et pisciculture, et le soutien à l'éducation des orphelins. Nos espaces récréatifs offrent également des lieux de détente et de connexion avec la nature, favorisant un environnement de bien-être global.</p>
                                </div>
                                <div class="list">
                                    <ul>
                                        <li>
                                            <i class="ri-checkbox-circle-fill"></i>
                                            <p>Accès aux soins de santé pour tous</p>
                                        </li>
                                        <li>
                                            <i class="ri-checkbox-circle-fill"></i>
                                            <p>Pratiques durables en agro-pastoral et pisciculture</p>
                                        </li>
                                        <li>
                                            <i class="ri-checkbox-circle-fill"></i>
                                            <p>Éducation et avenir pour les enfants en situation difficile</p>
                                        </li>
                                        <li>
                                            <i class="ri-checkbox-circle-fill"></i>
                                            <p>Espaces récréatifs pour le bien-être et la relaxation</p>
                                        </li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--End About area-->

        <!--Start Counter Area-->
        <div class="counter-area">
            <div class="container">
                <div class="counter-bg pt-100 pb-70">
                    <div class="row justify-content-center">
                        <!-- Card 1 -->
                        <div class="col-lg-3 col-sm-6 col-md-4">
                            <div class="counter-card" style="transition: background-color 0.3s ease;">
                                <h1>
                                    <span class="odometer" data-count="1682">00</span>
                                    <span class="target">+</span>
                                </h1>
                                <p>Clients Satisfaits</p>
                            </div>
                        </div>
                        
                        <!-- Card 2 -->
                        <div class="col-lg-3 col-sm-6 col-md-4">
                            <div class="counter-card" style="transition: background-color 0.3s ease;">
                                <h1>
                                    <span class="odometer" data-count="1879">00</span>
                                    <span class="target">+</span>
                                </h1>
                                <p>Projets Réalisés</p>
                            </div>
                        </div>
                        
                        <!-- Card 3 -->
                        <div class="col-lg-3 col-sm-6 col-md-4">
                            <div class="counter-card" style="transition: background-color 0.3s ease;">
                                <h1>
                                    <span class="odometer" data-count="1586">00</span>
                                    <span class="target">+</span>
                                </h1>
                                <p>Partenaires Mondiaux</p>
                            </div>
                        </div>
                        
                        <!-- Card 4 -->
                        <div class="col-lg-3 col-sm-6 col-md-4">
                            <div class="counter-card" style="transition: background-color 0.3s ease;">
                                <h1>
                                    <span class="odometer" data-count="1268">00</span>
                                    <span class="target">+</span>
                                </h1>
                                <p>Avis Positifs</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        <!--End Counter Area-->

        <!--Start Work Area-->
        <div class="work-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="work-left-content">
                            <div class="work-title">
                                <span>Comment ça marche</span>
                                <h2>Nous pouvons résoudre chaque problème très facilement et parfaitement</h2>
                                <p style="text-align: justify;">Il existe de nombreuses variantes de passages de Lorem Ipsum disponibles, mais la majorité d'entre elles n'ont pas d'humour injecté, ou des mots aléatoires qui ne semblent même pas légèrement crédibles.</p>
                            </div>
                            
                            <div class="special-follow">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                        <a href="doctors.html"><div class="follow-card">
                                            <img src="assets/images/w4.png" alt="Image">
                                            <div class="follow-content">
                                                <h3>Suivi Spécial</h3>
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                                        <a href="doctors.html"><div class="follow-card">
                                            <img src="assets/images/w4.png" alt="Image">
                                            <div class="follow-content">
                                                <h3>Suivi Spécial</h3>
                                            </div>
                                        </div></a>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <a href="doctors.html"><div class="follow-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                                            <img src="assets/images/w4.png" alt="Image">
                                            <div class="follow-content">
                                                <h3>Suivi Spécial</h3>
                                            </div>
                                        </div></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="follow-image-content" data-aos="fade-left" data-aos-duration="1500" data-aos-delay="300">
                            <img src="assets/images/w4.png" alt="Image" style="height: 450px;">
                            <div class="icon">
                                <a class="popup-youtube play-btn" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><i class="flaticon-play-button-arrowhead"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--End Work Area-->

        <!--Start Dooctors Area-->
        <div class="doctors-area">
            <div class="container-fluid">
                <div class="doctor-content pt-100 pb-70 bg-color1">
                    <div class="section-title">
                        <span class="top-title">Nos Agents</span>
                        <h2>Nos Experts</h2>
                    </div> 
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <div class="doctor-img">
                                    <img src="assets/images/doctor/doctor-1.jpg" alt="Image">
                                </div>
                                <div class="doctor-card-content">
                                    <h3>Dr. Weshi</h3>
                                    <p>Neurologue</p>
                                    <div class="social-content">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                                <div class="doctor-img">
                                    <img src="assets/images/doctor/doctor-2.jpg" alt="Image">
                                </div>
                                <div class="doctor-card-content">
                                    <h3>Dr. Weshi</h3>
                                    <p>Médecine</p>
                                    <div class="social-content">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                                <div class="doctor-img">
                                    <img src="assets/images/doctor/doctor-3.jpg" alt="Image">
                                </div>
                                <div class="doctor-card-content">
                                    <h3>Dr. Weshi</h3>
                                    <p>Cardiologue</p>
                                    <div class="social-content">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card style4" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                                <div class="doctor-img">
                                    <img src="assets/images/doctor/doctor-4.jpg" alt="Image">
                                </div>
                                <div class="doctor-card-content">
                                    <h3>Dr. Weshi</h3>
                                    <p>Allergies</p>
                                    <div class="social-content">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--End Doctors Area-->

        <!--Start Testimonial Area-->
        <div class="testimonial-area ptb-100">
            <div class="container">
                <div class="testimonial-slider owl-carousel owl-theme">
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-2.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Rémédiable</p>
                        </div>
                    </div>
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-3.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Médication</p>
                        </div>
                    </div>
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-4.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Problèmes de santé</p>
                        </div>
                    </div>
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-2.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Rémédiable</p>
                        </div>
                    </div>
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-3.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Médication</p>
                        </div>
                    </div>
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-4.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Problèmes de santé</p>
                        </div>
                    </div>
                    <div class="single-testimonial-card style3">
                        <div class="top-content">
                            <i class="flaticon-quotes"></i>
                            <p style="text-align: justify;">« Il est bien établi qu'un lecteur sera attiré par la mise en page. Le point d'utiliser Lorem Ipsum est qu'il est distrait par le contenu lisible d'une page lorsque 'lorem ipsum' révélera de nombreuses informations en herbe. »</p>
                        </div>
                        <div class="clients-profile">
                            <img src="assets/images/review/review-2.png" alt="Image">
                            <h4>Dave</h4>
                            <p>Rémédiable</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--End Testimonial Area-->

        <!--Start Blog Area-->
        <div class="blog-area">
            <div class="container-fluid">
                <div class="blog-bg2 bg-color1 pt-100 pb-70">
                    <div class="section-title">
                        <span class="top-title">Notre Blog</span>
                        <h2>Nos Derniers Conseils & Astuces Les Plus Populaires</h2>
                    </div>
            
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <div class="blog-img">
                                    <img src="assets/images/blog/blog-1.jpg" alt="Image">
                                </div>
                                <div class="blog-content">
                                    <div class="date-admin">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <i class="ri-user-voice-line"></i>
                                                <p>Par <a href="#">Admin</a></p>
                                            </li>
                                            <li>
                                                <i class="ri-calendar-event-line"></i>
                                                <p>07 - Février - 2022</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3>Comment Améliorer Rapidement Avec L'Aide De La Formation En Ligne</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                                <div class="blog-img">
                                    <img src="assets/images/blog/blog-2.jpg" alt="Image">
                                </div>
                                <div class="blog-content">
                                    <div class="date-admin">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <i class="ri-user-voice-line"></i>
                                               <p>Par <a href="#">Admin</a></p>
                                            </li>
                                            <li>
                                                <i class="ri-calendar-event-line"></i>
                                                <p>07 - Février - 2022</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3>La Stratégie De Cas D'Étude Des Vidéos Les Plus Rentables</h3>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-blog-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                                <div class="blog-img">
                                    <img src="assets/images/blog/blog-3.jpg" alt="Image">
                                </div>
                                <div class="blog-content">
                                    <div class="date-admin">
                                        <ul class="d-flex justify-content-between">
                                            <li>
                                                <i class="ri-user-voice-line"></i>
                                                <p>Par <a href="#">Admin</a></p>
                                            </li>
                                            <li>
                                                <i class="ri-calendar-event-line"></i>
                                                <p>07 - Février - 2022</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3>Audit Financier Et Planification Du Traitement Ont Commencé</h3>
                                </div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
        </div>
        
        <!--End Blog Area-->

        <!-- Start Contact Doctor Area-->
        <div class="contact-doctor-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-doctor-contain" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="contact-title">
                                <span>Contactez-nous</span>
                                <h2>Nous Sommes Là Pour Vous 24h/24 Contactez-Nous Pour Tous Vos Besoins</h2>
                                <p>Notre équipe est disponible pour répondre à toutes vos questions et vous fournir l'aide dont vous avez besoin, à tout moment. Nous nous engageons à offrir un service rapide et efficace, avec une attention particulière à vos préoccupations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-doctor-form" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Nom*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Téléphone*">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Sujet*">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Message*"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="default-btn active">
                                            Envoyer le message
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- End Contact Doctor Area-->

        <!--Start Footer Area-->
        <div class="footer-area">
            <div class="container">
                <div class="footer pt-100 pb-70">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="logo-area" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <a href="index.html"><img src="assets/images/logo.jpg" alt="Image" style="width: 70px;"></a>
                                <p>Il existe de nombreuses variantes de passages, mais la plupart n'ont pas d'humour, ou des mots aléatoires qui ne semblent même pas légèrement crédibles.</p>
                                <form class="newsletter-form" data-toggle="validator">
                                    <input type="email" class="form-control" placeholder="Votre Email" name="EMAIL" required autocomplete="off">
                                    <button class="default-btn active" type="submit">
                                        S'abonner
                                    </button>
                                    <div id="validator-newsletter" class="form-result"></div>
                                </form>
                            </div>
                        </div>
        
                        <div class="col-lg-2 col-sm-6">
                            <div class="quick-link" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                                <h3>Liens Rapides</h3>
                                <ul>
                                    <li>
                                        <a href="appoinment.html">
                                            <i class="ri-add-fill"></i>
                                            <p>Rendez-vous</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="about-us.html">
                                            <i class="ri-add-fill"></i>
                                            <p>À propos</p>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="terms-conditions.html">
                                            <i class="ri-add-fill"></i>
                                            <p>Conditions Générales</p>
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
        
                        <div class="col-lg-3 col-sm-6">
                            <div class="helpful-link" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                                <h3>Liens Utiles</h3>
                                <ul>
                                    <li>
                                       <span>Adresse :</span>187 Avenue Nguma Zone de santé de Mbinza Météo C/ Ngaliema - Kinshasa RDC
                                    </li>
                                    <li>
                                        <span>Téléphone :</span><a href="tel:+23216540987">(+243 808 877 110)</a>
                                    </li>
                                    <li>
                                        <span>Email :</span><a href="mailto:fondationcharis@gmail.com">fondationcharis@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-sm-6">
                            <div class="instragram" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                                <h3>Instagram</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="instragram-img">
                                            <a href="https://instagram.com/?lang=en" target="_blank">
                                                <img src="assets/images/footer/ins-1.jpg" alt="Image">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="instragram-img">
                                            <a href="https://instagram.com/?lang=en" target="_blank">
                                                <img src="assets/images/footer/ins-2.jpg" alt="Image">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="instragram-img">
                                            <a href="https://instagram.com/?lang=en" target="_blank">
                                                <img src="assets/images/footer/ins-3.jpg" alt="Image">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="instragram-img">
                                            <a href="https://instagram.com/?lang=en" target="_blank">
                                                <img src="assets/images/footer/ins-4.jpg" alt="Image">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="instragram-img">
                                            <a href="https://instagram.com/?lang=en" target="_blank">
                                                <img src="assets/images/footer/ins-5.jpg" alt="Image">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="instragram-img">
                                            <a href="https://instagram.com/?lang=en" target="_blank">
                                                <img src="assets/images/footer/ins-6.jpg" alt="Image">
                                                <div class="icon">
                                                    <i class="ri-instagram-line"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <div class="row">
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="social-content">
                                <ul>
                                    <li><span>Suivez-nous sur</span></li>
                                    <li>
                                        <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                                    </li>
                                    <li>
                                        <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--End Footer Area-->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class="ri-arrow-up-s-line"></i>
            <i class="ri-arrow-up-s-line"></i>
        </div>
        <!-- End Go Top Area -->
        
        <!-- Jquery js -->
        <?php View::render('component/jsStatic'); ?>
    </body>
</html>