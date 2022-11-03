<?php

namespace CaioMarcatti12\Bean;

use ReflectionClass;
//use CaioMarcatti12\Bean\Exception\NotConcreteInstanceException;
//use CaioMarcatti12\Bean\Resolver\ClassResolver;
//use CaioMarcatti12\Bean\Resolver\PropertyResolver;
//use CaioMarcatti12\Validation\Assert;

class BeanLoader
{
    /**
     * @throws \ReflectionException
     */
    public static function loader(string $className, $arguments = [], bool $enableCache = true): mixed
    {
        $reflectionClass = new ReflectionClass($className);

        $instance = $reflectionClass->newInstanceWithoutConstructor();
//        $instance = InstanceMaker::createIfNotExists($reflectionClass->getName(), $arguments, $enableCache);

//        if(!$reflectionClass->isInstantiable() && Assert::isNull($instance)) throw new NotConcreteInstanceException($reflectionClass->getName());
//
//        self::resolve($instance);
//
        return $instance;
    }
//
//    /**
//     * @param $instance
//     * @return void
//     * @throws \ReflectionException
//     * @throws \CaioMarcatti12\Env\Exception\PropertyNotFoundException
//     */
//    public static function resolve(&$instance): void
//    {
//        (new ClassResolver())->handler($instance);
//
//        $reflectionClass = new ReflectionClass($instance);
//
//        /** @var \ReflectionProperty $property */
//        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
//            (new PropertyResolver)->handler($instance, $reflectionProperty);
//        }
//    }
}