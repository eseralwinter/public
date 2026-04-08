<?php
    class ConnectDB {
        public $connect;
        
        public function __construct(){
            $this->connect = new mysqli("MySQL-8.4", "root", "", "db_demo_2026");
        }
    }
    
    $db = new ConnectDB();  
    $conn = $db->connect;
?>