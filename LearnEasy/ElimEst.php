<?php 
session_start();
include 'Connect.php';

$ID = $_GET['IDelim'];

$query = "DELETE FROM estudiante WHERE `estudiante`.IDestudiante = '$ID'";
 $Consult= mysqli_query($Connect, $query);
$Uquery = "DELETE FROM usuarios WHERE `usuarios`.IDusuario = '$ID'";
$Consulta = mysqli_query($Connect, $Uquery);
 header('location: Estudiantes.php');
?>
