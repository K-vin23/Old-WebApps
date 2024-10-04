<?php 
include 'Connect.php';
 session_start();
 if (!isset($_SESSION['rol'])) {
   header('location: Index.php');
 }else{
  if ($_SESSION['rol'] !=2) {
    header('location: Index.php');
  }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn Easy - ¡Bienvenido Administrador!</title>
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<script src="https://kit.fontawesome.com/dcc018947f.js" crossorigin="anonymous"></script>
</head>
<body id="Main" class="Main">
  <header class="L-head">
  	<!-- Encabezado/ Barra busqueda -->
  	<form action="#" method="GET">
  		<input type="text" name="buscar" id="barra" placeholder="Buscar">
  		<button type="submit" name="busqueda" id="busq"><i class="fas fa-search"></i></button>
  	</form>
  	<!-- Burbuja de usuario -->
  	<div class="Usuario" id="Usuario">
    <img src="imagen/admin.png">
   <a class="abrirus-btn" id="abrirus-btn"><i class="fas fa-bars" id=""></i></a>
    </div>
  <div class="PanelUs" id="PanelUs">
      <ul>
    <img src="imagen/admin.png">
   <a class="cerrar" id="cerrar"><i class="fas fa-bars"></i></a>
   <?php  
    if (isset($_SESSION['User'])) {
      $User= $_SESSION['User'];
      $query = "SELECT nomb_institucion FROM institucion WHERE IDinstitucion = '$User'";
      $Consulta = mysqli_query($Connect, $query);
      while ($i= mysqli_fetch_array($Consulta)){
      echo "<li><h4>".$i[0]."</h4></li>";
    }
  }else{
    echo "<h1> User Error</h1>";
  }
    ?>
        <a href=""><li>Mi perfil</li></a>
        <a href=""><li>Ajustes</li></a>
        <a href=""><li>Soporte</li></a>
        <a href="Index.php?cerrar_sesion=1"><li id="logout">Cerrar sessión</li></a>
      </ul>
    </div>
  </header>
  <div class="Panel">
  	<section>
      <img src="imagen/logolearn.jpeg">
    </section>
  </div>
  <nav class="Admin">
    <center>
    <div class="Opcion">
      <a href="Biblioteca.php">
      <img src="imagen/Bib.png">
      <section>
      <h1>Biblioteca</h1>
    </section>
     </a>
    </div>
    <div class="Opcion">
      <a href="Estudiantes.php">
      <img src="imagen/estudiantes.png">
      <section>
      <h1>Estudiantes</h1>
    </section>
     </a>
    </div>
    <div class="Opcion">
      <a href="Docentes.php">
      <img src="imagen/docentes.png">
      <section>
      <h1>Docentes</h1>
    </section>
     </a>
    </div>
  </center>
  </nav>
  <script src="popupuser.js"></script>
</body>
</html>