<?php 
include 'Connect.php';
session_start();
if (!isset($_SESSION['rol'])) {
  header('location: Login.php');
}else{
 if ($_SESSION['rol'] !=83) {
   header('location: Login.php');
 }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ingles</title>
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<script src="https://kit.fontawesome.com/dcc018947f.js" crossorigin="anonymous"></script>
</head>
<body id="Main" class="Main">
  <header class="L-head">
    <?php 
         switch ($_SESSION['rol']) {
           case 0:
             $back = "User";
             break;
           case 83:
             $back = "Doc";
             break;
             case 2:
             $back = "Admin";
             break;
           default:

             break;
         }
       ?>
    <a href="<?php echo $back ?>.php">
    <div id="back">
  </div></a>
  <?php
  $mater=$_GET['Materia'];
  if (isset($mater)) {
   switch ($mater) {
     case 1:
          $imgmater="imagen/Ingles.png";
       break;
     case 2:
          $imgmater="imagen/Sociales.png";
       break;
     case 3:
          $imgmater="imagen/Matematicas.png";
       break;
     case 4:
          $imgmater="imagen/Biologia.png";
       break;
     case 5:
          $imgmater="imagen/Español.png";
       break;
     default:
       // code...
       break;
   }
  } 
  $sql= "SELECT materia FROM materias WHERE IDmaterias = '$mater'";
  $conexion=mysqli_query($Connect, $sql);
  $nombMat= mysqli_fetch_array($conexion);
    ?>
    <div class="bib" id="mate">
      <img src="<?php echo $imgmater ?>">
      <h1><?php echo $nombMat[0] ?></h1>
    </div>
  	<!-- Burbuja de usuario -->
  	<div class="Usuario" id="Usuario">
      <?php  
        $i = $_SESSION['User'];
         $us = "SELECT Img FROM usuarios WHERE IDusuario = '$i'";
         $consul = mysqli_query($Connect, $us);
         while ($uim = mysqli_fetch_array($consul)){
           $imagen = $uim[0];
         }
        ?>
    <img src="<?php echo $imagen ?>">
   <a class="abrirus-btn" id="abrirus-btn"><i class="fas fa-bars"></i></a>
    </div>
    <div class="PanelUs" id="PanelUs">
      <ul>
    <img src="<?php echo $imagen ?>">
   <a class="cerrar" id="cerrar"><i class="fas fa-bars"></i></a>
   <?php  
    if (isset($_SESSION['User'] )AND isset($_SESSION['rol'])) {
      $User = $_SESSION['User'];
      $rol = $_SESSION['rol'];
      switch ($rol) {
        case 0:
               $query = "SELECT nomb_estudiante FROM estudiante WHERE IDusuario = '$User'";
          break;
        case 83:
               $query = "SELECT nomb_docente FROM docente WHERE IDusuario = '$User'";
          break;
        case 2:
               $query = "SELECT nomb_institucion FROM institucion WHERE IDusuario = '$User'";
          break;

        default:
            
          break;
      }
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
        <a href="Login.php?cerrar_sesion=1"><li id="logout">Cerrar sessión</li></a>
      </ul>
    </div>
  </header>
  <form action="Subir.php?Mat=<?php echo $mater; ?>" method="POST" enctype="multipart/form-data" class="Subircont">
   <h2>Publicación</h2>
  <input type="text" name="Titl" placeholder="Titulo Publicación" id="inp-title"><br>
  <textarea name="texto" placeholder="¿Qué vas a publicar hoy?"></textarea>
  <h2>Tipo de recurso</h2>
   <select name="rec">
   <option value="1">Podcast</option>
   <option value="2">Video</option>
   <option value="3">Libro</option>
   <option value="4">Didactico</option>
   <option value="5">Imagen</option>
   </select>
   <h2>Subir Archivos</h2>
   <input type="file" name="file"><br>
   <input type="submit" name="Subir archivo" value="Publicar" id="inp-env">  
  </form>

  <button class="btn-abrir" id="btn-abrir"></button>
  <iframe src="chatpage.php" class="Chat" id="Chat">
    
  </iframe>
  <script src="popupchat.js"></script>
  <script src="popupuser.js"></script>
</body>
</html>