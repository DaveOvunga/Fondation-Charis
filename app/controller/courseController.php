<?php

namespace app\Controller;

use app\Core\View;
use app\core\Controller;
use app\core\Helper;
use app\model\Chapter;
use app\model\CompleteChapter;
use app\model\Course;
use app\model\Enrollment;

class CourseController extends Controller
{
    private $enrollModel;
    private $chapterModel;
    private $completeChapterModel;

    public function __construct() 
    {
        $this->enrollModel = new Enrollment();
        $this->chapterModel = new Chapter();
        $this->completeChapterModel = new CompleteChapter();
    }

    public function index($limit, $offset) 
    {
        return Course::getCourses($limit, $offset);
    }

    public function getCourseById($id) 
    {
        return Course::getCourseById($id);
    }

    public function courseDetail($params)
    {
        if(isset($_SESSION['user']))
        {
            $course_id = base64_decode($params['id']);
             // Check if $course_id is a valid integer
            if (!filter_var($course_id, FILTER_VALIDATE_INT)) {
                View::Render('erreur/404');
                exit;
            }
            $data = [
                'course_id' => $course_id,
                'user_id' => $_SESSION['user_id']
            ];
            $courseDetail = $this->getCourseById($course_id);

            if($courseDetail){
                $courseDetail["nbreChapitre"] = $this->chapterModel->getChapterNumber($course_id);
                $courseDetail["enrolled"] = $this->enrollModel->isEnroll($data);
                $listChapitre = $this->chapterModel->getChapterCourse($course_id);

                $courseDetail = [
                    "listChapitre" => $listChapitre,
                    "courseDetail" => $courseDetail
                ];

                View::Render('E-learning/courseDetail',$courseDetail);
                exit;
            }
        }
        View::redirect('login');
    }
    
    public function video($params)
    {
        if(isset($_SESSION['user']))
        {
            list($course_id, $idChapter) = Helper::decodeIds($params['id']);
            
            $data = [
                'course_id' => $course_id,
                'user_id' => $_SESSION['user_id']
            ];

            $data2 =[
                'course_id' => $course_id,
                'chapter_id' => $idChapter,
            ];


            $userEnrollId = $this->enrollModel->isEnroll($data);

            if(!$userEnrollId){
                $userEnrollId = $this->enrollModel->enroll($data);
            }            

            $_SESSION['user_enroll_id'] = $userEnrollId;

            $ChapterDetail = $this->chapterModel->getChapterById($data2);

            if($ChapterDetail){
                View::Render('E-learning/video',$ChapterDetail);
                exit;
            }
        }
        View::redirect('login');
    }

    public function chapterComplete(){
        if(isset($_SESSION['user']) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_enroll_id']) )
        {
            $chapter_id = base64_decode($_POST['course']);
            $data = [
                'chapter_id' => $chapter_id,
                'enrollment_id' => $_SESSION['user_enroll_id']
            ];

            if(!$this->completeChapterModel->isComplete($data)){
                $this->completeChapterModel->completeChapter($data);
                $this->sendJsonResponse(true, 'Chapter Complete'); // Include redirect URL
            }
            $this->sendJsonResponse(true, 'Chapter Complete');
            exit;
        }
        else {
            $this->sendJsonResponse(false, 'Error please try again');
        }
    }

}
