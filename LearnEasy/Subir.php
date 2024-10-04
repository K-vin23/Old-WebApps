<?php
//var_dump($_FILES["file"]);
 $directorio = "Files/";
 $archivo = $directorio . basename($_FILES["file"]["name"]);
 $size = $_FILES["file"]["size"];
 echo $size;
 if ($size > 7000000) {
    echo "El archivo supera los 7MB";
}else{
 if (move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)) {
  echo "Archivo Subido Correctamente";
} 
}
session_start();

include "Connect.php";

 $materia = $_GET['Mat'];
 $recurso = $_POST['rec'];
 $titilo = $_POST['Titl'];
 $publicacion = $_POST['texto'];
 $arch= $archivo;
 $docente = $_SESSION['User'];
 $sql = "INSERT INTO material_subido (IDmateria, IDrecursos, Titulo, Publicacion, Archivo, IDdocente) VALUES ('$materia','$recurso','$titilo','$publicacion','$arch','$docente')";
 $insertar = mysqli_query($Connect, $sql);
?>