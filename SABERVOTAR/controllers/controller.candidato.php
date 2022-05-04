<?php
    
require_once("../models/model.candidato.php");
//session_start();

if ($_POST) {

    $id   = $_POST["id"];
    $tipo = $_POST["tipo"];
    
    

    //  $nombre     = $_POST["nombre"];
    //  $apellidopa = $_POST["apellidopa"];
    //  $apellidoma = $_POST["apellidoma"];
    //  $partido     = $_POST["partido"];
    //  $partido     = $_POST["municipio"];
    $db->debug();



// $consulta->getAll("IdUsu");

//  echo ('<pre>');
//  var_dump($consulta);
//  echo ('</pre>');
//  die;
   

    //   print_r($_POST);
    //  die();

    // guardar los datos recibidos del formulario en el objeto del modelo
    $candidato->values[] = $_POST["nombre"];
    $candidato->values[] = $_POST["apellidoma"];
    $candidato->values[] = $_POST["apellidopa"];
    $candidato->values[] = $_POST["partido"];
    $candidato->values[] = $_POST["tipoele"];
    $candidato->values[] = $_POST["municipio"];




    if ($tipo == 'nuevo') {
        //$db->debug();
        $candidato->insert();
        //die();
        
        header("location:../?page=operador-candidato");
       // header("location:../?page=operador-candidato");

    } elseif ($tipo == 'actualizar') {
        //$db->debug();
        $candidato->update($id);
        //die();
       // header("location:../?page=adm-candidato");
       header("location:../?page=operador-candidato");
    }
    elseif ($tipo == 'borrar') {
        //$db->debug();
        $candidato->deleteOne($id);
        //die();
        //header("location:../?page=adm-candidato");
        header("location:../?page=operador-candidato");
    }
}
