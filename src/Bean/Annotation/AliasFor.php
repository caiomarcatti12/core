<?php
namespace CaioMarcatti12\Bean\Annotation;

use Attribute;
use CaioMarcatti12\Bean\Enum\BeanType;

#[Attribute(Attribute::TARGET_CLASS)]
final class AliasFor
{
    private BeanType $beanType;

    public function __construct(BeanType $beanType)
    {
        $this->beanType = $beanType;
    }

    public function getBeanType(): BeanType
    {
        return $this->beanType;
    }
}