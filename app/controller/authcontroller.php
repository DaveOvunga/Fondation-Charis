<?php
namespace App\Controller;

use App\core\Controller;
use App\Core\View;
use app\model\user;
use App\Core\Helper;
use App\model\Request;

class AuthController extends Controller{
    private $userModel;
    private $requestModel;
    private $helperModel;

    public function __construct() {
        $this->userModel = new User();
        $this->helperModel = new Helper();
        $this->requestModel = new Request();
    }

    public function register()
    {

        if (isset($_SESSION['user'])) {
            View::redirect('E-learning');
            exit;
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // USERNAME VERIFICATION
            if (!isset($_POST['username']) || strlen($_POST['username']) > 254 || !preg_match('/^[a-zA-Z- ]+$/', $_POST['username'])) {
                $errors[] = "Invalid name entered. (only use letters, spaces, and hyphens)";
            }

            // EMAIL VERIFICATION
            if (!isset($_POST['email']) || strlen($_POST['email']) > 254 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email entered.";
            } else if (!checkdnsrr(substr($_POST['email'], strpos($_POST['email'], '@') + 1), 'MX')) {
                $errors[] = "Email does not exist. (This domain does not have a mail server)";
            }

            // PASSWORD VERIFICATION
            if (!isset($_POST['password']) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/', $_POST['password'])) {
                $errors[] = "Password must contain: <ul><li>At least 8 characters</li><li>At least one lower case letter</li><li>At least one upper case letter</li><li>At least one number</li><li>At least one special character (~?!@#$%^&*)</li></ul>";
            } else if (!$_POST['confirm_password'] ||  $_POST['confirm_password'] != $_POST['password']) {
                $errors[] = "Passwords do not match. Please re-enter your confirmed password.";
            }


            if (count($errors) == 0) {
                if (isset($_POST['csrf_token']) && $this->helperModel->validateToken($_POST['csrf_token'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];


                    $data = [
                        'username' => $username,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT)
                    ];

                    // VERIFY IF EMAIL IS ALREADY IN DATABASE
                    if (!$this->userModel->getId($email)) {
                        // IF NOT IN DATABASE TRY TO INSERT
                        if ($this->userModel->register($data)) {

                            $user = $this->userModel->requestVerification($email);
                            
                            if ($user) {
                                if ($user['verified'] == 0) {
                                    if ($user['COUNT(requests.id)'] <= MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY) {
                                        //Send validation request
                                        $verifyCode = $this->helperModel->generateVerificationCode();
                                        $hash = password_hash($verifyCode, PASSWORD_DEFAULT);

                                        $data = [
                                            'user' => $user['id'],
                                            'hash' => $verifyCode,
                                        ];

                                        $reqId = $this->requestModel->insertRequest($data);
                                        

                                        if ($reqId != -1) {
                                            if ($this->helperModel->sendVerificationEmail($email, $user['username'], 'Email Verification', $verifyCode)) {
                                                $this->sendJsonResponse(True, 'An Verification Email has been send. Please check your inbox.');
                                                exit;
                                            }
                                            else{
                                                $errors[] = "Failed to send email";
                                            }
                                        }
                                        else{
                                            $errors[] = "Request failed";
                                        }
                                    }
                                    else{
                                        $errors[] = "You have exceeded your number of allowed validation requests per day";
                                    }
                                }
                                else{
                                    $errors[] = "The user with this email is already validated";
                                }
                            }
                            else{
                                $errors[] = "A user with this email does not exis";
                            }
                        }
                        // ELSE GIVE AN ERROR
                        else {
                            $errors[] = "Failed to add account. Please try again later.";
                        }
                    }
                    // THE EMAIL ALREADY EXIST THROW ERROR
                    else {
                        $errors[] = "An account with this email or this username already exists";
                    }
                } else {
                    $errors[] = "Invalid CSRF token.";
                }
            }
            $this->sendJsonResponse(false, $errors);
        } else {
            View::render('E-learning/register');
        }
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            View::redirect('E-learning/courses');
            exit;
        }

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // EMAIL VERIFICATION
            if (!isset($_POST['email']) || strlen($_POST['email']) > 254 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Adresse email ou mot de passe incorrect. Veuillez réessayer.";
            } else if (!checkdnsrr(substr($_POST['email'], strpos($_POST['email'], '@') + 1), 'MX')) {
                $errors[] = "L'adresse email n'est pas valide.";
            }

            // PASSWORD VERIFICATION
            if (!isset($_POST['password'])) {
                $errors[] = "Entrer un mot de passe";
            }

            if (count($errors) == 0) {
                if (isset($_POST['csrf_token']) && $this->helperModel->validateToken($_POST['csrf_token'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $data = [
                        'email' => $email,
                        'password' => $password
                    ];

                    $userId = $this->userModel->getId($email);
                    if($userId)
                    {
                        $loginInfo = $this->userModel->find($userId);
                        
                        if($this->userModel->isEmailVerify($email)){
                            if ($this->userModel->login($data)) {
                                $_SESSION['user'] = $loginInfo['username'];
                                $_SESSION['user_id'] = $this->userModel->getId($email);
                                $this->sendJsonResponse(true, 'Login successful.', 'E-learning/courses'); // Include redirect URL
                                exit;
                            } else {
                                $errors[] = "Adresse email ou mot de passe incorrect. Veuillez réessayer.";
                            }
                        }
                        else{
                            $errors[] = "Votre email n'a pas encore été vérifié. Veuillez vérifier votre boîte de réception pour le code de vérification.";
                        }
                    }
                    else{
                        $errors[] = "Adresse email ou mot de passe incorrect. Veuillez réessayer.";
                    }
                } else {
                    $errors[] = "CSRF Invalide.";
                }
            }
            $this->sendJsonResponse(false, $errors);
            
        } else {
            View::render('E-learning/login');
        }
    }

    public function logout() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['csrf_token'])&& $this->helperModel->validateToken($_POST['csrf_token'])){
                if($_SESSION['user'])
                {
                    session_destroy();
                    $this->sendJsonResponse(true, 'Deconnexion Bye', null); // Inllclude redirect URL
                }
            }
        }
    }
}
?>