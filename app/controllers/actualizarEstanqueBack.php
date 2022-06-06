<?php
require_once("../models/BD.php");
date_default_timezone_set("America/Santiago");
session_start();
if(isset($_SESSION["administrador"]))
{  
   //CONSULTA QUE NOS MOSTRARA LA ULTIMA FECHA DE INGRESO PARA EL ESTANQUE P511
   $fechaUltimaActuP511Sql="SELECT fecha FROM `detallemovimiento` where tipo='INGRESO' and tagEstanque='Nipacide P511 4%' ORDER BY `fecha` DESC LIMIT 1";
   $fechaUltimaActuP511=mysqli_query($con, $fechaUltimaActuP511Sql);
   $fechaP511Row=mysqli_fetch_row($fechaUltimaActuP511);


   //CONSULTA QUE NOS MOSTRARA LA ULTIMA FECHA DE INGRESO PARA EL ESTANQUE P840
   $fechaUltimaActuP840Sql="SELECT fecha FROM `detallemovimiento` where tipo='INGRESO' and tagEstanque='Nipacide P840 0.5%' ORDER BY `fecha` DESC LIMIT 1";
   $fechaUltimaActuP840=mysqli_query($con, $fechaUltimaActuP840Sql);
   $fechaP840Row=mysqli_fetch_row($fechaUltimaActuP840);


   //CONSULTA QUE NOS MOSTRARA LA ULTIMA FECHA DE INGRESO PARA EL ESTANQUE P430
   $fechaUltimaActuP430Sql="SELECT fecha FROM `detallemovimiento` where tipo='INGRESO' and tagEstanque='Nipacide P430 0.3%' ORDER BY `fecha` DESC LIMIT 1";
   $fechaUltimaActuP430=mysqli_query($con, $fechaUltimaActuP430Sql);
   $fechaP430Row=mysqli_fetch_row($fechaUltimaActuP430);


   //CONSULTA QUE NOS MOSTRARA VOLUMEN ACTUAL Y ESTADO DE ESTANQUE P511
   $datosEstanqueP511Sql="SELECT capacidadActual , estadoEstanque FROM `detallemovimiento` WHERE tagEstanque='Nipacide P511 4%' ORDER BY `fecha` DESC LIMIT 1";
   $datosEstanqueP511=mysqli_query($con, $datosEstanqueP511Sql);
   $datosEstanqueP511Row=mysqli_fetch_row($datosEstanqueP511);

   if($datosEstanqueP511Row[1] == 1)
   {
       $estadoP511='Operativo';
   }else
   {
       $estadoP511='Desactivado';
   }


   //CONSULTA QUE NOS MOSTRARA VOLUMEN ACTUAL Y ESTADO ESTANQUE P840
   $datosEstanqueP840Sql="SELECT capacidadActual , estadoEstanque FROM `detallemovimiento` WHERE tagEstanque='Nipacide P840 0.5%' ORDER BY `fecha` DESC LIMIT 1";
   $datosEstanqueP840=mysqli_query($con, $datosEstanqueP840Sql);
   $datosEstanqueP840Row=mysqli_fetch_row($datosEstanqueP840);

   if($datosEstanqueP840Row[1] == 1)
   {
       $estadoP840='Operativo';
   }else
   {
       $estadoP840='Desactivado';
   }


    //CONSULTA QUE NOS MOSTRARA VOLUMEN ACTUAL Y ESTADO ESTANQUE P430
    $datosEstanqueP430Sql="SELECT capacidadActual , estadoEstanque FROM `detallemovimiento` WHERE tagEstanque='Nipacide P430 0.3%' ORDER BY `fecha` DESC LIMIT 1";
    $datosEstanqueP430=mysqli_query($con, $datosEstanqueP430Sql);
    $datosEstanqueP430Row=mysqli_fetch_row($datosEstanqueP430);
 
    if($datosEstanqueP430Row[1] == 1)
    {
        $estadoP430='Operativo';
    }else
    {
        $estadoP430='Desactivado';
    }
 
 





    
    
    
    require_once("../views/actualizarEstanque.php");

}
else
{
    header("Location:../views/login.html");
}



?>