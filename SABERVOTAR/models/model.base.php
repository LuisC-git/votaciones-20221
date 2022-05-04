<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/SABERVOTAR/resources/class/class.connection.php");

class Model {
    public    $db;
    private   $view;
    private   $table;
    private   $key;
    public    $data;
    protected $afields=array();
    public    $values =array();

    public function __construct($db) {
        $this->db   = $db;
    }

    public function newRecord(){
        $this->getOne(0);
    }

    public function setView ($v) {$this->view =$v;}
    public function setTable($t) {$this->table=$t;}

    public function setKey  ($k) {$this->key  =$k;}
    public function addField($f) {
        $this->afields[]  =$f . "=?";
    }

    public function get($sql,$values){
        $this->data=$this->db->record($sql,$values);
    }
    public function gets($sql){
        $this->data=$this->db->dbrecord($sql);
    }

    public function getOne($id){
        $this->data=$this->db->record("SELECT * FROM {$this->view} WHERE {$this->key}=?",array($id));
    }

    public function getAll($order=""){
        if($order) $ord =" ORDER BY {$order}"; else $ord="";
        $this->data=$this->db->recordSet("SELECT * FROM {$this->view} {$ord}");
    }

    public function getWhere($condition,$order=""){
        if($order) $ord =" ORDER BY {$order}"; else $ord="";
        $this->data=$this->db->recordSet("SELECT * FROM {$this->view} WHERE {$condition} {$ord}");
    }

    public function next(){
        return $this->db->next($this->data);
    }

    public function insert() {
        $fields = implode(",",$this->afields);
        $sql = "INSERT INTO  {$this->table} SET {$fields}";
        $this->db->execute($sql,$this->values);
    }

    public function update($id) {
        $fields = implode(",",$this->afields);
        $sql = "UPDATE {$this->table} SET {$fields} WHERE {$this->key}={$id}";
        $this->db->execute($sql,$this->values);
    }

    public function deleteOne($id){
        $this->db->execute("DELETE FROM {$this->table} WHERE {$this->key}=?",array($id));
    }

    public function deleteWhere($condition){
        $this->db->execute("DELETE FROM {$this->table} WHERE {$condition}");
    }


}

?>