<?php

require_once("../models/model.acta.php");
require_once("../vendor/uploader/class.upload.php");
session_start();
if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    $ele  = $_POST["tipoele"];
    $cas  = $_POST["casilla"];
//SELECT * FROM casilla C Join municipio M On M.IdMun = C.IdCas WHERE C.IdMun=1;

    //  print_r($_POST);
    // die();
    date_default_timezone_set('America/Mexico_City');
    $fecha=date("Y-m-d H:i:s");
 
    // guardar los datos recibidos del formulario en el objeto del modelo
    $acta->values[] = $fecha;
    $acta->values[] = $_POST["tipoele"];
    $acta->values[] = $_SESSION['usuario']->IdCas;


    
    
    if ($tipo == 'nuevo') {

        $db->debug();
        $sql = "SELECT * FROM acta WHERE IdCas=? and IdEle=?";
        $acta->get($sql,array($cas,$ele));
     
        if (($acta->data->IdEle !=$ele)) {
        $acta->insert();
        $id=$db->lastId();
       // $db->debug();
        upload_photo($id);

        //die();
        //upload_photo($id);
        header("location:../?page=secretario-acta");
        }else{
            $_SESSION['error1'] = true;
            header("location:../?page=secretario-acta");
        }
    } elseif ($tipo == 'actualizar') {
       // $db->debug();
        $acta->update($id);
        upload_photo($id);
        //die();
        header("location:../?page=secretario-acta");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $acta->deleteOne($id);
        //die();
        header("location:../?page=secretario-acta");
    }


}
function upload_photo($id) {

    $target_dir = "../resources/imagen/actas";
    $target_file = $target_dir . $id . ".jpg";

    $handle = new \Verot\Upload\Upload($_FILES['acta']);

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
}

?>