<?php

namespace CaioMarcatti12\Bean\Objects;

final class BeanProxy
{
    private static array $proxy = [];

    private function __construct()
    {
    }

    public static function add(string $class, string $classProxy): void
    {
        self::$proxy[$class] = $classProxy;
    }

    public static function get(string $class): ?string
    {
        return self::$proxy[$class] ?? $class;
    }

    public static function destroy(string $class): void
    {
        unset(self::$proxy[$class]);
    }
}