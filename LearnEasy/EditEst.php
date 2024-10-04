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
	<title>Editar</title>
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
		<h1 style="margin-left: 30%; font-size: 30px;">EDITAR ESTUDIANTE</h1>
	<center>
		<?php
        $IDed= $_GET['IDedit'];
		$sql = "SELECT es.IDestudiante, es.nomb_estudiante, es.IDgrado, es.No_documento, us.IDusuario, us.Contrasena 
		FROM estudiante AS es
		INNER JOIN usuarios AS us ON es.IDusuario=us.IDusuario
		WHERE es.IDestudiante = '$IDed'";
		$con = mysqli_query($Connect, $sql);
		while ($rows = mysqli_fetch_array($con)) {
		
		?>
	<form action="EdEst.php?IDestud=<?php echo $rows[0]; ?>" method="POST" class="Login" id="registro">
		<label class="L-Log">Nombre:</label>
		<input type="text" name="Nomb" placeholder="Nombres" class="F-Label" value="<?php echo $rows[1];?>" required>
		<label class="L-Log">Documento:</label>
		<input type="number" name="Doc" placeholder="Número de documento" class="F-Label" value="<?php echo $rows[3];?>" required>
		<label class="L-Log">ID Usuario:</label>
		<input type="text" name="ID" placeholder="IDusuario" class="F-Label" value="<?php echo $rows[4];?>" required>
		<label class="L-Log">Grado:</label>
		<input type="int" name="Gr" placeholder="Grado" class="F-Label" value="<?php echo $rows[2]; ?>" required><br>
		<label class="L-Log">Contraseña</label>
		<input type="text" name="Contra" placeholder="Contrasena" class="F-Label" value="<?php echo $rows[5]; ?>" required><br>
		<br>
		<br><input type="submit" name="Enviar" value="Editar" class="F-Sub"><br>
	</form>
	<?php 
		}
	?>
</center>
</div>
</section>
</body>
</html>