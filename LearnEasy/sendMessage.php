<?php
include "Connect.php";
session_start();
if($_POST)
{
	$name=$_SESSION['User'];
    $msg=$_POST['msg'];
    
	$sql="INSERT INTO chat(Usuario, Mensaje) VALUES ('".$name."', '".$msg."')";

	$query = mysqli_query($Connect, $sql);
	if($query)
	{
		header('Location: chatpage.php');
	}
	else
	{
		echo "Algo salió mal";
	}
	
	}
?>