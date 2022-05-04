<?php

require_once("../models/model.conteo.php");
session_start();

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];

    $ele  = $_POST["tipoele"];
    $cas  = $_POST["casilla"];
    $par  = $_POST["partido"];
   
    //  print_r($_POST);
    //  die();
    date_default_timezone_set('America/Mexico_City');
    $fecha=date("Y-m-d H:i:s");
    // guardar los datos recibidos del formulario en el objeto del modelo
    $conteo->values[] = $_POST["voto"];
    $conteo->values[] = $fecha;
    $conteo->values[] = $_POST["partido"];
    $conteo->values[] = $_POST["tipoele"];
    $conteo->values[] = $_SESSION['usuario']->IdCas;





    if ($tipo == 'nuevo') {
        $db->debug();
        $sql = "SELECT * FROM conteo WHERE IdCas=? and IdEle=? and IdPar=?";
        $conteo->get($sql,array($cas,$ele,$par));
     
        if (($conteo->data->IdEle !=$ele)) {
        //$db->debug();
        $conteo->insert();
        //die;
        //upload_photo($id);
        header("location:../?page=secretario-conteo");
        //die;
        }else{
            header("location:../?page=secretario-conteo");
        }
    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $conteo->update($id);
       // upload_photo($id);
        //die();
        header("location:../?page=secretario-conteo");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $conteo->deleteOne($id);
        //die();
        header("location:../?page=secretario-conteo");
    }
}

?>