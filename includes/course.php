<?php include_once "managment/base.php"; ?>
<div class="" style="width:100%;min-height:100vh;">
  <section class="section-container">
    <div id="accordion" class="accordion" style="width:20%;">
      <?php
      include_once "classes/general.modules.php";
      $module = new Module($db);
      if(isset($_GET['moduleid'])){
          echo $module->getModulesData($_GET['id'], $_GET['moduleid']);
      } else {
          echo $module->getModulesData($_GET['id']);
      }
       ?>
    </div>
    <div class="topic-container" style="width:80%;padding:20px;">
      <?php
      include_once "classes/general.topics.php";
      $topic = new Topic($db);
      if (isset($_GET['topicid'])) {
        // code...
        echo $topic -> getTopic($_GET['topicid']);
      }
       ?>
    </div>
  </section>
</div>
