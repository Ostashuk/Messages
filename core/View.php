<?php

/**
 * Description of View
 *
 * @author Fake
 */
class View 
{
    public function generate($pageName){
        $page = TEMPLATES . $pageName . 'Page.php';
        if(file_exists($page)){
            require_once $page;
        }else{
            throw new Exception("Сторінки не існує.");
        }
    }
}

?>
