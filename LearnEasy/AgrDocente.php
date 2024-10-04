<?php 
session_start();
include 'Connect.php';

$N = $_POST['Nomb'];
$AP = $_POST['Ap'];
$D = $_POST['Doc'];
$ID = $_POST['ID'];
$I = $_SESSION['User'];
$Nombre = $N." ".$AP;
$C = substr($ID, 0, 5);

$Uquery = "INSERT INTO usuarios (IDusuario, Contrasena, ID_rol, Img) VALUES ('$ID', '$C', '83', 'imagen/docente.png')";
$Consulta = mysqli_query($Connect, $Uquery);

$query = "INSERT INTO docente VAlUES('$ID', '$Nombre', '$D', '$I', '$ID', 'imagen/docente.png')";
 $Consult= mysqli_query($Connect, $query);
 header("location: Docentes.php");
?>