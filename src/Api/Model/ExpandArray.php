<?php

namespace Api\Model;

class ExpandArray extends Expander {

    public static function build(array $properties, array $validators) : array {
        return array(
            parent::TYPE => parent::ARRAY,
            parent::VALIDATORS => array(parent::ARRAY),
            parent::ITEMS => array()
        );
    }

}
