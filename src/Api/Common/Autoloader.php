<?php

namespace Api\Common;

/**
 * Class Autoloader
 * @package Api\Common
 */
class Autoloader {

    /**
     * Registers the Autoloader for automatic class import
     */
    public static function register() : void {
        spl_autoload_register(array(__CLASS__, "autoload"));
    }

    /**
     * Loads the class $className
     * @param                           $classPath          -   Class to import
     * @return void
     */
    static function autoload(string $classPath) : void {
        $classPath = str_replace("\\", DIRECTORY_SEPARATOR, $classPath);
        require_once($classPath . ".php");
    }
}
