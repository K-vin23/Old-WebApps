<?php
    require_once "Connection.php";


    class Modelos extends Database {
        function getModelos(){
            $query = $this->connect()->query('SELECT mo.IDmodelo, mo.Modelo, mc.Marca, tc.Tipo, img.RutaIMG, bod.Precio_Unit 
                FROM modelo as mo
                INNER JOIN marca as mc ON mo.IDmarca = mc.IDmarca
                INNER JOIN tipo_calzado as tc ON mo.IDtipocalzado = tc.IDtipocalzado
                INNER JOIN img_referencia as img ON img.IDmodelo = mo.IDmodelo
                INNER JOIN bodega as bod ON bod.IDmodelo = mo.IDmodelo');
            $modelos = array();

            while ($model = $query->fetch()) {
                $modelos[] = $model;
            }
            return $modelos;
        }

        function getGroupModels($id){
            $query = $this->connect()->prepare('SELECT mo.IDmodelo, mo.Modelo, mc.Marca, tc.Tipo, img.RutaIMG, bod.Precio_Unit 
                FROM modelo as mo
                INNER JOIN Marca as mc ON mo.IDmarca = mc.IDmarca
                INNER JOIN tipo_calzado as tc ON mo.IDtipocalzado = tc.IDtipocalzado
                INNER JOIN img_referencia as img ON img.IDmodelo = mo.IDmodelo 
                INNER JOIN bodega as bod ON bod.IDmodelo = mo.IDmodelo WHERE mo.IDtipocalzado = :id');
            $query->execute(['id' => $id]);

            $modelos = array();

            while ($model = $query->fetch()) {
                $modelos[] = $model;
            }
            return $modelos;
        }
    }
?>