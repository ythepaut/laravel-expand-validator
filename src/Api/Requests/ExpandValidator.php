<?php

namespace Api\Requests;

use Api\Common\ApiRequest;

/**
 * Class ExpandValidator
 * @package Api\Requests
 */
class ExpandValidator extends ApiRequest {

    public function __construct(){
        parent::__construct("POST");
    }

    public function validateRequest() : bool {
        // TODO: Implement validateRequest() method.
        return false;
    }

    public function processRequest() : void {
        // TODO: Implement processRequest() method.
    }
}
