<?php

//Перевіряємо PHP версію
if (version_compare(phpversion(), '5.1.0', '<') == true){ 
    die ('Несумісна PHP версія. Використовуйте PHP 5.1.0 або вище.'); 
}

require_once "Config.php";

try{
    Router::route();
}catch(Exception $ex){
    die($ex->getMessage());
}
