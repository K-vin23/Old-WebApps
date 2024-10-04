<?php  
include 'Connect.php';
session_start();
if (!isset($_SESSION['rol'])) {
	header('location: Login.php');
  }else{
   if ($_SESSION['rol'] !=2) {
	 header('location: Login.php');
   }
  }
?>
<!-- Continuacion abajo -->
<!DOCTYPE html>
<html>
<head>
	<title>Agregar Docente</title>
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<link rel="icon" type="image/png" href="imagen/Logo2.png">
</head>
<body>
	<section>
		<div id="Cab-logo">
			<center>
			<img src="imagen/logolearn.jpeg">
		    </center>
		</div>
	<div id="Log">
		<h1 style="margin-left: 40%; font-size: 30px;">REGISTRAR</h1>
	<center>
	<form action="AgrDocente.php" method="POST" class="Login" id="registro">
		<label class="L-Log">Nombres:</label>
		<input type="text" name="Nomb" placeholder="Nombres" class="F-Label" required>
		<label class="L-Log">Apellidos:</label>
		<input type="text" name="Ap" placeholder="Apellidos" class="F-Label" required>
		<label class="L-Log">Documento:</label>
		<input type="number" name="Doc" placeholder="Número de documento" class="F-Label" required>
		<label class="L-Log">IDusuario:</label>
		<input type="number" name="ID" placeholder="ID Usuario" class="F-Label" required><br><br>
		<br><input type="submit" name="Enviar" value="Registrar" class="F-Sub"><br>
	</form>
</center>
</div>
</section>
</body>
</html>