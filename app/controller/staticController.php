<?php
namespace App\Controller;

use App\core\Controller;
use App\Core\View;

class StaticController extends Controller{

    public function home(){
        View::render('static/home');
    }
    public function doctor(){
        View::render('static/doctors');
    }
    public function about(){
        View::render('static/about-us');
    }
}
?>