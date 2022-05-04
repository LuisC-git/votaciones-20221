<?php
function upload_photo($id) {

    $target_dir = "../fotos/";
    $target_file = $target_dir . $id . ".jpg";

    $handle = new \Verot\Upload\Upload($_FILES['fotomun']);

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
