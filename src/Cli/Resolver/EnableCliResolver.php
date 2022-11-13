<?php

namespace CaioMarcatti12\Core\Cli\Resolver;

use CaioMarcatti12\Core\Cli\Annotation\EnableCli;
use CaioMarcatti12\Core\Cli\Interfaces\ArgvParserInterface;
use CaioMarcatti12\Core\Bean\Annotation\AnnotationResolver;
use CaioMarcatti12\Core\Bean\Interfaces\ClassResolverInterface;
use CaioMarcatti12\Core\Bean\Objects\BeanProxy;
use ReflectionClass;

#[AnnotationResolver(EnableCli::class)]
class EnableCliResolver implements ClassResolverInterface
{
    public function handler(object &$instance): void
    {
        $reflectionClass = new ReflectionClass($instance);

        $attributes = $reflectionClass->getAttributes(EnableCli::class);

        /** @var EnableCli $attribute */
        $attribute = ($attributes[0]->newInstance());

        BeanProxy::add(ArgvParserInterface::class, $attribute->getAdapter());
    }
}