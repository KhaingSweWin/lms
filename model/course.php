<?php
include_once __DIR__.'/../vendor/db/db.php';

class Course{

    public function getCourseList(){
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //2.write sql
        $sql="select course.name as cname,category.name as catname,course.outline as coutline 
        from course join category on course.cat_id=category.id";
        $statement=$con->prepare($sql);
        //3.sql excute
        if($statement->execute())
        {
            //4. result
            //data fetch()=> one row, fetchAll() => multiple rows
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function getNumCourse()
    {
      //1.db connection
      $con=Database::connect();
      $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //2.write sql
      $sql="select category.name as name,count(course.id) as total
      from course join category
      on course.cat_id=category.id
      group by course.cat_id";
      $statement=$con->prepare($sql);
      //3.sql excute
      if($statement->execute())
      {
          //4. result
          //data fetch()=> one row, fetchAll() => multiple rows
          $result=$statement->fetchAll(PDO::FETCH_ASSOC);
      }
      return $result;  
    }

    public function addNewCourse($name,$cat,$outline)
    {
       //1.db connection
       $con=Database::connect();
       $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       //2.write sql
       $sql="insert into course(name,cat_id,outline) values (:name,:cat,:outline)";
       $statement=$con->prepare($sql);
       $statement->bindParam(':name',$name);
       $statement->bindParam(':cat',$cat);  
       $statement->bindParam(':outline',$outline);
       if($statement->execute())
       {
           return true;
       }
       else
       {
           return false;
       } 
    }

    
}
?>