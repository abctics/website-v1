<?php
$pageTitle = "Inicio";
include_once "managment/base.php";
if (!empty($_SESSION['studentLoggedIn']) && !empty($_SESSION['studentUsername']) && $_SESSION['studentLoggedIn'] == 1) {
  include_once $_SERVER["DOCUMENT_ROOT"] . "/managment/sessionmanager-main.php";
}
include_once "classes/general.courses.php";
$course = new Course($db);
$getCoursesArray = $course->getCourses();
$getCoursesByStudent = $course->getCoursesByStudent();
include_once "includes/header.php";
?>
<div style="min-height:100vh;width:100%;">
<?php if (!empty($_SESSION['studentLoggedIn'])): ?>
  <section class="container-courses">
    <h3 style="text-align:center;margin:0 auto;margin-top:80px;">Mis cursos</h3>
          <div class="courses">
            <?php
            foreach ($getCoursesByStudent as $key => $getCourse) {
              $getModulesAndTopics = $course->getModulesAndTopics($getCourse->courseID);
              ?>
              <div class="card list-courses">
                <h3><?php echo $getCourse->courseTitle;?></h3>
                <img class="card-img-top" src="/img/<?php echo $getCourse->icon;?>.png" alt="Imagen curso">
                <div class="card-body">
                <small><?php echo $getCourse->courseDescription;?></small>
                </div>
                <a href="/course?id=<?php echo $getCourse->courseID;?>&moduleid=<?php echo $getModulesAndTopics[0]->moduleID;?>&topicid=<?php echo $getModulesAndTopics[0]->topicID;?>" class="btn">Ir al curso</a>
              </div>
          <?php  }
            ?>
        </div>
</section>
<?php endif; ?>
  <section class="container-courses">
    <h3 style="text-align:center;margin:0 auto;">Otros cursos</h3>
          <div class="courses">
            <?php
            foreach ($getCoursesArray as $key => $getCourse) {?>
              <div class="card list-courses">
                <h3><?php echo $getCourse->courseTitle;?></h3>
                <img class="card-img-top" src="/img/<?php echo $getCourse->icon;?>.png" alt="Imagen curso">
                <div class="card-body">
                <small><?php echo $getCourse->courseDescription;?></small>
                </div>
                <?php
                $getModulesAndTopics = $course->getModulesAndTopics($getCourse->courseID);
                foreach ($getModulesAndTopics as $key => $getCourseDetails):
              ?>
              <a href="/course?id=<?php echo $getCourse->courseID;?>&moduleid=<?php echo $getCourseDetails->moduleID;?>&topicid=<?php echo $getCourseDetails->topicID;?>" class="btn">Ver detalle</a>
                <?php endforeach; ?>
              </div>
          <?php }?>
        </div>
</section>
</div>
<?php include_once "includes/footer.php";?>
