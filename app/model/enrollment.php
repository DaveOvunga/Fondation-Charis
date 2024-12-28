<?php 

namespace App\Model;
use App\Core\DB;
use App\Core\Model;
use PDO;

class Enrollment extends Model 
{
    protected static $table = 'enrollments';

    public function enroll($item)
    {
        $query = "INSERT INTO " . static::$table . " (user_id, course_id) values (:user_id, :course_id)";
        return (DB::query(
            $query,
            [
                'user_id' => $item['user_id'],
                'course_id' => $item['course_id'],
            ],true
        ));
    }
    public static function getEnrollCourse($id)
    {
        $query="SELECT 
                    c.id,
                    c.name AS course_name,
                    c.description,
                    c.image_url,
                    c.price,
                    cat.name AS category_name
                FROM Courses c
                JOIN Categories cat ON c.category_id = cat.id
                JOIN " . static::$table . " e ON c.id = e.course_id
                WHERE e.user_id = :user_id";
        
        return (DB::query(
            $query,
            [
                'user_id'=>$id
            ]
        ))->fetchAll();
    }

    public function isEnroll($item){
        // Check if the user is enrolled
        $query = "SELECT id FROM " . static::$table . " WHERE user_id = :user_id AND course_id = :course_id ";
        return (DB::query(
            $query,
            [
                'user_id'=>$item['user_id'],
                'course_id'=>$item['course_id'],
            ]
        ))->fetchColumn();
    }

    public function percentageEnrollCourse($courseId){
        $query="SELECT
                COUNT(DISTINCT uc.chapter_id) AS completed_chapters,
                COUNT(DISTINCT ch.id) AS total_chapters,
                (COUNT(DISTINCT uc.chapter_id) * 100.0 / COUNT(DISTINCT ch.id)) AS completion_percentage
            FROM 
                courses c
            JOIN 
                chapters ch ON c.id = :course_id
            LEFT JOIN 
                enrollments e ON e.course_id = c.id
            LEFT JOIN 
                user_completed_chapters uc ON uc.enrollment_id = e.id
            JOIN 
                users u ON e.user_id = u.id
            WHERE 
                u.id = :user_id  -- Replace ? with the specific user ID
            GROUP BY 
                c.id, u.id;";
        
        return (DB::query(
            $query,
            [
                'user_id'=>$_SESSION['user_id'],
                'course_id'=>$courseId,
            ]
        ))->fetchAll();
    }
}

?>