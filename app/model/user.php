<?php
namespace app\model;
use app\core\Model;
use app\core\DB;

class User extends Model{
    protected static $table = 'users';

    public function register($item)
    {
        $query = "INSERT INTO " . static::$table . " (username,email,password) values (:username,:email,:password)";
        return (DB::query(
            $query,
            [
                'username' => $item['username'],
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

    public function verifyEmail($id){
        $query = "UPDATE " . static::$table . "SET verified=1 WHERE id = :id";
        return (DB::query(
            $query,
            [
                'id' => $id
            ]
        ));
    }

    public function requestVerification($email)
    {
        $oneDayAgo = time()- 60 * 60 * 24;
        $query = "SELECT users.id,username,verified,COUNT(requests.id) FROM users LEFT JOIN requests ON users.id = requests.user AND type=0 AND timestamp>:time_stamp WHERE email=:email GROUP BY users.id";
        // Prepare data for binding
        $data = [
            ':email' => $email,
            ':time_stamp' => $oneDayAgo
        ];
        return DB::query($query, $data)->fetch();
    }
    public function isEmailVerify($email)
    {
        $query = "SELECT verified FROM ". static::$table ." WHERE email = :email AND verified = 1";
        return (DB::query(
            $query,
            [
                'email' => $email
            ]
        ))->fetchColumn();
    }
    public function requestLoginAttemps($email)
    {
        $hourAgo = time() - 60*60;
        $query = 'SELECT COUNT(loginattempts.id) FROM '. static::$table . ' LEFT JOIN loginattempts ON users.id = user AND timestamp>:time_stamp WHERE email=:email GROUP BY users.id';
        // Prepare data for binding
        $data = [
            ':email' => $email,
            ':time_stamp' => $hourAgo
        ];
        return DB::query($query, $data)->fetch();
    }
}
?>