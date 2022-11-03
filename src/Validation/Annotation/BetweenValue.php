<?php
//
//namespace CaioMarcatti12\Validation\Annotation;
//
//use Attribute;
//use CaioMarcatti12\Bean\Annotation\AliasFor;
//use CaioMarcatti12\Bean\Enum\BeanType;
//
//#[AliasFor(BeanType::VALIDATOR)]
//#[Attribute(Attribute::TARGET_PROPERTY)]
//final class BetweenValue
//{
//    private float $min;
//    private float $max;
//    private string $error;
//
//    public function __construct(float $min, float $max, string $error)
//    {
//        $this->min = $min;
//        $this->max = $max;
//        $this->error = $error;
//    }
//
//    public function getMin() : float
//    {
//        return $this->min;
//    }
//
//    public function getMax() : float
//    {
//        return $this->max;
//    }
//
//    public function getError(): string
//    {
//        return $this->error;
//    }
//}