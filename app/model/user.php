<?php
namespace App\model;
use App\core\Model;
use App\core\DB;

class User extends Model{
    protected static $table = 'users';

    public function register($item)
    {
        $query = "INSERT INTO " . static::$table . " (email,password) values (:email,:password)";
        return (DB::query(
            $query,
            [
                'email' => $item['email'],
                'password' => $item['password'],
            ]
        ));
    }

    public function login($item)
    {
        $email = $item['email'];
        $password = $item['password'];

        // Query to get the hashed password from the database
        $query = "SELECT password FROM " . static::$table . " WHERE email=:email"; // Adjust table name as needed
        $stmt = DB::query($query, ['email' => $email]);
        $hashedPassword = $stmt->fetchColumn();

        // Verify password
        if ($hashedPassword && password_verify($password, $hashedPassword)) {
            // Password is correct
            return true;
        } else {
            // Password is incorrect
            return false;
        }
    }
    
    public function getId($email){
        $query = "SELECT id FROM " . static::$table . " WHERE email = :email";
        return (DB::query(
            $query,
            [
                'email' => $email
            ]
        ))->fetchColumn();
    }
}
?>