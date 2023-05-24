<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Editar empleados</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='screen' href='main.css'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="container mt-3 p-5 my-5 bg-yellow border" style="width: fit-content;background-color: khaki;position: absolute; top: 2%; left: 37%;">
		<div class="container mt-3">
			<a href="<?php echo base_url(); ?>index.php"><button type="submit" class="btn btn-warning">Regresar</button></a>
		</div>
		<div class="container mt-3" style="text-align: center;">
			<h2>Editar empleados</h2>
			<p>Ingrese la información necesaria para editar información del empleado:</p>
		</div>
		<?php foreach ($datos_empleado->result_array() as $datos_empleado) : ?>
			<form method='post' action='<?php echo base_url(); ?>index.php/empleados_controller/actions/edit_empleado/<?php echo $datos_empleado['id_emp'] ?>' enctype="multipart/form-data">
				<div class="container mt-3" style="text-align: center;">
					<img src="<?php echo base_url() . 'imagenes/imagenes/' . $datos_empleado['foto_emp']; ?>" height="300px" width="400px">
				</div>
				<div class="container mt-3">
					<label class="label">Nombres</label>
					<input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $datos_empleado['nombres_emp']; ?>" required>
				</div>
				<div class="container mt-3">
					<label class="label">Apellidos</label>
					<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $datos_empleado['apellidos_emp'] ?>" required>
				</div>
				<div class="container mt-3">
					<label class="label">Tipo documento</label>
					<select class="form-control" name="Tdocumento" id="Tdocumento" required>
						<option value="Cédula de ciudadanía" <?php if ($datos_empleado['tipo_documento_emp'] == 'Cédula de ciudadanía') {
							echo 'selected';
						} ?>>Cédula de ciudadanía</option>
						<option value="Tarjeta de identidad" <?php if ($datos_empleado['tipo_documento_emp'] == 'Tarjeta de identidad') {
							echo 'selected';
						} ?>>Tarjeta de identidad</option>
						<option value="Pasaporte" <?php if ($datos_empleado['tipo_documento_emp'] == 'Pasaporte') {
							echo 'selected';
						} ?>>Pasaporte</option>
						<option value="Cédula del extranjero" <?php if ($datos_empleado['tipo_documento_emp'] == 'Cédula del extranjero') {
							echo 'selected';
						} ?>>Cédula del extranjero</option>
					</select>
				</div>
				<div class="container mt-3">
					<label class="label">Número de documento</label>
					<input type="number" maxlength="20" class="form-control" id="Ndocumento" name="Ndocumento" value="<?php echo $datos_empleado['numero_documento_emp'] ?>" required>
				</div>
				<div class="container mt-3">
					<label class="label">Foto</label>
					<input type="file" class="form-control" id="foto" name="foto" accept="image/png, image/jpeg">
				</div>
				<div class="container mt-3" style="text-align: center;">
					<button type="submit" class="btn btn-success">Editar empleado</button>
				</div>
			</form>
		<?php endforeach; ?>
		<div class="container mt-2" style="text-align: center;">
			<a href="<?php echo base_url(); ?>index.php/empleados_controller/actions/delete_empleado/<?php echo $datos_empleado['id_emp'] ?>"><button type="submit" class="btn btn-danger">Eliminar empleado</button>
		</div>
	</div>
</body>
<footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/bcf83c7b3a.js" crossorigin="anonymous"></script>
</footer>

</html>
