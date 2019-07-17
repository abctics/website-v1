<?php
$pageTitle = "Registrarse";
include_once "includes/header.php";
?>
<div style="min-height:100vh;">
  <section style="margin-top:75px; width:100%;">
    <form class="" action="/signup" method="post">
      <div class="" style="width:50%; margin:0 auto;border:1px solid #34b3a0;padding:10px;">
        <div class="">
          <label for="name">Nombres</label>
          <input type="text" id="name" class="form-control" name="name">
        </div>
        <div class="">
          <label for="lastName">Apellidos</label>
          <input type="text" id="lastName" class="form-control" name="lastName">
        </div>
        <div class="">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" class="form-control" aria-describedby="emailHelpBlock" name="email" required>
          <small id="emailHelpBlock" class="form-text text-muted">
            Este email ya está en uso.
          </small>
        </div>
        <div class="">
          <label for="userName">Usuario</label>
          <input type="text" id="userName" class="form-control" aria-describedby="userNameHelpBlock" name="userName" required>
          <small id="userNameHelpBlock" class="form-text text-muted">
            Este usuario ya está en uso.
          </small>
        </div>
        <div class="">
          <label for="inputPassword5">Password</label>
          <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="password" required>
          <small id="passwordHelpBlock" class="form-text text-muted">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
          </small>
        </div>
        <div class="">
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
              <label class="form-check-label" for="invalidCheck2">
                Agree to terms and conditions
              </label>
            </div>
          </div>
        </div>
        <div class="" style="width:80%;margin:0 auto;">
          <input type="submit" id="signup" class="form-control" name="signup" value="Registrarse" style="background-color:#34b3a0;color:#ffffff;">
        </div>
      </div>
    </form>
  </section>
</div>
<?php include_once "includes/footer.php"; ?>
