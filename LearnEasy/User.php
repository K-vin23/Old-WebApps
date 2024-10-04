<?php 
include 'Connect.php';
 session_start();
 if (!isset($_SESSION['rol'])) {
   header('location: Index.php');
 }else{
  if ($_SESSION['rol'] !=0) {
    header('location: Index.php');
  }
 }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn Easy - ¡Bienvenido Estudiante!</title>
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
    <img src="imagen/user.png">
   <a class="abrirus-btn" id="abrirus-btn"><i class="fas fa-bars" id=""></i></a>
    </div>
    <!--Panel usuario -->
  <div class="PanelUs" id="PanelUs">
      <ul>
    <img src="imagen/user.jpg">
   <a class="cerrar" id="cerrar"><i class="fas fa-bars"></i></a>
   <?php  
    if (isset($_SESSION['User'])) {
      $User= $_SESSION['User'];
      $query = "SELECT nomb_estudiante FROM estudiante WHERE IDestudiante = '$User'";
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
  <nav>
    <center>
    <div class="Opcion">
      <a href="Biblioteca.php">
      <img src="imagen/Bib.png">
      <section>
      <h1>Biblioteca</h1>
    </section>
     </a>
    </div>
  </center>
  </nav>
  <!--Materias -->
  <div class="Materias">
    <a href="Ingles.php">
    <div id="mat" style="margin-left: 4%;">
      <img src="imagen/Ingles.png">
      <h2>Ingles</h2>
    </div>
  </a>
  <a href="Sociales.php">
    <div id="mat">
      <img src="imagen/Sociales.png">
      <h2>Sociales</h2>
    </div>
  </a>
  <a href="Matematicas.php">  
    <div id="mat">
      <img src="imagen/Matematicas.png">
      <h2>Matemáticas</h2>
    </div>
  </a>
  <a href="Biologia.php">
    <div id="mat">
      <img src="imagen/Biologia.png">
      <h2>C. Naturales</h2>
    </div>
  </a>
  <a href="Español.php">
    <div id="mat">
      <img src="imagen/Español.png">
      <h2>Español</h2>
    </div>
  </a>
  </div>
  <!-- CHAT -->
  <button class="btn-abrir" id="btn-abrir"></button>
  <button class="btn-cerrar" id="btn-cerrar"><i class="far fa-times-circle"></i></button>
  <iframe src="chatpage.php" class="Chat" id="Chat">
    
  </iframe>
  <script src="popupchat.js"></script>
  <script src="popupuser.js"></script>
</body>
</html>