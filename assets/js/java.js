$(function() {
	verEmpleados();

		$('#btnCerrar').click(function(){
			location.reload();

			});
		//Add New
		$('#btnAdd').click(function(){
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Nuevo Empleado');
			$('#myForm').attr('action', 'http://localhost/final/cempleado/addEmpleados');

			$('input[name=num_emp]').val('');
					$('input[name=nombre]').val('');
					$('input[name=appaterno]').val('');
					$('input[name=apmaterno]').val('');
					$('select[name=plaza]').val('');
					$('select[name=activo]').val('');

		});


	$('#btnSave').click(function(){
		var url = $('#myForm').attr('action');
		var data = $('#myForm').serialize();

		//validacion del formulario 
		var num_emp   = $('input[name=num_emp]');
		var nombre    = $('input[name=nombre]');
		var appaterno = $('input[name=appaterno]');
		var apmaterno = $('input[name=apmaterno]');
		var plaza     = $('select[name=plaza]');
		var activo    = $('select[name=activo]');
		var result    = '';

		if(num_emp.val()==''){
			num_emp.parent().parent().addClass('has-error');
			}else{
				num_emp.parent().parent().removeClass('has-error');
				result +='1';
			}
		if(nombre.val()==''){
			nombre.parent().parent().addClass('has-error');
			}else{
				nombre.parent().parent().removeClass('has-error');
				result +='2';
			}
		if(appaterno.val()==''){
			appaterno.parent().parent().addClass('has-error');
			}else{   
				appaterno.parent().parent().removeClass('has-error');
				result +='3';
			}
		if(plaza.val()==''){
			plaza.parent().parent().addClass('has-error');
			}else{
				plaza.parent().parent().removeClass('has-error');
				result +='5';
			}
		if(activo.val()==''){
			activo.parent().parent().addClass('has-error');
			}else{
				activo.parent().parent().removeClass('has-error');
				result +='6';
			} 
			
			if(result=='12356'){
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: url,
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
							if(response.success){
								$('#myModal').modal('hide');
								$('#myForm')[0].reset();

								if(response.type=='add'){
								var type = 'agregado'
									}else if(response.type=='update'){
										var type ="modificado"
								}

								$('.alert-success').html('Empleado '+type+' exitoso').fadeIn().delay(1000).fadeOut('slow');
								verEmpleados();
							}
							else{
								alert('No se realizó ninguna actualización');
								location.reload();
							}
						},
					error: function(){
						alert('Numero De Eempleado Existente');
						location.reload();
					}
				});
			}
		});

	

//Funcion Editar
$('#showdata').on('click', '.item-edit', function(){
			var idEmpleado = $(this).attr('data');
			$('#myModal').modal('show');
			$('#myModal').find('.modal-title').text('Editar Empleado');
			$('#myForm').attr('action', 'http://localhost/final/cempleado/updateEmpleado');

			$.ajax({
				type: 'ajax',
				method: 'get',
				url: 'http://localhost/final/cempleado/modificarEmpleado',
				data: {idEmpleado: idEmpleado},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=num_emp]').val(data.num_emp);
					$('input[name=nombre]').val(data.nombre);
					$('input[name=appaterno]').val(data.appaterno);
					$('input[name=apmaterno]').val(data.apmaterno);
					$('select[name=plaza]').val(data.plaza);
					$('select[name=activo]').val(data.activo);

					$('input[name=idEmpleado]').val(data.idEmpleado);
				},
				error: function(){
					alert('No se logro');
				}
			});
});


//Funcion eliminar
		$('#showdata').on('click', '.item-delete', function(){
			var idEmpleado = $(this).attr('data');
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: 'http://localhost/final/cempleado/borrarEmpleado',
					data:{idEmpleado:idEmpleado},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Empleado Eliminado').fadeIn().delay(4000).fadeOut('slow');
							verEmpleados();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Error al borar');
					}
				});
			});
		});


//Ver la tabla en Index
	function verEmpleados(){
		$.ajax({
			type: 'ajax',
			url: 'http://localhost/final/cempleado/verEmpleados',
			async: false,
			dataType: 'json',
			success: function(data){
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<tr align="center">'+
								'<td>'+data[i].num_emp+'</td>'+
								'<td>'+data[i].nombre+' '+data[i].appaterno+' '+data[i].apmaterno+'</td>'+
								'<td>'+data[i].nomPlaza+'</td>'+
								'<td>'+data[i].uadmin+'</td>'+
								'<td>'+
								'<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].idEmpleado+'"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Editar</a>'+ 
								'</td>'+
								'<td>'+
								'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].idEmpleado+'"><span class="glyphicon glyphicon-trash" aria-hidden="true">Eliminar</a>'+
								'</td>'+
							'</tr>';
				}
				$('#showdata').html(html);
			},
			error: function(){
				alert('no se encontro la BD');
			}
		});
	}
});

function myFunction() {
    var x = document.getElementById("fname");
    x.value = x.value.toUpperCase();
    var y = document.getElementById("fapp");
    y.value = y.value.toUpperCase();
    var z = document.getElementById("fapm");
    z.value = z.value.toUpperCase();
}