<?php 
session_start();
include 'Connect.php';

$N = $_POST['Nomb'];
$D = $_POST['Doc'];
$ID = $_GET['IDestud'];
$IDus= $_POST['ID'];
$G = $_POST['Gr'];
$C = $_POST['Contra'];

$Uquery = "UPDATE usuarios SET IDusuario= '$IDus', Contrasena= '$C' WHERE IDusuario= '$ID'";
$Consulta = mysqli_query($Connect, $Uquery);

$query = "UPDATE estudiante SET IDusuario= '$IDus', IDestudiante='$IDus', nomb_estudiante= '$N', IDgrado= '$G', No_documento= '$D' WHERE IDestudiante=  '$ID'";
 $Consult= mysqli_query($Connect, $query);
 header("location: Estudiantes.php");
?>