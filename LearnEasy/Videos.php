<?php 
include 'Connect.php';
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Learn Easy - Videos</title>
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<script src="https://kit.fontawesome.com/dcc018947f.js" crossorigin="anonymous"></script>
</head>
<body id="Main" class="Main">
  <header class="L-head">
    <a href="Biblioteca.php">
    <div id="back">
  </div></a>
    <div class="bib">
      <img src="imagen/Bib.png">
      <h1>Biblioteca</h1>
    </div>
  	<!-- Encabezado/ Barra busqueda -->
  	<form action="#" method="GET" style="margin-left: 20%;">
  		<input type="text" name="buscar" id="barra" placeholder="Buscar" style="width: 700px;">
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
  <div class="Bib-opcion" id="sel">
    <section class="bib-select">
      <img src="imagen/Podcast.png">
  </section>
    <h2>Videos</h2>
    <ul>
      <li>Materia<a id="Materia" class="Materia"><i class="fas fa-bars" style="cursor: pointer;"></i></a><a id="Close" class="Close"><i class="far fa-times-circle"></i></a></li>
    </ul>
    <div id="bib-mat" class="bib-mat">
      <ul>
       <!-- FILTROS -->
       <?php
          if (isset($_GET['Filmat'])) {
            $filtroMat= $_GET['Filmat'];
          }else{
            $filtroMat= 0;
            echo "<li><a href='?Filmat=2'>Sociales</a></li>";
            echo "<li><a href='?Filmat=3'>Matematicas</a></li>";
            echo "<li><a href='?Filmat=4'>Biología</a></li>";
            echo "<li><a href='?Filmat=5'>Español</a></li>";
            echo "<li><a href='?Filmat=1'>Ingles</a></li>";
          }
           switch ($filtroMat) {
          case 2:
            echo "<li style='visibility: visible;'>Sociales</li>";
            echo "<li><a href='?Filmat=3'>Matematicas</a></li>";
            echo "<li><a href='?Filmat=4'>Biología</a></li>";
            echo "<li><a href='?Filmat=5'>Español</a></li>";
            echo "<li><a href='?Filmat=1'>Ingles</a></li>";
            break;
          case 3:
            echo "<li><a href='?Filmat=2'>Sociales</a></li>";
            echo "<li style='visibility: visible;'>Matematicas</li>";
            echo "<li><a href='?Filmat=4'>Biología</a></li>";
            echo "<li><a href='?Filmat=5'>Español</a></li>";
            echo "<li><a href='?Filmat=1'>Ingles</a></li>";
            break;
          case 4:
            echo "<li><a href='?Filmat=2'>Sociales</a></li>";
            echo "<li><a href='?Filmat=3'>Matematicas</a></li>";
            echo "<li style='visibility: visible;'>Biología</li>";
            echo "<li><a href='?Filmat=5'>Español</a></li>";
            echo "<li><a href='?Filmat=1'>Ingles</a></li>";
            break;
          case 5:
            echo "<li><a href='?Filmat=2'>Sociales</a></li>";
            echo "<li><a href='?Filmat=3'>Matematicas</a></li>";
            echo "<li><a href='?Filmat=4'>Biología</a></li>";
            echo "<li style='visibility: visible;'>Español</li>";
            echo "<li><a href='?Filmat=1'>Ingles</a></li>";
            break;
          case 1:
            echo "<li><a href='?Filmat=2'>Sociales</a></li>";
            echo "<li><a href='?Filmat=3'>Matematicas</a></li>";
            echo "<li><a href='?Filmat=4'>Biología</a></li>";
            echo "<li><a href='?Filmat=5'>Español</a></li>";
            echo "<li style='visibility: visible;'>Ingles</li>";
              break;
          default:
            
            break;
        }  
      ?>  
      </ul>
    </div>
  </div>
  <section class="Bib-publi">
    <?php 
    if (!isset($_GET['Filmat'])) {
      $query = "SELECT * FROM material_subido WHERE IDrecursos = 2";
    }
    if (isset($_GET['Filmat'])){
    $filtro = $_GET['Filmat'];
      $query = "SELECT * FROM material_subido WHERE IDrecursos = 2 AND IDmateria = '$filtro'";
    }
    $Consult = mysqli_query($Connect, $query);
    while ($p= mysqli_fetch_array($Consult)){
      $idoc= $p[7];?>
    <!--Publicación C/U -->
      <section class="Publi">
      <?php
      //Si es admin - opcion eliminar
      if ($_SESSION['rol'] !=2) {
        echo "";
      }else{
      if ($_SESSION['rol'] = 2) {
        echo "<a href='ElimPub.php?Public=".$p[0]."'><i  class='far fa-trash-alt ' style='cursor: pointer; margin-left: 95%; font-size: 20px; color: #000000;'></i></a>";
      }
    }
      //Imagen de usuario
     $query = "SELECT Imagen, nomb_docente FROM docente WHERE IDdocente = '$idoc'";
     $Img = mysqli_query($Connect, $query);
     while ($im= mysqli_fetch_array($Img)) {
       echo "<div id='pub-usu'><img src='".$im[0]."'>";
       echo "<h1>".$im[1]."</h1></div>";
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
     <a href="Publicacion.php?IDmat=<?php echo $p[0]; ?>"><button>Abrir Archivo</button></a>
    </section>
  <?php } ?>
  </section>
  <?php
  if ($_SESSION['rol'] != 2) {
  echo "<button class='btn-abrir' id='btn-abrir'></button>";
  }
  ?>
  <iframe src="chatpage.php" class="Chat" id="Chat">
    
  </iframe>
  <script src="popupchat.js"></script>
  <script src="popupuser.js"></script>
  <script src="popmateria.js"></script>
</body>
</html>