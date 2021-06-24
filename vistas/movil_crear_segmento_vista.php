<?php

ob_start();


  session_start();

require_once ('../vistas/pagina_inicio_vista.php');
require_once ('../clases/Conexion.php');
require_once ('../clases/funcion_bitacora.php');
require_once ('../clases/funcion_visualizar.php');
require_once ('../clases/funcion_permisos.php');


 $Id_objeto=125;
        
  bitacora::evento_bitacora($Id_objeto, $_SESSION['id_usuario'],'Ingreso' , 'A Crear Segmentos');

 $visualizacion= permiso_ver($Id_objeto);



if ($visualizacion==0)
 {
     echo '<script type="text/javascript">
                              swal({
                                   title:"",
                                   text:"Lo sentimos no tiene permiso de visualizar la pantalla",
                                   type: "error",
                                   showConfirmButton: false,
                                   timer: 3000
                                });
                           window.location = "../vistas/menu_usuarios_vista.php";

                            </script>';
 // header('location:  ../vistas/menu_usuarios_vista.php');
}

else

{
       


if (permisos::permiso_insertar($Id_objeto)=='1')
 {
  $_SESSION['btn_guardar_segmentos']="";
}
else
{
    $_SESSION['btn_guardar_segmentos']="disabled";
 }

}

ob_end_flush();


?>


<!DOCTYPE html>
<html>
<head>
  <title></title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script type="text/javascript">
</script>

 
</head>
<body >


    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo Segmento</h1>
          </div>

         

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../vistas/pagina_principal_vista.php">Inicio</a></li>
              <li class="breadcrumb-item active"><a href="../vistas/movil_menu_segmentos_vista.php">Segmentos</a></li>
            </ol>
          </div>

            <div class="RespuestaAjax"></div>
   
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="container-fluid">
  <!-- pantalla 1 -->
      
<form action="../Controlador/guardar_segmento_controlador.php" method="post"  data-form="save" autocomplete="off" class="FormularioAjax">

 <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Crear Nuevo Segmento</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>

     
          <tbody>
    <tr>

     
    </tr>
  </tbody>  


          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                  <label> Nombre del segmento</label>
                    <input autofocus class="form-control" type="text"  maxlength="60" id="nombre" name="nombre"  value="" required style="text-transform: uppercase"   onkeypress="return Letras(event)" onkeyup="DobleEspacio(this, event)" onkeypress="return comprobar(this.value, event, this.id)">
                </div>

               


                  <div class="form-group">
                  <label>Descripción</label>
                    <input class="form-control" type="text" id="descripcion" name="descripcion"  value="" required style="text-transform: uppercase" onkeyup="Espacio(this, event)"  onkeypress="return Letras(event)" onkeypress="return comprobar(this.value, event, this.id)"  maxlength="30">
                </div>

                <div class="form-group">
                  <label>Creado Por</label>
                    <input class="form-control" type="text" id="creado por" name="creado por"  value="" required style="text-transform: uppercase" onkeyup="Espacio(this, event)"  onkeypress="return Letras(event)" onkeypress="return comprobar(this.value, event, this.id)"  maxlength="30">
                </div>
                <label>Fecha de Creación</label>
                    <input class="form-control" type="date" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" id="fecha de creacion " name="fecha de creacion" >
                  </div>
                  </div>

  
              <p class="text-center" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary" id="btn_guardar_segmentos" name="btn_guardar_segmentos">  <?php echo $_SESSION['btn_guardar_segmentos']; ?><i class="zmdi zmdi-floppy"></i>Guardar</button>
              </p>

              </div>
            </div>
          </div>



          <!-- /.card-body -->
          <div class="card-footer">
            
          </div>
        </div>
         
         
    
    <div class="RespuestaAjax"></div>
</form>

  </div>
</section>


</div>


  

</body>
</html>


