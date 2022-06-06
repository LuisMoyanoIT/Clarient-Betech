var i = 0;

// var prueba='344-on';
// if(prueba.includes('on'))
// {
//   console.log("Exito22");
// }

// prueba2=prueba.match(/\d+/)[0];
// console.log(prueba2);

function httpGet(theUrl) {
  //Don json para traer datos de la bd al index
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("GET", theUrl, false); // false for synchronous request
  xmlHttp.send(null);
  return xmlHttp.responseText;
}


function change() {
  var doc = document.getElementById("HLbutton");
  var color = ["yellow", "red", "orange"];
  doc.style.backgroundColor = color[i];
  i = (i + 1) % color.length;
}



window.onload = function(){
  //se llama a la funcion que estara escuchando si hay nuevos valores
  intervalo();
}

var Url = "http://www.betech.cl/clarient/app/models/Control.php";
//var JsonR=0;
//inicializamos las variables en 0 para que puedan entrar al if del swal
var alertaP511=0;
var alertaP840=0;
var alertaP430=0;
var nivelP511=0;
var nivelP840=0;
var nivelP430=0;
function intervalo()
{ 
  
  var asd = window.setInterval(function(){
    
    $JsonR = JSON.parse(httpGet(Url));
    //INICIO RELLENO DE INFORMACION PARA ESTANQUE P511 PROGRESS BAR + PORCENTAJE + CANTIDAD ACTUAL
    //SE IMPRIME EL VALOR EN EL INPUT DE CAPACIDAD ACTUAL ESTANQUE P511
    document.getElementById('capacidadAP511').value= $JsonR['capacidadActualP511']['capacidadActual']+ 'L';
    //AUXP511 ALMACENA EL PORCENTAJE CALCULADO PARA MOSTRAR EN PROGRESS BAR
    auxP511=(100*$JsonR['capacidadActualP511']['capacidadActual'])/1000;
    var porcentajeP511='<div class="progress-bar" role="progressbar" style="width:100%; height:' 
    + auxP511 + '%; align-self:flex-end; background-color:#ff817b;">'
    + '<h5 id="porcentajeP511"></h5> </div>';
    
    var porcentajeP511issue='<div class="progress-bar" role="progressbar" style="width:100%; height:' 
    + auxP511 + '%; align-self:flex-end; background-color:#ff817b;">'
    + '<h7 id="porcentajeP511"></h7> </div>'; 
    //A TRAVES DE INNERHTML SE RENDERIZA LO VALORES A "pantallaControl.PHP"


    if(auxP511 <15)
    {
      document.getElementById("renderP511ProgresBar").innerHTML=porcentajeP511issue;
      document.getElementById("porcentajeP511").innerHTML=auxP511+'%';

    }else
    {
     document.getElementById("renderP511ProgresBar").innerHTML=porcentajeP511;
     document.getElementById("porcentajeP511").innerHTML=auxP511+'%';

    }
   
    
           
    //FIN RELLENO DE INFORMACION PARA ESTANQUE P511 PROGRESS BAR + PORCENTAJE + CANTIDAD ACTUAL


    //INICIO RELLENO DE INFORMACION PARA ESTANQUE P840 PROGRESS BAR + PORCENTAJE + CANTIDAD ACTUAL
    //SE IMPRIME EL VALOR EN EL INPUT DE CAPACIDAD ACTUAL ESTANQUE P840
    document.getElementById('capacidadAP840').value=$JsonR['capacidadActualP840']['capacidadActual'] +'L';
    //AUXP840 ALMACENA EL PORCENTAJE CALCULADO PARA MOSTRAR EN PROGRESS BAR
    auxP840=(100*$JsonR['capacidadActualP840']['capacidadActual'])/1000;

    var porcentajeP840='<div class="progress-bar" role="progressbar" style="width:100%; height:' 
    + auxP840 + '%; align-self:flex-end; background-color:#ffaf4d;">'
    + '<h5 id="porcentajeP840"></h5> </div>';

 
    
    var porcentajeP840issue='<div class="progress-bar" role="progressbar" style="width:100%; height:' 
    + auxP840 + '%; align-self:flex-end; background-color:#ffaf4d;">'
    + '<h7 id="porcentajeP840"></h7> </div>';

    

    if(auxP840 < 15)
    {
      document.getElementById("renderP840ProgresBar").innerHTML=porcentajeP840issue;
      //document.getElementById("renderP840ProgresBarPadre").innerHTML=auxP840issue;
      document.getElementById("porcentajeP840").innerHTML=auxP840+'%';


    }else{
      document.getElementById("renderP840ProgresBar").innerHTML=porcentajeP840;
      document.getElementById("porcentajeP840").innerHTML=auxP840+'%';

    }
    
    //FIN RELLENO DE INFORMACION PARA ESTANQUE P840 PROGRESS BAR + PORCENTAJE + CANTIDAD ACTUAL

    //INICIO RELLENO DE INFORMACION PARA ESTANQUE P430 PROGRESS BAR + PORCENTAJE + CANTIDAD ACTUAL
    document.getElementById('capacidadAP430').value=$JsonR['capacidadActualP430']['capacidadActual'] +'L';
    auxP430=(100*$JsonR['capacidadActualP430']['capacidadActual'])/1000;
    var porcentajeP430='<div class="progress-bar" role="progressbar" style="width:100%; height:' 
    + auxP430 + '%; align-self:flex-end; background-color:#7ed6df;">'
    + '<h5 id="porcentajeP430"></h5> </div>';


    var porcentajeP430issue='<div class="progress-bar" role="progressbar" style="width:100%; height:' 
    + auxP430 + '%; align-self:flex-end; background-color:#7ed6df;">'
    + '<h7 id="porcentajeP430"></h7> </div>';

    
    if(auxP430 <15)
    {
      document.getElementById("renderP430ProgresBar").innerHTML=porcentajeP430issue;
      document.getElementById("porcentajeP430").innerHTML=auxP430+'%';


    }else
    {
      document.getElementById("renderP430ProgresBar").innerHTML=porcentajeP430;
      document.getElementById("porcentajeP430").innerHTML=auxP430+'%';

    }
   
    

    //FIN RELLENO DE INFORMACION PARA ESTANQUE P430 PROGRESS BAR + PORCENTAJE + CANTIDAD ACTUAL

    //INICIO BOMBAS QUE SUCCIONAN
    if($JsonR['alarma']['nivelConcentracion'] == 1)
    {
      document.getElementById("BotonEstadoP511").innerHTML='<button  type="button" class="btn btn-success">ON</button>';
      document.getElementById("BotonEstadoP840").innerHTML='<button  type="button" class="btn btn-success">ON</button>';
      document.getElementById("BotonEstadoP430").innerHTML='<button  type="button" class="btn btn-success">ON</button>';
      document.getElementById("BotonEstadoH20").innerHTML='<button id="estado" type="button"class="btn btn-success" style="margin-top:67%; margin-left:3%;">ON</button>'



    }else
    {
      document.getElementById("BotonEstadoP511").innerHTML='<button  type="button" class="btn btn-danger">OFF</button>';
      document.getElementById("BotonEstadoP840").innerHTML='<button  type="button" class="btn btn-danger">OFF</button>';
      document.getElementById("BotonEstadoP430").innerHTML='<button  type="button" class="btn btn-danger">OFF</button>';
      document.getElementById("BotonEstadoH20").innerHTML='<button id="estado" type="button"class="btn btn-danger" style="margin-top:67%; margin-left:3%;">OFF</button>'

    }

    //FIN BOMBAS QUE SUCCIONAN

    //INICIO ACTUALIZACION NIVEL CONCENTRACION EN PISCINA 0:NO PASA NADI, 1:HL, 2:LL
    //1 es HL
    if($JsonR['alarma']['nivelConcentracion'] == 1)
    {
      document.getElementById("nivelConcentracionPiscina").innerHTML='<button id="HLbutton" type="button" class="btn" style=" border: 1px solid #000;"><b>H L</b></button>';
      setInterval(change, 100);
    //2 es LL
    }else if($JsonR['alarma']['nivelConcentracion'] == 2)
    {
      document.getElementById("nivelConcentracionPiscina").innerHTML='<button id="HLbutton" type="button"class="btn" style="margin-top:230%; border: 1px solid #000;"><b>L L</b></button> ';
      setInterval(change, 100);
    }else
    {
      document.getElementById("nivelConcentracionPiscina").innerHTML='';
    }

    document.getElementById("valorConcentracion").innerHTML='<label class="col-form-label"><b>Concentración:</b></label>' 
    + '<input type="text" id="" value="'+ $JsonR['valorConcentracion']['concentracion']+'%" class="form-control" readonly style="text-align:center;" tittle="Nivel Bajo">';
    //FIN ACTUALIZACION NIVEL CONCENTRACION EN PISCINA


    //INICIO SEÑALES FALLO SENSORES P511, P840 Y P430
    //P511
    if($JsonR['alarma']['sensorP511'] == 1 && alertaP511 < 1)
    {
      swal.fire({
        icon: 'error',
        html: 'Fallo en sensor estanque Nipacide P511 4%',
        title: '¡Precaución!',
      })
      alertaP511=alertaP511+1;

    }

    if(alertaP511 == 1)
    {
      var IdAlarma=$JsonR['alarma']['IdAlarma']
      datos=
      {
        IdAlarm: IdAlarma,
        confirmarP511: 1

      }
      $.ajax({
        type: 'POST',
        url: '../models/InsertControl.php',
        data: datos,
        success: function(response){
        console.log("Se envio y esperemos que se guardo, con un F5 sabremos que paso");
        alertaP511=0;
        },
        error: function() {
          console.log("Ni se envio, ni se guardo ");
        }
    });
    }
    //P511

    //P840
    if($JsonR['alarma']['sensorP840'] == 1 && alertaP840 < 1)
    {
      swal.fire({
        icon: 'error',
        html: 'Fallo en sensor estanque Nipacide P840 0.5%',
        title: '¡Precaución!',
      })
      alertaP840=alertaP840+1;

    }

    if(alertaP840 == 1)
    {
      var IdAlarma=$JsonR['alarma']['IdAlarma']
      datos=
      {
        IdAlarm: IdAlarma,
        confirmarP840: 1

      }
      $.ajax({
        type: 'POST',
        url: '../models/InsertControl.php',
        data: datos,
        success: function(response){
        console.log("Se envio y esperemos que se guardo, con un F5 sabremos que pasoX");
        alertaP840=0;
        },
        error: function() {
          console.log("Ni se envio, ni se guardo ");
        }
    });
    }
    //P840

    //P430
    if($JsonR['alarma']['sensorP430'] == 1 && alertaP430 < 1)
    {
      swal.fire({
        icon: 'error',
        html: 'Fallo en sensor estanque Nipacide P430 0.3%',
        title: '¡Precaución!',
      })
      alertaP430=alertaP430+1;

    }

    if(alertaP430 == 1)
    {
      var IdAlarma=$JsonR['alarma']['IdAlarma']
      datos=
      {
        IdAlarm: IdAlarma,
        confirmarP430: 1

      }
      $.ajax({
        type: 'POST',
        url: '../models/InsertControl.php',
        data: datos,
        success: function(response){
        console.log("Se envio y esperemos que se guardo, con un F5 sabremos que pasoX1");
        alertaP430=0;
        },
        error: function() {
          console.log("Ni se envio, ni se guardo ");
        }
    });
    }



    //P430
    


    //FIN SEÑALES FALLO SENSORES P511, P840 Y P430


    //INICIO SEÑALES SWEET ALERT PARA NIVELES BAJOS
    //P511
    if($JsonR['alarma']['nivelP511']==1 && nivelP511 < 1)
    {
      nivelP511= nivelP511 +1;
      swal.fire({
        icon: 'warning',
        html: 'Estanque Nipacide P511 4% a niveles criticos: <br> '+ auxP511 +'% restante',
        title: 'Alerta',
      });

    }

    if(nivelP511 == 1)
    {
      console.log("nivelP511 igual a uno");
      var IdAlarma=$JsonR['alarma']['IdAlarma']
      datos=
      {
        IdAlarm: IdAlarma,
        nivelP511: 1

      }
      $.ajax({
        type: 'POST',
        url: '../models/InsertControl.php',
        data: datos,
        success: function(response){
        console.log("Se envio nivelp511");
        nivelP511=0;
        },
        error: function() {
          console.log("Ni se envio, ni se guardo ");
        }
    });

    }



   //P511

   //P840
    if($JsonR['alarma']['nivelP840'] == 1 && nivelP840 < 1)
    {
      nivelP840= nivelP840 +1;
      swal.fire({
        icon: 'warning',
        html: 'Estanque Nipacide P840 0.5% a niveles criticos: <br> '+ auxP840 +'% restante',
        title: 'Alerta',
      });
    }

    if(nivelP840 == 1)
    {
      console.log("nivelP840 igual a uno");
      var IdAlarma=$JsonR['alarma']['IdAlarma']
      datos=
      {
        IdAlarm: IdAlarma,
        nivelP840: 1

      }
      $.ajax({
        type: 'POST',
        url: '../models/InsertControl.php',
        data: datos,
        success: function(response){
        console.log("Se envio nivelp511");
        nivelP840=0;
        },
        error: function() {
          console.log("Ni se envio, ni se guardo ");
        }
    });

    }

    
   //P840
   //P430
   if($JsonR['alarma']['nivelP430'] == 1 && nivelP430 < 1)
   {
     nivelP430= nivelP430 +1;
     swal.fire({
       icon: 'warning',
       html: 'Estanque Nipacide P430 0.3% a niveles criticos: <br> '+ auxP430 +'% restante',
       title: 'Alerta',
     });
   }

   if(nivelP430 == 1)
    {
      console.log("nivelP430 igual a uno");
      var IdAlarma=$JsonR['alarma']['IdAlarma']
      datos=
      {
        IdAlarm: IdAlarma,
        nivelP430: 1

      }
      $.ajax({
        type: 'POST',
        url: '../models/InsertControl.php',
        data: datos,
        success: function(response){
        console.log("Se envio nivelp430");
        nivelP430=0;
        },
        error: function() {
          console.log("Ni se envio, ni se guardo ");
        }
    });

    }

   //P430

   
    //FIN SEÑALES SWEET ALERT PARA NIVELES BAJOS



  },1000);
};





$( document ).ready(function() {
  

//alert(prueba.estanque1);

//document.getElementById("porcentajeP511").innerHTML=porcentajeP511;



//alert("hola");

});


// var test3 = document.getElementById('contenedor1').value;
// alert("hola");
// alert(test3);
//<script>
//setInterval(function() {
//  $('progress-bar').load('pantallaControl.php') // Selector de la div y el fichero a refrescar
//}, 10000); // Temporizador que ejecuta el refresco cada 2 segundos
//</script>



// function change(i) {
    
//     var doc = document.getElementById("HLbutton");
//     var color = ["red", "yellow", "orange", "green"];
//     doc.style.backgroundColor = color[i];
//     i = (i + 1) % color.length;
//   }



// setInterval(
//     function(i) {
//         var i=0;
//         var doc = document.getElementById("HLbutton");
//         var color = ["red", "yellow", "orange", "green"];
//         doc.style.backgroundColor = color[i];
//         i = (i + 1) % color.length
     
//     }, 1000);
