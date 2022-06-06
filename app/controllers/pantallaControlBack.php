<?php
//header("Location:pantallaControl.php");
session_start();
if(isset($_SESSION["administrador"]))
{  

    
    
    
    require_once("../views/pantallaControl.php");

}
else
{
    header("Location:../views/login.html");
}



?>