<?php
$pageTitle = "Inicio";
include_once "includes/header.php";
include_once "managment/base.php";
?>
<div style="min-height:100vh;width:100%;">
    <section class="container-courses">
            <div class="courses">
              <?php
              include_once "classes/general.courses.php";
              $course = new Course($db);
              $getCourses = $course->getCourses();
              foreach ($getCourses as $key => $getCourse) {
                $getModulesAndTopics = $course->getModulesAndTopics($getCourse['courseID']);
                echo  '
                <div class="card list-courses">
                  <h3>'.$getCourse['courseTitle'].'</h3>
                  <img class="card-img-top" src="/img/'.$getCourse['icon'].'.png" alt="Imagen curso">
                  <div class="card-body">
                  <small>'.$getCourse['courseDescription'].'</small>
                  </div>
                  <a href="/course?id='.$getCourse['courseID'].'&moduleid='.$getModulesAndTopics['moduleID'].''.'&topicid='.$getModulesAndTopics['topicID'].'" class="btn">Ver detalle</a>
                </div>
                ';
              }
              ?>
          </div>
  </section>
</div>
<?php include_once "includes/footer.php";?>
