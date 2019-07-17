<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/managment/base.php";

    if(!empty($_SESSION['studentLoggedIn']) && !empty($_SESSION['studentUsername']) && $_SESSION['studentLoggedIn']==1){
        echo "<meta http-equiv='refresh' content='0;/".$_GET['redir']."'>";
        exit;
    }

    $pageTitle = 'Login';
    include_once "includes/header.php";
?>
<div style="min-height:100vh;">
  <section style="margin-top:75px; width:100%;">
    <form class="" action="/login" method="post">
      <div class="" style="width:50%; margin:0 auto;border:1px solid #34b3a0;padding:10px;">
        <div class="">
          <?php
          if(isset($_GET['redir'])) {
            echo '<div class="callout callout-info">
            <h4><i class="icon fa fa-ban"></i> Permiso requerido</h4>
            Debes iniciar sesión antes de acceder a esta página.
            </div>
            <input type="text" hidden name="redir" value="' . $_GET['redir'] . '">';
          } else if (isset($_POST['redir'])) {
            echo '<input type="text" hidden name="redir" value="' . $_POST['redir'] . '">';
          } else if(isset($_GET['logout'])) {
            echo '<div class="callout callout-info">
            <h4><i class="icon fa fa-check"></i> Log out</h4>
            Se ha cerrado tu sesión
            </div>';
          }

          if(!empty($_POST['username']) && !empty($_POST['password'])):
            include_once $_SERVER["DOCUMENT_ROOT"] .'/classes/class.admin.admins.php';
            $admin = new Admin($db);
            if($admin->accountLoginStudent()===TRUE):
              if(empty($_POST['redir'])) {
                echo "<meta http-equiv='refresh' content='0;/index'>";
                exit;
              } else {
                echo "<meta http-equiv='refresh' content='0;" . urldecode($_POST['redir']) . "'>";
                exit;
              }
            else:
              ?>
              <div class="callout callout-danger">
                <h4><i class="icon fa fa-ban"></i> Error</h4>
                No pudimos iniciar sesión con esos datos.
              </div>
              <?php
            endif;
          endif;
          ?>
        </div>
        <div class="">
          <label for="email">Email o usuario</label>
          <input type="email" id="email" class="form-control" name="username">
        </div>
        <div class="">
          <label for="inputPassword5">Password</label>
          <input type="password" id="inputPassword5" class="form-control" name="password">
        </div>
        <br>
        <div class="" style="width:80%;margin:0 auto;">
          <input type="submit" id="signup" class="form-control" name="signup" value="Iniciar sesión" style="background-color:#34b3a0;color:#ffffff;">
        </div>
        <br>
        <div class="">
          <label for="createAccount" style="text-align:center;">¿Todavía no tienes una cuenta? <a href="/signup" id="createAccount">Regístrate</a> y aprende de manera gratuita.</label>
        </div>
      </div>
    </form>
  </section>
</div>
<?php include_once "includes/footer.php"; ?>
