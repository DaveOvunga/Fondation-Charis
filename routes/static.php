<?php 

use App\Core\Router;
use App\Controller\StaticController;

// HOME
Router::get('/', [new StaticController(), 'home']);
Router::get('/doctors', [new StaticController(), 'doctor']);
Router::get('/about', [new StaticController(), 'about']);


?>