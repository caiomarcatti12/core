<?php

namespace CaioMarcatti12\Core\Factory;

use CaioMarcatti12\Core\Bean\Objects\BeanProxy;
use CaioMarcatti12\Core\Bean\Resolver\ClassResolver;
use CaioMarcatti12\Core\Bean\Resolver\MethodResolver;
use CaioMarcatti12\Core\Bean\Resolver\ParameterResolver;
use ReflectionClass;
use ReflectionMethod;
use CaioMarcatti12\Data\Request\Objects\Body;
use CaioMarcatti12\Core\Validation\Assert;
use MongoDB\BSON\ObjectId;
use CaioMarcatti12\Core\Bean\Objects\BeanCache;
use CaioMarcatti12\Data\Request\Objects\Header;
use CaioMarcatti12\Router\Exception\ResponseTypeException;
use CaioMarcatti12\Router\Interfaces\RouterResponseInterface;
use CaioMarcatti12\Webserver\Annotation\Presenter;
use CaioMarcatti12\Webserver\RouterResponseWeb;

class Invoke
{
    public static function new(string $className, string $method): mixed
    {
        $instance = self::loaderClass($className);

        $reflectionClass = new ReflectionClass($instance);

        /** @var ReflectionMethod $reflectionMethod */
        $reflectionMethod = $reflectionClass->getMethod($method);

        self::resolveAttributeMethod($instance, $reflectionMethod);
        $parameters = self::resolveParametersMethod($reflectionMethod);

        return $reflectionMethod->invokeArgs($instance, $parameters);
    }

    private static function loaderClass(string $className): mixed
    {
        return InstanceFactory::createIfNotExists($className);
    }

    private static function resolveAttributeMethod(mixed $instance, ReflectionMethod $reflectionMethod): void
    {
        (new MethodResolver())->handler($instance, $reflectionMethod);
    }

    private static function resolveParametersMethod(ReflectionMethod $reflectionMethod): mixed
    {
        $parameters = [];

        /** @var \ReflectionParameter $reflectionParameter */
        foreach ($reflectionMethod->getParameters() as $reflectionParameter) {
            $parameterName = $reflectionParameter->getName();
            $parameterValue = Body::get($parameterName);
            $parameterType = $reflectionParameter->getType();

            if (Assert::isNotNull($parameterType)) {
                $parameterTypeName = $parameterType->getName();
                if (Assert::isPrimitiveTypeName($parameterTypeName)) {
                    (new ParameterResolver())->handler($parameterValue, $reflectionParameter);
                } else if ($parameterTypeName === ObjectId::class) {
                    (new ParameterResolver())->handler($parameterValue, $reflectionParameter);
                } else {
                    $parameterValue = (new ReflectionClass($parameterTypeName))->newInstanceWithoutConstructor();

                    (new ClassResolver())->handler($parameterValue);
                    (new ParameterResolver())->handler($parameterValue, $reflectionParameter);
                }
            }

            $parameters[$parameterName] = $parameterValue;
        }

        return $parameters;
    }
}