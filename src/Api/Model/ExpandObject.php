<?php

namespace Api\Model;

class ExpandObject extends Expander {

    public static function build(array $properties, array $validators) : array {
        return array(
            parent::TYPE => parent::OBJECT,
            parent::VALIDATORS => array(parent::OBJECT),
            parent::PROPERTIES => array()
        );
    }

}
