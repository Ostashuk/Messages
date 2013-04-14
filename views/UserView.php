<?php

/**
 * Description of UserView
 *
 * @author Fake
 */
class UserView extends View{
    
    public function generate($pageName){
        $page = TEMPLATES . "message" . DS . $pageName . "Page.php";
        if(file_exists($page)){
            require_once $page;
        }else{
            parent::generate($pageName);
        }
    }
}

?>
