<?php

/**
 * Handles course interactions within the app
 *
 * PHP version 7
 *
 * @author Alexander Benavides
 *
 */
class Course
{
    /**
     * The database object
     *
     * @var object
     */
    private $_db;

    /**
     * Checks for a database object and creates one if none is found
     *
     * @param object $db
     * @return void
     */
    public function __construct($db = NULL)
    {
        if (is_object($db)) {
            $this->_db = $db;
        } else {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }
    }

    public function addCourseAdmin()
    {
        $title = trim($_POST['course_title']);
        $description = $_POST['course_description'];
        $icon = $_POST['icon'];

        // Create course
        $sql = "INSERT INTO courses (courseTitle, CourseDescription, icon)
                VALUES (:title, :description, :icon)";

        if ($stmt = $this->_db->prepare($sql)) {
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':description', $description, PDO::PARAM_STR);
            $stmt->bindParam(':icon', $icon, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();

            $courseID = $this->_db->lastInsertId();
            return '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> &iexcl;Éxito!</h4>
            Se ha creado un nuevo curso "<a href="course.php?id=' . $courseID . '" target="_blank">' . $title . '</a>".
          </div>';

        } else {
            return '<div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-ban"></i> Error</h4>
              No se pudo crear este curso.
            </div>';
        }
    }
    public function getCourses()
    {
      $sql="SELECT* FROM courses";
      try {
          $stmt = $this->_db->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll();
          foreach ($rows as $row) {
            echo $this->formatCourses($row);
          }



          $stmt->closeCursor();
      } catch (PDOException $e) {
          return FALSE;
      }

    }
    private function formatCourses($row){
      $sql="SELECT topicID,topics.moduleID FROM topics,modules
            WHERE topics.moduleID = modules.moduleID
            AND modules.courseID =:cid";
      try {
          $stmt = $this->_db->prepare($sql);
          $stmt->bindParam(':cid', $row['courseID'], PDO::PARAM_STR);
          $stmt->execute();
          $newRow = $stmt->fetch();
          $topicID = $newRow['topicID'];
          $moduleID = $newRow['moduleID'];
          $stmt->closeCursor();
      } catch (PDOException $e) {
          return FALSE;
      }
      $base = '
      <div class="card list-courses">
        <h3>'.$row['courseTitle'].'</h3>
        <img class="card-img-top" src="/img/'.$row['icon'].'.png" alt="Imagen curso">
        <div class="card-body">
        <small>'.$row['CourseDescription'].'</small>
        </div>
        <a href="/course?id='.$row['courseID'].'&moduleid='.$moduleID.''.'&topicid='.$topicID.'" class="btn">Ver detalle</a>
      </div>
      ';
      return $base;
    }

    //Get coursesList
    public function getCoursesListAdmin()
    {
      $sql="SELECT * FROM courses";
      try {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        while ($row=$stmt->fetch()) {
          echo $this->formatCoursesListAdmin($row);
        }
        $stmt->closeCursor();

      } catch (PDOException $e) {

      }

    }
    private function formatCoursesListAdmin($row)
    {
      $status=$row['published'];
      if ($status==0) {
        $status='<button type="button" class="btn btn-warning">No publicado</button>';
      }else {
        $status='<button type="button" class="btn btn-success">Publicado</button>';
      }
      $base='
      <tr>
        <th scope="row"><a href="course?id='.$row['courseID'].'" class="text-danger">'.$row['courseID'].'</a></th>
        <td>'.$row['courseTitle'].'</td>
        <td>'.$row['CourseDescription'].'</td>
        <td>'.$status.'</td>
      </tr>
      ';
      return $base;
    }

   public function getCourseContentAdmin($courseID)
   {
     $sql="SELECT *FROM courses WHERE courseID=:cid";
     try {
       $stmt=$this->_db->prepare($sql);
       $stmt->bindParam(':cid', $courseID, PDO::PARAM_STR);
       $stmt->execute();
       $row=$stmt->fetch();
       return $row;
       $stmt->closeCursor();
     } catch (PDOException $e) {

     }

   }
   public function saveCourseAdmin()
   {
     if (isset($_POST['save_button'])) {
       return $this->updateCourseAdmin();
     }
   }

   private function updateCourseAdmin()
{
    $sql = "UPDATE courses
            SET courseTitle=:title,CourseDescription=:description,icon=:icon
            WHERE courseID=:cid";
    try
    {
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam(':title', $_POST['course_title'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $_POST['course_description'], PDO::PARAM_STR);
        $stmt->bindParam(':icon', $_POST['icon'], PDO::PARAM_STR);
        $stmt->bindParam(':cid', $_POST['course_ID'], PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> &iexcl;Éxito!</h4>
        Los nuevos datos del curso han sido guardados en la base de datos.
      </div>';
    } catch(PDOException $e) {
   return '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Error</h4>
        No se pudo introducir la nueva informaci&oacute;n del curso a la base de datos.
      </div>';
    }
}

}

?>
