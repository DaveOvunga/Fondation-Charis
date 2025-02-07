<?php

namespace App\model;

use App\core\Model;
use App\core\DB;

class LoginAttemps extends Model
{
    protected static $table = 'loginattempts';
    // 'INSERT INTO loginattempts VALUES (NULL, ?, ?, ?)', 'isi', $user['id'], $_SERVER['REMOTE_ADDR'], time());

    public function insertRequestLogin($id){
        $query = "INSERT INTO " . static::$table . " (user,ip,timestamp) values (:user,:ip,:timestamp)";
        return (DB::query(
            $query,
            [
                'user' => $id,
                'timestamp' => time(),
                'ip' => $_SERVER['REMOTE_ADDR'],
            ],True
        ));
    }

    public function getLoginAttemps($id){
        $query = "SELECT COUNT(loginattempts.id),timestamp FROM " . static::$table . " WHERE user=:id ORDER BY id DESC LIMIT 1";
        return (DB::query(
            $query,
            [
                'id' => $id
            ]
        ))->fetch();
    }

    
}
