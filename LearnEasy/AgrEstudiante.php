<?php 
session_start();
include 'Connect.php';

$N = $_POST['Nomb'];
$AP = $_POST['Ap'];
$D = $_POST['Doc'];
$ID = $_POST['ID'];
$G = $_POST['Gr'];
$I = $_SESSION['User'];
$Nombre = $N." ".$AP;
$C = substr($ID, 0, 5);

$Uquery = "INSERT INTO usuarios (IDusuario, Contrasena, ID_rol, Img) VALUES ('$ID', '$C', '0', 'imagen/user.jpg')";
$Consulta = mysqli_query($Connect, $Uquery);

$query = "INSERT INTO estudiante VAlUES('$ID', '$Nombre', '$G', '$D', '$I', '$ID')";
 $Consult= mysqli_query($Connect, $query);
 header("location: Estudiantes.php");
?>