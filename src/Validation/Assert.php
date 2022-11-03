<?php

namespace CaioMarcatti12\Validation;

class Assert
{
    public static function isTrue($value): bool
    {
        return $value === true;
    }

    public static function isFalse($value): bool
    {
        return $value === false;
    }

    public static function equals($value1, $value2): bool
    {
        return $value1 === $value2;
    }

    public static function equalsIgnoreCase($value1, $value2): bool
    {
        return strtolower($value1) === strtolower($value2);
    }

    public static function isNull($value): bool
    {
        return $value !== false && is_null($value);
    }

    public static function isNotNull($value): bool
    {
        return !(self::isNull($value));
    }

    public static function isEmpty($value): bool
    {
        if($value === 0) return true;

        return $value !== false && (empty($value) || self::isNull($value));
    }

    public static function isNotEmpty($value): bool
    {
        return !(self::isEmpty($value));
    }

    public static function inArray($needle, $array): bool
    {
        return in_array($needle, $array);
    }

    public static function keyExists($needle, $array): bool
    {
        return isset($array[$needle]);
    }

    public static function isPrimitiveTypeName($needle): bool
    {
        return in_array($needle, ['string', 'double', 'int', 'integer', 'long', 'float', 'bool', 'boolean', 'numeric', 'array', 'mixed']);
    }
}