<?php

/**
 * Description of Controller
 *
 * @author Fake
 */
class Controller 
{
    
    protected $_model;
    protected $_view;
    
    protected function __construct($model, $view) 
    {
        $this->_model = new $model();
        $this->_view = new $view();
    }
        
}

?>
