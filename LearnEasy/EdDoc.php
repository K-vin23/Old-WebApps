<?php 
session_start();
include 'Connect.php';

$N = $_POST['Nomb'];
$D = $_POST['Doc'];
$ID = $_GET['IDdoc'];
$IDus= $_POST['ID'];
$C = $_POST['Contra'];

$Uquery = "UPDATE usuarios SET IDusuario= '$IDus', Contrasena= '$C' WHERE IDusuario= '$ID'";
$Consulta = mysqli_query($Connect, $Uquery);

$query = "UPDATE docente SET IDusuario= '$IDus', IDdocente='$IDus', nomb_docente= '$N', No_documento= '$D' WHERE IDdocente=  '$ID'";
 $Consult= mysqli_query($Connect, $query);
 header("location: Docentes.php");
?>