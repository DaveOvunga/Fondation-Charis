<?php 
    use App\Core\Helper;
?>
<header class="d-flex justify-content-between align-items-start px-3 pt-1">
    <div class="pt-1">
        <button class="btn text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"><i class="fa-solid fa-bars" style="font-size:22px;"></i></button>
        <button class="btn text-white" id="sidebarToggle">Formations</button>
    </div>
    
    <div class="dropdown-center dropstart">
        <!-- User Icon -->
        <!-- <button id="user-icon" class="btn btn-light rounded-circle shadow-sm" type="button" aria-haspopup="true" aria-expanded="false">
            <img src="https://via.placeholder.com/40" alt="User Icon" class="user-icon">
        </button> -->
        <button id="user-icon" class="btn btn-outline-0 border-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://via.placeholder.com/40" alt="User" class="user-icon">
        </button>

        <!-- Dropdown Menu -->
        <div id="dropdown-menu" class="dropdown-menu dropdown-menu-start bg-dark py-sm-0 py-md-2">
            <div class="user-info bg-info px-md-5">
                <div class="username p-5 px-5"><?=$_SESSION['user']?></div>
            </div>
            <form id="logout-form" class="px-3 pt-2 d-flex justify-content-center">
                <!-- <input type="hidden" name="csrf_token" value=""> -->
                <button type="submit" name="logout"  value="1" id="logout_btn" class="dropdown-item text-white p-2 ps-3 btn bg-info">
                    <i class="fas fa-sign-out p-0 pt-2"></i> Se déconnecter
                </button>
                <p class="dropdown-item text-white p-2 ps-3 btn bg-info" id="logout_spinner" style="display:none;"><i class="fas fa-spinner fa-spin"></i> Deconnexion...</p>
            </form>

        </div>
    </div>
</header>