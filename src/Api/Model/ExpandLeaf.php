<?php

namespace Api\Model;

class ExpandLeaf extends Expander {

    public static function build(array $properties, array $validators) : array {
        // TODO: Process case of "key:w,o" in validators
        return array(
            parent::TYPE => parent::LEAF,
            parent::VALIDATORS => $validators
        );
    }

}
