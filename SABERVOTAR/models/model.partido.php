<?php
require_once("model.base.php");

class Partido extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
    
    public function partido($value) {
        $this->getAll("IdPar");
        echo "<select name='partido' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdPar==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdPar' {$sel}>$row->NombrePar  </option>";
        }
        echo "</select>";
    }

}

$partido = new Partido($db);
$partido->setView ("partido");
$partido->setTable("partido");

// campos de la tabla
$partido->setKey  ("IdPar");
$partido->addField("NombrePar");
$partido->newRecord();
?>