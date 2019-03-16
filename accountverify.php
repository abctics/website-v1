<?php
    include_once $_SERVER["DOCUMENT_ROOT"] . "/managment/base.php";
    if(!empty($_SESSION['AdminLoggedIn']) && !empty($_SESSION['AdminUsername']) && $_SESSION['AdminLoggedIn']==1){
        echo "<meta http-equiv='refresh' content='0;/admin'>";
        exit;
    }

    $pageTitle = 'Login';
  include_once "includes/header-login.php";
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AB</b>C</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar sesion</p>

    <form action="login.php" method="post">
    <?php
          if(!empty($_POST['username']) && !empty($_POST['password'])):
            include_once $_SERVER["DOCUMENT_ROOT"] .'/classes/class.admin.admins.php';
            $user = new User($db);
            if($admin->accountLogin()===TRUE):
                  if(empty($_POST['redir'])) {
                    echo "<meta http-equiv='refresh' content='0;/admin'>";
                    exit;
                  } else {
                    echo "<meta http-equiv='refresh' content='0;" . urldecode($_POST['redir']) . "'>";
                    exit;
                  }
            else:
      ?>
              <div class="callout callout-danger">
                    <h4><i class="icon fa fa-ban"></i> Error</h4>
                    No pudimos hacer log in con esos datos.
              </div>
      <?php
            endif;
          endif;
      ?>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">Olvidé mi contraseña</a><br>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="/admin/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/admin/js/bootstrap.min.js"></script>
</body>
</html>
