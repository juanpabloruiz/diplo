<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Wilde</title>
	<link rel="stylesheet" href="bootstrap.min.css">
	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap.min.js"></script>
</head>
<body>

	<div class="container">

		<div class="row">

			<div class="col-md-6 col-md-offset-3">

				<div class="page-header">
					<h1>Escuela Nº 404 "Dr. Wilde"</h1>
				</div>

				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
					<div class="form-group"><input type="text" name="nombre" class="form-control"></div>
					<div class="form-group"><input type="file" name="foto"></div>
					<div class="form-group"><input type="submit" name="submit" class="btn btn-primary"></div>
				</form>

			</div>

		</div>

	</div>

</body>
</html>

<?php

	if(isset($_POST['submit'])) {
		echo 'Hola '.$_POST['nombre'];
	}

?>