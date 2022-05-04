<?php
require_once("model.base.php");

class Funcionario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }
    
    public function selectFuncionario($value) {
        $this->getAll("idFun");
        echo "<select name='idfun' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdFun==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdFun' {$sel}>$row->NombreFun  </option>";
        }
        echo "</select>";
    }


}

$funcionario = new Funcionario($db);
$funcionarios = new Funcionario($db);
$funcionarios->setView ("vw_casilla");
$funcionario->setView ("vw_funcionario");

$funcionario->setTable("funcionario");

// campos de la tabla
$funcionario->setKey  ("IdFun");
$funcionario->addField("NombreFun");
$funcionario->addField("PrimerApeFun");
$funcionario->addField("SegundoApeFun");
$funcionario->addField("PuestoFun");
$funcionario->addField("TelefonoFun");
$funcionario->addField("IdCas");

$funcionario->newRecord();
//$funcionario->newRecord();
?>