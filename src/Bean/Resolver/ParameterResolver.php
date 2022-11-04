<?php

namespace CaioMarcatti12\Bean\Resolver;

use CaioMarcatti12\Bean\InstanceFactory;
use CaioMarcatti12\Bean\InstanceMaker;
use CaioMarcatti12\Bean\Interfaces\ParameterResolverInterface;
use CaioMarcatti12\Bean\Objects\BeanResolver;
use CaioMarcatti12\Validation\Assert;

class ParameterResolver implements ParameterResolverInterface
{
    public function handler(mixed &$instance, \ReflectionParameter $reflectionParameter): void
    {
        /** @var \ReflectionAttribute $reflectionAttribute */
        foreach ($reflectionParameter->getAttributes() as $reflectionAttribute) {

            $resolver = BeanResolver::get($reflectionAttribute->getName());

            if (Assert::isNotEmpty($resolver)) {
                /** @var ParameterResolverInterface $instanceResolver */
                $instanceResolver = InstanceFactory::createIfNotExists($resolver);
                $instanceResolver->handler($instance, $reflectionParameter);
            }
        }
    }
}