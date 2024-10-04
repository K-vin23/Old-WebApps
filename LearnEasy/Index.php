<?php  
include 'Connect.php';

//Inicio
session_start();
//Si existe la session 
if (isset($_GET['cerrar_sesion'])) {
	session_unset();

	session_destroy();

	header('Location: Index.php');
}
//Hay session de Rol?
if (isset($_SESSION['rol'])) {
	switch ($_SESSION['rol']) {
		//Session Estudiante
		case 0:
		 //Redirigir a User.php
			  header('location: User.php');
			break;
		//Session Docente
		case 83:
		 //Redirigir a Doc.php
			 header('location: Doc.php');
			break;
		//Session Admin
		case 2:
              header('location: Admin.php');
		    break;
        default:
	}
}
	//Autenticar Usuario
	if (isset($_POST['Contrasena']) && isset($_POST['ID'])) {
		$contrasena = $_POST['Contrasena'];
		$id = $_POST['ID'];

		$query= "SELECT * FROM usuarios WHERE IDusuario= '$id' AND Contrasena= '$contrasena'";
        $Consulta= mysqli_query($Connect, $query);
        while ($row = mysqli_fetch_array($Consulta)) {
         if ($row == true) {
         	//validar
         	 $User = $row[0];
             $rol = $row[2];
             $_SESSION['rol'] = $rol;
             $_SESSION['User'] = $User;

        switch ($_SESSION['rol']) {
		//Session Estudiante
		case 0:
		 //Redirigir a User.php
			  header("location:User.php");
			break;
		//Session Docente
		case 83:
		 //Redirigir a Doc.php
			 header('location:Doc.php');
			break;
		//Session Admin
		case 2:
              header('location:Admin.php');
		    break;
        default:
        }
         }
     }
     if ($row == false) {
     	echo "<div id='Error'>¡Error! ID Usuario o contraseña incorrecta</div>";
     }
}
?>
<!-- Continuacion abajo -->
<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
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
	<div class="info">
		<h1>¿Por qué usar <br>Learn easy?</h1>
		<p>LEARN –EASY Busca mejorar y facilitar el aprendizaje a los estudiantes del ahora, impulsando diversos métodos que se acoplen a cada uno de nuestros usuarios </p>
		<img src="imagen/logoastrobit.png">
	</div>
	<center>
		<h1>INICIA SESIÓN</h1>
	<form action="#" method="POST" class="Login">
		<input type="number" name="ID" placeholder="Número de Documento" class="F-Label" required><br><br>
		<input type="password" name="Contrasena" placeholder="Contraseña" class="F-Label" required><br>
		<br><input type="submit" name="Enviar" value="Iniciar sesión" class="F-Sub"><br>
		<a href="#" id="txt1">¿Olvidaste tú contraseña?</a><br>
	</form>
</center>
   <div id="redes"> 
   <a href=""><img src="imagen/insta_icon.png">
   <h2>Instagram Astrobits</h2></a>
   <a href=""><img src="imagen/face_icon.png">
	<h2>Facebook Astrobits</h2></a>
</div>
</div>
</section>
</body>
</html>