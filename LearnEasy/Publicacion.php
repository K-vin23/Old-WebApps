<?php 
include 'Connect.php';
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Publicación</title>
	<link rel="stylesheet" type="text/css" href="estilo-login.css">
	<script src="https://kit.fontawesome.com/dcc018947f.js" crossorigin="anonymous"></script>
</head>
<body id="Main" class="Main">
  <header class="L-head" style="height: 120px;">
    <?php 
    if (isset($_SESSION['Recurso'])){
      switch ($_SESSION['Recurso']){
        case 0:
           $back="Biblioteca.php";
          break;
        case 1:
           $back="Podcast.php";
          break;
          case 2:
          $back="Videos.php";
          break;
          case 3:
          $back="Libros.php";
          break;
          case 4:
          $back="Didacticos.php";
          break;
          case 4:
          $back="Imagenes.php";
          break;
        default:
          // code...
          break;
      }
    }
  ?>
    <a href="<?php echo $back; ?>">
    <div id="back" style="left: 0%;">
  </div></a>
    <div class="bib" style="left: 10%;">
      <img src="imagen/Bib.png">
      <h1>Biblioteca</h1>
    </div>
    <img src="imagen/logolearn.jpeg" style="margin-left: 73%; height: 120px;">
  </header>
  <section class="Bib-publi">
    <?php 
    $material = $_GET['IDmat'];
    $query = "SELECT * FROM material_subido WHERE IDmaterial = '$material'";
    $Consult = mysqli_query($Connect, $query);
    while ($p= mysqli_fetch_array($Consult)){
      $idoc= $p[7];?>
    <!--Publicacion -->
      <section class="Publi" id="ver">
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
     echo "<div id='text'><h1 style='margin-left: 37%;'>".$p[3]."</h1>";
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
     echo "<h4 style='width: 110%; margin-left: 4%;'>".$p[4]."</h4>"."</div>";
     ?>
     <div class="Archivo"><img src="imagen/archivo.png"><h3>Archivos</h3>
      <table>
     <?php 
    $sql= "SELECT * FROM archivos WHERE IDmaterial= '$material'";
    $conect= mysqli_query($Connect, $sql);
    while ($arc = mysqli_fetch_array($conect)) {
      echo "<tr>";
      echo "<td><h4>".$arc[1].".".$arc[2]."</h4></td>";
      echo "<td style='width: 35px;'><a href='".$arc[3]."'><i class='fas fa-external-link-alt'></i></a></td>";
      echo "<td><button><a href='".$arc[3]."' download='".$arc[1]."'><i class='fas fa-download'></i></button></a></td>";
      echo "</tr>";
    }
      ?>
    </table>
     </div>
    </section>
  <?php } ?>
  </section>
  <script src="popupuser.js"></script>
  <script src="popmateria.js"></script>
</body>
</html>