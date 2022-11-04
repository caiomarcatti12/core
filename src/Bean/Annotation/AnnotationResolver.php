<?php

namespace CaioMarcatti12\Core\Bean\Annotation;

use Attribute;
use CaioMarcatti12\Core\Bean\Exception\BadConstructAnnotationResolverException;
use CaioMarcatti12\Core\Validation\Assert;

#[Attribute(Attribute::TARGET_CLASS)]
class AnnotationResolver
{
    private string $annotation;

    public function __construct(string $annotation)
    {
        if(Assert::isEmpty($annotation)) throw new BadConstructAnnotationResolverException();

        $this->annotation = $annotation;
    }

    public function getAnnotation(): string
    {
        return $this->annotation;
    }
}