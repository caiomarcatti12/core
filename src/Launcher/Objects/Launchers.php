<?php
namespace CaioMarcatti12\Core\Launcher\Objects;


use CaioMarcatti12\Core\Launcher\Annotation\LauncherPriorityEnum;

class Launchers
{
    public static array $launcher = [];

    public static function get(LauncherPriorityEnum $priorityEnum): array
    {
        return self::$launcher[$priorityEnum->name] ?? [];
    }

    public static function add(LauncherPriorityEnum $priorityEnum, string $class): void
    {
        if(!isset(self::$launcher[$priorityEnum->name])) self::$launcher[$priorityEnum->name] = [];

        self::$launcher[$priorityEnum->name][] = $class;
    }

    public static function clear(): void
    {
        self::$launcher = [];
    }
}