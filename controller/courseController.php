<?php
include_once __DIR__.'/../model/course.php';

class CourseController extends Course{

    public function getCourses(){
       return $this->getCourseList();
    }

    public function getTotalCourse(){
        return $this->getNumCourse();
    }
    public function addCourse($name,$cat,$outline)
    {
        return $this->addNewCourse($name,$cat,$outline);
    }
}

?>