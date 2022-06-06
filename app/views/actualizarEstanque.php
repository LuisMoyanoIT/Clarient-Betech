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

    <title>Actualizar estanques</title>
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
  </head>
  <body>
    <div class="container">
        <!-- COMIENZO NAVBAR--->
        <nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top" style="height:7.9%;">

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
            <a href="#" class="nav-link"><b><?php echo('        ' . $_SESSION['administrador']) ?></b></a>
          </li>
          
   </ul>
     
   </div>

 </nav>
 <h1 style="text-align:center; margin-top:6%; margin-left:19%; border-bottom: 2px solid #000; width:60%;  "><b>Actualizar estanque</b></h1>
 <div class="row rectangle">
 <div class="col-sm-4">
 <!---INICIO TABLA + FECHA ULTIMA ACTUALIZACION P511-->
 <h6 id="fech1" style="padding-top: 4%;margin-top:3%; margin-bottom:4%; text-align:center; ">Última actualización: <?php echo $fechaP511Row[0] ?> </h6>
 <input type=hidden id="hiddenFechaP511" value="<?php echo $fechaP511Row[0] ?>"></input>
 <table id="tbl" class="table table-striped table-bordered "
          style="width:100%;text-align: center;border:2px solid #383838;">

          <h5 id="tit75" style="text-align: center; ">Nipacide P511 4%</h5>
         

          <thead style="background-color:#ff817b;">
            <tr>
              <th> Estanque</th>
              <th> Datos</th>
            </tr>

          </thead>

          <tbody id="waw" style="text-align: center;">
            <tr>
              <td>Capacidad</td>
              <td id="cap1">1000L</td>
            </tr>
            <tr>
              <td>Volumen actual</td>
              <td id="va1"> <?php echo $datosEstanqueP511Row[0] ?>L</td>
            </tr>
            <tr>
              <td>Nuevo volumen </td>
              <td> <input id="nuevoVolumenP511" type="number" placeholder="0" value="0" style="text-align: center;width: 35%"> </td>
            </tr>
            <tr>
              <td id="num">Estado</td>
              <td id="e1"><?php echo  $estadoP511 ?></td>
            </tr>
            <tr>
             <td colspan="2"> <button type="button" class="btn btn-primary actualizarP511" id="Act1" name="Act1"
                    style="text-align: right;">Actualizar</button>
             </td>
            
            </tr>
          </tbody>

        </table>
<!---FIN TABLA + FECHA ULTIMA ACTUALIZACION P511-->
 </div>
 <div class="col-sm-4">
  <!---INICIO TABLA + FECHA ULTIMA ACTUALIZACION P840-->
  <h6 id="fech1" style="padding-top: 4%;margin-top:3%; margin-bottom:4%; text-align:center; ">Última actualización: <?php echo $fechaP840Row[0] ?> </h6>
  <input type=hidden id="hiddenFechaP840" value="<?php echo $fechaP840Row[0] ?>"></input>
 <table id="tbl" class="table table-striped table-bordered "
          style="width:100%;text-align: center;border:2px solid #383838;">

          <h5 id="tit75" style="text-align: center; ">Nipacide P840 0.5%</h5>

          <thead style="background-color:#ffaf4d;">
            <tr>
              <th> Estanque</th>
              <th> Datos</th>
            </tr>

          </thead>

          <tbody id="waw" style="text-align: center;">
            <tr>
              <td>Capacidad</td>
              <td id="cap1">1000L</td>
            </tr>
            <tr>
              <td>Volumen actual</td>
              <td id="va1"> <?php echo $datosEstanqueP840Row[0]?>L</td>
            </tr>
            <tr>
              <td>Nuevo volumen </td>
              <td> <input id="nuevoVolumenP840" type="number" placeholder="0" value="0" style="text-align: center;width: 35%"> </td>
            </tr>
            <tr>
              <td id="num">Estado</td>
              <td id="e1"><?php echo $estadoP840 ?></td>
            </tr>
            <tr>
             <td colspan="2"> <button type="button" class="btn btn-primary actualizarP840" id="Act1" name="Act1"
                    style="text-align: right;">Actualizar</button>
             </td>
            
            </tr>
          </tbody>

        </table>
<!---FIN TABLA + FECHA ULTIMA ACTUALIZACION P840-->
 </div>
 <div class="col-sm-4">
   <!---INICIO TABLA + FECHA ULTIMA ACTUALIZACION P430-->
   <h6 id="fech1" style="padding-top: 4%;margin-top:3%; margin-bottom:4%; text-align:center; ">Última actualización: <?php echo $fechaP430Row[0] ?> </h6>
   <input type=hidden id="hiddenFechaP430" value="<?php echo $fechaP430Row[0] ?>"></input>
 <table id="tbl" class="table table-striped table-bordered "
          style="width:100%;text-align: center;border:2px solid #383838;">

          <h5 id="tit75" style="text-align: center; ">Nipacide P430 0.3%</h5>

          <thead style="background-color:#7ed6df;">
            <tr>
              <th> Estanque</th>
              <th> Datos</th>
            </tr>

          </thead>

          <tbody id="waw" style="text-align: center;">
            <tr>
              <td>Capacidad</td>
              <td id="cap1">1000L</td>
            </tr>
            <tr>
              <td>Volumen actual</td>
              <td id="va1"> <?php echo $datosEstanqueP430Row[0] ?>L</td>
            </tr>
            <tr>
              <td>Nuevo volumen </td>
              <td> <input id="nuevoVolumenP430" type="number" placeholder="0" value="0" style="text-align: center;width: 35%"> </td>
            </tr>
            <tr>
              <td id="num">Estado</td>
              <td id="e1"> <?php echo $estadoP430 ?></td>
            </tr>
            <tr>
             <td colspan="2"> <button type="button" class="btn btn-primary actualizarP430" id="Act1" name="Act1"
                    style="text-align: right;">Actualizar</button>
             </td>
            
            </tr>
          </tbody>

        </table>
<!---FIN TABLA + FECHA ULTIMA ACTUALIZACION P840-->
 </div>

 </div>


 
 
   <!--FIN NAVBAR--->

    </div>





    <!-----SCRIPTS INICIO DE SCRIPTS DE JAVASCRIPTS SCRIPTS----->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="../../external/bootstrap/js/popper.min.js"></script>
    <script src="../../external/bootstrap/js/jquery.min.js"></script>
    <script src="../../external/swal/sweetalert2.all.js"></script>
    <script type="text/javascript" src="..\..\external\jquery-uimin.js"></script>
    <script src="../../scripts/actualizarEstanque.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">


    <!-----SCRIPTS FIN DE SCRIPTS DE JAVASCRIPTS SCRIPTS----->
  </body>
</html>
