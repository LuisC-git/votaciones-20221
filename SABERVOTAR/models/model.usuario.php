<?php
require_once("model.base.php");

class Usuario extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function getAdministradores() {
        $this->getWhere("IdTipUsu=4");
    }

    public function getOperadores() {
        $this->getWhere("IdTipUsu=3");
    }

    public function getSecretarios() {
        $this->getWhere("IdTipUsu=2");
    }
    public function getVisitantes() {
        $this->getWhere("IdTipUsu=1");
    }

    public function selectOperadores($value) {
        $this->getOperadores();
        echo "<select name='idmae' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsu' {$sel}>$row->NombreUsu </option>";
        }
        echo "</select>";
    }

    public function selectSecretarios($value) {
        $this->getSecretarios();
        echo "<select name='idalu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->NombreUsu </option>";
        }
        echo "</select>";
    }

    public function selectVisiantes($value) {
        $this->getVisitantes();
        echo "<select name='idalu' id='' class='form-control'>";
        while ($row = $this->next()) {
            if ($row->IdUsu==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdUsuario' {$sel}>$row->NombreUsu </option>";
        }
        echo "</select>";
    }



}

$usuario = new Usuario($db);
$usuario->setView ("vw_usuario");
$usuario->setTable("usuario");
$usuario->setKey  ("IdUsu");
$usuario->addField("NombreUsu");
$usuario->addField("PrimerApeUsu");
$usuario->addField("SegundoApeUsu");
$usuario->addField("TelefonoUsu");
$usuario->addField("GeneroUsu");
$usuario->addField("CorreoUsu");
$usuario->addField("ContrasenaUsu");
$usuario->addField("IdTipUsu");
$usuario->newRecord();
?>