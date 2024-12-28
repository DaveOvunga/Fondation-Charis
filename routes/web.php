<?php 

use App\Core\Router;
use App\Controller\AuthController;
use App\Controller\HomeController;
use App\Controller\CourseController;
use App\Controller\UserController;

// HOME
Router::get('/formation', [new HomeController(), 'index']);

// AUTH
Router::get('/login', [new AuthController(), 'login']);
Router::post('/login', [new AuthController(), 'login']);
Router::get('/register', [new AuthController(), 'register']);
Router::post('/register', [new AuthController(), 'register']);
Router::get('/logout', [new AuthController(), 'logout']);

// COURSES
Router::get('formation/course/{id}', [
    new CourseController(),
    "courseDetail" // Ensure this returns a response
]);
Router::get('formation/course/{id}/video', [
    new CourseController(),
    "video" // Ensure this returns a response
]);
Router::post('/formation/chaptercomplete', [
    new CourseController(),
    "chapterComplete" // Ensure this returns a response
]);


// USER
Router::get('formation/Settings', [new UserController(), 'settings']);



?>