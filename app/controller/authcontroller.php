<?php
namespace App\Controller;

use App\core\Controller;
use App\Core\View;

use App\model\LoginAttemps;
use app\model\user;
use App\Core\Helper;
use App\model\Request;

class AuthController extends Controller{
    private $userModel;
    private $requestModel;
    private $helperModel;
    private $loginAttemps;

    public function __construct()
    {
        $this->userModel = new User();
        $this->helperModel = new Helper();
        $this->requestModel = new Request();
        $this->loginAttemps = new LoginAttemps();
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
                $errors[] = "Nom invalide saisi. (Utilisez uniquement des lettres, des espaces et des tirets)";
            }

            // EMAIL VERIFICATION
            if (!isset($_POST['email']) || strlen($_POST['email']) > 254 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalide saisi";
            } else if (!checkdnsrr(substr($_POST['email'], strpos($_POST['email'], '@') + 1), 'MX')) {
                $errors[] = "L'email n'existe pas. (Ce domaine n'a pas de serveur de messagerie) ";
            }

            // PASSWORD VERIFICATION
            if (!isset($_POST['password']) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/', $_POST['password'])) {
                $errors[] = "Le mot de passe doit contenir : <ul><li>Au moins 8 caractères</li><li>Au moins une lettre minuscule</li><li>Au moins une lettre majuscule</li><li>Au moins un chiffre</li><li>Au moins un caractère spécial (~?!@#$%^&*)</li></ul>";
            } else if (!$_POST['confirm_password'] ||  $_POST['confirm_password'] != $_POST['password']) {
                $errors[] = "Les mots de passe ne correspondent pas. Veuillez saisir à nouveau votre mot de passe confirmé";
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
                                                $errors[] = "Échec de l'envoi de l'email";
                                            }
                                        }
                                        else{
                                            $errors[] = "Échec de la demande";
                                        }
                                    }
                                    else{
                                        $errors[] = "Vous avez dépassé le nombre de demandes de validation autorisées par jour";
                                    }
                                }
                                else{
                                    $errors[] = "L'utilisateur avec cet email est déjà validé";
                                }
                            }
                            else{
                                $errors[] = "Un utilisateur avec cet email n'existe pas ;";
                            }
                        }
                        // ELSE GIVE AN ERROR
                        else {
                            $errors[] = "Échec de l'ajout du compte. Veuillez réessayer plus tard";
                        }
                    }
                    // THE EMAIL ALREADY EXIST THROW ERROR
                    else {
                        $errors[] = "Un compte avec cet email existe déjà ";
                    }
                } else {
                    $errors[] = "Jeton CSRF invalide.";
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
                        $this->loginAttemps->insertRequestLogin($userId);
                        $loginAttemp = $this->loginAttemps->getLoginAttemps($userId);
                        
                        if($loginAttemp['COUNT(loginattempts.id)'] > MAX_LOGIN_ATTEMPS_PER_HOUR && $loginAttemp['timestamp'] >= time() - 60 * 60)
                        {
                            $errors[] = "Vous avez dépassé le nombre de tentatives de connexion autorisées par heure ; VEUILLEZ RÉESSAYER DANS UNE HEURE";
                        }
                        else{
                            if($this->userModel->isEmailVerify($email)){
                                if ($this->userModel->login($data)) {
                                    $_SESSION['user'] = $loginInfo['username'];
                                    $_SESSION['user_id'] = $this->userModel->getId($email);
                                    $this->sendJsonResponse(true, 'Connexion réussie', 'E-learning/courses'); // Include redirect URL
                                    exit;
                                } else {
                                    $errors[] = "Adresse email ou mot de passe incorrect. Veuillez réessayer.";
                                }
                            }
                            else{
                                $errors[] = "Votre email n'a pas encore été vérifié. Veuillez vérifier votre boîte de réception pour le code de vérification.";
                            }
                        }
                    }
                    else{
                        $errors[] = "Adresse email ou mot de passe incorrect. Veuillez réessayer.";
                    }
                } else {
                    $errors[] = "Jeton CSRF Invalide.";
                }
            }
            $this->sendJsonResponse(false, $errors);
            
        } else {
            View::render('E-learning/login');
        }
    }

    public function validateEmail()
    {

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Code is the EmaiL ID Hash
            if (!isset($_POST['code']) || $_POST['code'] == '')
            {
                $errors[] = 'Échec de la demande';
            }
            else{
                if (!is_int($_POST['code'])) {
                    $errors[] = "Échec de la demande, veuillez reessayer";
                }
            }

            // Code to validate the account
            if(!isset($_POST['verificationCode']) || $_POST['verificationCode'] == '')
            {
                $errors[] = 'Veuillez entrer le code';
            }
            else{
                if (!is_int($_POST['verificationCode'])) {
                    $errors[] = "Code Invalide";
                }
            }

            if(count($errors) == 0)
            {
                if (isset($_POST['csrf_token']) && $this->helperModel->validateToken($_POST['csrf_token'])) {
                    
                    $req = $this->requestModel->getRequestId($this->helperModel->decode($_POST['code']));
                    
                    if ($req) {
                        if ($req['timestamp'] > time() - 60 * 60 * 24) {
                            
                            if ($_POST['verificationCode'] == $req['hash']) {
                                if ($this->userModel->verifyEmail($req['user'])) {
                                    $loginInfo = $this->userModel->find($req['user']);
                                    $this->requestModel->deleteUserRequest($req['user']);
                                    $_SESSION['user'] = $loginInfo['username'];
                                    $_SESSION['user_id'] = $loginInfo['id'];
                                    $this->sendJsonResEmail(true, 'Verification complete.', 'E-learning/courses');
                                } else {
                                    $errors[] = 'Échec de la demande';
                                }
                            } else {
                                $errors[] = 'Demande de vérification invalide ';
                            }
                        } else {
                            $errors[] = 'Demande de vérification expirée ';
                        }
                    } else {
                        $errors[] = 'Demande de vérification invalide';
                    }
                }
                else {
                    $errors[] = 'Jeton CSRF invalide';
                }
            }
            $this->sendJsonResponse(false, $errors);
        }
        else {
            View::render('E-learning/emailVerification');
        }
    }

    public function SendEmailVerification()
    {
        $errors = [];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Code is the EmaiL ID Hash
            if (!isset($_POST['code']) || $_POST['code'] == '')
            {
                $errors[] = 'Code invalide';
            }
            else{
                if (!is_int($_POST['code'])) {
                    $errors[] = "Échec de la demande, veuillez reessayer";
                }
            }

            if (count($errors) == 0)
            {
                if (isset($_POST['csrf_token']) && $this->helperModel->validateToken($_POST['csrf_token'])) {
                    $req = $this->requestModel->getRequestId($this->helperModel->decode($_POST['code']));
                    $user = $this->userModel->find($req['user']);
                    $email = $user['email'];
                    
                    if($user){
                        $user = $this->userModel->requestVerification($email);
                        
                        if($user['verified'] == 0){

                            if ($user['COUNT(requests.id)'] <= MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY) {

                                $verifyCode = $this->helperModel->generateVerificationCode();

                                $data = [
                                    'user' => $req['user'],
                                    'hash' => $verifyCode,
                                ];

                                $reqId = $this->requestModel->insertRequest($data);

                                if ($reqId != -1) {
                                    if ($this->helperModel->sendVerificationEmail($email, $user['username'], 'Email Verification', $verifyCode)) {
                                        $this->sendJsonResponse(True, 'Un email de vérification a été envoyé. Veuillez vérifier votre boîte de réception email',null);
                                        exit;
                                    }
                                    else{
                                        $errors[] = "Échec de l'envoi de l'email";
                                    }
                                }
                                else{
                                    $errors[] = "Échec de la demande";
                                }
                            }
                            else{
                                $errors[]="Vous avez dépassé le nombre de demandes de validation autorisées par jour";
                            }
                        }
                        else{
                            $errors[] = "L'utilisateur avec cet email est déjà validé";
                        }
                    }
                }
                
                else{
                    $errors[] = "Jeton CSRF invalide";
                }
            }
            $this->sendJsonResponse(false, $errors);
        }
    }



    // public function SendEmailVerification()
    // {
    //     $errors = [];
        
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         // Code is the EmaiL ID Hash
    //         if (!isset($_POST['code']) || $_POST['code'] == '')
    //         {
    //             $errors[] = 'Demande de vérification invalide';
    //         }

    //         if (count($errors) == 0)
    //         {
    //             if (isset($_POST['csrf_token']) && $this->helperModel->validateToken($_POST['csrf_token'])) {

    //                 if

    //                 $req = $this->requestModel->getRequestId($this->helperModel->decode($_POST['code']));
    //                 if()
    //                 $user = $this->userModel->find($req['user']);
    //                 $email = $user['email'];
                    
    //                 if($user){
    //                     $user = $this->userModel->requestVerification($email);
                        
    //                     if($user['verified'] == 0){

    //                         if ($user['COUNT(requests.id)'] <= MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY) {

    //                             $verifyCode = $this->helperModel->generateVerificationCode();

    //                             $data = [
    //                                 'user' => $req['user'],
    //                                 'hash' => $verifyCode,
    //                             ];

    //                             $reqId = $this->requestModel->insertRequest($data);

    //                             if ($reqId != -1) {
    //                                 if ($this->helperModel->sendVerificationEmail($email, $user['username'], 'Email Verification', $verifyCode)) {
    //                                     $this->sendJsonResponse(True, 'Un email de vérification a été envoyé. Veuillez vérifier votre boîte de réception email.',null);
    //                                     exit;
    //                                 }
    //                                 else{
    //                                     $errors[] = "Échec de l'envoi de l'email";
    //                                 }
    //                             }
    //                             else{
    //                                 $errors[] = "Échec de la demande";
    //                             }
    //                         }
    //                         else{
    //                             $errors[]="Vous avez dépassé le nombre de demandes de validation autorisées par jour";
    //                         }
    //                     }
    //                     else{
    //                         $errors[] = "L'utilisateur avec cet email est déjà validé";
    //                     }
    //                 }
    //             }
                
    //             else{
    //                 $errors[] = "Jeton CSRF invalide";
    //             }
    //         }
    //         $this->sendJsonResponse(false, $errors);
    //     }
    // }



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