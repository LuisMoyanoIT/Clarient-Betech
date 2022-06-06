<?php
//header("Location:pantallaControl.php");
session_start();
if(isset($_SESSION["administrador"]))
{  

    
    
    
    require_once("../views/historico.php");

}
else
{
    header("Location:../views/login.html");
}



?>