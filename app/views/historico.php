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
    <link rel="icon" type="image/png" href="img/b-logo2.png"/>
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
       <li class="nav-item active mr-4">
         <a href="../controllers/pantallaControlBack.php" class="nav-link"><b>CONTROL</b></a>
       </li>
       <li class="nav-item active mr-4">
        <a href="../controllers/historicoController.php" class="nav-link"><b>HISTORICO</b></a>
       </li>
       <li class="nav-item active mr-4"style="margin-right:10px;">
         <a href="../controllers/actualizarEstanqueBack.php" class="nav-link"><b>ACTUALIZAR ESTANQUE</b></a>
        </li>
       <li class="nav-item active mr-4">
        <a href="../controllers/logout.php" class="nav-link"><b>SALIR</b></a>
      </li>
      
     </ul>
     <ul class="navbar-nav mr-auto">
          <li class="nav-item active mr-4">
            <a href="#" class="nav-link"><b><?php echo( $_SESSION['administrador']) ?> </b></a>
          </li>          
     </ul>
     
   </div>

 </nav>
    <!--FIN NAVBAR--->
    <!-----I N I C I O    F O R M ------------------------->
    
    
    
    <form class="form-horizontal" action="" method="POST" id="buscarR" enctype="multipart/form-data"style=" padding-top:7%; margin-left:12%;">
    <h1 style="text-align:center; margin-left:11%;border-bottom: 2px solid #000; width:60%; "><b>Informe historico</b></h1>
    
    
         <input type="hidden" name="pagina" value="1" id="pagina">
          <input type="hidden" name="funcion" value="1">

          <div class="row">
            <div class="col-lg-3" style="margin-top:0.5%;" >

              <input readonly="readonly" id="fechi" autocomplete="off" placeholder="Seleccione mes" />

            </div>
          

            <div class="col-lg-3">
              <button type="button" class="btn btn-primary" id="buscar" style="width:70%;">Buscar</button>

            </div>
            <div class="col-lg-3">
              <button type="button" class="btn btn-danger" onclick="generarPDF()"> Descargar PDF
              </button>
            </div>
            <div class="col-lg-3">
              
              <button type="button" class="btn btn-outline-success" onclick="generarEXCEL()"> Descargar Excel
                
              </button>
            </div>

          </div>


          </form>
          <br>
         
          
    <!-------- F I N    F O R M ------------------------>
    <!--<div class="squareH"> ---->
          

    <table id="tbl" class="table table-striped table-bordered table-sm" style="border:3px solid #000; box-shadow: 0 0 25px grey; " >
          <thead   style="text-align:center;"  >
            <tr>
              <th colspan="1"  style="background-color:#7ed6df;">  </th>
              <th colspan="2" style="background-color:#ff6961;"> Nipacide P430 <br>0.3%</th>
              <th colspan="2" style="background-color:#ff981a;">Nipacide P511 <br> 4%</th>
              <th colspan="2" style="background-color:#ff9161;">Nipacide P840 <br> 0.5%</th>
              <th colspan="2" style="background-color:#247ba0;">Agua</th>
              <th colspan="1" style="background-color:#7ed6df;"></th>
              
            </tr>

            <tr>
            <th colspan="1"  style="background-color:#7ed6df; "> Fecha y hora </th>
              <th style="background-color:#ff817b;">Estado</th>
              <th style="background-color:#ff817b;">Litros</th>
              <th style="background-color:#ffaf4d;">Estado</th>
              <th style="background-color:#ffaf4d;">Litros</th>
              <th style="background-color:#fb825b;">Estado</th>
              <th style="background-color:#fb825b;">Litros</th>
              <th style="background-color:#80ced7;">Estado</th>
              <th style="background-color:#80ced7;">Litros</th>
              <th style="background-color:#7ed6df;">Concentración %</th>
              
            </tr>
            


      <div>
          </thead>
          <tbody id="tbldatos" name="tbldatos" style="text-align: center;">



          </tbody>
        </table>
    
   <!--DIV DEL CONTENEDOR-->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->


  <!-------- S C R I P T S ----------------------------------------->
  <script src="../../external/bootstrap/js/popper.min.js"></script>
<script src="../../external/bootstrap/js/jquery.min.js"></script>

<script src="../../external/bootstrap/js/bootstrap.min.js"></script>
<link href="../../external/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
<!-- Jquery -->


<!-- Swal, es decir Sweet Alert -->
<script src="../../external/swal/sweetalert2.all.js"></script>
  <script type="text/javascript" src="..\..\external\jquery-uimin.js"></script>
  <script src="../../external/mont.js"></script>
<script src="../../external/datatables.min.js"></script>
<script src="../../external/table2excel.js"></script>

<script src="../../external/jspdf.min.js"></script>
<script src="../../external/jspdf.plugin.autotable.js"></script>
<script src="../../external/FileSaver.js"></script>
<script lang="javascript" src="../../external/xlsx.full.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="../../scripts/historico.js"></script>
  <!--------- S C R I P T S ---------------------------------------->
  </body>
</html>
  
