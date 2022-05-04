<?php
require_once("model.base.php");
session_start();
class Eleccion extends Model {
   
    public function __construct($db) {
        parent::__construct($db);
    }
    
    public function eleccion($value) {
        $this->getAll("IdEle");
        echo "<select name='tipoele' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdEle==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdEle' {$sel}>$row->TipoEle  </option>";
        }
        echo "</select>";
    }
}
$eleccion = new Eleccion($db);
$eleccion->setview("tipoeleccion");
$eleccion->newRecord();

?>