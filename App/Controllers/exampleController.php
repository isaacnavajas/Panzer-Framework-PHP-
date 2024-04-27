<?php

require_once './Honoo/ORMBear/dbBear.php';
require_once './App/Models/exampleModel.php';

class ExampleController {
    private $db;

    public function __construct() {
        $this->db = new DbBear();
    }
    
    
   public function index() {
        $data = array(
            'titulo' => 'Página de inicio'
        );
        
        $this->db->view('index.php', $data);
    }

    public function getUser($id) {
        $userModel = new ExampleModel();
        $data = $userModel->getUserById($id);
        
        if ($data) {
            echo "Usuario encontrado: <br>";
            $this->db->view('index.php', $data);
        } else {
            echo "Usuario no encontrado";
        }
    }
    
    public function store() {
        echo "Guardandndo id ...";
        $this->db->insert("usuarios", "id, titulo", "7, 44");
        
    }
     
    public function notFound() {
        echo "Página no encontrada";
    }

}

