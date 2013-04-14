<?php

/**
 * Description of Model
 *
 * @author Fake
 */
class Model {
    
    protected $_database;
    
    protected function __construct() {
        $this->_database = Database::getInstance();
    }
}

?>
