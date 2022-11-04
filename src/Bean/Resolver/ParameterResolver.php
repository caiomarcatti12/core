<?php

namespace CaioMarcatti12\Core\Bean\Resolver;

use CaioMarcatti12\Core\Factory\InstanceFactory;
use CaioMarcatti12\Core\Bean\InstanceMaker;
use CaioMarcatti12\Core\Bean\Interfaces\ParameterResolverInterface;
use CaioMarcatti12\Core\Bean\Objects\BeanResolver;
use CaioMarcatti12\Core\Validation\Assert;

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