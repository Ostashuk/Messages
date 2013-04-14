<?php

/**
 * Description of Router
 *
 * @author Fake
 */
class Router 
{
    public static function route()
    {
                
        $url = str_replace("?", "/", $_SERVER['REQUEST_URI']);
        if($_SERVER['HTTP_HOST'] == 'localhost'){
            $url = str_ireplace(BASE_DIR, '', $url);
        }
        
        $routes = !empty($url)?
                    explode('/', trim($url, '/'))
                :
                    array('Messages', 'main');

        $controller = 'user';
        $action = 'login';
        if(!empty($routes['0']) && !empty($routes['1'])){
            $controller = $routes['0'];
            $action = $routes['1'];
        }
        
        $controllerName = ucfirst($controller) . 'Controller';
        $modelName = ucfirst($controller) . 'Model';
        $viewName = ucfirst($controller) . 'View';
        $actionName = strtolower($action) . 'Action';
        
        try{
            $controller = new $controllerName($modelName, $viewName);
            $controller->$actionName();
        }catch(Exception $e){
            echo $e->getMessage();
        }
                
    }
}

