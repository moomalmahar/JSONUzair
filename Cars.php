<?php
include 'Config.php';
class Cars extends Config {
    
     public function __construct() {
        parent::__construct();
    }
    
    
     public function insert($query) {
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        } else {
            return true;
        }
    }
}
