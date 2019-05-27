<?php
$get = $_GET['id'];
?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint lang="es">
<head>
	<meta charset="UTF-8">
	<title>Alumno</title>
	<script src="js/html2canvas.min.js"></script>
<script type="text/javascript">
	function downloadimage(){
	 	//var container = document.getElementById("image-wrap"); //specific element on page
		var container = document.getElementById("htmltoimage");; // full page
		html2canvas(container,{allowTaint : true}).then(function(canvas) {

			var link = document.createElement("a");
			document.body.appendChild(link);
			link.download = "html_image.png";
			link.href = canvas.toDataURL();
			link.target = '_blank';
			link.click();
			window.location="./";

		});
	}

</script>
<style>
@media print{
	@page {
		size: landscape;
        margin: 0mm;
    }
		}
	}
</style>


</head>
<body onload="downloadimage()">

	<div id="htmltoimage" style="border: 0px solid;display: inline-block;height: 210mm;padding: 60px 80px;vertical-align: top;width: 297mm;">

		<?php
		if(isset($_GET['id'])) {
			$get = $_GET['id'];
			$conexion = new mysqli('localhost', 'root', 'soledad', 'wilde');
			$consulta = mysqli_query($conexion, "SELECT * FROM alumnos WHERE id_alumno = '$get'");
			while($campo = mysqli_fetch_array($consulta)) { ?>

		<div style="border: 0px solid;display: inline-block;height: 99%;vertical-align: top;width: 53%;">
			<img src="fotos/<?php echo $campo['foto']; ?>" width="100%">
		</div>


<div style="border: 0px solid;display: inline-block;height: 87%;padding: 40px;vertical-align: top;width: 39%;">

	<img src="img/logo.png" width="100">


				<h2>"Bandera de mi Nación,
				son tus colores divinos, que basta
				mirar el cielo para sentirse argentino."</h2>

				<h1>Yo <i><?php echo $campo['nombre']; ?></i>
					prometo honrar y respetar fielmente a mi
					Bandera Nacional</h1>

					<br>
					<br>
					<br>
					<br>
					<br>

					Corrientes, 19 de Junio de 2019


			<?php }

		}
		?>
</div>


	</div>




</body>
</html>
