function ComprobarCampos(parametros)
{
	var puede = true;
	jQuery.each( parametros, function( i, campo ) {
		if(campo.value.length == 0) 
		{
			swal.fire({
				icon: 'error',
				html: 'porfavor rellene sus datos',
				title: 'No ha ingresado sus datos',
			});
			puede = false;
		}
	});
	return puede;
}

$(document).ready(function(){

    $(document).on('click', '#iniciar', function(e){
		e.preventDefault();
		//Se toman los valores del form
		var parametros = $('#loginform').serializeArray();

		if(ComprobarCampos(parametros) == true)
    	{
			console.log("Hola");
			var datos = new FormData();
			
			$.each(parametros, function(index, item) 
			{				
				datos.append(item.name, item.value);
			});
			
			//Se pasan dichos valores por ajax al modulo de php
			$.ajax({				
				url : '../controllers/loginController.php',
				type: 'post',
				dataType: 'html',
				cache: false,
				processData: false,
				contentType:false,				
				data: datos,
				success: function(data) {
					
					
					if(data == true)
					{
						swal.fire({
							icon: 'success',
							html: 'Sesión iniciada correctamente ',
							title: 'Éxito',
						}).then((result) => {
							console.log("entro a control");
							location.href ="../controllers/pantallaControlBack.php";							
						});		
					}
					else
					{						
						swal.fire({
							icon: 'error',
							html: data,
							title: 'Ups, ocurrió un error',
						});				
					}
				}
			});
			
		}			

    });

});