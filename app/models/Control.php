<?php
require_once("BD.php");
header('Content-Type: text/html; charset=utf-8');


//CONSULTA QUE NOS ENTREGA LA CAPACIDAD ACTUAL DEL ESTANQUE P511
$porcentajeP511Sql="SELECT * FROM `detallemovimiento` WHERE tagEstanque='Nipacide P511 4%' ORDER BY `fecha` DESC LIMIT 1";
$porcentajeP511= mysqli_query($con,$porcentajeP511Sql);

//CONSULTA QUE NOS ENTREGA LA CAPACIDAD ACTUAL DEL ESTANQUE P840
$porcentajeP840Sql="SELECT * FROM `detallemovimiento` WHERE tagEstanque='Nipacide P840 0.5%' ORDER BY `fecha` DESC LIMIT 1";
$porcentajeP840=mysqli_query($con,$porcentajeP840Sql);

//CONSULTA QUE NOS ENTREGA LA CAPACIDAD ACTUAL DEL ESTANQUE P430
$porcentajeP430Sql="SELECT * FROM `detallemovimiento` WHERE tagEstanque='Nipacide P430 0.3%' ORDER BY `fecha` DESC LIMIT 1";
$porcentajeP430=mysqli_query($con,$porcentajeP430Sql);


// //CONSULTA QUE NOS ENTREGA EL ESTADO ACTUAL DE LA <BOMBA-P511>              
// $estadoBombaP511Sql="SELECT * FROM `registroengine` WHERE tagEngine='BOMBA-P511' ORDER BY `registroengine`.`fecha_inicio` DESC LIMIT 1;";
// $estadoBombaP511=mysqli_query($con, $estadoBombaP511Sql);

// //CONSULTA QUE NOS ENTREGA EL ESTADO ACTUAL DE LA <BOMBA-P840>
// $estadoBombaP840Sql="SELECT * FROM `registroengine` WHERE tagEngine='BOMBA-P840' ORDER BY `registroengine`.`fecha_inicio` DESC LIMIT 1";
// $estadoBombaP840=mysqli_query($con, $estadoBombaP840Sql);

// //CONSULTA QUE NOS ENTREGA EL ESTADO ACTUAL DE LA <BOMBA-P430>
// $estadoBombaP430Sql="SELECT * FROM `registroengine` WHERE tagEngine='BOMBA-P430' ORDER BY `registroengine`.`fecha_inicio` DESC LIMIT 1";
// $estadoBombaP430=mysqli_query($con, $estadoBombaP430Sql);


// //CONSULTA QUE NOS ENTREGA EL ESTADO ACTUAL DE LA BOMBA DE AWA
// $estadoBombaH20Sql="SELECT * FROM `registroengine` WHERE tagEngine='BOMBA-H20' ORDER BY `registroengine`.`fecha_inicio` DESC LIMIT 1";
// $estadoBombaH20=mysqli_query($con, $estadoBombaH20Sql);


//CONSULTA QUE NOS MOSTRARA EL NIVEL DE CONCENTRACION DE LA PISCINA Y TODO LO DEMAS
$nivelConcentracionSql="SELECT * FROM `alarma` ORDER BY `IdAlarma` DESC LIMIT 1";
$nivelConcentracion=mysqli_query($con, $nivelConcentracionSql);


//CONSULTA QUE NOS MUESTRA EL VALOR DE LA CONCENTRACION DE LA PISCINA
$valorConcentracionSql="SELECT concentracion  FROM `registrohistorico` ORDER BY `registrohistorico`.`fecha` DESC LIMIT 1;";
$valorConcentracion=mysqli_query($con, $valorConcentracionSql);



echo json_encode(array(
    'capacidadActualP511' =>  $porcentajeP511->fetch_assoc(),
    'capacidadActualP840' =>  $porcentajeP840->fetch_assoc(),
    'capacidadActualP430' =>  $porcentajeP430->fetch_assoc(),
    'alarma'              =>  $nivelConcentracion->fetch_assoc(),
    'valorConcentracion'  =>  $valorConcentracion->fetch_assoc()
));



?>