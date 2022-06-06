<?php
   require_once("../models/BD.php");
if(count($_POST) > 0)
{
    $data = '';
    
    // $usuario=strip_tags(@$_POST['usuario']);
    // $password=strip_tags(@$_POST['password']);
    $usuario=filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $password=filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password=md5($password);
    $data= true;
   // $usuarioprueba='luis';
    //$passwordprueba=1;

   
    $script = "select * from usuario where usuario= '".$usuario."' and contrasena= '".$password."'";
    $result= mysqli_query($con,$script);

	$row = mysqli_fetch_row($result);
	$usr= $row[1];
	$pass= $row[2];

    
    //$usr== $usuario && $pass == $password
    if($usuario==$usr && $password==$pass)
    {
      session_start();
        $_SESSION["administrador"]=$usuario;
       
    }
    else
    {
       $data=false;
   }
    
    
    echo $data;
}

?>
