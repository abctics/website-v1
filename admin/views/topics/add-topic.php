<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/includes/header.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nuevo tema
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/index"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li><a href="#">Curso</a></li>
        <li><a href="#">Unidad</a></li>
        <li class="active">Nuevo tema</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
             <!--row-->
             <div class="row">

            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del tema</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" action="add-course.php" method="post" name="" id="">
                            <div class="form-group">
                                <label>Nombre del tema</label>
                                <input type="text" name="course_title" class="form-control" required
                                       placeholder="ej. Instalar xampp">
                            </div>
                            <div class="form-group">
                                <label>Curso</label>
                                <select class="form-control" name="icon" required>
                                    <option value="" disabled selected>Seleciona</option>
                                    <option value="reactjs">React js</option>
                                    <option value="php">PHP</option>
                                    <option value="css3">CSS3</option>
                                    <option value="html5">Html 5</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="maths">Jquery</option>
                                    <option value="other">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unidad</label>
                                <select class="form-control" name="icon" required>
                                    <option value="" disabled selected>Seleciona</option>
                                    <option value="reactjs">Introduccion a PHP</option>
                                    <option value="php">Conocimientos previos</option>
                                    <option value="other">Otro</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Contenido del tema</label>
                                <textarea id="editor1"></textarea>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Crear Tema</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/admin/includes/footer.php";?>