<?php 

if(!isset($_SESSION['administrador'])): 
header("location: login.html");
?>
<?php endif; ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
    <title>Betech.cl</title>
    <link rel="icon" type="image/png" href="../../img/b-logo2.png"/>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
 
    
  </head>
  <body>
    <div class="container"> <!--DIV DEL CONTENEDOR-->
    <!-- COMIENZO NAVBAR--->
    <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top" style="height:7.9%;">
       
        <!-- LOGO 
       <a class="navbar-brand">
      
       <img  src="img/logo.png">
        </a>
       --->
    
    <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu" style="display:flex; height:90%;">
      <ul class="navbar-nav ml-auto" style=" position: absolute; right:0; align-items:center;">
        <li class="nav-item active mr-4"style="margin-right:10px;">
          <a href="pantallaControlBack.php" class="nav-link"><b>CONTROL</b></a>
        </li>
        <li class="nav-item active mr-4"style="margin-right:10px;">
         <a href="../controllers/historicoController.php" class="nav-link"><b>HISTORICO</b></a>
        </li>
        <li class="nav-item active mr-4"style="margin-right:10px;">
         <a href="../controllers/actualizarEstanqueBack.php" class="nav-link"><b>ACTUALIZAR ESTANQUE</b></a>
        </li>
        <li class="nav-item active mr-4"style="margin-right:15px;">
         <a href="../controllers/logout.php" class="nav-link" ><b>SALIR</b></a>
       </li>
       
      </ul>
      <ul class="navbar-nav mr-auto">
           <li class="nav-item active mr-4">
             <a href="#" class="nav-link"><b><?php echo( $_SESSION['administrador']) ?></b></a>
           </li>
           
    </ul>
      
    </div>

  </nav>
  
    <!--FIN NAVBAR--->
    <div class="row square"> <!--square-->
    
    
    <!--INICIO COLUMNA 1-->
    <div class="col-4"  >
        <div class="col-4 column0-0" style="height:33%; background-color:white; width: 100%;">
            <div class="row" style="height:100%;">
                <div class="col-sm-8" style="height:100%;">
                    <!---INICIO ESTANQUE Y PORCENTAJE P511-->
                    <div class="row" style="height:100%;">
                        <div class="col-sm-4" style="width:60%;">
                            <input type="text" id="capacidadAP511" value=""   readonly >

                        </div>
                        <div class="col-sm-8 estanque" style="height:80%;">
                            <div class="contenedor_porcentaje">
                                <div class="row" style="height:100%; ">
                                    
                                    <div class="col-sm" >
                                        <div class="progress" style="height:100%; display:flex; width:100%; 
                                                     justify-content: center; " id="renderP511ProgresBar">
                                          
                                         </div>

                                    </div>

                                </div>
                                <p style="width:90px;"><b>P511 4%</b></p>
                                

                            </div>
                    
                    
                

                        </div>
                        

                    </div>
                    <!---FIN ESTANQUE Y PORCENTAJE-->
                    
                    
                    
                

                </div>
                <div class="col-sm-4" style="margin-top:30%;" id="BotonEstadoP511">
                    <!---INICIO SWITCH-->
                
                    <button  type="button"
                    class="btn btn-danger"
                    >OFF</button>
                                      
                                        
                                     
                <!---FIN SWITCH-->

                </div>

            </div>
        </div>

        <div class="col-4 column1-0" style="height:33%; background-color:white; width: 100%;">
        <div class="row" style="height:100%;">
                <div class="col-sm-8" style="height:100%;">
                    <!---INICIO ESTANQUE Y PORCENTAJE P840 0.5%-->
                    <div class="row" style="height:100%;">
                        <div class="col-sm-4" style="width:60%;">
                            <input type="text" id="capacidadAP840" value=""   readonly >

                        </div>
                        <div class="col-sm-8 estanque" style="height:80%;">
                            <div class="contenedor_porcentaje">
                            <div class="row" style="height:100%; ">
                                    
                                    <div class="col-sm" id="renderP840ProgresBarPadre" >
                                        <div class="progress" style="height:100%; display:flex; width:100%; 
                                                     justify-content: center;" id="renderP840ProgresBar">
                                                     
                                            
                                         </div>

                                    </div>

                                </div>    
                                <p style="width:80px; margin-left:-10%;"><b>P840 0.5%</b></p>
                            </div>
                    
                    
                    
                

                        </div>
                        

                    </div>
                    <!---FIN ESTANQUE Y PORCENTAJE-->

                </div>
                <div class="col-sm-4" style="margin-top:30%;" id="BotonEstadoP840">
                    <!---INICIO SWITCH-->
                
                    <button  type="button"
                    class="btn btn-danger"
                    >OFF</button>
                                      
                                        
                                     
                <!---FIN SWITCH-->

                </div>

            </div>
        </div>

        <div class="col-4 column2-0" style="height:33%; background-color:white; width: 100%;">
        <div class="row" style="height:100%;">
                <div class="col-sm-8" style="height:100%;">
                    <!---INICIO ESTANQUE Y PORCENTAJE P430 0.3%-->
                    <div class="row" style="height:100%;">
                        <div class="col-sm-4" style="width:60%;">
                            <input type="text" id="capacidadAP430" value=""   readonly >

                        </div>
                        <div class="col-sm-8 estanque" style="height:80%;">
                            <div class="contenedor_porcentaje">
                            <div class="row" style="height:100%; ">
                                    
                                    <div class="col-sm" >
                                        <div class="progress" style="height:100%; display:flex; width:100%; 
                                                     justify-content: center;" id="renderP430ProgresBar">
                                            
                                         </div>

                                    </div>

                                </div>

                                <p style="width:90px; margin-left:-11%;"><b>P430 0.3%</b></p>
                            </div>
                    
                    
                

                        </div>
                        

                    </div>
                    <!---FIN ESTANQUE Y PORCENTAJE-->

                </div>
                <div class="col-sm-4" style="margin-top:30%;" id="BotonEstadoP430">
                    <!---INICIO SWITCH-->
                
                    <button  type="button"
                    class="btn btn-danger"
                    >OFF</button>
                                      
                                        
                                     
                <!---FIN SWITCH-->

                </div>

            </div>

        </div>

    </div>
    <!-- FIN COLUMNA 1-->

     <!--INICIO COLUMNA 2-->
     <div class="col-4 column2" style="background-color:white;  height:100%;">
        <div class="col-sm column0-1" style="height:33%;">
            
        </div>
        <div class="col-sm" style="height:33%;">
        <!---INICIO ESTANQUE DE AGUA E INDICADOR---->
        <div class="row" style="height:100%;">
                <!---INICIO PISCINA---->
                <div class="col-sm-8 pool" >
                    <div class="row" style="height:100%; display:flex;">
                        <div class="col-sm-8">
                        <h5 style="text-align:center; margin-top:90%; margin-left:45%;"><b>Piscina</b></h5>

                        </div>
                        <div class="col-sm-4" >
                            <div class="col-sm" style="height:50%;">
                                <h6 style="text-align:right;">•<b>HL</b></h6>
                            </div>
                            <div class="col-sm" style="height:50%; padding-top:220%;">
                                <h6  style="text-align:right;">•<b>LL</b></h6>
                            </div>


                        </div>
                        

                    </div>

                </div>
                <!---FIN PISCINA---->
                <!----- INICIO SWITCH LL & HL POOL BAR------->
                
               
                <div class="col-sm-4" style="margin-left:-2%;" id="nivelConcentracionPiscina">
                   
                </div>
                
                
                    
                
                
                
                <!----- FIN INICIO SWITCH LL & HL POOL BAR------->
            </div>
            
                    <!---FIN ESTANQUE DE AGUA E INDICADOR---->
            
        </div>
        <div class="col-sm column2-1" style="height:33%;" >
        <!---INICIO CONCENTRACION----->
        <div class="col-8" style=" text-align:center;" id="valorConcentracion">
            
        <!-----FIN CONCENTRACION-------->
            
        </div>
     
        </div>
    

    
    

    </div>
    <!-- FIN COLUMNA 2-->
    <!--INICIO COLUMNA 3-->
    <div class="col-4 column3" style="background-color:white;  height:100%;">
        <!----INICIO CONTENEDOR DE AGUA----->
        <div class="col-sm column0-2" style="height:33%;" id="BotonEstadoH20" >
                <!---INICIO SWITCH-->
                
            <button id="estado" type="button"
            class="btn btn-danger" style="margin-top:67%; margin-left:3%;"
            >OFF</button>                                     
                <!---FIN SWITCH-->
        </div>
        <!----FIN CONTENEDOR DE AGUA----->
        <div class="col-sm column 1-2" style="height:33%;">
            
            <!------------------------------I N I C I O    L E Y E N D A---------------------------------------------------->
            <div class="leyenda">
                 <h4 style="text-align:center; margin-top:3%;">Productos</h4>
                 <ul >
                    <li>
                    <div class="row" style="padding-top:4%;">
                        <div class="col-sm-6">
                             <b>Nipacide P511 4%</b>
                        </div>
                        <div class="col-sm-4" style="width:15%; height:30px; border: 3px solid #000; background-color:#ff817b; margin-top:5%;">
                            
                        </div>
                    </div>
                    </li>
                    <li>
                    <div class="row" style="padding-top:4%;">
                        <div class="col-sm-6">
                             <b>Nipacide P840 0.5%</b>
                        </div>
                        <div class="col-sm-4" style="width:15%; height:30px; border: 3px solid #000; background-color:#ffaf4d; margin-top:5%;">
                            
                        </div>
                    </div>
                    </li>
                    <li>
                    <div class="row" style="padding-top:4%;">
                        <div class="col-sm-6">
                             <b>Nipacide P430 0.3%</b>
                        </div>
                        <div class="col-sm-4" style="width:15%; height:30px; border: 3px solid #000; background-color:#7ed6df; margin-top:5%; ">
                            
                        </div>
                    </div>
                    </li>
                        
                </ul>
            </div>
            <!------------------------------F I N     L E Y E N D A :(---------------------------------------------------->
        </div>

        <div class="col-sm column2-2" style="height:33%;">
            
            
        </div>
    
    </div>
    <!-- FIN COLUMNA 3-->
    
    
    </div> <!--SQUARE-->
   
    </div> <!--DIV DEL CONTENEDOR-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="../../external/swal/sweetalert2.all.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    <script src="../../scripts/recarga.js"></script>
  </body>
</html>