
<div class="container" align="left">
<h2>Lista de Empleados</h2>
<div class="alert alert-success" style="display: none;">
</div>

	
	<button id="btnAdd" class="btn btn-success"  >
	<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
	Nuevo Empleado</button>
	<p><br></p>

	<table class="table table-striped table-responsive">

	<thead>
		<tr align="center">
			<td ><b>Num Empleado</b></td>
			<td><b>Nombre Completo</b></td>
			<td><b>Nombre Plaza</b></td>
			<td><b>Unidad Administrativa</b></td>
			<td> </td>
			<td> </td>
		</tr>
	</thead>
	<tbody id="showdata"></tbody>
	</table>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      
      <div class="modal-body">
	      <form id="myForm" action="" method="post" class="form-horizontal">

	      		<input type="hidden" name="idEmpleado" value="0">
	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Numero Empleado: </label>
		      		<div class="col-md-8">
		      			<input type="number" name="num_emp" class="form-control" ><!-- readonly="readonly" -->
		      		</div>
	      		</div>

	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Nombre: </label>
		      		<div class="col-md-8">
		      			<input type="text" id="fname"  name="nombre" class="form-control" onkeyup="myFunction()">
		      		</div>
	      		</div>

	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Apellido Paterno: </label>
		      		<div class="col-md-8">
		      			<input type="text" id="fapp" name="appaterno" class="form-control" onkeyup="myFunction()" >
		      		</div>
	      		</div>

	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Apellido Materno: </label>
		      		<div class="col-md-8">
		      			<input type="text" id="fapm"name="apmaterno" class="form-control" onkeyup="myFunction()">
		      		</div>
	      		</div>

	      		<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Plaza: </label>
		      		<div class="col-md-8">
		      			<select  name="plaza" class="form-control">
		      				<option ></option>
		      				<?php foreach ($plazas as $pz): ?>		      					
		      					<option value="<?php echo $pz->idPlaza; ?>">
		      					<?php echo $pz->nomPlaza; ?>
		      					</option>
		      					
		      				<?php endforeach; ?>
		      				</select>
		      		</div>
	      		</div>
				
				<div class="form-group">
		      		<label for="name" class="label-control col-md-4">Status: </label>
		      		<div class="col-md-8">
		      			<select  name="activo" class="form-control">
		      				<option ></option>
		      				<option value="1">Activo</option>
		      				<option value="0">Inactivo</option>
		      			</select>			      						      				
		      		</div>
	      		</div>

	      </form>
      </div>
      <div class="modal-footer">
<!--         <button type="button" class="btn btn-default"  data-dismiss="modal">Cancelar</button> -->
		<button type="button" class="btn btn-default" id="btnCerrar">Cancelar</button>
        <button type="button" id="btnSave" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>



<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmar Eliminacion</h4>
      </div>		
      <div class="modal-body">
		¿Estas seguro de borrar el registro?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btnDelete" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>
