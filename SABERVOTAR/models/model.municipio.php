<?php
require_once("model.base.php");
include("/resources/class.connection.php");
session_start();



class Municipio extends Model {
   
    public function __construct($db) {
        parent::__construct($db);
    }
    
    
    public function municipio($value) {
        $this->getAll('IdUsu='.$_SESSION['usuario']->IdUsu);
        echo "<select style='display:none' name='municipio' id='' class='form-control >";
        while ($row = $this->next()) {
            if ($row->IMun==$value) $sel = "SELECTED"; else $sel="";
            echo "<option value='$row->IdMun' {$sel}>$row->IdMun  </option>";
        }
        echo "</select>";
    }

    public function municipios() {
        $this->getWhere('IdUsu=4');
        $mun = $this->next()->IdMun;
    //   echo ('<pre>');
    //   var_dump($mun);
      
      
        }
        
    }
   
    


$municipio = new Municipio($db);
$municipio->setview("vw_usuario");
$municipio->newRecord();



?>