<?php

namespace CaioMarcatti12\Bean\Resolver;

use CaioMarcatti12\Factory\InstanceFactory;
use ReflectionClass;
use CaioMarcatti12\Bean\Interfaces\ClassResolverInterface;
use CaioMarcatti12\Bean\Objects\BeanResolver;
use CaioMarcatti12\Validation\Assert;

class ClassResolver implements ClassResolverInterface
{
    public function handler(object &$instance): void
    {
        $reflectionClass = new ReflectionClass($instance);

        foreach ($reflectionClass->getAttributes() as $reflectionAttribute) {
            $resolver = BeanResolver::get($reflectionAttribute->getName());

            if (Assert::isNotEmpty($resolver)) {
                /** @var ClassResolverInterface $instanceResolver */
                $instanceResolver = InstanceFactory::createIfNotExists($resolver);
                $instanceResolver->handler($instance);
            }
        }
    }
}