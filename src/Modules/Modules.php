<?php

namespace CaioMarcatti12\Core\Modules;

use CaioMarcatti12\Core\Bean\AliasForLoader;
use CaioMarcatti12\Core\Bean\ResolverLoader;
use CaioMarcatti12\Core\Factory\InstanceFactory;

class Modules
{
    private static array $modules = [];

    public static function register(ModulesEnum $module): void{
        self::$modules[$module->name] = true;
    }

    public static function has(ModulesEnum $module): bool{
        return isset(self::$modules[$module->name]);
    }
}