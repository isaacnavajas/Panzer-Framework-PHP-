<?php

require_once './Honoo/ORMHonoo/dbHonoo.php';

class ExampleModel {
    private $db;
    
    public function __construct() {
        $this->db = new DbHonoo();
    }
    
    public function index() {
        echo "hola mundo";
    }
    
    public function getUserById($id) {
        $user = $this->db->select("*", "usuarios", "WHERE id = $id");
        return $user;
    }
    
    public function postUser() {
        $id = $db->insert("usuarios", "id, titulo", "7, 44");
        return $id;
    }
}