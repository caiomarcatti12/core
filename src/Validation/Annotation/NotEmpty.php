<?php
//namespace CaioMarcatti12\Core\Validation\Annotation;
//
//use Attribute;
//use CaioMarcatti12\Core\Bean\Annotation\AliasFor;
//use CaioMarcatti12\Core\Bean\Enum\BeanType;
//
//#[AliasFor(BeanType::VALIDATOR)]
//#[Attribute(Attribute::TARGET_PROPERTY)]
//final class NotEmpty
//{
//    private string $error;
//    private string $fieldName;
//
//    public function __construct($error, $fieldName = '')
//    {
//        $this->error = $error;
//        $this->fieldName = $fieldName;
//    }
//
//    public function getError(): string
//    {
//        return $this->error;
//    }
//
//    public function getFieldName(): mixed
//    {
//        return $this->fieldName;
//    }
//
//
//}