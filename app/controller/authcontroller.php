<?php
namespace App\Controller;

use App\core\Controller;
use App\Core\View;
use app\model\user;

class AuthController extends Controller{
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function register() {
        if (isset($_SESSION['user'])) {
            View::redirect('formation');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data=[
                'email'=>$username,
                'password'=>password_hash($password,PASSWORD_DEFAULT)
            ];

            if ($this->userModel->register($data)) {
                $this->sendJsonResponse(true, 'Registration successful.', 'login'); // Include redirect URL
            } else {
                $this->sendJsonResponse(false, 'Registration failed.');
            }
        }
        else{
            View::render('formation/register');
        }
    }

    public function login() {
        if (isset($_SESSION['user'])) {
            View::redirect('formation');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data=[
                'email'=>$username,
                'password'=>$password
            ];

            if ($this->userModel->login($data)) {
                $_SESSION['user'] = $username;
                $_SESSION['user_id'] = $this->userModel->getId($username);
                $this->sendJsonResponse(true, 'login successful.', 'formation'); // Include redirect URL
                exit;
            } else {
                $this->sendJsonResponse(false, 'Invalid credentials.');
            }
        }
        else{
            View::render('formation/login');
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        View::redirect('login');
    }
}
?>