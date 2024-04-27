<?php

require_once './Honoo/ORMBear/dbBear.php';


class LandingPage{
    private $db;

    public function __construct() {
        $this->db = new DbBear();
    }
    
   public function index() {
        $data = array(
            'version' => getenv('VERSION')
        );
        
        $this->db->view('landingPage.php', $data);
    }
    

}

