<?php

namespace Api\Model;

abstract class Expander {

    public const TYPE = "type";
    public const VALIDATORS = "validators";
    public const ITEMS = "items";
    public const PROPERTIES = "properties";

    public const LEAF = "leaf";
    public const OBJECT = "object";
    public const ARRAY = "array";

    public const UNDEFINED = "?";


    /**
     * Creates an associative array to expand the Laravel validator
     * @param array $properties         Properties (e.g. ["*", "y", "t"])
     * @param array $validators         Validators (e.g. ["integer", "min:5"])
     * @return array
     */
    abstract public static function build(array $properties, array $validators) : array;

}
