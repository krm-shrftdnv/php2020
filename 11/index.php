<?php

spl_autoload_register();

include("vendor/autoload.php");

use Logger\LoggerInitiator;

$filename = "logs.json";
$logger = new LoggerInitiator($filename);
$logger->doLog("info", "this is an info message");
