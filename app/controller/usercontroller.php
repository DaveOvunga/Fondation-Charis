<?php 

namespace App\Controller;

use App\core\Controller;
use app\model\user;
use App\Core\View;

class UserController extends Controller{

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }
    public function settings(){
        if (!isset($_SESSION['user'])) {
            $user = $this->userModel->find($_SESSION['user_id']);
            View::Render('formation/Settings',$user);
            exit;
        }
        View::Render('formation/login');
    }
}




?>