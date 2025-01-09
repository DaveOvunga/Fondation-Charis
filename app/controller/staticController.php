<?php
namespace App\Controller;

use App\core\Controller;
use App\Core\View;

class StaticController extends Controller{

    public function home(){
        View::renderStatic('index');
    }
}
?>