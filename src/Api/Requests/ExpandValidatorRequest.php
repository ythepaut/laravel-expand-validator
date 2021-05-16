<?php

namespace Api\Requests;

use Api\Common\ApiRequest;
use Api\Model\ExpandArray;
use Api\Model\Expander;
use Api\Model\ExpandLeaf;
use Api\Model\ExpandObject;

/**
 * Class ExpandValidatorRequest
 * @package Api\Requests
 */
class ExpandValidatorRequest extends ApiRequest {

    public function __construct(){
        parent::__construct("POST");
    }

    public function processRequest() : void {
        $input = $this->getInput();

        // Result tree
        $expanded = array();

        // Looping through each "property validator"
        foreach ($input as $property => $validator) {

            // Tree cursor
            $tree = &$expanded;

            $properties = explode(".", $property);
            $validators = explode("|", $validator);

            // Processing each key
            do {

                $current = current($properties);
                $properties = array_slice($properties, 1);
                $tree = &$this->expandTree($tree, $current, $properties, $validators);

            } while (!empty($properties));

        }

        http_response_code(200);
        die(json_encode((object) $expanded));
    }

    private function &expandTree(array &$tree, string $property, array $nextProperties, array $validators) : array {

        // Skip * because it has already been processed
        if ($property !== "*") {

            if (empty($nextProperties)) {
                // Leaf

                $tree[$property] = ExpandLeaf::build($nextProperties, $validators);
                return $tree;

            } else if (next($nextProperties) === "*") {
                // Array

                $tree[$property] = ExpandLeaf::build($nextProperties, $validators);
                return $tree[$property][Expander::ITEMS];

            } else {
                // Object

                $tree[$property] = ExpandObject::build($nextProperties, $validators);
                return $tree[$property][Expander::PROPERTIES];
            }

        }
    }


    public function validateRequest() : bool {
        $input = $this->getInput();

        // No input or invalid JSON
        if (is_null($input)) {
            return false;
        }

        foreach ($input as $property => $validator) {

            $properties = explode(".", $property);
            $validators = explode("|", $validator);

            // One of the $properties is empty
            if (in_array("", $properties)) {
                return false;
            }
            // One of the validators is empty
            if (in_array("", $validators)) {
                return false;
            }

            do {
                $prev = prev($properties);
                $current = current($properties);
                $next = next($properties);

                // Properties begin with *
                if ($prev === false && $current === "*") {
                    return false;
                }
                // Two consecutive *
                if ($current === "*" && $next === "*") {
                    return false;
                }
            } while ($next !== false);
        }

        return true;
    }

    /**
     * Gets the request input
     * @return array|null
     */
    private function getInput(): ?array {
        return empty($_POST) ? json_decode(file_get_contents("php://input"), FILE_USE_INCLUDE_PATH) : $_POST;
    }
}
