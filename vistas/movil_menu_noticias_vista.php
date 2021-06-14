<?php
require_once('../vistas/pagina_inicio_vista.php');
require_once('../clases/Conexion.php');
require_once('../clases/funcion_visualizar.php');

if (permiso_ver('124') == '1') {

  $_SESSION['crear_noticia_vista'] = "...";
} else {
  $_SESSION['crear_noticia_vista'] = "No 
  tiene permisos para visualizar";
}
if (permiso_ver('125') == '1') {

  $_SESSION['gestion_noticias_vista'] = "...";
} else {
  $_SESSION['gestion_noticias_vista'] = "No 
  tiene permisos para visualizar";
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">



</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Administracion App </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                <li class="breadcrumb-item active">Noticias</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->



      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row" style=" display: flex; align-items: center; justify-content: center;">

            <div class="col-6 col-sm-6 col-md-4">
              <div class="small-box bg-light">
                <div class="inner">
                  <h4>Crear Noticia </h4>
                  <p><?php echo $_SESSION['crear_noticia_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>



            <div class="col-12 col-sm-6 col-md-4">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h4>Gestión Noticias </h4>
                  <p><?php echo $_SESSION['gestion_noticias_vista']; ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-newspaper"></i>
                </div>
                <a href="#" class="small-box-footer">
                  Ir <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>
          </div>
          <!--/. container-fluid -->
        </div>
      </section>
      <!-- /.content -->
    </div>

  </div>

</body>

</html>