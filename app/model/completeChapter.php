<?php

namespace App\Model;
use App\Core\DB;
use App\Core\Model;
use PDO;

class CompleteChapter extends Model 
{
    protected static $table = 'user_completed_chapters';

    // Save in user and complete chapter id
    public function completeChapter($item)
    {
        $query = "INSERT INTO " . static::$table . " (enrollment_id	,chapter_id) values (:enrollment_id	,:chapter_id)";
        return (DB::query(
                $query,
                [
                    'enrollment_id' => $item['enrollment_id'],
                    'chapter_id' => $item['chapter_id'],
                ]
        ));
    }

    public function isComplete($item){
        $query = "SELECT EXISTS (SELECT 1 FROM " . static::$table . " WHERE enrollment_id = :enrollment_id AND chapter_id = :chapter_id ) AS isComplete";
        $result = (DB::query(
            $query,
            [
                'enrollment_id' => $item['enrollment_id'],
                'chapter_id' => $item['chapter_id'],
            ]
        ))->fetch(PDO::FETCH_ASSOC);
        // Check if the user is enrolled
        return (bool)$result['isComplete'];
    }

}