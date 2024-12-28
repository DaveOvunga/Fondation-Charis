<?php

namespace App\Model;
use App\Core\DB;
use App\Core\Model;
use PDO;

class Chapter extends Model 
{
    protected static $table = 'chapters';

    // Get chapter with additional details
    public static function getChapterById($item) {
        $query = 
            "SELECT 
                c.id AS course_id,   
                c.name AS course_name,
                ch.id AS chapter_id,
                ch.chapter_number,
                ch.name AS chapter_name,
                ch.content,
                ch.video_url,
                next_ch.id AS next_chapter_id
            FROM 
                " . static::$table . " ch
            JOIN 
                courses c ON ch.course_id = :course_id
            LEFT JOIN 
                chapters next_ch ON next_ch.course_id = c.id AND next_ch.chapter_number = ch.chapter_number + 1
            WHERE 
                ch.id = :chapter_id"
        ;
        
        $data = [
            ':course_id' => $item['course_id'],
            ':chapter_id' => $item['chapter_id']
        ];
        return DB::query($query,$data)->fetch();
    }

    // Get Number of chapters Number
    public function getChapterNumber($id){
        $query = "SELECT COUNT(*) AS nbreChapitre
                    FROM " . static::$table . "
                    WHERE course_id = :courseId;";
        $data = [
            ':courseId' => $id
        ];
        $result = DB::query($query,$data)->fetch();
        return $result["nbreChapitre"];
    }

    // Get Number of chapters by course id
    public function getChapterCourse($id){
        $query ="SELECT id,chapter_number, 
                name FROM " . static::$table . " WHERE course_id = :id";

        $data = [ ':id' => $id];
        return DB::query($query,$data)->fetchAll();
    }

}