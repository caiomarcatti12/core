<?php

namespace CaioMarcatti12\Core\Factory;

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

        $returnTypeName = self::getReturnTypeName($reflectionMethod);
        $presenter = self::getPresenter($reflectionMethod);
        $response = $reflectionMethod->invokeArgs($instance, $parameters);

        return self::makeResponse($returnTypeName, $presenter, $response);
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


    private static function getReturnTypeName(ReflectionMethod $reflectionMethod): string
    {
        $returnType = $reflectionMethod->getReturnType();

        if (Assert::isEmpty($returnType)) throw new ResponseTypeException();

        return $returnType->getName();
    }


    private static function getPresenter(ReflectionMethod $reflectionMethod): string
    {
        /** @var \ReflectionAttribute $reflectionAttribute */
        foreach($reflectionMethod->getAttributes(Presenter::class) as $reflectionAttribute){
            /** @var Presenter $instanceAttribute */
            $instanceAttribute = $reflectionAttribute->newInstance();

            if(Assert::equalsIgnoreCase($instanceAttribute->getContentTypeEnum()->value, Header::get('Content-Type', ''))){
                return $instanceAttribute->getPresenterClass();
            }
        }

        return '';
    }

    private static function makeResponse(string $returnTypeName, string $presenter, mixed $response): mixed
    {
        BeanCache::destroy(RouterResponseInterface::class);

        if (Assert::inArray($returnTypeName, [RouterResponseInterface::class, RouterResponseWeb::class])) {
            return $response;
        } else if (Assert::isNotEmpty($presenter)) {
            return InstanceFactory::createIfNotExists($presenter, [$response, 200], false);
        } else if (!Assert::equals($returnTypeName, "void")) {
            return InstanceFactory::createIfNotExists(RouterResponseInterface::class, [$response, 200], false);
        }

        return InstanceFactory::createIfNotExists(RouterResponseInterface::class, ['', 200], false);
    }
}