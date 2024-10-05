<?php
    define('CONTROLLERS_FOLDER', "Controller/");
    define('DEFAULT_CONTROLLER', "Modelos");
    define('DEFAULT_ACTION', "lista");

    $controlador = DEFAULT_CONTROLLER;
    if (!empty ($_GET['controller'])){
        $controlador = $_GET['controller'];
    }
    $accion = DEFAULT_ACTION;
    if (!empty ($_GET['action'])) {
        $accion = $_GET['action'];
    }

    $controlador = CONTROLLERS_FOLDER.$controlador.'.php';
    try {
        if (is_file($controlador)) {
            require_once ($controlador);
        }else{
            throw new Exception ('El controlador no existe');
            echo "Controlador no encontrado";
        }

        if (is_callable($accion)) {
            $accion();
        }else{
            throw new Exception ('la accion no existe');
            echo "Accion no identificada";
        }
    } catch (\Throwable $th) {
        
    }
?>