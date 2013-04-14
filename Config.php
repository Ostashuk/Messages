<?php

define("SHOW_ERRORS", TRUE);
define("BASE_DIR", "Messages");
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__FILE__));

header("Content-Type: text/html;charset=utf-8");

define("HOST", "localhost");
define("USER", "Ostashuk");
define("PASSWORD", "20041993");
define("DATABASE", "messages");

require_once ROOT . DS . "libs" . DS . "Bootstrap.php";