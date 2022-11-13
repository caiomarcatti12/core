<?php

namespace CaioMarcatti12\Core\Modules;

class Modules
{
    private static array $modules = [];

    public static function enable(ModulesEnum $module): bool{
        return self::$modules[$module->name] = true;
    }

    public static function isEnabled(ModulesEnum $module): bool{
        return isset(self::$modules[$module->name]) && self::$modules[$module->name] === true;
    }
}