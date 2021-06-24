<?php
 session_start();

 require_once ('../clases/Conexion.php');
 require_once ('../clases/funcion_bitacora.php'); 

        $Id_objeto=125; 

  
	$nombre=strtoupper ($_POST['nombre']);
	$descripcion=strtoupper ($_POST['descripcion']);
	$creadopor=strtoupper ($_POST['creado por']);
  $fechadecreacion=strtoupper ($_POST['fecha de creacion']);

///Logica para el que se repite
 $sqlexiste=("select count(nombre) as nombre  from tbl_movil_segmentos where nombre='$nombre'");
 //Obtener la fila del query
$existe = mysqli_fetch_assoc($mysqli->query($sqlexiste));



/* Logica para que no acepte campos vacios */
if ($_POST['nombre']  <>' ' and  $_POST['descripcion'] <> ''and  $_POST['creado por'] <> '' and  $_POST['fecha de creacion']<> '' )
{

 
  /* Condicion para que no se repita el rol*/
    if ($existe['nombre']==1)
    {
   /*   require"../contenidos/crearRol-view.php";
 	header('location: ../contenidos/crearRol-view.php?msj=1'); */
    echo '<script type="text/javascript">
                    swal({
                       title:"",
                       text:"Lo sentimos el SEGMENTO ya existe",
                       type: "error",
                       showConfirmButton: false,
                       timer: 3000
                    });
                </script>';
    }
    else
    {
        /* Condicion para el checkbox si esta activo o no*/
		if (isset($_POST['txt_checkboxactivo']) && $_POST['txt_checkboxactivo'] == 'true') 
	    {
	    $var=1;
	    }
	    else
	    {
	    $var=0;
	    } 
    



    			/* Query para que haga el insert*/
				$sql = "call proc_insertar_segmento('$nombre','$descripcion','$creadopor','$fechadecreacion','$_SESSION[usuario]')";
				$resultado = $mysqli->query($sql);
 

	        if($resultado === TRUE) 
          {
                    bitacora::evento_bitacora($Id_objeto, $_SESSION['id_usuario'],'INSERTO' , 'EL SEGMENTO '.$nombre.'');

         /*   require"../contenidos/crearRol-view.php"; 
    		header('location: ../contenidos/crearRol-view.php?msj=2');*/
         echo '<script type="text/javascript">
                              swal({
                                   title:"",
                                   text:"Los datos  se almacenaron correctamente",
                                   type: "success",
                                   showConfirmButton: false,
                                   timer: 3000
                                });
                                $(".FormularioAjax")[0].reset();
                            </script>'; 
			} 
			else 
			{
    		echo "Error: " . $sql ;
			}

    }


} 

else
{
  echo '<script type="text/javascript">
                                    swal({
                                       title:"",
                                       text:"Lo sentimos tiene campos por rellenar",
                                       type: "error",
                                       showConfirmButton: false,
                                       timer: 3000
                                    });
                                </script>';
}


?>