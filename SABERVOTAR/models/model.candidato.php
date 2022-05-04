<?php
require_once("model.base.php");
session_start();
class Candidato extends Model {
   
    public function __construct($db) {
        parent::__construct($db);
    }
    
    
}

$candidato = new Candidato($db);
$candidato->setView ("vw_candidatos");
$candidato->setTable("candidato");

// campos de la tabla
$candidato->setKey ("IdCan");
$candidato->addField("NombreCan");
$candidato->addField("PrimerApeCan");
$candidato->addField("SegundoApeCan");
$candidato->addField("IdPar");
$candidato->addField("IdEle");
$candidato->addField("IdMun");

$candidato->newRecord();
?>