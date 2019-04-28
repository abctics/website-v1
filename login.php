<?php
$pageTitle = "Iniciar sesión";
include_once "includes/header.php";
?>
<div style="min-height:100vh;">
  <section style="margin-top:75px; width:100%;">
    <form class="" action="/login" method="post">
      <div class="" style="width:50%; margin:0 auto;border:1px solid #34b3a0;padding:10px;">
        <div class="">
          <label for="email">Email o usuario</label>
          <input type="email" id="email" class="form-control" name="email">
        </div>
        <div class="">
          <label for="inputPassword5">Password</label>
          <input type="password" id="inputPassword5" class="form-control" name="password">
        </div>
        <br>
        <div class="" style="width:80%;margin:0 auto;">
          <input type="submit" id="signup" class="form-control" name="signup" value="Iniciar sesión" style="background-color:#34b3a0;color:#ffffff;">
        </div>
      </div>
    </form>
  </section>
</div>
<?php include_once "includes/footer.php"; ?>
