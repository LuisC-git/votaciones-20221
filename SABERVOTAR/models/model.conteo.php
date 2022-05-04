<?php
require_once("model.base.php");

class Conteo extends Model {
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
    // public function partido($value) {
    //     $this->getAll("IdPar");
    //     echo "<select name='partido' id='' class='form-control'>";
    //     while ($row = $this->next()) {
    //         if ($row->IdPar==$value) $sel = "SELECTED"; else $sel="";
    //         echo "<option value='$row->IdPar' {$sel}>$row->NombrePar  </option>";
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
//$partido = new Conteo($db);
// $eleccion = new Conteo($db);
// $casilla = new Acta($db);

$conteo= new Conteo($db);
$conteo->setView ("vw_conteo");
//$funcionario->setView ("vw_funcionario");
$conteo->setTable("conteo");

//$partido->setview("partido");
 //$eleccion->setview("tipoeleccion");
// $casilla->setview("vw_casilla");

// campos de la tabla
$conteo->setKey  ("IdCont");
$conteo->addField('VotoCont');
$conteo->addField('FechaCont');
$conteo->addField("IdPar");
$conteo->addField("IdEle");
$conteo->addField("IdCas");


$conteo->newRecord();
//$partido->newRecord();
//$eleccion->newRecord();
?>