<?php 
include 'Connect.php';
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Biología</title>
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
    <div class="bib" id="mate">
      <img src="imagen/Biologia.png">
      <h1>Naturales</h1>
    </div>
  	<!-- Encabezado/ Barra busqueda -->
  	<form action="#" method="GET" style="margin-left: 25%;">
  		<input type="text" name="buscar" id="barra" placeholder="Buscar" style="width: 600px;">
  		<button type="submit" name="busqueda" id="busq"><i class="fas fa-search"></i></button>
  	</form>
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
  <section class="Bib-publi">
    <?php 
    $query = "SELECT * FROM material_subido WHERE IDmateria = 4 AND IDdocente > 0";
    $Consult = mysqli_query($Connect, $query);
    while ($p= mysqli_fetch_array($Consult)){
      $idoc= $p[7];?>
      <section class="Publi">
      <?php
      //Imagen de usuario
     $query = "SELECT Imagen FROM docente WHERE IDdocente = '$idoc'";
     $Img = mysqli_query($Connect, $query);
     while ($im= mysqli_fetch_array($Img)) {
       echo "<div id='pub-usu'><img src='".$im[0]."'></div>";
     }
     //Fin
     echo "<div id='text'>"."<h1>".$p[3]."</h1>";
     switch ($p[2]) {
       case 1:
          $recurso = "Podcast";
         break;
       case 2:
          $recurso = "Video";
         break;
         case 3:
          $recurso = "Libro";
         break;
         case 4:
          $recurso = "Didactico";
         break;
         case 5:
          $recurso = "Imagen";
         break;

       default:
         break;
     }
     echo "<h3>[$recurso]</h3>";
     $publi= $p[4];
     echo "<h4>".substr($publi, 0, 270)." [...] "."</h4>"."</div>";
     ?>
     <button><a href="Publicacion.php?IDmat=<?php echo $p[0]; ?>">Ver Publicacion</a></button>
    </section>
  <?php } ?>
  </section>
  <?php 
     $rolus = $_SESSION['rol'];
     switch ($rolus) {
       case 0:
         
         break;
      case 83:
           echo "<a href=''AgrMaterial.php?Materia=4'><button class='subir'></button></a>";
         break;
        case 2:
           
         break;
       
       default:
         
         break;
     }
   ?>
  <button class="btn-abrir" id="btn-abrir"></button>
  <button class="btn-cerrar" id="btn-cerrar"><i class="far fa-times-circle"></i></button>
  <iframe src="chatpage.php" class="Chat" id="Chat">
    
  </iframe>
  <script src="popupchat.js"></script>
  <script src="popupuser.js"></script>
</body>
</html>