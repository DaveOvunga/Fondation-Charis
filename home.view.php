<?php 
    use App\Core\View;
?>
<!DOCTYPE html>
<html>
    <head>
        <?php View::render('component/headStatic'); ?>
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
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo APP_URL?>/about" class="nav-link">A propos</a>
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
                                            <a href="../E-learning/index.html" class="nav-link">Formation</a>
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
                                                    <a href="login.html" class="nav-link">Se Connecter</a>
                                                </li>
                                
                                                <li class="nav-item">
                                                    <a href="register.html" class="nav-link">S'inscrire</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                 

                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link dropdown-toggle">
                                        Blog 
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="blog.html" class="nav-link">Blog</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="blog-details.html" class="nav-link">Blog Details</a>
                                        </li>
                                    </ul>
                                </li> -->

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

        <!--Start Banner Area-->
        <div class="banner-area bg-1">     
            <div class="container-fluid">
                <div class="banner-slider owl-carousel owl-theme">
                    <div class="row align-items-center">
                        <!-- <div class="col-lg-6"> -->
                            <div class="banner-content">
                                <div class="banner-content">
                                    <h1 data-aos="fade-up" data-aos-duration="1300" data-aos-delay="200" style="text-align: center; color: white;">Un Engagement Global pour le Bien-Être Communautaire</h1>
                                    <p style="text-align: center;">Engagés pour un avenir meilleur, nous offrons des solutions d'accès aux soins de santé, soutenons l'agro-pastoral et la pisciculture, prenons soin des orphelins à travers l'éducation, et créons des espaces récréatifs pour le bien-être de tous.</p>
                                </div>
                                <div class="select-content1" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="600">
                                    
                                </div>
    
                                <div class="btn-area" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="800" style="text-align: center;">
                                    <ul>
                                        <!-- <li>
                                            <a href="appoinment.html" class="default-btn btn active mr-20">Prendre un rendez-vous</a>
                                        </li> -->
                                        <li>
                                            <a href="about-us.html" class="default-btn btn active" style="color: white;">En savoir plus sur nous</a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="feature" data-aos="fade-up" data-aos-duration="1300" data-aos-delay="900">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row align-items-center">
                            <div class="banner-content">
                                <div class="banner-content">
                                    <h1 style="text-align: center; color: white;">Pour un Futur Harmonieux et Durable</h1>
                                    <p style="text-align: center; ">Nous croyons en un avenir où chaque individu a la possibilité de grandir dans un environnement sain, éducatif et stimulant, favorisant l'épanouissement personnel et communautaire.</p>
                                </div> 
                                <div class="select-content1">
                                    
                                </div>
    
                                <div class="btn-area" style="text-align: center;">
                                    <ul>
                                        <!-- <li>
                                            <a href="appoinment.html" class="default-btn btn active mr-20">Prendre un rendez-vous</a>
                                        </li> -->
                                        <li>
                                            <a href="about-us.html" class="default-btn btn active" style="color: white;">En savoir plus sur nous</a>
                                        </li>
                                    </ul>
                                </div>
    
                                <div class="feature">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="row">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--End Banner Area-->

        <!--Start Features Area-->
        <div class="featured-area pt-100 pb-70" style="background-color: #0c4bb8;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="feature-left-content">
                            <div class="feature-title">
                                <span style="color: white;">Nos engagements</span>
                                <h2 style="color: white;">Vers un avenir plus sain et durable pour tous</h2>
                                <p style="background-color: white; padding: 10%; border-radius: 10px; text-align: justify;">Nous croyons en une approche qui unit l'accès aux soins, le développement durable, et l'éducation pour améliorer la qualité de vie de nos communautés.</p>
                                <!-- <a href="about-us.html" class="default-btn btn">En savoir plus sur nous</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row justify-content-center style-feature-box">
                            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <div class="single-features-card">
                                    <div class="icon">
                                        <!-- <i class="flaticon-heart"></i> -->
                                        <img src="assets/images/index4.jpg" alt="" style="width: 100%; height: 150px; object-fit: cover; margin-bottom: 5%;">

                                    </div>
                                    <h3>Accès aux soins de santé</h3>
                                    <p style="text-align: justify;">Garantir des soins de santé accessibles et de qualité pour renforcer le bien-être de chaque individu.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400" >
                                <div class="single-features-card">
                                    <div class="icon">
                                        <!-- <i class="flaticon-plant"></i> -->
                                        <img src="assets/images/pastorale2.jpg" alt="" style="width: 100%; height: 150px; object-fit: cover;margin-bottom: 5%;">
                                    </div>
                                    <h3>Agro-pastoral et pisciculture</h3>
                                    <p style="text-align: justify;">Soutenir des pratiques agricoles et piscicoles durables pour promouvoir la sécurité alimentaire et économique.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                                <div class="single-features-card">
                                    <div class="icon">
                                        <!-- <i class="flaticon-education"></i> -->
                                        <img src="assets/images/child.webp" alt="" style="width: 100%; margin-bottom: 5%;">
                                    </div>
                                    <h3>Orphelinat et éducation</h3>
                                    <p style="text-align: justify;">Offrir aux enfants un environnement sûr et éducatif pour les aider à construire un avenir prometteur.</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                                <div class="single-features-card">
                                    <div class="icon">
                                        <!-- <i class="flaticon-park"></i> -->
                                        <img src="assets/images/img7.jpg" alt="" style="width: 100%; margin-bottom: 5%;">
                                    </div>
                                    <h3>Espaces récréatifs</h3>
                                    <p style="text-align: justify;">Créer des espaces où les individus peuvent se détendre, s'épanouir et se reconnecter avec la nature.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Features Area-->

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
                                    <ul style="text-align: justify;">
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
                                <a href="about-us.html" class="default-btn btn">Explorer Plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End About area-->

        <!--Start Solution Area-->
        <div class="solution-area">
            <div class="container-fluid">
                <div class="solution-bg bg-25ab44 pt-100 pb-70">
                    <div class="section-title white-title">
                        <span class="top-title">Nos Initiatives</span>
                        <h2>Des Solutions Globales pour un Impact Durable</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-solution-card" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="300">
                                <div class="solution-img">
                                    <img src="assets/images/index45.jpg" alt="Image" style="width: 100%; height: 320px; object-fit: cover;">
                                    <div class="icon">
                                        <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=6WQCJx_vEX4"><i class="flaticon-play-button-arrowhead"></i></a>
                                    </div>
                                </div>
                                <div class="solution-card-content">
                                    <h3>Accès Amélioré aux Soins de Santé</h3>
                                    <p style="text-align: justify;">Nous travaillons pour améliorer l'accès aux soins de santé, garantissant des services de qualité pour tous, en particulier dans les communautés vulnérables. <br> <br></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-solution-card" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="300">
                                <div class="solution-img">
                                    <img src="assets/images/education.jpg" alt="Image" style="width: 100%; height: 320px; object-fit: cover;">
                                    <div class="icon">
                                        <a class="popup-youtube play-btn" href="https://www.youtube.com/watch?v=6WQCJx_vEX4"><i class="flaticon-play-button-arrowhead"></i></a>
                                    </div>
                                </div>
                                <div class="solution-card-content">
                                    <h3>Développement Durable et Éducation</h3>
                                    <p style="text-align: justify;">Nous soutenons des initiatives en agro-pastoral et pisciculture, tout en fournissant des opportunités éducatives et des espaces récréatifs pour favoriser un développement durable.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Solution Area-->

        <!--Start Services Area-->
        <div class="services-area pt-100 pb-70" style="background: linear-gradient(135deg, #ffffff 0%, #e0e0e0 100%);">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="services-content">
                            <span>Nos Services</span>
                            <h2>Nos Solutions Complètes pour un Impact Positif</h2>
                            <p style="text-align: justify;">Nous offrons une gamme de services diversifiés pour répondre aux besoins de la communauté. Nos solutions incluent l'accès aux soins de santé, le développement agro-pastoral et piscicole, l'éducation pour les enfants défavorisés et des espaces récréatifs enrichissants.</p>
                            <a href="service.html" class="default-btn btn">Voir Tous Nos Services</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="services-slider owl-carousel owl-theme">
                            <div class="single-services-card">
                                <i class="flaticon-healthcare"></i>
                                <h3>Accès aux Soins de Santé</h3>
                                <p style="text-align: justify;">Nous facilitons l'accès à des soins médicaux essentiels pour améliorer la qualité de vie des personnes dans les zones mal desservies.</p>
                                <!-- <a href="index-2.html" class="default-btn btn">En Savoir Plus</a> -->
                            </div>
                            <div class="single-services-card">
                                <i class="flaticon-healthcare"></i>
                                <h3>Développement Agro-Pastoral et Piscicole</h3>
                                <p style="text-align: justify;">Nous soutenons des projets de développement durable pour l'agriculture et la pisciculture, contribuant à l'autosuffisance alimentaire et à l'amélioration des revenus.</p>
                                <!-- <a href="index-3.html" class="default-btn btn">En Savoir Plus</a> -->
                            </div>
                            <div class="single-services-card">
                                <i class="flaticon-healthcare"></i>
                                <h3>Éducation et Soutien aux Orphelins</h3>
                                <p style="text-align: justify;">Nous offrons des opportunités éducatives aux enfants défavorisés et soutenons les orphelinats pour leur offrir un avenir meilleur.</p>
                                <!-- <a href="404.html" class="default-btn btn">En Savoir Plus</a> -->
                            </div>
                            <div class="single-services-card">
                                <i class="flaticon-healthcare"></i>
                                <h3>Espaces Récréatifs</h3>
                                <p style="text-align: justify;">Nous créons des espaces récréatifs pour favoriser le bien-être et l'épanouissement des individus, en encourageant les loisirs et les activités communautaires.</p>
                                <!-- <a href="404.html" class="default-btn btn">En Savoir Plus</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <!--End Services Area-->

        <!--Start Choose Area-->
        <div class="choose-area">
            <div class="container-fluid">
                <div class="choose-us-bg bg-color1 ptb-100">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="choose-img pr-20" data-aos="fade-right" data-aos-easing="ease-in-sine" data-aos-duration="1300">
                                <img src="assets/images/Apropos.jpg" alt="Image">
                                <div class="address">
                                    <ul>
                                        <li>
                                            <i class="ri-phone-line"></i>
                                            <p style="text-align: justify;">Appelez maintenant</p>
                                            <a href="tel:+7854-9654-258">(+243 808 877 110)</a>
                                        </li>
                                        <!-- <li>
                                            <i class="ri-map-pin-line"></i>
                                            <p style="text-align: justify;">Adresse ici</p>
                                            <span>10/ New York City</span>
                                        </li> -->
                                        <li>
                                            <i class="ri-time-line"></i>
                                            <p style="text-align: justify;">Horaires d'ouverture</p>
                                            <span>Lundi-Dimanche : 8h00 - 20h00</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="choose-content pl-20" data-aos="fade-left" data-aos-easing="ease-in-sine" data-aos-duration="1300">
                                <div class="choose-title">
                                    <span>Pourquoi Nous Choisir</span>
                                    <h2>Notre Engagement pour un Impact Positif</h2>
                                    <p style="text-align: justify;">Nous sommes dédiés à améliorer la qualité de vie grâce à une approche holistique. Nos services englobent l'accès aux soins de santé, le développement agro-pastoral et piscicole, l'éducation des enfants défavorisés et la création d'espaces récréatifs. Découvrez pourquoi nous sommes votre meilleur choix pour un impact positif sur votre communauté.</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="list1">
                                            <ul>
                                                <li>
                                                    <i class="ri-checkbox-circle-line"></i>
                                                    <p style="text-align: justify;">Approche intégrée pour la santé et le bien-être</p>
                                                </li>
                                                <li>
                                                    <i class="ri-checkbox-circle-line"></i>
                                                    <p style="text-align: justify;">Développement durable pour l'agro-pastoral et la pisciculture</p>
                                                </li>
                                                <li>
                                                    <i class="ri-checkbox-circle-line"></i>
                                                    <p style="text-align: justify;">Soutien éducatif et opportunités pour les enfants</p>
                                                </li>
                                            
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="list2">
                                            <ul>
                                                <li>
                                                    <i class="ri-checkbox-circle-line"></i>
                                                    <p style="text-align: justify;">Engagement envers l'impact social positif</p>
                                                </li>
                                                <li>
                                                    <i class="ri-checkbox-circle-line"></i>
                                                    <p style="text-align: justify;">Espaces récréatifs pour enrichir la vie communautaire</p>
                                                </li>
                                                <li>
                                                    <i class="ri-checkbox-circle-line"></i>
                                                    <p style="text-align: justify;">Plus de 20 ans d'expérience collective</p>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <a href="contact-us.html" class="default-btn btn">Contactez-nous <span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    

        <!--Start Advice Area-->
        <div class="advice-area pt-for-responsive pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="advice-content pr-20" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="300">
                            <div class="advice-title">
                                <span>Conseils et Assistance</span>
                                <h2>Accédez à une Assistance Complète en Ligne pour Tous Vos Besoins</h2>
                                <p style="text-align: justify;">Nos services vont au-delà des consultations médicales en ligne. Nous offrons une assistance pour la santé, le développement agro-pastoral et piscicole, ainsi que des ressources pour l'éducation et des espaces récréatifs. Découvrez comment nous pouvons vous aider dès aujourd'hui.</p>
                            </div>
                            <div class="list">
                                <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                        <ul>
                                            <li>
                                                <i class="ri-phone-line"></i>
                                                <p>Assistance Gratuite par Téléphone</p>
                                                <a href="tel:+7854-9654-258">( +243 808 877 110)</a>
                                            </li>
                                            <li>
                                                <i class="ri-map-pin-user-line"></i>
                                                <p>Notre Adresse</p>
                                                <span>187 Avenue Nguma
                                                    Zone de santé de Mbinza Météo C/ Ngaliema - Kinshasa RDC</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <ul>
                                            <li>
                                                <i class="ri-time-line"></i>
                                                <p>Heures d'Ouverture</p>
                                                <span>Lundi-Dimanche : 8h00 - 20h00</span>
                                            </li>
                                            <li>
                                                <i class="ri-exchange-dollar-line"></i>
                                                <p>Remboursement Garantit</p>
                                                <span>Politique de Retour d'Argent Facile</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="contact-us.html" class="default-btn btn">Contactez-Nous</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="advice-img pl-20" data-aos="fade-left" data-aos-duration="1300" data-aos-delay="300">
                            <img src="assets/w4.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Advice Area-->

        <!--Start Dooctors Area-->
        <div class="doctors-area">
            <div class="container-fluid">
                <div class="doctor-content pt-100 pb-70 bg-color1">
                    <div class="section-title">
                        <span class="top-title">Nos Partenaires</span>
                        <h2>Nos Partenaires Dédiés à Votre Succès</h2>
                    </div> 
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                                <div class="doctor-img">
                                    <img src="assets/images/w4.png" alt="Dr. Lowell Deckow" style="width: 100%; height: 95%;">
                                </div>
                                <!-- <div class="doctor-card-content">
                                    <h3>Dr. Lowell Deckow</h3>
                                    <p>Neurologue</p>
                                    <div class="social-content">
                                        <ul>
                                            <li><a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                                            <li><a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                                            <li><a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a></li>
                                            <li><a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="400">
                                <div class="doctor-img">
                                    <img src="assets/images/w4.png" alt="Dr. Chesley Tromp" style="width: 100%; height: 95%;">
                                </div>
                                <!-- <div class="doctor-card-content">
                                    <h3>Dr. Chesley Tromp</h3>
                                    <p>Médecine Générale</p>
                                    <div class="social-content">
                                        <ul>
                                            <li><a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                                            <li><a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                                            <li><a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a></li>
                                            <li><a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="600">
                                <div class="doctor-img">
                                    <img src="assets/images/w4.png" alt="Dr. Amber Denesik" style="width: 100%; height: 95%;">
                                </div>
                                <!-- <div class="doctor-card-content">
                                    <h3>Dr. Amber Denesik</h3>
                                    <p>Cardiologue</p>
                                    <div class="social-content">
                                        <ul>
                                            <li><a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                                            <li><a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                                            <li><a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a></li>
                                            <li><a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="single-doctor-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="800">
                                <div class="doctor-img">
                                    <img src="assets/images/w4.png" alt="Dr. Arden Gerlach" style="width: 100%; height: 95%;">
                                </div>
                                <!-- <div class="doctor-card-content">
                                    <h3>Dr. Arden Gerlach</h3>
                                    <p>Allergologue</p>
                                    <div class="social-content">
                                        <ul>
                                            <li><a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a></li>
                                            <li><a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a></li>
                                            <li><a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a></li>
                                            <li><a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a></li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Dooctors Area-->

        <!-- Start Contact Doctor Area-->
        <div class="contact-doctor-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="contact-doctor-contain" data-aos="fade-right" data-aos-duration="1200" data-aos-delay="200">
                            <div class="contact-title">
                                <span>Contactez-nous</span>
                                <h2>Nous Sommes Là Pour Vous 24h/24 Contactez-Nous Pour Tous Vos Besoins</h2>
                                <p style="text-align: justify;">Notre équipe est disponible pour répondre à toutes vos questions et vous fournir l'aide dont vous avez besoin, à tout moment. Nous nous engageons à offrir un service rapide et efficace, avec une attention particulière à vos préoccupations.</p>
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
                            <!-- <div class="copy">
                                <p>© Genh est fièrement possédé par <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a></p>
                            </div> -->
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
        </div><!--End Footer Area-->

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class="ri-arrow-up-s-line"></i>
            <i class="ri-arrow-up-s-line"></i>
        </div>
        <!-- End Go Top Area -->

        <?php View::render('component/jsStatic'); ?>
    </body>
</html>