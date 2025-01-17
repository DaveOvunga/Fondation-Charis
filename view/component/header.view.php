<?php 
    use App\Core\Helper;
?>
<style>
    /* Header Styles */
.main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 2rem;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

/* Left Side */
.header-left {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.menu-toggle {
    background: transparent;
    border: none;
    color: white;
    padding: 0.5rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.menu-toggle:hover {
    background: rgba(255,255,255,0.1);
    transform: scale(1.1);
}

.menu-toggle i {
    font-size: 1.4rem;
}

.section-title {
    background: transparent;
    border: none;
    color: white;
    font-size: 1.2rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.section-title:hover {
    background: rgba(255,255,255,0.1);
}

/* Profile Button */
.profile-button {
    position: relative;
    padding: 0;
    border: 2px solid white;
    border-radius: 50%;
    overflow: hidden;
    transition: all 0.3s ease;
}

.profile-button:hover {
    transform: scale(1.1);
    box-shadow: 0 0 15px rgba(255,255,255,0.3);
}

.user-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-status {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
    background: #2ecc71;
    border: 2px solid white;
    border-radius: 50%;
}

/* Dropdown Menu */
.custom-dropdown {
    background: #1a1a1a;
    border: none;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    margin-top: 10px;
    min-width: 200px;
}

.user-info {
    padding: 1.5rem;
    /* background: linear-gradient(135deg, #0066cc 0%, #b80c31 100%); */
    border-radius: 12px 12px 0 0;
}

.username {
    color: white;
    font-weight: 500;
    text-align: center;
    font-size: 1.1rem;
}

.logout-form {
    padding: 1rem;
}

.logout-button {
    width: 100%;
    padding: 0.8rem;
    border: none;
    border-radius: 8px;
    /* background: linear-gradient(135deg, #0066cc 0%, #b80c31 100%); */
    color: black;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.logout-button:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
}

.logout-spinner {
    display: none;
    text-align: center;
    color: white;
    padding: 0.8rem;
    margin: 0;
}

/* Animation pour le spinner */
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.fa-spinner {
    animation: spin 1s linear infinite;
}

/* Responsive */
@media (max-width: 768px) {
    .main-header {
        padding: 0.8rem 1rem;
    }

    .section-title {
        font-size: 1rem;
    }

    .user-icon {
        width: 35px;
        height: 35px;
    }
}
/*design a droite*/
/* Styles pour la barre de recherche et le profil */
.input-group {
    min-width: 300px;
}

.input-group-text {
    border-color: #e0e0e0;
}

.form-control {
    border-color: #e0e0e0;
}

.form-control:focus {
    box-shadow: none;
    border-color: #e0e0e0;
}

.profile-button {
    background: none;
    border: none;
    padding: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.profile-circle {
    width: 40px;
    height: 40px;
    font-size: 1rem;
}

/* Hover effect */
.profile-button:hover {
    opacity: 0.8;
}

/* Animation pour le dropdown toggle */
.profile-button[aria-expanded="true"] .fa-chevron-down {
    transform: rotate(180deg);
}

.fa-chevron-down {
    transition: transform 0.3s ease;
}

/*Deconnexio*/
/* Custom styles to enhance the dropdown */
.dropdown-menu {
    width: 280px;
    margin-top: 0.5rem;
}


/* Animation pour le spinner */
@keyframes fadeInOut {
    0% { opacity: 0; }
    100% { opacity: 1; }
}

#logout_spinner.show {
    display: flex !important;
    animation: fadeInOut 0.3s ease;
}

/* Style pour le bouton de déconnexion */
.btn-danger {
    background: linear-gradient(135deg, #dc3545, #b80c31);
    border: none;
    transition: all 0.3s ease;
}

.btn-danger:hover {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
}


</style>
<header class="main-header">
    <div class="header-left">
    <button class="menu-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="color: gray; font-size: 25px;">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a href="#" class="navbar-brand p-0">
            <h1 class="text-primary mb-0">fondation <span style="color: #b80c31;">charis</span></h1>              
        </a>
    </div>
    
    <div class="dropdown-center dropstart">
        <!-- <button id="user-icon" class="profile-button" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="" alt="" class="user-icon">
            <div class="profile-status"></div>
        </button> -->
        <div class="d-flex align-items-center gap-4">
    <!-- Search Bar -->
    <!-- <div class="position-relative">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0">
                <i class="fas fa-search text-muted"></i>
            </span>
            <input type="search" class="form-control border-start-0 ps-0" 
                   placeholder="Rechercher..." 
                   aria-label="Search">
        </div>
    </div> -->

    <!-- Profile Button -->
    <div class="dropdown" style="border: 2px solid gray; border-radius: 20px; width: 98px;">
    <button id="user-icon" class="profile-button d-flex align-items-center" 
        type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="profile-circle bg-primary rounded-circle d-flex align-items-center justify-content-center">
            <span class="text-white fw-bold">
                <?php 
                    $name = $_SESSION['user'];
                    echo strtoupper(substr($name, 0, 2));
                ?>
            </span>
        </div>
        <i class="fas fa-chevron-down text-muted small ms-3"></i>
    </button>
    <div id="dropdown-menu" class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 overflow-hidden">
    <!-- User Profile Section -->
    <div class="user-profile p-4 bg-primary bg-gradient">
        <div class="d-flex align-items-center gap-3">
            <div class="profile-circle bg-white rounded-circle d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                <span class="text-primary fw-bold">
                    <?php 
                        $name = $_SESSION['user'];
                        echo strtoupper(substr($name, 0, 2));
                    ?>
                </span>
            </div>
            <div class="user-details">
                <h6 class="mb-0 text-white fw-bold"><?=$_SESSION['user']?></h6>
                <!-- <small class="text-white-50">Étudiant</small> -->
            </div>
        </div>
    </div>

    <!-- Menu Items -->
    <div class="p-3">
        <!-- Profile Link -->
        <div class="dropdown-item rounded-3 px-3 py-2 mb-1">
            <i class="fas fa-user me-2 text-muted"></i>
            Mon Profil
        </div>

        <!-- Settings Link -->
        <div class="dropdown-item rounded-3 px-3 py-2 mb-1">
            <i class="fas fa-cog me-2 text-muted"></i>
            Paramètres
        </div>

        <!-- Divider -->
        <hr class="dropdown-divider my-2">

        <!-- Logout Form -->
        <form id="logout-form" class="px-3">
            <button type="submit" name="logout" value="1" id="logout_btn" 
                    class="btn btn-danger w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                <i class="fas fa-sign-out-alt"></i>
                <span>Se déconnecter</span>
            </button>

            <!-- Spinner (hidden by default) -->
            <div id="logout_spinner" class="d-none text-center py-2">
                <div class="d-flex align-items-center justify-content-center gap-2 text-muted">
                    <div class="spinner-border spinner-border-sm" role="status"></div>
                    <span>Déconnexion...</span>
                </div>
            </div>
        </form>
    </div>
</div>
        
    </div>

        

       
    </div>
</header>

