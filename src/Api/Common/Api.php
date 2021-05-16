<?php

namespace Api\Common;

/**
 * Class Api
 * @package Api\Common
 */
class Api {

    function __construct() {
        if (APPLICATION_ENV === "dev")
            $this->setupErrorDisplay();
        $this->setupHeaders();
    }

    /**
     * When run, the page will show any error that occurred.
     */
    private function setupErrorDisplay() : void {
        ini_set("display_errors", 1);
        ini_set("display_startup_errors", 1);
        error_reporting(E_ALL);
    }

    /**
     * Sets up common headers for the API.
     * NOTE : Only allows POST requests since the API only accepts POST request at the moment.
     */
    private function setupHeaders() : void {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }
}
