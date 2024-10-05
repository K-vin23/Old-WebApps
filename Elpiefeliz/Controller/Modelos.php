<?php 

function lista(){
    //Se incluye el modelo para los modelos de zapatos
    require "Model\Modelos.php";
    $model = new Modelos();
    $modelos = $model->getModelos();
    //Se incluye la vista para los modelos
    include "Views\lista_modelos.php";
}

function getByType(){
    if (!isset ($_GET['id'])){
        die("No se a especificado el grupo");
    }
    $id = $_GET['id'];
    require "Model\Modelos.php";
    $model = new Modelos();
    $modelos = $model->getGroupModels($id);
    if ($modelos === null) {
        die("Id de grupo incorrecto");
    }
    include "Views\lista_modelos.php";
}



?>