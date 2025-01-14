<?php 

use App\Core\Router;
use App\Controller\StaticController;

// HOME
Router::get('/', [new StaticController(), 'home']);
// About
Router::get('/about-us', [new StaticController(), 'about']);

?>