<html>
<head>
	<head>
		<title>Inicio</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	</head>
</head>

<body>
	<div class="container mt-3 p-5 my-5 border" style="width: fit-content; background: beige;">
		<h2 style="text-align: center;">Autorizaciones</h2>
		<p>En este programa se logra observar como esta organizado las autorizaciones de entrada y salida de los empleados:</p>
		<form method="post" action="<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/add_autorizacion">
			<label for="id_emp">Seleccione su nombres y apellidos</label>
			</br>
			<select class="form-control" name="id_emp" id="id_emp">
				<?php foreach ($empleados->result_array() as $empleados) : ?>
					<option value="<?php echo $empleados['id_emp'] ?>" required><?php echo $empleados['nombres_emp'] ?> <?php echo $empleados['apellidos_emp'] ?></option>
				<?php endforeach; ?>
			</select>
			</br>
			<button type="input" class="btn bg-success" name="registrar_auto" id="registrar_auto">Registrar ingreso</button>
		</form>
		<?php  if ($mensaje!=null): ?>
		<div class="alert alert-success alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>Success!</strong> <?php echo $mensaje?>.
		</div>
		<?php endif;?>
		<h2 style="text-align: center;">Autorizaciones de hoy</h2>
		<div class="table-responsive" style="width:100%; height:40%; overflow:auto;">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Tipo documento</th>
						<th>Número documento</th>
						<th>Fecha</th>
						<th>Entrada</th>
						<th>Salida</th>
						<th>Autorización</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody style="height: 80px; overflow: auto;">
					<?php foreach ($autorizaciones->result_array() as $autorizaciones) : ?>
						<tr>
							<td><a href="<?php echo base_url(); ?>index.php/empleados_controller/actions/empleado_informacion/<?php echo $autorizaciones['id_emp'] ?>"><?php echo $autorizaciones['nombres_emp'] ?></a></td>
							<td><a href="<?php echo base_url(); ?>index.php/empleados_controller/actions/empleado_informacion/<?php echo $autorizaciones['id_emp'] ?>"><?php echo $autorizaciones['apellidos_emp'] ?></a></td>
							<td><?php echo $autorizaciones['tipo_documento_emp'] ?></td>
							<td><?php echo $autorizaciones['numero_documento_emp'] ?></td>
							<td><?php echo $autorizaciones['fecha_auto'] ?></td>
							<td><?php echo $autorizaciones['ingreso_auto'] ?></td>
							<td><?php if ($autorizaciones['salida_auto'] == NULL) {
									echo 'Sin marcar';
								} else {
									echo $autorizaciones['salida_auto'];
								} ?></td>
							<td><?php echo $autorizaciones['autorizacion_auto'] ?></td>
							<td>
								<a href="<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/autorizacion_informacion/<?php echo $autorizaciones['id_auto'] ?>"><button class="btn bg-warning"><i class="fa fa-pencil"></i></button></a>
								<a href="<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/delete_autorizacion/<?php echo $autorizaciones['id_auto'] ?>"><button class="btn bg-danger"><i class="fa fa-close"></i></button></a>
								<a href="<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/marcar_salida/<?php echo $autorizaciones['id_auto'] ?>"><button class="btn bg-success"><i class="fa fa-refresh"></i></button></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="10"><a href="<?php echo base_url(); ?>index.php/empleados_controller/actions/add_empleado_form"><button class="btn bg-success"><i class="fa fa-plus">Agregar empleado</i></button></a></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	<div class="container mt-3 p-5 my-5 border" style="width: fit-content; background: aliceblue;">
		<h2 style="text-align: center;">Historial de autorizaciones</h2>

		<input class="form-control" id="search_emp" type="text" placeholder="Buscar..">
							</br>	
		<div class="table-responsive" style="width:100%; height:40%; overflow:auto;">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Tipo documento</th>
						<th>Número documento</th>
						<th>Fecha</th>
						<th>Entrada</th>
						<th>Salida</th>
						<th>Autorización</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody id="historial_emp" style="height: 80px; overflow: auto;">
					<?php foreach ($historial->result_array() as $historial) : ?>
						<tr>
							<td><?php echo $historial['id_auto'] ?></td>
							<td><a href="<?php echo base_url(); ?>index.php/empleados_controller/actions/empleado_informacion/<?php echo $autorizaciones['id_emp'] ?>"><?php echo $autorizaciones['nombres_emp'] ?></a></td>
							<td><a href="<?php echo base_url(); ?>index.php/empleados_controller/actions/empleado_informacion/<?php echo $autorizaciones['id_emp'] ?>"><?php echo $autorizaciones['apellidos_emp'] ?></a></td>
							<td><?php echo $historial['tipo_documento_emp'] ?></td>
							<td><?php echo $historial['numero_documento_emp'] ?></td>
							<td><?php echo $historial['fecha_auto'] ?></td>
							<td><?php echo $historial['ingreso_auto'] ?></td>
							<td><?php if ($historial['salida_auto'] == NULL) {
									echo 'Sin marcar';
								} else {
									echo $historial['salida_auto'];
								} ?></td>
							<td><?php echo $historial['autorizacion_auto'] ?></td>
							<td>
								<a href="<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/autorizacion_informacion/<?php echo $historial['id_auto'] ?>"><button class="btn bg-warning"><i class="fa fa-pencil"></i></button></a>
								<a href="<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/delete_autorizacion/<?php echo $historial['id_auto'] ?>"><button class="btn bg-danger"><i class="fa fa-close"></i></button></a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
<footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/bcf83c7b3a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	$("#search_emp").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#historial_emp tr").filter(function() {
		$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
	});
</script>
</footer>

</html>
