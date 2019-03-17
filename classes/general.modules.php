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
  public function getModulesData($courseID)
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
              $ret=$ret . $this->formatModulesData($row,$count);
              $count=$count+1;
            }
            $stmt->closeCursor();
            echo $ret;
          }
  }
  private function formatModulesData($row,$count)
  {
    $moduleID=$row['moduleID'];
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
              '.$this->getModulesContent($moduleID).'
          </ul>
         </div>
      </div>
    </div>
    ';
    return $base;
  }
  public function getModulesContent($moduleID)
  {
    $sql="SELECT * FROM topics
          WHERE moduleID=:mid";
          if($stmt=$this->_db->prepare($sql)){
            $stmt->bindParam(':mid', $moduleID, PDO::PARAM_STR);
            $stmt->execute();
            $count=1;
            $ret='';
            $rows=$stmt->fetchAll();
            foreach ($rows as $row) {
              $ret=$ret . $this->formatModulesContent($row,$count);
              $count=$count+1;
            }
            return $ret;
            $stmt->closeCursor();

          }
    }
    private function formatModulesContent($row,$count)
    {
      $base='
      <li class="list-group-item"><span hidden>'.$row['topicID'].'</span><a href="#">'.$row['topicTitle'].'</a></li>
      ';
      return $base;
    }

}
?>
