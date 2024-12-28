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
        <!-- End Navbar Area -->

        <!--Start Page Banner-->
        <!-- <div class="page-banner bg-1 ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="page-banner-content">
                            <h1>404 Error</h1>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>404 Error</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="page-banner-img">
                            <img src="assets/images/page-header/page-header-img-2.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--End Page Banner-->

        <!--Start error area-->
        <div class="error-area ptb-100">
            <div class="container">
                <div class="top-content">
                    <ul>
                        <li>4</li>
                        <li>0</li>
                        <li>4</li>
                    </ul>
                </div>
                <h2>Error 404 : Page Not Found</h2>
                <p>La page que vous recherchez est temporairement indisponible.</p>
                <a href="<?= APP_URL?>" class="btn default-btn">Retour à la page d'accueil</a>
            </div>
        </div>
        <!--End error area-->

        

        <!-- Start Go Top Area -->
        <div class="go-top">
            <i class="ri-arrow-up-s-line"></i>
            <i class="ri-arrow-up-s-line"></i>
        </div>
        <!-- End Go Top Area -->
        
        <?php View::render('component/jsStatic'); ?>
    </body>
</html>