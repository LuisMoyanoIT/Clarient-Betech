<?php
   require_once("../models/BD.php");
   date_default_timezone_set("America/Santiago");
   $fecha_registro = date("Y-m-d H:i:s");
   if(count($_POST) > 0)
   {
       $data = '';
       
       $volumenP511=filter_input(INPUT_POST, 'volumenP511', FILTER_SANITIZE_STRING);
    //    $fechaP511=filter_input(INPUT_POST, 'fechaP511', FILTER_SANITIZE_STRING);
       $volumenP840=filter_input(INPUT_POST, 'volumenP840', FILTER_SANITIZE_STRING);
       $volumenP430=filter_input(INPUT_POST, 'volumenP430', FILTER_SANITIZE_STRING);       
       $data= true;
       if($volumenP511 != null)
       {
       //INSERCION EN DETALLE MOVIMIENTO P511
       $detalleMovimientoP511Sql="INSERT INTO `detallemovimiento`
        (`idDetalleEstanque`, `fecha`, `valor`, `tipo`, `idUnidadMedida`, `tagEstanque`, `estadoEstanque`, `capacidadActual`) VALUES (NULL, '". $fecha_registro."', '1', 'INGRESO', '1', 'Nipacide P511 4%', '1', '".  $volumenP511 ."');";
       $detalleMovimientoP511=mysqli_query($con, $detalleMovimientoP511Sql);
       }

       if($volumenP840 != null)
       {
        $detalleMovimientoP840Sql="INSERT INTO `detallemovimiento`
        (`idDetalleEstanque`, `fecha`, `valor`, `tipo`, `idUnidadMedida`, `tagEstanque`, `estadoEstanque`, `capacidadActual`) VALUES (NULL, '". $fecha_registro."', '1', 'INGRESO', '1', 'Nipacide P840 0.5%', '1', '".  $volumenP840 ."');";
        $detalleMovimientoP840=mysqli_query($con, $detalleMovimientoP840Sql);

       }

       if($volumenP430 != null)
       {
        $detalleMovimientoP430Sql="INSERT INTO `detallemovimiento`
        (`idDetalleEstanque`, `fecha`, `valor`, `tipo`, `idUnidadMedida`, `tagEstanque`, `estadoEstanque`, `capacidadActual`) VALUES (NULL, '". $fecha_registro."', '1', 'INGRESO', '1', 'Nipacide P430 0.3%', '1', '".  $volumenP430 ."');";
        $detalleMovimientoP430=mysqli_query($con, $detalleMovimientoP430Sql);

       }
      
   
       
     
       
       
       echo $data;
   }
  





?>