<?php

namespace CaioMarcatti12\Bean\Resolver;

use CaioMarcatti12\Bean\InstanceFactory;
use ReflectionMethod;
use CaioMarcatti12\Bean\Interfaces\MethodResolverInterface;
use CaioMarcatti12\Bean\Objects\BeanResolver;
use CaioMarcatti12\Validation\Assert;

class MethodResolver implements MethodResolverInterface
{
    public function handler(object &$instance, ReflectionMethod $reflectionMethod): void
    {
        $arrayUniqueAttribute = [];

        /** @var \ReflectionAttribute $reflectionAttribute */
        foreach ($reflectionMethod->getAttributes() as $reflectionAttribute) {
            if(!in_array($reflectionAttribute->getName(), $arrayUniqueAttribute)){
                $arrayUniqueAttribute[] = $reflectionAttribute->getName();
                $resolver = BeanResolver::get($reflectionAttribute->getName());

                if (Assert::isNotEmpty($resolver)) {
                    /** @var MethodResolverInterface $instanceResolver */
                    $instanceResolver = InstanceFactory::createIfNotExists($resolver);
                    $instanceResolver->handler($instance, $reflectionMethod);
                }
            }
        }
    }
}