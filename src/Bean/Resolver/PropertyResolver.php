<?php

namespace CaioMarcatti12\Bean\Resolver;

use CaioMarcatti12\Bean\InstanceFactory;
use ReflectionClass;
use ReflectionProperty;
use CaioMarcatti12\Bean\Interfaces\PropertyResolverInterface;
use CaioMarcatti12\Bean\Objects\BeanResolver;
use CaioMarcatti12\Validation\Assert;

class PropertyResolver implements PropertyResolverInterface
{
    public function handler(object &$instance, ReflectionProperty $reflectionProperty): void
    {
        $reflectionClass = new ReflectionClass($instance);

        /** @var \ReflectionProperty $property */
        foreach ($reflectionClass->getProperties() as $reflectionProperty) {
            $this->resolveProperty($instance, $reflectionProperty);

        }
    }

    private function resolveProperty(object &$instance, ReflectionProperty $reflectionProperty): void {
        /** @var \ReflectionAttribute $reflectionAttribute */
        foreach ($reflectionProperty->getAttributes() as $reflectionAttribute) {
            $resolver = BeanResolver::get($reflectionAttribute->getName());

            if (Assert::isNotEmpty($resolver)) {
                /** @var PropertyResolverInterface $instanceResolver */
                $instanceResolver = InstanceFactory::createIfNotExists($resolver);
                $instanceResolver->handler($instance, $reflectionProperty);
            }
        }
    }
}