<?php
require_once("BD.php"); 

if(count($_POST > 0 ))
{
    $IdAlarma=filter_input(INPUT_POST, 'IdAlarm', FILTER_SANITIZE_STRING);
    $InsercionP511=filter_input(INPUT_POST, 'confirmarP511', FILTER_SANITIZE_STRING);
    $InsercionP840=filter_input(INPUT_POST, 'confirmarP840', FILTER_SANITIZE_STRING);
    $InsercionP430=filter_input(INPUT_POST, 'confirmarP430', FILTER_SANITIZE_STRING);
    $nivelP511=filter_input(INPUT_POST, 'nivelP511', FILTER_SANITIZE_STRING);
    $nivelP840=filter_input(INPUT_POST, 'nivelP840', FILTER_SANITIZE_STRING);
    $nivelP430=filter_input(INPUT_POST, 'nivelP430', FILTER_SANITIZE_STRING);

    if($IdAlarma != null && $InsercionP511 == 1)
    {
        $UpdateSensorP511Sql="UPDATE `alarma` SET `sensorP511` = '0' WHERE `alarma`.`IdAlarma` = ". $IdAlarma .";";
        $UpdateSensorP511=mysqli_query($con, $UpdateSensorP511Sql);
        
    }

    if($IdAlarma != null && $InsercionP840 == 1)
    {
        $UpdateSensorP840Sql="UPDATE `alarma` SET `sensorP840` = '0' WHERE `alarma`.`IdAlarma` = ". $IdAlarma .";";
        $UpdateSensorP840=mysqli_query($con, $UpdateSensorP840Sql);
        
    }

    if($IdAlarma != null && $InsercionP430 == 1)
    {
        $UpdateSensorP430Sql="UPDATE `alarma` SET `sensorP430` = '0' WHERE `alarma`.`IdAlarma` = ". $IdAlarma .";";
        $UpdateSensorP430=mysqli_query($con, $UpdateSensorP430Sql);
        
    }

    if($IdAlarma != null && $nivelP511 == 1)
    {
        $UpdateNivelP511Sql="UPDATE `alarma` SET `nivelP511` = '0' WHERE `alarma`.`IdAlarma` = ". $IdAlarma ." ;";
        $UpdateNivelP511=mysqli_query($con, $UpdateNivelP511Sql);
    }

    if($IdAlarma != null && $nivelP840 == 1)
    {
        $UpdateNivelP840Sql="UPDATE `alarma` SET `nivelP840` = '0' WHERE `alarma`.`IdAlarma` = ". $IdAlarma ." ;";
        $UpdateNivelP840=mysqli_query($con, $UpdateNivelP840Sql);
    }

    if($IdAlarma != null && $nivelP430 == 1)
    {
        $UpdateNivelP430Sql="UPDATE `alarma` SET `nivelP430` = '0' WHERE `alarma`.`IdAlarma` = ". $IdAlarma ." ;";
        $UpdateNivelP430=mysqli_query($con, $UpdateNivelP430Sql);
    }

    









}



?>