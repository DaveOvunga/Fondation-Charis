<?php

namespace App\model;

use App\core\Model;
use App\core\DB;

class Request extends Model
{
    protected static $table = 'requests';

    public function getRequestId($id)
    {
        $query = "SELECT user,hash,timestamp FROM " . static::$table . " WHERE user=:id AND type=0 ORDER BY id DESC LIMIT 1";
        return (DB::query(
            $query,
            [
                'id' => $id
            ]
        ))->fetch();
    }

    public function deleteUserRequest($id){
        $query = "DELETE FROM " . static::$table . " WHERE user = :id";
        return (DB::query(
            $query,
            [
                'id' => $id
            ]
        ));
    }

    public function insertRequest($data){
        $query = "INSERT INTO " . static::$table . " (user,hash,timestamp) values (:user,:hash,:timestamp)";
        return (DB::query(
            $query,
            [
                'user' => $data['user'],
                'timestamp' => time(),
                'hash' => $data['hash'],
            ],True
        ));
    }
}
