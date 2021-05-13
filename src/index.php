<?php

if ($_SERVER['REQUEST_URI'] === "/expand_validator") {
    require_once("./api/expand_validator.php");
} else {
    die("Invalid route. Instructions at https://github.com/ythepaut/recruitment");
}
