<?php
//
//namespace CaioMarcatti12\Bean\Objects;
//
//final class BeanCache
//{
//    /** @var InstanceSingleton[] */
//    private static array $instances = [];
//
//    public static function add(string $class, $instance): void
//    {
//        if ($instance !== null)
//            self::$instances[$class] = new InstanceSingleton($class, $instance);
//    }
//
//    public static function get(string $class): ?object
//    {
//        if (!isset(self::$instances[$class])) return null;
//
//        return self::$instances[$class]?->getInstance();
//    }
//
//    public static function has(string $class): bool
//    {
//        return isset(self::$instances[$class]);
//    }
//
//    public static function destroy(string $class): void
//    {
//        unset(self::$instances[$class]);
//    }
//
//    public static function clear(): void
//    {
//        self::$instances = [];
//    }
//}