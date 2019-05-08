<!DOCTYPE html>
<html lang="es">
<head>
	<title>Wilde</title>
</head>
<body>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<input type="text" name="nombre">
		<input type="file" name="foto">
		<input type="submit" name="submit">
	</form>

</body>
</html>

<?php

	if(isset($_POST['submit'])) {
		echo 'Hola '.$_POST['nombre'];
	}

?>