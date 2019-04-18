<?php

/**
 * Handles course interactions within the app
 *
 * PHP version 7
 *
 * @author Alexander Benavides
 *
 */
class Module
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
    public function getCoursesAdmin()
    {
      $sql="SELECT* FROM courses";
      if($stmt=$this->_db->prepare($sql)){
        $stmt->execute();
        $rows=$stmt->fetchAll();
        foreach ($rows as $row) {
          echo $this->formatCoursesAdmin($row);
        }
        $stmt->closeCursor();

      }
    }
    private function formatCoursesAdmin($row){
      $base='
      <option value="'.$row['courseID'].'">'.$row['courseTitle'].'</option>
      ';
      return $base;
    }
    public function addModuleAdmin()
    {
      $courseID=$_POST['course_ID'];
      $position=0;
      //Select Max position module
      $sql="SELECT MAX(position) AS maxPosition FROM modules WHERE courseID=:cid";
      if($stmt=$this->_db->prepare($sql)){
        $stmt->bindParam(':cid', $courseID, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->fetch();
        $position=$row['maxPosition'];
        $stmt->closeCursor();
      }
      $position=$position+1;

      // Create module
      $sql = "INSERT INTO modules (moduleTitle, CourseID, position)
              VALUES (:title, :cid, :pos)";
      if($stmt=$this->_db->prepare($sql)){
        $stmt->bindParam(':title', $_POST['module_title'], PDO::PARAM_STR);
        $stmt->bindParam(':cid', $courseID, PDO::PARAM_STR);
        $stmt->bindParam(':pos', $position, PDO::PARAM_STR);
        $stmt->execute();
        $lastID=$this->_db->lastInsertId();
        $stmt->closeCursor();
        return '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> &iexcl;Éxito!</h4>
        Se ha creado el m&oacute;dulo <a href="module.php?id='.$lastID.'">'.$_POST['module_title'].'</a>
      </div>';
    } else {
        return '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-ban"></i> Error</h4>
      No se pudo introducir la nueva informaci&oacute;n del m&oacute;dulo a la base de datos.
    </div>';
    }
  }
  public function getModulesData($courseID, $countMid = 0)
  {
    $sql="SELECT * FROM modules
          WHERE courseID=:cid";
          if($stmt=$this->_db->prepare($sql)){
            $stmt->bindParam(':cid', $courseID, PDO::PARAM_STR);
            $stmt->execute();
            $count=1;
            $ret = '';
            $rows=$stmt->fetchAll();
            foreach ($rows as $row) {
              if($countMid != 0 && $countMid == intval($row['moduleID'])){
                  $ret = $ret . $this->formatModulesData($row, $count, true);
              } else {
                  $ret = $ret . $this->formatModulesData($row, $count);
              }
              $count=$count+1;

            }
            $stmt->closeCursor();
            return $ret;
        }
  }
  private function formatModulesData($row,$count,$toggle = false)
  {
    if (!$toggle) {
      $base='
      <div class="card">
        <div class="card-header" id="headingTwo">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo'.$count.'" aria-expanded="false" aria-controls="collapseTwo">
              '.$row['moduleTitle'].'
            </button>
          </h5>
        </div>
        <div id="collapseTwo'.$count.'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
          <div class="card-body">
            <ul class="list-group list-group-flush">
                '.$this->getModulesContent($row['moduleID']).'
            </ul>
           </div>
        </div>
      </div>
      ';
    }else {
      $base = '<div class="card" id="module_id_'.$row['moduleID'].'">
                  <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                      <button class="btn btn-link " data-toggle="collapse" data-target="#collapseTwo'.$count.'" aria-expanded="true" aria-controls="collapseTwo">
                        '.$row['moduleTitle'].'
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo'.$count.'" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                          '.$this->getModulesContent($row['moduleID'],$_GET['topicid']).'
                      </ul>
                     </div>
                  </div>
            </div>
      ';
    }
    return $base;
  }
  public function getModulesContent($moduleID,$countTid = 0)
  {
    $sql="SELECT topicID,topicTitle,topicContent,modules.courseID,modules.moduleID FROM topics,modules,courses
          WHERE topics.moduleID = modules.moduleID
          AND modules.courseID = courses.courseID
          AND modules.moduleID=:mid";
          if($stmt=$this->_db->prepare($sql)){
            $stmt->bindParam(':mid', $moduleID, PDO::PARAM_STR);
            $stmt->execute();
            $count=1;
            $ret='';
            $rows=$stmt->fetchAll();
            foreach ($rows as $row) {
              if ($countTid != 0 && $countTid == intval($row['topicID'])) {
                $ret = $ret . $this->formatModulesContent($row,$count, true);
              }else {
                $ret = $ret . $this->formatModulesContent($row,$count);
                $ret = $ret;
              }
              $count = $count+1;
            }
            return $ret;
            $stmt->closeCursor();

          }
    }
    private function formatModulesContent($row,$count,$toggle = false)
    {
      if (!$toggle) {
        $base='
        <li class="list-group-item"><a href="/course?id='.$row['courseID'].'&moduleid='.$row['moduleID'].'&topicid='.$row['topicID'].'">'.$row['topicTitle'].'</a></li>
        ';
      }else {
        $base='
        <li id="topic_id_'.$row['topicID'].'" class="list-group-item" style="background-color:#204056;"><a href="/course?id='.$row['courseID'].'&moduleid='.$row['moduleID'].'&topicid='.$row['topicID'].'" style="color:#ffffff;">'.$row['topicTitle'].'</a></li>
        ';
      }

      return $base;
    }

    //Get coursesList
    public function getModulesListAdmin()
    {
      $sql="SELECT courseTitle,moduleID,moduleTitle,modules.published
            FROM modules,courses
            WHERE modules.courseID=courses.CourseID";
      try {
        $stmt = $this->_db->prepare($sql);
        $stmt->execute();
        while ($row=$stmt->fetch()) {
          echo $this->formatModulesListAdmin($row);
        }
        $stmt->closeCursor();

      } catch (PDOException $e) {

      }

    }
    private function formatModulesListAdmin($row)
    {
      $status=$row['published'];
      if ($status==0) {
        $status='<button type="button" class="btn btn-warning">No publicado</button>';
      }else {
        $status='<button type="button" class="btn btn-success">Publicado</button>';
      }
      $base='
      <tr>
      <th scope="row"><a href="module?id='.$row['moduleID'].'" class="text-danger">'.$row['moduleID'].'</a></th>
        <td>'.$row['moduleTitle'].'</td>
        <td>'.$row['courseTitle'].'</td>
        <td>'.$status.'</td>
      </tr>
      ';
      return $base;
    }

    public function getModuleContentAdmin($moduleID)
    {
      $sql="SELECT courses.courseID,courseTitle,moduleID,moduleTitle
            FROM modules,courses
           WHERE courses.courseID=modules.courseID
           AND moduleID=:mid";
      try {
        $stmt=$this->_db->prepare($sql);
        $stmt->bindParam(':mid', $moduleID, PDO::PARAM_STR);
        $stmt->execute();
        $row=$stmt->fetch();
        return $row;
        $stmt->closeCursor();
      } catch (PDOException $e) {

      }

    }
    public function saveModuleAdmin()
    {
      if (isset($_POST['save_button'])) {
        return $this->updateModuleAdmin();
      }
    }

    private function updateModuleAdmin()
 {
     $sql = "UPDATE modules
             SET moduleTitle=:title,courseID=:cid
             WHERE moduleID=:mid";
     try
     {
         $stmt = $this->_db->prepare($sql);
         $stmt->bindParam(':title', $_POST['module_title'], PDO::PARAM_STR);
         $stmt->bindParam(':cid', $_POST['course_ID'], PDO::PARAM_INT);
         $stmt->bindParam(':mid', $_POST['module_ID'], PDO::PARAM_INT);
         $stmt->execute();
         $stmt->closeCursor();
         return '<div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-check"></i> &iexcl;Éxito!</h4>
         Los nuevos datos del m&oacute;dulo han sido guardados en la base de datos.
       </div>';
     } catch(PDOException $e) {
    return '<div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-ban"></i> Error</h4>
         No se pudo introducir la nueva informaci&oacute;n del m&oacute;dulo a la base de datos.
       </div>';
     }
 }
}
?>
