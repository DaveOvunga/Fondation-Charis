<?php 

use app\Core\Router;
use app\controller\Authcontroller;
use app\controller\Homecontroller;
use app\controller\Coursecontroller;
use app\controller\Usercontroller;

// HOME
Router::get('/E-learning/courses', [new Homecontroller(), 'index']);

// AUTH
Router::get('/login', [new Authcontroller(), 'login']);
Router::post('/login', [new Authcontroller(), 'login']);
Router::get('/register', [new Authcontroller(), 'register']);
Router::post('/register', [new Authcontroller(), 'register']);
Router::post('/logout', [new Authcontroller(), 'logout']);

Router::get('/emailVerification', [new AuthController(), 'validateEmail']);
Router::get('/emailVerification/{id}', [new AuthController(), 'validateEmail']);
Router::post('/emailVerification', [new AuthController(), 'validateEmail']);

Router::post('/verificationEmail', [new AuthController(), 'SendEmailVerification']);

// COURSES
Router::get('/E-learning/course/{id}', [
    new Coursecontroller(),
    "courseDetail" // Ensure this returns a response
]);
Router::get('/E-learning/course/{id}/video', [
    new Coursecontroller(),
    "video" // Ensure this returns a response
]);
Router::post('/E-learning/chaptercomplete', [
    new Coursecontroller(),
    "chapterComplete" // Ensure this returns a response
]);


// USER
Router::get('E-learning/Settings', [new Usercontroller(), 'settings']);



?>