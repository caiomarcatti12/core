<?php
//
//namespace CaioMarcatti12\Bean;
//
//use CaioMarcatti12\Bean\Objects\BeanCache;
//use CaioMarcatti12\Bean\Objects\BeanProxy;
//use CaioMarcatti12\Validation\Assert;
//
//class InstanceMaker
//{
//    /**
//     * @throws \ReflectionException
//     */
//    public static function createIfNotExists(string $class, $arguments = [], bool $enableCache = true): mixed
//    {
//        $class = BeanProxy::get($class);
//
//        $instance = BeanCache::get($class);
//
//        if (Assert::isNull($instance)) {
//            $instance = self::create($class, $arguments);
//        }
//
//        if($enableCache){
//            BeanCache::add($class, $instance);
//        }
//
//        return $instance;
//    }
//
//    /**
//     * @throws \ReflectionException
//     */
//    private static function create(string $class, $arguments): mixed
//    {
//        $reflectionClass = new \ReflectionClass($class);
//        if(!$reflectionClass->isInstantiable()) return null;
//
//        $instance = $reflectionClass->newInstanceArgs($arguments);
//
//
//        return $instance;
//    }
//}