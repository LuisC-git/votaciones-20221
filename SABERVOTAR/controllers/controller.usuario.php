<?php

require_once("../models/model.usuario.php");
require_once("../vendor/uploader/class.upload.php");

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    // print_r($_POST);
    // die();

    // guardar los datos del formulario en el modelo
    $usuario->values[] = $_POST["nombre"];
    $usuario->values[] = $_POST["apellidopat"];
    $usuario->values[] = $_POST["apellidomat"];
    $usuario->values[] = $_POST['telefono'];
    $usuario->values[] = $_POST['genero'];
    $usuario->values[] = $_POST['correo'];
    $usuario->values[] = $_POST['password'];
    $usuario->values[] = $_POST['idtipo'];

    if ($tipo == 'nuevo') {
        //$db->debug();
        $usuario->insert();
        $id=$db->lastId();
        // $db->debug();
         upload_photo($id);
 
        //die();
        header("location:../?page=adm-usuario");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $usuario->update($id);
        upload_photo($id);
        //die();
        header("location:../?page=adm-usuario");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $usuario->deleteOne($id);
        //die();
        header("location:../?page=adm-usuario");
    }

}
    function upload_photo($id) {

        $target_dir = "../resources/imagen/usuario";
        $target_file = $target_dir . $id . ".jpg";
    
        $handle = new \Verot\Upload\Upload($_FILES['imgusuario']);
    
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