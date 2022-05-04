<?php
require_once("model.base.php");

class TipoUsuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function select($value) {
        $this->getAll("IdTipUsu");
        echo "<select name='idtipo' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdTipUsu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdTipUsu' {$sel}>$row->UsuarioTip</option>";
        }
        echo "</select>";
    }

    public function usuv($value) {
        $this->getAll("IdTipUsu");
        echo "<select name='idtipo' id='' class='form-control' style='display:none;'>";
        while ($row = $this->next()) {
            if ($row->IdTipUsu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='1' {$sel}>$row->UsuarioTip</option>";
        }
        echo "</select>";
    }
}

$tipousuario = new TipoUsuario($db);
$tipousuario->setView ("tipousuario");
$tipousuario->setTable("tipousuario");

// campos de la tabla
$tipousuario->setKey  ("IdTipUsu");
$tipousuario->addField("UsuarioTip");

$tipousuario->newRecord();
?>