<?php

namespace App\Model;
use App\Core\DB;
use App\Core\Model;


class Course extends Model 
{
    protected static $table = 'courses';

    // Get courses with additional details
    public static function getCourses($limit, $offset) {
        $query ="SELECT 
                    c.id,
                    c.name AS course_name,
                    c.description,
                    c.image_url,
                    c.price,
                    cat.name AS category_name
                FROM " . static::$table . " c
                JOIN Categories cat ON c.category_id = cat.id";
        ;
        // Prepare data for binding
        $data = [
            ':limit' => $limit,
            ':offset' => $offset
        ];
        return DB::query($query,null)->fetchAll();
    }
    
    public function getTotalCourses() {
        $query = "SELECT COUNT(*) FROM " . static::$table . "";
        return DB::query($query)->fetchColumn();
    }

    public static function getCourseById($id) {
        $query = 
            "SELECT 
                    c.id,
                    c.name AS course_name,
                    c.description,
                    c.image_url,
                    c.objectif,
                    c.descriptioncourte,
                    c.prerequis,
                    cat.name AS category_name
                FROM " . static::$table . " c
                JOIN Categories cat ON c.category_id = cat.id 
                
                WHERE c.id = :courseId"
        ;
        
        $data = [
            ':courseId' => $id
        ];
        return DB::query($query,$data)->fetch();
    }
    public function getCoursesByCategory($category, $limit, $offset) {
        $query = "SELECT * FROM " . static::$table . " WHERE category_id = :category LIMIT :limit OFFSET :offset";
        $data = [
            ':category' => $category,
            ':limit' => $limit,
            ':offset' => $limit
        ];
        return DB::query($query,$data)->fetchAll();
    }

    public function getTotalCoursesByCategory($category_id) {
        $query = "SELECT COUNT(*) FROM " . static::$table . " WHERE category_id = :category_id";
        $data = [
            ':category_id' => $category_id
        ];
        return DB::query($query,$data)->fetchColumn();
    }
    public function getRelatedCourses($category_id, $courseId) {
        $query = "SELECT * FROM " . static::$table . " WHERE category_id = :category_id AND id != :courseId";
        $data = [
            ':category_id' => $category_id,
            ':courseId' => $courseId,
        ];
        return DB::query($query,$data)->fetchAll();
    }


}