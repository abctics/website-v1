<?php include_once "includes/header.php"; ?>
<?php include_once "managment/base.php"; ?>
<div style="min-height:100vh;width:100vw;">
    <section class="container-courses">
            <div class="courses">
              <?php
              include_once "classes/general.courses.php";
              $course=new Course($db);
              $course->getCourses()
              ?>
          </div>
  </section>
</div>
<?php include_once "includes/footer.php";?>
