<?php

namespace Api\Common;

/**
 * Class ApiRequest
 * @package Api\Common
 */
abstract class ApiRequest {

    /**
     * Request constructor
     * Validates the request, then process it.
     */
     public function __construct(string $method) {
        if ($_SERVER["REQUEST_METHOD"] !== $method) {
            http_response_code(405);
            die(json_encode(array(
                "status" => "error",
                "verbose" => "Invalid method. Expected " . $method . "."
            )));
        } else if (!$this->validateRequest()) {
            http_response_code(400);
            die(json_encode(array(
                "status" => "error",
                "verbose" => "Invalid data"
            )));
        } else {
            $this->processRequest();
        }
    }

    /**
     * Verifies that the input request is valid in order to process it.
     * @return bool     (True if the data to process is valid)
     */
    abstract public function validateRequest() : bool;

    /**
     * Main request function.
     * Should terminate the request.
     */
    abstract public function processRequest() : void;
}