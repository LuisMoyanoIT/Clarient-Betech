console.log("hola");
$(function()
{
    //INICIO ACTUALIZACION DE ESTANQUE P511
    $('.actualizarP511').click(function(){

		
        var nuevoVolumenP511= $('#nuevoVolumenP511').val();
        var validar=validarDatos(nuevoVolumenP511);
        var fecha=$('#hiddenFechaP511').val();
        var datosP511={
            volumenP511: nuevoVolumenP511,
            
        }
        if(validar != null)
        {
            swal.fire({
                icon: 'error',
                html: validar,
                title: 'Error',
            });
            return;
        }else
        {
            swal.fire({

                title: "¿Está seguro?",
                text: "La fecha de la última acualización: " + fecha,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Sí',
                cancelButtonText: "No"
          
              }).then((result) =>
              {
                if (result.value) {
                $.post("../models/InsertEstanques.php", datosP511, function (data) {

                    if (data == true) {
          
                      swal.fire({
                        icon: 'success',
                        html: 'Ha modificado el estanque correcatmente',
                        title: 'Éxito',
                      }).then((result) => {
                            location.reload();							
                        });	
          
                    } else {
                      
                      swal.fire({
                        icon: 'error',
                        html: data,
                        title: 'Error',
                      });
          
                    }
          
                  });
                }


              }) //then

        }

		
	});
    //FIN ACTUALIZACION DE ESTANQUE P511


    //INICIO ACTUALIZACION DE ESTANQUE P840
    $('.actualizarP840').click(function()
    {
        var nuevoVolumenP840= $('#nuevoVolumenP840').val();
        var validar=validarDatos(nuevoVolumenP840);
        var fecha=$('#hiddenFechaP840').val();
        var datosP840={
            volumenP840: nuevoVolumenP840,
            
        }
        // alert(datosP840.volumenP840)
        if(validar != null)
        {
            swal.fire({
                icon: 'error',
                html: validar,
                title: 'Error',
            });
            return;
        }else
        {
            swal.fire({

                title: "¿Está seguro?",
                text: "La fecha de la última acualización: " + fecha,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Sí',
                cancelButtonText: "No"
          
              }).then((result) =>
              {
                if (result.value) {

                $.post("../models/InsertEstanques.php", datosP840, function (data) {

                    if (data == true) {
          
                      swal.fire({
                        icon: 'success',
                        html: 'Ha modificado el estanque correctamente',
                        title: 'Éxito',
                      }).then((result) => {
                            location.reload();							
                        });	
          
                    } else {
                      
                      swal.fire({
                        icon: 'error',
                        html: data,
                        title: 'Error',
                      });
          
                    }
          
                  }); //fin post
                }


              }) //fin then

        }
        




    });
    //FIN ACTUALIZACION DE ESTANQUE P840

    //INICIO ACTUALIZACION DE ESTANQUE P430
    $('.actualizarP430').click(function()
    {
        var nuevoVolumenP430= $('#nuevoVolumenP430').val();
        var validar=validarDatos(nuevoVolumenP430);
        var fecha=$('#hiddenFechaP430').val();
        var datosP430={
            volumenP430: nuevoVolumenP430,
            
        }
        if(validar != null)
        {
            swal.fire({
                icon: 'error',
                html: validar,
                title: 'Error',
            });
            return;
        }else
        {
            swal.fire({

                title: "¿Está seguro?",
                text: "La fecha de la última acualización: " + fecha,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Sí',
                cancelButtonText: "No"
          
              }).then((result) =>
              {
                if (result.value) {
                $.post("../models/InsertEstanques.php", datosP430, function (data) {

                    if (data == true) {
          
                      swal.fire({
                        icon: 'success',
                        html: 'Ha modificado el estanque correctamente',
                        title: 'Éxito',
                      }).then((result) => {
                            location.reload();							
                        });	
          
                    } else {
                      
                      swal.fire({
                        icon: 'error',
                        html: data,
                        title: 'Error',
                      });
          
                    }
          
                  });
                }
              })

        }

        
        

    });
    //FIN DE ACTUALIZACION DE ESTANQUE P430
}
);


function validarDatos(dato)
{
    if(dato == '')
    {
        return "Debe ingresar un nuevo volumen"
    }

    if(dato <= 0 || dato >1000)
    {
        return "El nuevo volumen debe ser entre 1 y 1000"
    }

}