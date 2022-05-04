<?php

require_once("../models/model.partido.php");
require_once("../vendor/uploader/class.upload.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    
    $nombre     = $_POST["nombre"];
   // $apellidopa = $_POST["logo"];


    //print_r($_POST);
    //die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $partido->values[] = $_POST["nombre"];
    //$partido->values[] = $_POST["logo"];





    if ($tipo == 'nuevo') {
       // $db->debug();
        $partido->insert();
       
        header("location:../?page=adm-partido");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $partido->update($id);
        upload_photo($id);
        //die();
        header("location:../?page=adm-partido");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $partido->deleteOne($id);
        //die();
        header("location:../?page=adm-partido");
    }
}
function upload_photo($id) {

    $target_dir = "../resources/imagen/partidos";
    $target_file = $target_dir . $id . ".jpg";

    $handle = new \Verot\Upload\Upload($_FILES['logo']);

    if ($handle->uploaded) {
        $handle->file_new_name_body = $id;
        $handle->image_resize       = true;
        $handle->image_x            = 200;
        $handle->image_ratio_y      = true;
        $handle->image_convert      = 'jpg';
        $handle->file_overwrite     = true;

        $handle->process($target_dir);
        if ($handle->processed) {
            $handle->clean();
        } else {
            //echo 'error : ' . $handle->error;
            //die();
        }
    } else {
        //die("not uploaded " . $_FILES['fotomun'] );
    }

    //echo $handle->log;
    //die();
}

?>