<?php
namespace App\Controller;

use App\core\Controller;
use App\Core\View;
use App\Model\Course;   
use App\Model\Enrollment;   

class HomeController extends Controller{
    public function index() {
        if (!isset($_SESSION['user'])) {
            View::redirect('login');
            exit;
        }
        $coursesNotEnroll = Course::getCourses(2, 3);
        $coursesEnroll = Enrollment::getEnrollCourse($_SESSION['user_id']);

        $courses = [
            'enrolled' => $coursesEnroll,
            'not_enrolled' => $coursesNotEnroll,
        ];
        View::render('E-learning/home', $courses);
    }

    public function home(){
        View::render('static/home');
    }
}
?>