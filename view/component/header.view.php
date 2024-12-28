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
        <div id="dropdown-menu" class="dropdown-menu dropdown-menu-start p-0 bg-dark">
            <div class="user-info">
                <div class="username"><?=$_SESSION['user']?></div>
            </div>
            <a class="dropdown-item px-3 text-white mt-0 mt-md-4 mt-lg-2" href="#">
                <i class="fas fa-book p-0 pt-2"></i><span class="col-5"> Enligne</span>
            </a>
            <a class="dropdown-item px-3 text-white mt-0 mt-md-4 mt-lg-2" href="#">
                <i class="fas fa-book p-0 pt-2"></i><span class="col-5"> Settings</span>
            </a>
            <a class="dropdown-item px-3 border-top border-light text-white mt-0 mt-md-4 mt-lg-2 bg-dark" href="<?=APP_URL?>/logout">
                <i class="fas fa-sign-out p-0 pt-2"></i><span class="col-5"> Logout</span>
            </a>
        </div>
    </div>
</header>