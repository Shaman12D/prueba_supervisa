<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Editar autorizaciones</title>
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
		<div class="container mt-3">
			<h2>Editar autorizaciones</h2>
			<p>Ingrese la información necesaria para editar información de la autorización:</p>
		</div>
		<?php foreach ($datos_autorizacion->result_array() as $datos_autorizacion) : ?>
			<form method='post' action='<?php echo base_url(); ?>index.php/autorizaciones_controller/actions/edit_autorizacion/<?php echo $datos_autorizacion['id_auto'] ?>'>
				<div class="container mt-3">
					<label class="label">Fecha</label>
					<input type="date" class="form-control" id="fecha_auto" name="fecha_auto" value="<?php echo $datos_autorizacion['fecha_auto'] ?>" required>
				</div>
				<div class="container mt-3">
					<label class="label">Ingreso</label>
					<input type="time" class="form-control" id="ingreso_auto" name="ingreso_auto" value="<?php echo $datos_autorizacion['ingreso_auto'] ?>" required>
				</div>
				<div class="container mt-3">
					<label class="label">Salida</label>
					<input type="time" class="form-control" id="salida_auto" name="salida_auto" value="<?php echo $datos_autorizacion['salida_auto'] ?>">
				</div>

				<div class="container mt-3">
					<button type="submit" class="btn btn-success">Editar autorización</button>
				</div>
			</form>
		<?php endforeach; ?>
	</div>
</body>
<footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://kit.fontawesome.com/bcf83c7b3a.js" crossorigin="anonymous"></script>
</footer>

</html>
