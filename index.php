<?php include_once "includes/header.php"; ?>
<!-- Modal login-->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!--Content-->
    <div class="modal-content form-elegant">
      <!--Header-->
      <div class="modal-header text-center">
        <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Login</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <!--Body-->
        <form method="post" action="/index">
          <div class="modal-body mx-4">
            <!--Body-->
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="Form-email1">Usuario o correo electr&oacute;nico</label>
              <input type="email" id="Form-email1" class="form-control validate" required>
            </div>

            <div class="md-form pb-3">
              <label data-error="wrong" data-success="right" for="Form-pass1">Contraseña</label>
              <input type="password" id="Form-pass1" class="form-control validate">
              <p class="font-small blue-text d-flex justify-content-end">¿Olvidaste tu <a href="#" class="blue-text ml-1">
                  conttraseña?</a></p>
            </div>

            <div class="text-center mb-3">
              <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Iniciar sesi&oacute;n</button>
            </div>
            <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> O entrar con:</p>

            <div class="row my-3 d-flex justify-content-center">
              <!--Facebook-->
              <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i class="fab fa-facebook-f text-center"></i></button>
              <!--Google +-->
              <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i class="fab fa-google-plus-g"></i></button>
            </div>
          </div>
        </form>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal login-->
<!-- Modal signup-->
<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Registro</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post">
        <div class="modal-body mx-3">
        <div class="md-form mb-5">
           <label data-error="wrong" data-success="right" for="orangeForm-name">Tu nombre</label>
          <input type="text" id="orangeForm-name" class="form-control validate">
        </div>
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Correo</label>
          <input type="email" id="orangeForm-email" class="form-control validate" required>
        </div>
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Usuario</label>
          <input type="text" id="orangeForm-email" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Tu contraseña</label>
          <input type="password" id="orangeForm-pass" class="form-control validate">
        </div>
        <div class="md-form mb-4">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Repita contraseña</label>
          <input type="password" id="orangeForm-pass" class="form-control validate">
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange">Registrase</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal signup-->

<!--Modal contact-->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Cont&aacute;ctanos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="form34">Nombre</label>
          <input type="text" id="form34" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="form29">Correo electr&oacute;nico</label>
          <input type="email" id="form29" class="form-control validate">
        </div>

        <div class="md-form mb-5">
          <label data-error="wrong" data-success="right" for="form32">Asunto</label>
          <input type="text" id="form32" class="form-control validate">
        </div>

        <div class="md-form">
          <label data-error="wrong" data-success="right" for="form8">Mensaje</label>
          <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique">Enviar <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>
  </div>
</div>
<!--Modal contact-->
<div style="min-height:100vh;width:100vw;">
    <section class="main-content-index">
        <div class="main-content-courses">
         <a href="#">
           <div class="courses">
            <h4>Construye aprilcaciones front end desde cero</h4>
            <span>Aprende una nueva tecnología muy demandada en la actualidad</span>
           </div>
         </a>
        </div>
        <div class="main-content-others">
         <div class="fa-plugin-facebok">
            <div class="fb-page" data-href="https://www.facebook.com/abctics/" data-tabs="timeline" data-width="233" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/abctics/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/abctics/">ABC</a></blockquote>
            </div>
         </div>
        </div>
    </section>
</div>
<?php include_once "includes/footer.php";?>