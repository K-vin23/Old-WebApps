 <?php 
include 'Connect.php';
session_start();
if (!isset($_SESSION['rol']) AND !isset($_SESSION['User'])) {
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
	<title>Learn Easy - Estudiantes</title>
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
    <div class="bib">
      <img src="imagen/estudiantes.png">
      <h1>Estudiantes</h1>
    </div>
  	<!-- Encabezado/ Barra busqueda -->
  	<form action="#" method="GET" style="margin-left: 24%;">
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
      $query = "SELECT nomb_institucion FROM institucion WHERE IDusuario = '$User'";
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
  <section class="Bib-publi">
  <div class="Est">
    <a href="AgEst.php">
    <img src="imagen/agregar.jpg">
    <h1>Agregar Estudiante</h1>
    </a>
  </div>
  <?php 
  $query = "SELECT es.nomb_estudiante, us.Img, us.IDusuario
          FROM `estudiante` AS es
          INNER JOIN usuarios AS us ON es.IDusuario = us.IDusuario";
  $con = mysqli_query($Connect, $query);
  while ($row = mysqli_fetch_array($con)) {
    
   ?>
  <div class="Est" style="margin-left: 4%;">
    <img src="<?php echo $row[1]; ?>" style="padding-bottom: 10px;">
    <h1><?php echo $row[0]; ?></h1>
    <a href="ElimEst.php?IDelim=<?php echo $row[2]; ?>"><button>Eliminar</button></a>
    <a href="EditEst.php?IDedit=<?php echo $row[2]; ?>"><button>Editar</button></a>
  </div>
<?php } ?>
</section>

  <script src="popupuser.js"></script>
</body>
</html>