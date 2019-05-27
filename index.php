<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Wilde</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

		<div class="page-header">
			<h1>Wilde</h1>
		</div>

	<a href="proceso.php" class="btn btn-primary btn-xl">Exportar todas</a>

	<hr>

		<div class="row">

			<div class="col-md-6">

				<table class="table">

				<?php
				$consulta = mysqli_query($conexion, "SELECT * FROM alumnos");
				while($campo = mysqli_fetch_array($consulta)) { ?>

						<tr>
							<td style="width: 50px;"><a href="index.php?editar=<?php echo $campo['id_alumno']; ?>" class="btn btn-info">Editar</a></td>
							<td><a href="alumno.php?id=<?php echo $campo['id_alumno']; ?>" target="_parent"><?php echo $campo['nombre']; ?></a></td>
						</tr>		

				<?php }
				?>

				</table>

			</div>

			<div class="col-md-4">



				<?php


				if(isset($_POST['submit'])) {
					$nombre = $_POST['nombre'];
					$foto = $_POST['foto'];
					mysqli_query($conexion, "INSERT INTO alumnos (nombre, foto) VALUES ('$nombre', '$foto')");
					echo '<script>window.location="./"</script>';
				}





				if(isset($_GET['editar'])) {
					$get = $_GET['editar'];
					$consulta = mysqli_query($conexion, "SELECT * FROM alumnos WHERE id_alumno = '$get'");
					while($campo = mysqli_fetch_array($consulta)) {  ?>
				
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group"><input type="text" name="nombre" class="form-control" value="<?php echo $campo['nombre']; ?>"></div>
					
					<div class="form-group"><input type="submit" name="actualizar" value="Actualizar" class="btn btn-primary btn-xl btn-block"></div>
				</form>

				<?php
				if(isset($_POST['actualizar'])) {
					$nombre = $_POST['nombre'];
					mysqli_query($conexion, "UPDATE alumnos SET nombre = '$nombre'");
					echo '<script>window.location="./"</script>';
				}

				 } 

				 } else { ?>


					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div class="form-group"><input type="text" name="nombre" class="form-control"></div>
					<div class="form-group"><input type="file" name="foto"></div>
					<div class="form-group"><input type="submit" name="submit" value="Ingresar" class="btn btn-primary btn-xl btn-block"></div>
				</form>
				
				<?php	
				

				}
				?>

			</div>

		</div>

	</div>

</body>
</html>