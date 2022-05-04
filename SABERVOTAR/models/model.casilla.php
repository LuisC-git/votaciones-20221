<?php
require_once("model.base.php");

class Casilla extends Model {

    // public function mun($value) {
        
    //     $this->getAll('IdUsu=1');
    //     echo "<select name='municipio' id='' class='form-control'>";
    //     while ($row = $this->next()) {
    //         if ($row->IdMun==$value) $sel = "SELECTED"; else $sel="";
    //         echo "<option value='$row->IdMun' {$sel}>$row->NombreEst, $row->NombreMun </option>";
    //     }
    //     echo "</select>";
    // }
  
    // public function municipio($value) {
    //     $this->getAll('IdUsu='.$_SESSION['usuario']->IdUsu);
    //     echo "<select  display='none' name='tipoele' id='' class='form-control' '>";
    //     while ($row = $this->next()) {
    //         if ($row->IMun==$value) $sel = "SELECTED"; else $sel="";
    //         echo "<option value='$row->IMun' {$sel}>$row->IdMun  </option>";
    //     }
    //     echo "</select>";
    // }

}

$casilla = new Casilla($db);
//$municipio = new Casilla($db);
$casilla->setView ("vw_casilla");
//$municipio->setView ("vw_municipio");
$casilla->setTable("casilla");
$casilla->setKey  ("IdCas");
$casilla->addField("ColoniaCas");
$casilla->addField("TipoCas");
$casilla->addField("LongitudCas");
$casilla->addField("LatitudCas");
$casilla->addField("CalleCas");
$casilla->addField("NumeroCas");
$casilla->addField("CodigoPostCas");
$casilla->addField("SeccionCas");
$casilla->addField("HoraInc");
$casilla->addField("HoraFin");
$casilla->addField("IdMun");
$casilla->newRecord();
//$municipio->newRecord();
?>