<?php

define("WEB_ROOT", $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);

define("CONTROLLERS", ROOT . DS . "controllers" . DS);
define("MODELS", ROOT . DS . "models" . DS);
define("VIEWS", ROOT . DS . "views" . DS);
define("CORE", ROOT . DS . "core" . DS);
define("TEMPLATES", ROOT . DS . "templates" . DS);

set_include_path(
        CONTROLLERS . PATH_SEPARATOR . 
        MODELS  . PATH_SEPARATOR . 
        VIEWS . PATH_SEPARATOR .
        CORE);

function __autoload($className) {
    require_once $className . ".php";
}

if(SHOW_ERRORS){
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
}