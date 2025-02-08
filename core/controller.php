<?php 
namespace App\core;

use BadMethodCallException;

abstract class Controller
{
    public function __call($name, $arguments)
    {
        throw new BadMethodCallException(sprintf(
            'Methode "%s" is not implement in class "$s".',
            $name,
            get_class($this)
        ));
    }
    
    public function sendJsonResponse($success, $message, $redirect = null) {
        header('Content-Type: application/json');
        if ($redirect) {
            echo json_encode(['success' => $success, 'message' => $message, 'redirect' => './'.$redirect]);
        } else {
            echo json_encode(['success' => $success, 'message' => $message, 'redirect' => '']);
        }
        exit;  // Ensure no further output is sent
    }

    public function sendJsonResEmail($success, $message, $redirect = null) {
        header('Content-Type: application/json');
        if ($redirect) {
            echo json_encode(['success' => $success, 'message' => $message, 'redirect' => APP_URL.'/'.$redirect]);
        } else {
            echo json_encode(['success' => $success, 'message' => $message, 'redirect' => '']);
        }
        exit; // Ensure no further output is sent
    }
}
?>