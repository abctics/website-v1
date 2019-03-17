<?php include_once "includes/header.php"; ?>
<?php include_once "managment/base.php"; ?>
<div class="" style="width:100%;min-height:100vh;">
  <section style="display:flex;flex-direction:row;width:96%;margin:auto;margin-top:20px;">
    <div id="accordion" style="width:20%;">
      <?php
      include_once "classes/general.modules.php";
      $module=new Module($db);
      $module->getModulesData($_GET['id']);
       ?>
    </div>
    <div class="" style="width:80%;padding:20px;">
      <div class="tittle-content">
      </div>
      <div class="topic-content">
      </div>
    </div>
  </section>
</div>
<?php include_once "includes/footer.php";?>
