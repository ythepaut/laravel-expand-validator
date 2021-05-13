<?php

use Api\Common\Api;
use Api\Common\Autoloader;
use Api\Requests\ExpandValidator;

require_once("config.php");

require_once("Api/Common/Autoloader.php");
Autoloader::register();

$api = new Api();

if ($_SERVER['REQUEST_URI'] === "/expand_validator") {
    new ExpandValidator();
} else {
    die("Invalid route. Instructions at https://github.com/ythepaut/recruitment");
}
