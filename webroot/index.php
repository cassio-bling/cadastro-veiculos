<?php
define("WEBROOT", str_replace("webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define("ROOT", str_replace("webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require(ROOT . "config/core.php");
require(ROOT . "config/router.php");
require(ROOT . "config/request.php");
require(ROOT . "config/dispatcher.php");

$dispatch = new Dispatcher();
$dispatch->dispatch();
