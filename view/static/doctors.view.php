<?php 
    use App\Core\View;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php View::render('component/headStatic'); ?>
    </head>
    <body>
        <!-- Start Preloader Area -->
        <div class="preloader-area">
            <div class="spinner">
                <div class="inner">
                    <div class="disc"></div>
                    <div class="disc"></div>
                    <div class="disc"></div>
                </div>
            </div>
        </div>


        <!-- Start Navbar Area --> 
        <div class="navbar-area nav-bg-1">
            <div class="mobile-responsive-nav">
                <div class="container">
                    <div class="mobile-responsive-menu">
                        <div class="logo">
                            <a href="index.html">
                                <img src="assets/images/logo.jpg" class="main-logo" alt="logo" style="width: 50px;">
                                <img src="assets/images/white-logo.png" class="white-logo" alt="logo" style="width: 50px;">
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
                            <img src="assets/images/white-logo.png" class="white-logo" alt="logo" style="width: 80px;">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active">
                                        Accueil            
                                    </a>
                                    <!-- <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="index.html" class="nav-link active">Home One</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-2.html" class="nav-link">Home Two</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="index-3.html" class="nav-link">Home Three</a>
                                        </li>
                                    </ul>  -->
                                </li>
                                <li class="nav-item">
                                    <a href="about-us.html" class="nav-link">A propos</a>
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
                                            <a href="404.html" class="nav-link">Espace Récreatifs</a>
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
                                                    <a href="login.html" class="nav-link">Se Connecter</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a href="register.html" class="nav-link">S'inscrire</a>
                                                </li>

                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a href="../E-learning/index.html" class="nav-link">Formations</a>
                                </li>
                            </ul>

                            <div class="others-options">
                                <ul>
                                    <li>
                                        <div class="call-now">
                                            <i class="flaticon-phone-call-1"></i>
                                            <p>Appelez-Nous</p>
                                            <a href="tel:( +243 808 877 110)
                                            ">( +243 808 877 110)
                                            </a>
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
                    <div class="col-lg-6 col-md-6">
                        <div class="page-banner-content">
                            <h1>Rencontrez Nos Médecins</h1>
                            <ul>
                                <li><a href="index.html">Accueil</a></li>
                                <li>Docteurs</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="page-banner-img">
                            <img src="assets/images/img3.jpg" alt="Image" style="width: 65%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Header-->

        <!--Start Dooctors Area-->
        <div class="doctor-area pt-100 pb-70">
            <div class="container">
                <div class="section-title">
                    <span class="top-title">Nos Médecins</span>
                    <h2>Nos Meilleurs Médecins & Physiciens Populaires</h2>

                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-5.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Fredrick Auer</h3>
                                <p>Orthopedics</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-6.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Bonita Schaden</h3>
                                <p>Cardiologist</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-7.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Fletcher Waelchi</h3>
                                <p>Medicine</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-8.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Fredrick Auer</h3>
                                <p>Orthopedics</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-9.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Sarai Conn</h3>
                                <p>Design Expert</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-10.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Jasen Huels</h3>
                                <p>Dental Surgery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-11.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Maureen Klein</h3>
                                <p>Oral Surgery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1000">
                        <div class="single-doctor-card style">
                            <div class="doctor-img">
                                <img src="assets/images/doctor/doctor-12.jpg" alt="Image">
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
                            <div class="doctor-card-content">
                                <h3>Dr.Cedrick Spencer</h3>
                                <p>Hygienists</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Dooctors Area-->

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
        
        <?php View::render('component/jsStatic'); ?>
    </body>
</html>