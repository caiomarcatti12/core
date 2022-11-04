<?php

namespace CaioMarcatti12\Core\Factory;

use CaioMarcatti12\Core\Bean\Exception\NotConcreteInstanceException;
use CaioMarcatti12\Core\Bean\Objects\BeanCache;
use CaioMarcatti12\Core\Bean\Objects\BeanProxy;
use CaioMarcatti12\Core\Bean\Resolver\ClassResolver;
use CaioMarcatti12\Core\Bean\Resolver\PropertyResolver;
use CaioMarcatti12\Core\Validation\Assert;

class InstanceFactory
{
    /**
     * @throws \ReflectionException
     */
    public static function createIfNotExists(string $class, $arguments = [], bool $enableCache = true): mixed
    {
        $class = BeanProxy::get($class);

        $instance = BeanCache::get($class);

        if (Assert::isNull($instance)) {
            $instance = self::create($class, $arguments);
        }

        if($enableCache){
            BeanCache::add($class, $instance);
        }

        return $instance;
    }

    /**
     * @throws \ReflectionException
     */
    private static function create(string $class, $arguments): mixed
    {
        $reflectionClass = new \ReflectionClass($class);

        if(!$reflectionClass->isInstantiable()) throw new NotConcreteInstanceException($reflectionClass->getName());

        $instance = $reflectionClass->newInstanceArgs($arguments);

        self::resolveProperties($instance);
        return $instance;
    }

    public static function resolveProperties(&$instance): void
    {
        (new ClassResolver())->handler($instance);

        $reflectionClass = new \ReflectionClass($instance);

        /** @var \ReflectionProperty $property */
        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
            (new PropertyResolver())->handler($instance, $reflectionProperty);
        }
    }
}