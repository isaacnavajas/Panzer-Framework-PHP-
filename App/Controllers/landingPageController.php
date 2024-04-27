<?php

require_once './Honoo/ORMHonoo/dbHonoo.php';


class LandingPage{
    private $db;

    public function __construct() {
        $this->db = new DbHonoo();
    }
    
   public function index() {
        $data = array(
            'version' => getenv('VERSION')
        );
        
        $this->db->view('landingPage.php', $data);
    }
    

}

