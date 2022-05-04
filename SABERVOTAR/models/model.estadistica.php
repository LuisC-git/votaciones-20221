<?php
require_once("model.base.php");

class Estadistica extends Model {
   
    public function __construct($db) {
        parent::__construct($db);
        
    }
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
$estadistica = new Estadistica($db);
$estadistica->setview("vr");
$estadistica->setKey("Idestadisticas");
$estadistica->newRecord();

?>