<?php
require_once("model.base.php");

class Acta extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
    
    // public function eleccion($value) {
    //     $this->getAll("IdEle");
    //     echo "<select name='tipoele' id='' class='form-control'>";
    //     while ($row = $this->next()) {
    //         if ($row->IdEle==$value) $sel = "SELECTED"; else $sel="";
    //         echo "<option value='$row->IdEle' {$sel}>$row->TipoEle  </option>";
    //     }
    //     echo "</select>";
    // } 


    public function getFederales() {
        $this->getWhere("IdEle=1");
    }

    public function getGubernamentales() {
        $this->getWhere("IdEle=2");
    }

    public function getMunicipal() {
        $this->getWhere("IdEle=3");
    }
    public function getAyuntamiento() {
        $this->getWhere("IdEle=4");
    }
    public function getLocales() {
        $this->getWhere("IdEle=5");
    }
    public function getPresidencia() {
        $this->getWhere("IdEle=6");
    }








}

//$funcionario = new Funcionario($db);
//$eleccion = new Acta($db);
//$casilla = new Acta($db);
$acta = new Acta($db);
$acta->setView ("vw_acta");
//$funcionario->setView ("vw_funcionario");
$acta->setTable("acta");


//$eleccion->setview("tipoeleccion");
//$casilla->setview("vw_casilla");

// campos de la tabla
$acta->setKey  ("IdAct");
$acta->addField('FechaAct');
$acta->addField("IdEle");
$acta->addField("IdCas");
$acta->newRecord();
//$casilla->newRecord();
//$eleccion->newRecord();
?>