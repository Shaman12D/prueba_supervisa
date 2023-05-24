<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Agregar empleados</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='main.css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container mt-3 p-5 my-5 bg-yellow border" style="width: fit-content;background-color: khaki;position: absolute; top: 15%; left: 37%;">
		<div class="container mt-3">
			<a href="<?php echo base_url(); ?>index.php"><button type="submit" class="btn btn-warning">Regresar</button></a>
		</div>
		<div class="container mt-3" style="text-align: center;">
			<h2>Agregar empleados</h2>
			<p>Ingrese la información necesaria para registrar un empleado:</p>
		</div>
		<form method='post' action='<?php echo base_url() ?>index.php/empleados_controller/actions/add_empleado' enctype="multipart/form-data">
			<div class="container mt-3">
				<label class="label">Nombres</label>
				<input type="text" class="form-control" id="nombres" name="nombres" required>
			</div>
			<div class="container mt-3">
				<label class="label">Apellidos</label>
				<input type="text" class="form-control" id="apellidos" name="apellidos" required>
			</div>
			<div class="container mt-3">
				<label class="label">Tipo documento</label>
				<select class="form-control" name="Tdocumento" id="Tdocumento" required>
					<option>Cédula de ciudadanía</option>
					<option>Tarjeta de identidad</option>
					<option>Pasaporte</option>
					<option>Cédula del extranjero</option>
				</select>
			</div>
			<div class="container mt-3">
				<label class="label">Número de documento</label>
				<input type="number" maxlength="20" class="form-control" id="Ndocumento" name="Ndocumento" required>
			</div>
			<div class="container mt-3">
				<label class="label">Foto</label>
				<input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg" required>
			</div>
			<div class="container mt-3">
				<button type="submit" class="btn btn-success">Crear empleado</button>
			</div>
		</form>
	</div>
</body>
<footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/bcf83c7b3a.js" crossorigin="anonymous"></script>
</footer>

</html>
