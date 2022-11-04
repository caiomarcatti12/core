<?php

namespace CaioMarcatti12\Core\Bean\Resolver;

use CaioMarcatti12\Core\Factory\InstanceFactory;
use ReflectionMethod;
use CaioMarcatti12\Core\Bean\Interfaces\MethodResolverInterface;
use CaioMarcatti12\Core\Bean\Objects\BeanResolver;
use CaioMarcatti12\Core\Validation\Assert;

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