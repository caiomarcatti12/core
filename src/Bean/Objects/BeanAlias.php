<?php

namespace CaioMarcatti12\Core\Bean\Objects;

use CaioMarcatti12\Core\Bean\Enum\BeanType;

final class BeanAlias
{
    public static array $alias = [];

    private function __construct()
    {
    }

    public static function get(BeanType $type): array
    {
        return self::$alias[$type->value] ?? [];
    }

    public static function add(BeanType $type, string $class): void
    {
        self::$alias[$type->value][] = $class;
    }

    public static function clear(): void
    {
        self::$alias = [];
    }
}